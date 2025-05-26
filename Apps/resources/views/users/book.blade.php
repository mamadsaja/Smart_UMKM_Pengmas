@extends('layouts.app')
@section('title', 'Library')
@section('content')
<div class="min-h-screen bg-gray-100 py-16 px-4 sm:px-6 lg:px-8 overflow-hidden">
    <div class="text-center mb-10 mt-16 sm:mt-20">
        <h1 class="text-5xl font-extrabold text-gray-900 mb-6 tracking-wide drop-shadow">LIBRARY</h1>
        <!-- Enhanced Search Bar -->
        <div class="max-w-lg mx-auto mt-10 sm:mt-12">
            <form action="{{ route('book') }}" method="GET" class="relative group">
                <div class="absolute -inset-0.5 bg-gradient-to-r rounded-full opacity-75 group-hover:opacity-100 blur transition duration-300"></div>
                <div class="relative flex items-center bg-white rounded-full shadow-lg">
                    <input
                        type="text"
                        name="search"
                        value="{{ request('search') }}"
                        placeholder="Cari buku favorit Anda..."
                        class="w-full pl-6 pr-12 py-4 rounded-full focus:outline-none text-base sm:text-lg bg-transparent z-10"
                    />
                    <button type="submit" class="absolute right-3 bg-blue-600 hover:bg-blue-700 text-white p-2.5 rounded-full transition-all duration-300 mr-1 z-10">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M21 21l-4.35-4.35M11 19a8 8 0 100-16 8 8 0 000 16z" />
                        </svg>
                    </button>
                </div>
                <!-- Hidden kategori field to maintain category when searching -->
                @if(request('kategori'))
                    <input type="hidden" name="kategori" value="{{ request('kategori') }}">
                @endif
            </form>
        </div>
        
        <!-- Modern Navigator -->
        <div class="max-w-5xl mx-auto mt-10">
            <div class="bg-white rounded-2xl shadow-lg p-2 flex flex-wrap justify-center gap-2 md:gap-4">
                <!-- Category Pills -->
                <div class="flex items-center space-x-3 overflow-x-auto py-2 px-4 scrollbar-hide">
                    <a href="{{ route('book') }}" 
                       class="flex items-center space-x-2 {{ !request('kategori') ? 'bg-blue-600 text-white' : 'bg-white text-gray-700' }} px-5 py-2.5 rounded-xl shadow-md hover:bg-blue-700 hover:text-white transition-all duration-300 whitespace-nowrap">
                        <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
                            <path d="M10.707 2.293a1 1 0 00-1.414 0l-7 7a1 1 0 001.414 1.414L4 10.414V17a1 1 0 001 1h2a1 1 0 001-1v-2a1 1 0 011-1h2a1 1 0 011 1v2a1 1 0 001 1h2a1 1 0 001-1v-6.586l.293.293a1 1 0 001.414-1.414l-7-7z"></path>
                        </svg>
                        <span class="font-medium">Semua</span>
                    </a>
                    
                    @foreach($kategoris as $kategori)
                        @php
                            $isActive = request('kategori') == $kategori->namaKategori;
                            
                            // Assign icon and color based on category name
                            $iconColor = 'text-blue-500';
                            $icon = '<path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-8-3a1 1 0 00-.867.5 1 1 0 11-1.731-1A3 3 0 0113 8a3.001 3.001 0 01-2 2.83V11a1 1 0 11-2 0v-1a1 1 0 011-1 1 1 0 100-2zm0 8a1 1 0 100-2 1 1 0 000 2z" clip-rule="evenodd"></path>';
                            
                            if($kategori->namaKategori == 'Fiksi') {
                                $iconColor = 'text-yellow-500';
                                $icon = '<path d="M9 4.804A7.968 7.968 0 005.5 4c-1.255 0-2.443.29-3.5.804v10A7.969 7.969 0 015.5 14c1.669 0 3.218.51 4.5 1.385A7.962 7.962 0 0114.5 14c1.255 0 2.443.29 3.5.804v-10A7.968 7.968 0 0014.5 4c-1.255 0-2.443.29-3.5.804V12a1 1 0 11-2 0V4.804z"></path>';
                            } elseif($kategori->namaKategori == 'Non-Fiksi') {
                                $iconColor = 'text-green-500';
                                $icon = '<path fill-rule="evenodd" d="M4 4a2 2 0 012-2h4.586A2 2 0 0112 2.586L15.414 6A2 2 0 0116 7.414V16a2 2 0 01-2 2H6a2 2 0 01-2-2V4zm2 6a1 1 0 011-1h6a1 1 0 110 2H7a1 1 0 01-1-1zm1 3a1 1 0 100 2h6a1 1 0 100-2H7z" clip-rule="evenodd"></path>';
                            } elseif($kategori->namaKategori == 'Fantasi' || $kategori->namaKategori == 'Horor') {
                                $iconColor = 'text-red-500';
                                $icon = '<path fill-rule="evenodd" d="M12.395 2.553a1 1 0 00-1.45-.385c-.345.23-.614.558-.822.88-.214.33-.403.713-.57 1.116-.334.804-.614 1.768-.84 2.734a31.365 31.365 0 00-.613 3.58 2.64 2.64 0 01-.945-1.067c-.328-.68-.398-1.534-.398-2.654A1 1 0 005.05 6.05 6.981 6.981 0 003 11a7 7 0 1011.95-4.95c-.592-.591-.98-.985-1.348-1.467-.363-.476-.724-1.063-1.207-2.03zM12.12 15.12A3 3 0 017 13s.879.5 2.5.5c0-1 .5-4 1.25-4.5.5 1 .786 1.293 1.371 1.879A2.99 2.99 0 0113 13a2.99 2.99 0 01-.879 2.121z" clip-rule="evenodd"></path>';
                            } elseif($kategori->namaKategori == 'Biografi' || $kategori->namaKategori == 'Sejarah') {
                                $iconColor = 'text-purple-500';
                                $icon = '<path d="M9 6a3 3 0 11-6 0 3 3 0 116 0zM17 6a3 3 0 11-6 0 3 3 0 116 0zM12.93 17c.046-.327.07-.66.07-1a6.97 6.97 0 00-1.5-4.33A5 5 0 0119 16v1h-6.07zM6 11a5 5 0 015 5v1H1v-1a5 5 0 015-5z"></path>';
                            } elseif($kategori->namaKategori == 'Sains' || $kategori->namaKategori == 'Filsafat') {
                                $iconColor = 'text-blue-500';
                                $icon = '<path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-8-3a1 1 0 00-.867.5 1 1 0 11-1.731-1A3 3 0 0113 8a3.001 3.001 0 01-2 2.83V11a1 1 0 11-2 0v-1a1 1 0 011-1 1 1 0 100-2zm0 8a1 1 0 100-2 1 1 0 000 2z" clip-rule="evenodd"></path>';
                            }
                        @endphp
                        
                        <a href="{{ route('book', ['kategori' => $kategori->namaKategori]) }}{{ request('search') ? '&search='.request('search') : '' }}" 
                           class="flex items-center space-x-2 {{ $isActive ? 'bg-blue-600 text-white' : 'bg-white text-gray-700' }} px-5 py-2.5 rounded-xl shadow-sm hover:bg-gray-50 hover:shadow-md transition-all duration-300 whitespace-nowrap">
                            <svg class="w-5 h-5 {{ !$isActive ? $iconColor : '' }}" fill="currentColor" viewBox="0 0 20 20">
                                {!! $icon !!}
                            </svg>
                            <span class="font-medium">{{ $kategori->namaKategori }}</span>
                        </a>
                    @endforeach
                </div>
                
                <!-- Filter Button -->
                <div class="flex items-center">
                    <button id="filterButton" class="flex items-center space-x-2 bg-gray-100 text-gray-700 px-4 py-2.5 rounded-xl hover:bg-gray-200 transition-all duration-300">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 4a1 1 0 011-1h16a1 1 0 011 1v2.586a1 1 0 01-.293.707l-6.414 6.414a1 1 0 00-.293.707V17l-4 4v-6.586a1 1 0 00-.293-.707L3.293 7.293A1 1 0 013 6.586V4z"></path>
                        </svg>
                        <span class="font-medium">Filter</span>
                    </button>
                </div>
            </div>
        </div>
    </div>

    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <!-- Filter Panel (Hidden by default) -->
        <div id="filterPanel" class="bg-white rounded-2xl shadow-lg p-6 mb-8 hidden transform transition-all duration-300">
            <div class="flex justify-between items-center mb-6">
                <h3 class="text-xl font-bold text-gray-800">Filter Buku</h3>
                <button id="closeFilterBtn" class="text-gray-500 hover:text-gray-700">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                    </svg>
                </button>
            </div>
            <form action="{{ route('book') }}" method="GET" class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                <!-- Maintain existing filters -->
                @if(request('kategori'))
                    <input type="hidden" name="kategori" value="{{ request('kategori') }}">
                @endif
                @if(request('search'))
                    <input type="hidden" name="search" value="{{ request('search') }}">
                @endif
                
                <!-- Price Range -->
                <div class="bg-gray-50 p-4 rounded-xl">
                    <label class="block text-sm font-medium text-gray-700 mb-3">Rentang Harga</label>
                    <div class="flex items-center space-x-3">
                        <div class="relative flex-1">
                            <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                <span class="text-gray-500 sm:text-sm">Rp</span>
                            </div>
                            <input 
                                type="number" 
                                name="min_price" 
                                value="{{ request('min_price') }}" 
                                placeholder="Min" 
                                class="pl-10 w-full rounded-lg border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500"
                            >
                        </div>
                        <span class="text-gray-500">-</span>
                        <div class="relative flex-1">
                            <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                <span class="text-gray-500 sm:text-sm">Rp</span>
                            </div>
                            <input 
                                type="number" 
                                name="max_price" 
                                value="{{ request('max_price') }}" 
                                placeholder="Max" 
                                class="pl-10 w-full rounded-lg border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500"
                            >
                        </div>
                    </div>
                </div>
                
                <!-- Sort By -->
                <div class="bg-gray-50 p-4 rounded-xl">
                    <label class="block text-sm font-medium text-gray-700 mb-3">Urutkan Berdasarkan</label>
                    <select name="sort" class="w-full rounded-lg border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500">
                        <option value="">Pilih...</option>
                        <option value="price_asc" {{ request('sort') == 'price_asc' ? 'selected' : '' }}>Harga: Rendah ke Tinggi</option>
                        <option value="price_desc" {{ request('sort') == 'price_desc' ? 'selected' : '' }}>Harga: Tinggi ke Rendah</option>
                        <option value="newest" {{ request('sort') == 'newest' ? 'selected' : '' }}>Terbaru</option>
                    </select>
                </div>
                
                <!-- Submit Button -->
                <div class="md:col-span-2 lg:col-span-3 flex justify-end mt-4">
                    <a href="{{ route('book') }}" class="bg-gray-200 hover:bg-gray-300 text-gray-800 px-5 py-2.5 rounded-lg mr-3 transition-colors duration-300 flex items-center">
                        <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 4v5h.582m15.356 2A8.001 8.001 0 004.582 9m0 0H9m11 11v-5h-.581m0 0a8.003 8.003 0 01-15.357-2m15.357 2H15"></path>
                        </svg>
                        Reset
                    </a>
                    <button type="submit" class="bg-blue-600 hover:bg-blue-700 text-white px-5 py-2.5 rounded-lg transition-colors duration-300 flex items-center">
                        <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 4a1 1 0 011-1h16a1 1 0 011 1v2.586a1 1 0 01-.293.707l-6.414 6.414a1 1 0 00-.293.707V17l-4 4v-6.586a1 1 0 00-.293-.707L3.293 7.293A1 1 0 013 6.586V4z"></path>
                        </svg>
                        Terapkan Filter
                    </button>
                </div>
            </form>
        </div>
        
        <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 2xl:grid-cols-5 gap-8 w-full">
            @if($bukus->count() > 0)
                @foreach ($bukus as $buku)
                    <a href="{{ route('book_detail', ['id' => $buku->id]) }}">
                        <div class="bg-white rounded-2xl shadow hover:shadow-xl overflow-hidden transition-all duration-300 group w-full">
                            <div class="relative">
                                <img src="{{ asset('storage/' . $buku->gambar) }}"
                                    alt="{{ $buku->judul }}"
                                    class="w-full h-58 sm:h-64 object-cover group-hover:scale-105 transition-transform duration-300"
                                />
                                <div class="absolute top-3 left-3 flex gap-2">
                                    <span class="bg-white text-black text-xs font-bold px-2 py-1 rounded-full shadow-sm">NEW</span>
                                    <span class="bg-red-600 text-white text-xs font-bold px-2 py-1 rounded-full shadow-sm">UP</span>
                                </div>
                                <div class="absolute top-3 right-3 text-sm bg-white/80 px-2 py-1 rounded-full shadow-sm">🇮🇩</div>
                            </div>
                            <div class="p-5">
                                <h3 class="text-base font-semibold truncate mb-2">{{ $buku->judul }}</h3>
                                <p class="text-xs text-gray-500">
                                    Toko: <span class="font-medium text-gray-700">{{ $buku->tokoBuku->Nama_Toko ?? 'Unknown' }}</span>
                                </p>
                                <div class="flex items-center justify-between mt-4 text-xs text-gray-500">
                                    <div class="flex items-center space-x-2">
                                        <svg class="h-4 w-4 text-blue-500" viewBox="0 0 24 24" fill="currentColor">
                                            <path d="M12 22c5.421 0 10-4.579 10-10S17.421 2 12 2 2 6.579 2 12s4.579 10 10 10z"/>
                                        </svg>
                                        <span class="font-medium">{{ $buku->penulis ?? 'Anonim' }}</span>
                                    </div>
                                    <div class="font-bold text-gray-800">Rp {{ number_format($buku->harga, 0, ',', '.') }}</div>
                                </div>
                            </div>
                        </div>
                    </a>
                @endforeach
            @else
                <div class="col-span-full py-12 text-center">
                    <svg class="w-16 h-16 mx-auto text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9.172 16.172a4 4 0 015.656 0M9 10h.01M15 10h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                    </svg>
                    <h3 class="mt-4 text-lg font-medium text-gray-900">Tidak ada buku ditemukan</h3>
                    <p class="mt-2 text-sm text-gray-500">Coba ubah filter atau kata kunci pencarian Anda.</p>
                </div>
            @endif
        </div>

        <div class="mt-12 flex justify-center">
            {{ $bukus->appends(request()->query())->links() }}
        </div>
    </div>
</div>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        const filterButton = document.getElementById('filterButton');
        const filterPanel = document.getElementById('filterPanel');
        const closeFilterBtn = document.getElementById('closeFilterBtn');
        
        filterButton.addEventListener('click', function() {
            filterPanel.classList.toggle('hidden');
            // Add a small delay before adding the transform class for a nice animation effect
            if (!filterPanel.classList.contains('hidden')) {
                setTimeout(() => {
                    filterPanel.classList.add('opacity-100', 'scale-100');
                    filterPanel.classList.remove('opacity-0', 'scale-95');
                }, 10);
            } else {
                filterPanel.classList.remove('opacity-100', 'scale-100');
                filterPanel.classList.add('opacity-0', 'scale-95');
            }
        });
        
        closeFilterBtn.addEventListener('click', function() {
            filterPanel.classList.add('opacity-0', 'scale-95');
            filterPanel.classList.remove('opacity-100', 'scale-100');
            setTimeout(() => {
                filterPanel.classList.add('hidden');
            }, 300);
        });
    });
</script>
@endsection
