<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ isset($book) ? '✏️ Edit Buku' : '+ Tambah Buku' }}
        </h2>
    </x-slot>

    <div class="py-8">
        <div class="max-w-2xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white p-8 rounded-2xl shadow-sm">
                <form method="POST"
                      action="{{ isset($book) ? route('admin.books.update', $book) : route('admin.books.store') }}"
                      class="space-y-4">
                    @csrf
                    @if(isset($book)) @method('PUT') @endif

                    <div>
                        <label class="block text-sm font-semibold mb-1">Judul Buku</label>
                        <input name="title" value="{{ old('title', $book->title ?? '') }}"
                               class="w-full p-3 rounded-xl border border-gray-300" required>
                        @error('title') <p class="text-red-500 text-xs mt-1">{{ $message }}</p> @enderror
                    </div>

                    <div>
                        <label class="block text-sm font-semibold mb-1">Penulis</label>
                        <input name="author" value="{{ old('author', $book->author ?? '') }}"
                               class="w-full p-3 rounded-xl border border-gray-300" required>
                        @error('author') <p class="text-red-500 text-xs mt-1">{{ $message }}</p> @enderror
                    </div>

                    <div>
                        <label class="block text-sm font-semibold mb-1">Kategori</label>
                        <select name="category_id" class="w-full p-3 rounded-xl border border-gray-300" required>
                            <option value="">-- Pilih Kategori --</option>
                            @foreach($categories as $c)
                                <option value="{{ $c->id }}" @selected(old('category_id', $book->category_id ?? '') == $c->id)>
                                    {{ $c->name }}
                                </option>
                            @endforeach
                        </select>
                        @error('category_id') <p class="text-red-500 text-xs mt-1">{{ $message }}</p> @enderror
                    </div>

                    <div class="grid grid-cols-1 md:grid-cols-3 gap-3">
                        <div>
                            <label class="block text-sm font-semibold mb-1">Penerbit</label>
                            <input name="publisher" value="{{ old('publisher', $book->publisher ?? '') }}"
                                   class="w-full p-3 rounded-xl border border-gray-300">
                        </div>
                        <div>
                            <label class="block text-sm font-semibold mb-1">Tahun</label>
                            <input name="year" type="number" value="{{ old('year', $book->year ?? '') }}"
                                   class="w-full p-3 rounded-xl border border-gray-300">
                        </div>
                        <div>
                            <label class="block text-sm font-semibold mb-1">Stok</label>
                            <input name="stock" type="number" value="{{ old('stock', $book->stock ?? 1) }}"
                                   class="w-full p-3 rounded-xl border border-gray-300" required>
                            @error('stock') <p class="text-red-500 text-xs mt-1">{{ $message }}</p> @enderror
                        </div>
                    </div>

                    <div>
                        <label class="block text-sm font-semibold mb-1">Deskripsi</label>
                        <textarea name="description" rows="4"
                                  class="w-full p-3 rounded-xl border border-gray-300">{{ old('description', $book->description ?? '') }}</textarea>
                    </div>

                    <div class="flex gap-3 pt-2">
                        <button class="px-6 py-3 rounded-xl bg-indigo-600 text-white font-bold hover:bg-indigo-700">
                            💾 Simpan
                        </button>
                        <a href="{{ route('admin.books.index') }}"
                           class="px-6 py-3 rounded-xl bg-gray-100 text-gray-700 font-bold hover:bg-gray-200">
                            Batal
                        </a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>