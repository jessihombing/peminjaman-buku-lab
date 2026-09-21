<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between items-center">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">📚 Kelola Buku</h2>
            <a href="{{ route('admin.books.create') }}"
               class="px-4 py-2 bg-indigo-600 text-white rounded-lg font-semibold hover:bg-indigo-700">
                + Tambah Buku
            </a>
        </div>
    </x-slot>

    <div class="py-8">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

            @if(session('success'))
                <div class="mb-4 p-4 bg-green-100 text-green-700 rounded-lg">✅ {{ session('success') }}</div>
            @endif

            <div class="bg-white rounded-2xl shadow-sm overflow-x-auto">
                <table class="w-full text-sm">
                    <thead class="bg-gray-100 text-gray-600">
                        <tr>
                            <th class="p-4 text-left">Judul</th>
                            <th class="p-4">Penulis</th>
                            <th class="p-4">Kategori</th>
                            <th class="p-4">Stok</th>
                            <th class="p-4">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                    @forelse($books as $book)
                        <tr class="border-b hover:bg-gray-50">
                            <td class="p-4 font-semibold">{{ $book->title }}</td>
                            <td class="p-4 text-center">{{ $book->author }}</td>
                            <td class="p-4 text-center">{{ $book->category->name }}</td>
                            <td class="p-4 text-center">{{ $book->stock }}</td>
                            <td class="p-4 text-center space-x-2 whitespace-nowrap">
                                <a href="{{ route('admin.books.edit', $book) }}"
                                   class="px-3 py-1 rounded-lg bg-amber-500 text-white text-xs font-bold hover:bg-amber-600">
                                    Edit
                                </a>
                                <form action="{{ route('admin.books.destroy', $book) }}" method="POST"
                                      class="inline" onsubmit="return confirm('Hapus buku ini?')">
                                    @csrf
                                    @method('DELETE')
                                    <button class="px-3 py-1 rounded-lg bg-red-500 text-white text-xs font-bold hover:bg-red-600">
                                        Hapus
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr><td colspan="5" class="p-10 text-center text-gray-400">Belum ada buku</td></tr>
                    @endforelse
                    </tbody>
                </table>
            </div>

            <div class="mt-4">{{ $books->links() }}</div>
        </div>
    </div>
</x-app-layout>