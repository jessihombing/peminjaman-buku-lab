<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            🏷️ Kelola Kategori
        </h2>
    </x-slot>

    <div class="py-8">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

            @if(session('success'))
                <div class="mb-4 p-4 bg-green-100 text-green-700 rounded-lg">✅ {{ session('success') }}</div>
            @endif

            <div class="grid md:grid-cols-3 gap-6">
                <!-- Form Tambah Kategori -->
                <div class="bg-white p-6 rounded-2xl shadow-sm">
                    <h2 class="font-bold mb-4">Tambah Kategori</h2>
                    <form method="POST" action="{{ route('admin.categories.store') }}" class="space-y-3">
                        @csrf
                        <input name="name" placeholder="Nama kategori"
                               value="{{ old('name') }}"
                               class="w-full p-3 rounded-xl border border-gray-300" required>
                        @error('name')
                            <p class="text-red-500 text-xs">{{ $message }}</p>
                        @enderror
                        <button class="w-full py-2.5 rounded-xl bg-indigo-600 text-white font-bold hover:bg-indigo-700">
                            Simpan
                        </button>
                    </form>
                </div>

                <!-- Daftar Kategori -->
                <div class="md:col-span-2 bg-white p-6 rounded-2xl shadow-sm">
                    <h2 class="font-bold mb-4">Daftar Kategori</h2>
                    <ul class="space-y-2">
                    @forelse($categories as $c)
                        <li class="flex justify-between items-center p-3 rounded-xl border border-gray-100 hover:bg-gray-50">
                            <div>
                                <span class="font-semibold">{{ $c->name }}</span>
                                <span class="text-xs text-gray-400">({{ $c->books_count }} buku)</span>
                            </div>
                            <form method="POST" action="{{ route('admin.categories.destroy', $c) }}"
                                  onsubmit="return confirm('Hapus kategori ini? Semua buku di dalamnya juga akan terhapus.')">
                                @csrf
                                @method('DELETE')
                                <button class="text-red-500 text-sm font-bold hover:underline">Hapus</button>
                            </form>
                        </li>
                    @empty
                        <li class="text-center text-gray-400 py-6">Belum ada kategori</li>
                    @endforelse
                    </ul>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>