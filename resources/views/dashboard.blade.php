<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Dashboard
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-6">
                <h3 class="text-2xl font-bold text-gray-800 mb-2">
                    Halo, {{ auth()->user()->name }}! 👋
                </h3>
                <p class="text-gray-600 mb-6">
                    Selamat datang di Perpustakaan Lab MI.
                    Role kamu: <span class="font-bold text-indigo-600">{{ auth()->user()->role }}</span>
                </p>

                <div class="flex flex-wrap gap-3">
                    <a href="{{ route('books.index') }}"
                       class="px-5 py-2.5 bg-indigo-600 text-white rounded-lg font-semibold hover:bg-indigo-700">
                        📚 Lihat Katalog Buku
                    </a>
                    <a href="{{ route('loans.index') }}"
                       class="px-5 py-2.5 bg-white border border-gray-300 text-gray-700 rounded-lg font-semibold hover:bg-gray-50">
                        📋 Peminjaman Saya
                    </a>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>