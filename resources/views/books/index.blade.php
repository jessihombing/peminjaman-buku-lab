<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-amber-100 leading-tight drop-shadow-lg">
            📚 Katalog Buku Laboratorium
        </h2>
    </x-slot>

    <div class="py-8">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

            @if(session('success'))
                <div class="mb-4 p-4 bg-emerald-100 text-emerald-800 rounded-xl border-l-4 border-emerald-500 shadow">✅ {{ session('success') }}</div>
            @endif
            @if(session('error'))
                <div class="mb-4 p-4 bg-red-100 text-red-800 rounded-xl border-l-4 border-red-500 shadow">⚠️ {{ session('error') }}</div>
            @endif

            <!-- Search Bar Gaya Klasik -->
            <form class="mb-8 flex flex-col md:flex-row gap-3 bg-amber-50/95 backdrop-blur-sm p-4 rounded-2xl shadow-xl border-2 border-amber-900/20">
                <input name="search" value="{{ request('search') }}"
                       placeholder="🔍 Cari judul atau penulis..."
                       class="flex-1 px-4 py-3 rounded-xl border-2 border-amber-900/20 bg-white focus:ring-2 focus:ring-amber-700 focus:border-amber-700 outline-none">
                <select name="category" class="px-4 py-3 rounded-xl border-2 border-amber-900/20 bg-white">
                    <option value="">Semua Kategori</option>
                    @foreach($categories as $c)
                        <option value="{{ $c->id }}" @selected(request('category')==$c->id)>{{ $c->name }}</option>
                    @endforeach
                </select>
                <button class="px-6 py-3 rounded-xl bg-gradient-to-br from-amber-700 to-amber-900 text-white font-bold hover:from-amber-800 hover:to-amber-950 shadow-lg transition">
                    Cari
                </button>
            </form>

            @php
                // Palet warna sampul buku klasik
                $coverColors = [
                    ['from' => '#7f1d1d', 'to' => '#991b1b', 'label' => '#fef3c7'], // Merah maroon
                    ['from' => '#14532d', 'to' => '#166534', 'label' => '#fef3c7'], // Hijau tua
                    ['from' => '#1e3a8a', 'to' => '#1e40af', 'label' => '#fef3c7'], // Biru navy
                    ['from' => '#581c87', 'to' => '#6b21a8', 'label' => '#fef3c7'], // Ungu tua
                    ['from' => '#713f12', 'to' => '#854d0e', 'label' => '#fef3c7'], // Coklat emas
                    ['from' => '#7c2d12', 'to' => '#9a3412', 'label' => '#fef3c7'], // Coklat bata
                    ['from' => '#0c4a6e', 'to' => '#0e7490', 'label' => '#fef3c7'], // Teal tua
                    ['from' => '#831843', 'to' => '#9d174d', 'label' => '#fef3c7'], // Maroon pink
                ];
            @endphp

            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-8">
                @forelse($books as $book)
                    @php $color = $coverColors[$loop->index % count($coverColors)]; @endphp

                    <div class="group relative">
                        <!-- Bayangan buku -->
                        <div class="absolute inset-0 bg-black/40 rounded-lg translate-x-2 translate-y-2 blur-sm group-hover:translate-x-3 group-hover:translate-y-3 transition-all"></div>

                        <!-- Kartu Buku -->
                        <div class="relative bg-gradient-to-br from-amber-50 to-amber-100 rounded-lg overflow-hidden shadow-2xl border-4 border-amber-900/30 group-hover:-translate-y-1 group-hover:shadow-amber-900/50 transition-all duration-300"
                             style="background: linear-gradient(135deg, #fef3c7 0%, #fde68a 100%);">

                            <!-- Sampul Buku (Cover) -->
                            <div class="relative h-56 flex flex-col items-center justify-center p-4"
                                 style="background: linear-gradient(135deg, {{ $color['from'] }} 0%, {{ $color['to'] }} 100%);">

                                <!-- Ornamen sudut emas -->
                                <div class="absolute top-3 left-3 w-6 h-6 border-t-2 border-l-2 border-amber-400/70"></div>
                                <div class="absolute top-3 right-3 w-6 h-6 border-t-2 border-r-2 border-amber-400/70"></div>
                                <div class="absolute bottom-3 left-3 w-6 h-6 border-b-2 border-l-2 border-amber-400/70"></div>
                                <div class="absolute bottom-3 right-3 w-6 h-6 border-b-2 border-r-2 border-amber-400/70"></div>

                                <!-- Garis emas atas -->
                                <div class="absolute top-8 left-6 right-6 h-px bg-gradient-to-r from-transparent via-amber-400/60 to-transparent"></div>
                                <div class="absolute top-10 left-6 right-6 h-px bg-gradient-to-r from-transparent via-amber-400/40 to-transparent"></div>

                                <!-- Ikon Buku -->
                                <div class="text-6xl drop-shadow-2xl filter brightness-110">📖</div>

                                <!-- Garis emas bawah -->
                                <div class="absolute bottom-10 left-6 right-6 h-px bg-gradient-to-r from-transparent via-amber-400/40 to-transparent"></div>
                                <div class="absolute bottom-8 left-6 right-6 h-px bg-gradient-to-r from-transparent via-amber-400/60 to-transparent"></div>

                                <!-- Kategori badge -->
                                <div class="absolute top-12 left-1/2 -translate-x-1/2">
                                    <span class="text-xs font-bold px-3 py-1 rounded-full bg-amber-400/90 text-amber-950 shadow-lg border border-amber-200">
                                        {{ $book->category->name }}
                                    </span>
                                </div>
                            </div>

                            <!-- Info Buku (di bawah sampul, seperti meja kayu) -->
                            <div class="p-5 relative">
                                <!-- Garis emas pemisah -->
                                <div class="absolute top-0 left-6 right-6 h-px bg-gradient-to-r from-transparent via-amber-700/40 to-transparent"></div>

                                <h3 class="text-lg font-bold text-amber-950 line-clamp-2 leading-snug"
                                    style="font-family: 'Playfair Display', serif;">
                                    {{ $book->title }}
                                </h3>
                                <p class="text-sm text-amber-800/80 italic mt-1">{{ $book->author }} — {{ $book->year }}</p>

                                <div class="mt-4 flex justify-between items-center pt-3 border-t border-amber-700/20">
                                    <span class="text-sm font-bold {{ $book->stock > 0 ? 'text-emerald-700' : 'text-red-700' }} flex items-center gap-1">
                                        @if($book->stock > 0)
                                            📗 Stok: {{ $book->stock }}
                                        @else
                                            📕 Habis
                                        @endif
                                    </span>
                                    <a href="{{ route('books.show', $book) }}"
                                       class="px-4 py-2 rounded-lg bg-gradient-to-br from-amber-700 to-amber-900 text-white text-sm font-bold hover:from-amber-800 hover:to-amber-950 shadow-md transition-all">
                                        Lihat →
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                @empty
                    <div class="col-span-full text-center py-20">
                        <div class="inline-block p-8 bg-amber-50/95 backdrop-blur rounded-2xl border-2 border-amber-900/20 shadow-xl">
                            <div class="text-6xl mb-3">📭</div>
                            <p class="text-amber-900 font-semibold">Belum ada buku di perpustakaan</p>
                        </div>
                    </div>
                @endforelse
            </div>

            <div class="mt-8">{{ $books->links() }}</div>
        </div>
    </div>
</x-app-layout>