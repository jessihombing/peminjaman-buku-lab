<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            🎛️ Dashboard Admin
        </h2>
    </x-slot>

    <div class="py-8">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

            <div class="grid grid-cols-2 md:grid-cols-4 gap-4 mb-8">
                <div class="bg-gradient-to-br from-indigo-500 to-blue-500 text-white p-5 rounded-2xl shadow-lg">
                    <div class="text-3xl">📚</div>
                    <div class="mt-2 text-sm opacity-90">Total Buku</div>
                    <div class="text-3xl font-extrabold">{{ $stats['books'] }}</div>
                </div>
                <div class="bg-gradient-to-br from-emerald-500 to-teal-500 text-white p-5 rounded-2xl shadow-lg">
                    <div class="text-3xl">👥</div>
                    <div class="mt-2 text-sm opacity-90">Total User</div>
                    <div class="text-3xl font-extrabold">{{ $stats['users'] }}</div>
                </div>
                <div class="bg-gradient-to-br from-purple-500 to-pink-500 text-white p-5 rounded-2xl shadow-lg">
                    <div class="text-3xl">📝</div>
                    <div class="mt-2 text-sm opacity-90">Total Peminjaman</div>
                    <div class="text-3xl font-extrabold">{{ $stats['loans'] }}</div>
                </div>
                <div class="bg-gradient-to-br from-amber-500 to-orange-500 text-white p-5 rounded-2xl shadow-lg">
                    <div class="text-3xl">⏳</div>
                    <div class="mt-2 text-sm opacity-90">Menunggu Approval</div>
                    <div class="text-3xl font-extrabold">{{ $stats['pending'] }}</div>
                </div>
            </div>

            <div class="grid md:grid-cols-3 gap-4">
                <a href="{{ route('admin.books.index') }}"
                   class="p-6 bg-white rounded-2xl shadow-sm hover:shadow-lg transition">
                    📚 <div class="font-bold mt-2">Kelola Buku</div>
                </a>
                <a href="{{ route('admin.categories.index') }}"
                   class="p-6 bg-white rounded-2xl shadow-sm hover:shadow-lg transition">
                    🏷️ <div class="font-bold mt-2">Kelola Kategori</div>
                </a>
                <a href="{{ route('admin.loans.index') }}"
                   class="p-6 bg-white rounded-2xl shadow-sm hover:shadow-lg transition">
                    📋 <div class="font-bold mt-2">Kelola Peminjaman</div>
                </a>
            </div>
        </div>
    </div>
</x-app-layout>