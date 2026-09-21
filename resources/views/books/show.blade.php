<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Detail Buku
        </h2>
    </x-slot>

    <div class="py-8">
        <div class="max-w-3xl mx-auto sm:px-6 lg:px-8">

            @if(session('success'))
                <div class="mb-4 p-4 bg-green-100 text-green-700 rounded-lg">✅ {{ session('success') }}</div>
            @endif
            @if(session('error'))
                <div class="mb-4 p-4 bg-red-100 text-red-700 rounded-lg">⚠️ {{ session('error') }}</div>
            @endif

            <div class="bg-white rounded-2xl shadow-sm p-8">
                <div class="flex flex-col md:flex-row gap-6">
                    <div class="w-full md:w-48 h-64 bg-gradient-to-br from-indigo-500 to-purple-600 rounded-xl flex items-center justify-center text-7xl">
                        📖
                    </div>
                    <div class="flex-1">
                        <span class="text-xs font-bold px-2 py-1 rounded-full bg-indigo-100 text-indigo-700">
                            {{ $book->category->name }}
                        </span>
                        <h1 class="text-2xl font-extrabold text-gray-800 mt-2">{{ $book->title }}</h1>
                        <p class="text-gray-500 mt-1">
                            {{ $book->author }} • {{ $book->publisher }} ({{ $book->year }})
                        </p>
                        <p class="mt-4 text-gray-600">{{ $book->description ?? 'Tidak ada deskripsi.' }}</p>
                        <p class="mt-4 font-semibold {{ $book->stock > 0 ? 'text-green-600' : 'text-red-600' }}">
                            Stok tersedia: {{ $book->stock }}
                        </p>

                        @if(!auth()->user()->isAdmin())
                            <form action="{{ route('loans.store', $book) }}" method="POST" class="mt-6">
                                @csrf
                                <button @disabled($book->stock < 1)
                                    class="px-6 py-3 rounded-xl bg-indigo-600 text-white font-bold hover:bg-indigo-700 disabled:opacity-50 disabled:cursor-not-allowed">
                                    📥 Ajukan Peminjaman
                                </button>
                            </form>
                        @endif

                        <a href="{{ route('books.index') }}"
                           class="inline-block mt-4 text-indigo-600 hover:underline">← Kembali ke katalog</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>