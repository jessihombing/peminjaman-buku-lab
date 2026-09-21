<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">📋 Kelola Peminjaman</h2>
    </x-slot>

    <div class="py-8">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

            @if(session('success'))
                <div class="mb-4 p-4 bg-green-100 text-green-700 rounded-lg">✅ {{ session('success') }}</div>
            @endif
            @if(session('error'))
                <div class="mb-4 p-4 bg-red-100 text-red-700 rounded-lg">⚠️ {{ session('error') }}</div>
            @endif

            <div class="bg-white rounded-2xl shadow-sm overflow-x-auto">
                <table class="w-full text-sm">
                    <thead class="bg-gray-100 text-gray-600">
                        <tr>
                            <th class="p-4 text-left">Peminjam</th>
                            <th class="p-4">Buku</th>
                            <th class="p-4">Pinjam</th>
                            <th class="p-4">Jatuh Tempo</th>
                            <th class="p-4">Status</th>
                            <th class="p-4">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                    @forelse($loans as $loan)
                        <tr class="border-b hover:bg-gray-50">
                            <td class="p-4 font-semibold">{{ $loan->user->name }}</td>
                            <td class="p-4 text-center">{{ $loan->book->title }}</td>
                            <td class="p-4 text-center">{{ $loan->loan_date }}</td>
                            <td class="p-4 text-center">{{ $loan->due_date }}</td>
                            <td class="p-4 text-center">
                                @php
                                    $colors = [
                                        'pending' => 'bg-yellow-100 text-yellow-700',
                                        'approved' => 'bg-green-100 text-green-700',
                                        'rejected' => 'bg-red-100 text-red-700',
                                        'returned' => 'bg-gray-100 text-gray-700',
                                    ];
                                @endphp
                                <span class="px-3 py-1 rounded-full text-xs font-bold {{ $colors[$loan->status] }}">
                                    {{ ucfirst($loan->status) }}
                                </span>
                            </td>
                            <td class="p-4 text-center space-x-1 whitespace-nowrap">
                                @if($loan->status === 'pending')
                                    <form action="{{ route('admin.loans.approve', $loan) }}" method="POST" class="inline">
                                        @csrf @method('PATCH')
                                        <button class="px-3 py-1 rounded-lg bg-green-500 text-white text-xs font-bold">✓ Setujui</button>
                                    </form>
                                    <form action="{{ route('admin.loans.reject', $loan) }}" method="POST" class="inline">
                                        @csrf @method('PATCH')
                                        <button class="px-3 py-1 rounded-lg bg-red-500 text-white text-xs font-bold">✗ Tolak</button>
                                    </form>
                                @else
                                    —
                                @endif
                            </td>
                        </tr>
                    @empty
                        <tr><td colspan="6" class="p-10 text-center text-gray-400">Belum ada peminjaman</td></tr>
                    @endforelse
                    </tbody>
                </table>
            </div>

            <div class="mt-4">{{ $loans->links() }}</div>
        </div>
    </div>
</x-app-layout>