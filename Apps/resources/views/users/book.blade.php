@extends('layouts.app')
@section('title', 'Library')
@section('content')
<div class="min-h-screen bg-white">
    <div class="flex mt-16 md:mt-28">
        <!-- Sidebar Filter - Diubah menjadi putih dengan bayangan abu-abu -->
        <!-- Overlay for mobile filter -->
        <div id="filterOverlay" class="fixed inset-0 bg-black bg-opacity-50 z-40 hidden md:hidden"></div>
        <div id="filterSidebar" class="w-64 bg-white text-gray-800 p-6 shadow-md border-r border-gray-100 md:sticky md:top-0 md:h-screen md:w-64 fixed inset-y-0 left-0 transform -translate-x-full md:translate-x-0 transition-transform duration-300 z-50 md:z-0 md:block overflow-y-auto pb-24">
            <form id="filterFormSidebar" method="GET" action="{{ route('book') }}">
            <!-- Genre Section -->
            <div class="mb-8 ">
                <div class="flex items-center justify-between mb-4">
                    <h3 class="text-lg font-semibold">Genre</h3>
                    {{-- Icon panah - biarkan saja sebagai visual --}}
                    <svg class="w-5 h-5 text-gray-500" fill="currentColor" viewBox="0 0 20 20">
                        <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd"></path>
                    </svg>
                </div>
                
                <!-- Search Genre -->
                <div class="relative mb-4">
                    <input type="text" name="search_genre" value="{{ is_array(request('search_genre')) ? '' : request('search_genre') }}" placeholder="Search Genre" class="w-full bg-gray-50 text-gray-800 px-3 py-2 rounded text-sm focus:outline-none focus:ring-2 focus:ring-indigo-300 border border-gray-200">
                    <svg class="w-4 h-4 absolute right-3 top-2.5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
                    </svg>
                </div>
                
                <!-- Genre Tags -->
                <div class="max-h-48 overflow-y-auto pr-2">
                    <div class="flex flex-wrap gap-2 mb-4">
                        {{-- Tombol Semua Genre (checkbox tersembunyi + label) --}}
                        <input type="checkbox" id="genre_all" name="kategori[]" value="" class="hidden" {{ !request('kategori') || (is_array(request('kategori')) && empty(request('kategori'))) ? 'checked' : '' }}>
                        <label for="genre_all" class="{{ !request('kategori') || (is_array(request('kategori')) && empty(request('kategori'))) ? 'bg-indigo-100 text-indigo-800' : 'bg-gray-100 text-gray-800' }} px-3 py-1 rounded-full text-xs hover:bg-indigo-100 hover:text-indigo-800 transition-colors border border-gray-200 cursor-pointer">
                            Semua Genre
                        </label>

                        @foreach($kategoris as $kategori)
                            <input type="checkbox" id="genre_{{ $kategori->id }}" name="kategori[]" value="{{ $kategori->namaKategori }}" class="hidden" {{ (is_array(request('kategori')) && in_array($kategori->namaKategori, request('kategori'))) ? 'checked' : '' }}>
                            <label for="genre_{{ $kategori->id }}" class="{{ (is_array(request('kategori')) && in_array($kategori->namaKategori, request('kategori'))) ? 'bg-indigo-100 text-indigo-800' : 'bg-gray-100 text-gray-800' }} px-3 py-1 rounded-full text-xs hover:bg-indigo-100 hover:text-indigo-800 transition-colors border border-gray-200 cursor-pointer">
                                {{ $kategori->namaKategori }}
                            </label>
                        @endforeach
                    </div>
                </div>
            </div>
            
            <!-- Additional Filter Sections -->
            <div class="space-y-6">
                <!-- Filter Penulis -->
                <div>
                    <h4 class="text-sm font-medium mb-2">Penulis</h4>
                    <input type="text" name="filter_penulis" value="{{ is_array(request('filter_penulis')) ? '' : request('filter_penulis') }}" placeholder="Nama Penulis" class="w-full bg-gray-50 text-gray-800 px-3 py-2 rounded text-sm focus:outline-none focus:ring-2 focus:ring-indigo-300 border border-gray-200">
                </div>

                <!-- Filter Tahun Terbit -->
                <div>
                    <h4 class="text-sm font-medium mb-2">Tahun Terbit</h4>
                    <div class="flex space-x-2">
                        <input type="number" name="filter_tahun_dari" value="{{ is_array(request('filter_tahun_dari')) ? '' : request('filter_tahun_dari') }}" placeholder="Dari" class="w-1/2 bg-gray-50 text-gray-800 px-3 py-2 rounded text-sm focus:outline-none focus:ring-2 focus:ring-indigo-300 border border-gray-200">
                        <input type="number" name="filter_tahun_sampai" value="{{ is_array(request('filter_tahun_sampai')) ? '' : request('filter_tahun_sampai') }}" placeholder="Sampai" class="w-1/2 bg-gray-50 text-gray-800 px-3 py-2 rounded text-sm focus:outline-none focus:ring-2 focus:ring-indigo-300 border border-gray-200">
                    </div>
                </div>
            </div>
            
            <!-- Filter Buttons -->
            <div class="mt-8 space-y-3 sticky bottom-0 bg-white py-4 border-t border-gray-200 md:border-none">
                {{-- Tombol Cancel (untuk mereset form) --}}
                <button type="button" id="cancelFilterButton" class="w-full bg-gray-200 text-gray-800 py-2 rounded hover:bg-gray-300 transition-colors">Cancel</button>
                {{-- Tombol Submit (untuk mengirimkan form filter) --}}
                <button type="submit" class="w-full bg-indigo-500 text-white py-2 rounded hover:bg-indigo-600 transition-colors">Submit</button>
            </div>
            </form>
        </div>
        
        <!-- Main Content -->
        <div class="flex-1 bg-white overflow-x-hidden">
            <!-- Top Bar - Diubah menjadi lebih terang -->
            <div class="bg-white text-gray-800 p-4 shadow-sm border-b border-gray-200">
                <div class="flex items-center justify-between">
                    <!-- Left side - View toggles -->
                    <div class="flex items-center space-x-4">
                        <div class="flex bg-gray-100 rounded overflow-hidden border border-gray-200">
                            <button id="gridViewBtn" class="p-2 bg-indigo-500 text-white rounded-l">
                                <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
                                    <path d="M5 3a2 2 0 00-2 2v2a2 2 0 002 2h2a2 2 0 002-2V5a2 2 0 00-2-2H5zM5 11a2 2 0 00-2 2v2a2 2 0 002 2h2a2 2 0 002-2v-2a2 2 0 00-2-2H5zM11 5a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2V5zM11 13a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2v-2z"></path>
                                </svg>
                            </button>
                            <button id="listViewBtn" class="p-2 text-gray-600">
                                <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd" d="M3 4a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zm0 4a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zm0 4a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zm0 4a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1z" clip-rule="evenodd"></path>
                                </svg>
                            </button>
                        </div>
                    </div>
                    
                    <!-- Center - Search -->
                    <div class="flex-1 mx-4 min-w-0">
                        <form action="{{ route('book') }}" method="GET" class="relative">
                            <input type="text" name="search" value="{{ is_array(request('search')) ? '' : request('search') }}" placeholder="Cari" class="w-full bg-gray-50 text-gray-800 px-4 py-2 rounded focus:outline-none focus:ring-2 focus:ring-indigo-300 border border-gray-200">
                            <svg class="w-5 h-5 absolute right-3 top-2.5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
                            </svg>
                            @if(request('kategori'))
                                @if(is_array(request('kategori')))
                                    @foreach(request('kategori') as $kat)
                                        <input type="hidden" name="kategori[]" value="{{ $kat }}">
                                    @endforeach
                                @else
                                     <input type="hidden" name="kategori" value="{{ request('kategori') }}">
                                @endif
                            @endif
                        </form>
                    </div>
                    
                    <!-- Right side - Sort, Download, and Filter Button (Mobile) -->
                    <div class="flex items-center space-x-2 md:space-x-4 min-w-0">
                        <select name="sort" class="bg-gray-50 text-gray-800 px-3 py-2 rounded focus:outline-none border border-gray-200 hidden md:block">
                            <option value="">Popularitas</option>
                            <option value="newest" {{ (is_array(request('sort')) ? '' : request('sort')) == 'newest' ? 'selected' : '' }}>Terbaru</option>
                            <option value="price_asc" {{ (is_array(request('sort')) ? '' : request('sort')) == 'price_asc' ? 'selected' : '' }}>Harga: Rendah ke Tinggi</option>
                            <option value="price_desc" {{ (is_array(request('sort')) ? '' : request('sort')) == 'price_desc' ? 'selected' : '' }}>Harga: Tinggi ke Rendah</option>
                        </select>
                        <button class="p-2 bg-gray-50 rounded hover:bg-gray-100 text-gray-600 border border-gray-200 hidden md:block">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 10v6m0 0l-3-3m3 3l3-3m2 8H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path>
                            </svg>
                        </button>
                        <!-- Filter Button for Mobile -->
                        <button id="filterButtonMobile" class="p-2 bg-gray-50 rounded hover:bg-gray-100 text-gray-600 border border-gray-200 md:hidden">
                            <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M3 3a1 1 0 011-1h12a1 1 0 011 1v3a1 1 0 01-.293.707L12 11.414V15a1 1 0 01-.293.707l-2 2A1 1 0 018 17v-5.586L3.293 6.707A1 1 0 013 6V3z" clip-rule="evenodd"></path>
                            </svg>
                        </button>
                    </div>
                </div>
            </div>
            
            <!-- Books Grid -->
            <div class="py-6 px-4 md:px-6">
                @if($bukus->count() > 0)
                    <div id="booksContainer" class="grid grid-cols-2 sm:grid-cols-3 md:grid-cols-4 lg:grid-cols-5 xl:grid-cols-6 gap-4">
                        @foreach ($bukus as $buku)
                            <!-- Ganti baris ini: -->
                            {{-- <a href="{{ route('book_detail', ['id' => $buku->id]) }}" class="group"> --}}
                            
                            <!-- Menjadi: -->
                            <a href="{{ route('book_detail', ['id' => \App\Http\Controllers\BukuController::hashId($buku->id)]) }}" class="group">
                                <div class="bg-white rounded-lg overflow-hidden shadow-sm hover:shadow-lg transition-all duration-300 border border-gray-100">
                                    <div class="relative">
                                        @if($buku->gambar && !filter_var($buku->gambar, FILTER_VALIDATE_URL))
                                            <!-- Gambar dari local storage -->
                                            <img src="{{ asset('storage/' . $buku->gambar) }}" 
                                                 alt="{{ $buku->judul }}" 
                                                 class="w-full h-64 object-cover group-hover:scale-105 transition-transform duration-300">
                                        @else
                                            <!-- Gambar dari URL eksternal (https) -->
                                            <img src="{{ $buku->gambar ?? 'https://via.placeholder.com/300x400/f3f4f6/9ca3af?text=No+Image' }}" 
                                                 alt="{{ $buku->judul }}" 
                                                 class="w-full h-64 object-cover group-hover:scale-105 transition-transform duration-300"
                                                 onerror="this.src='https://via.placeholder.com/300x400/f3f4f6/9ca3af?text=No+Image'">
                                        @endif
                                        
                                        <!-- Status badges -->
                                        <div class="absolute top-2 left-2 flex flex-col gap-1">
                                            <span class="bg-blue-500 text-white text-xs px-2 py-1 rounded">NEW</span>
                                            <span class="bg-red-500 text-white text-xs px-2 py-1 rounded">UP</span>
                                        </div>
                                        
                                        <!-- Country flag -->
                                        <div class="absolute top-2 right-2">
                                            <span class="text-lg">🇮🇩</span>
                                        </div>
                                        
                                    </div>
                                    
                                    <!-- Book info -->
                                    <div class="p-3">
                                        <h2 class="font-medium text-gray-900 truncate mb-1">{{ $buku->judul }}</h2>
                                        <p class="text-xs text-gray-500 mb-1">{{ $buku->penulis ?? 'Anonim' }}</p>
                                        <!-- Tambahkan deskripsi singkat -->
                                        <p class="text-xs text-gray-500 mb-2 line-clamp-2 hidden">{{ Str::limit($buku->deskripsi ?? 'Tidak ada deskripsi tersedia', 400) }}</p>
                                        <div class="flex justify-between items-center">
                                            <span class="text-sm font-bold text-gray-900">Rp {{ number_format($buku->harga, 0, ',', '.') }}</span>
                                            <span class="text-xs text-gray-500">{{ $buku->tokoBuku->Nama_Toko ?? 'Unknown' }}</span>
                                        </div>
                                    </div>
                                </div>
                            </a>
                        @endforeach
                    </div>
                @else
                    <div class="text-center py-12">
                        <svg class="w-16 h-16 mx-auto text-gray-400 mb-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9.172 16.172a4 4 0 015.656 0M9 10h.01M15 10h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                        </svg>
                        <h3 class="text-lg font-medium text-gray-900 mb-2">Tidak ada buku ditemukan</h3>
                        <p class="text-gray-500">Coba ubah filter atau kata kunci pencarian Anda.</p>
                    </div>
                @endif
                
                <!-- Pagination -->
                <div class="mt-8 flex justify-center">
                    @if($bukus->hasPages())
                        <div class="flex flex-col items-center">
                            {{-- Desktop and Mobile Pagination Controls --}}
                            <nav class="isolate inline-flex -space-x-px rounded-md shadow-sm mb-4" aria-label="Pagination">
                                {{-- Previous Button --}}
                                @if($bukus->onFirstPage())
                                    <span class="relative inline-flex items-center rounded-l-md px-2 py-2 text-gray-400 ring-1 ring-inset ring-gray-300 hover:bg-gray-50 focus:z-20 focus:outline-offset-0 cursor-not-allowed">
                                        <span class="sr-only">Sebelumnya</span>
                                        <svg class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                                            <path fill-rule="evenodd" d="M11.78 5.22a.75.75 0 0 1 0 1.06L8.06 10l3.72 3.72a.75.75 0 1 1-1.06 1.06l-4.25-4.25a.75.75 0 0 1 0-1.06l4.25-4.25a.75.75 0 0 1 1.06 0Z" clip-rule="evenodd" />
                                        </svg>
                                    </span>
                                @else
                                    <a href="{{ $bukus->previousPageUrl() }}" class="relative inline-flex items-center rounded-l-md px-2 py-2 text-gray-400 ring-1 ring-inset ring-gray-300 hover:bg-gray-50 focus:z-20 focus:outline-offset-0">
                                        <span class="sr-only">Sebelumnya</span>
                                        <svg class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                                            <path fill-rule="evenodd" d="M11.78 5.22a.75.75 0 0 1 0 1.06L8.06 10l3.72 3.72a.75.75 0 1 1-1.06 1.06l-4.25-4.25a.75.75 0 0 1 0-1.06l4.25-4.25a.75.75 0 0 1 1.06 0Z" clip-rule="evenodd" />
                                        </svg>
                                    </a>
                                @endif
                
                                {{-- Pagination Logic --}}
                                @php
                                    $currentPage = $bukus->currentPage();
                                    $lastPage = $bukus->lastPage();
                                    $showPages = 5; // Jumlah halaman yang ditampilkan di sekitar halaman aktif
                                    $halfShow = floor($showPages / 2);
                                @endphp
                
                                {{-- Always show page 1 --}}
                                @if($currentPage > $halfShow + 2)
                                    <a href="{{ $bukus->url(1) }}" class="relative inline-flex items-center px-4 py-2 text-sm font-semibold text-gray-900 ring-1 ring-inset ring-gray-300 hover:bg-gray-50 focus:z-20 focus:outline-offset-0">
                                        1
                                    </a>
                                    
                                    {{-- Show ellipsis if there's gap --}}
                                    @if($currentPage > $halfShow + 3)
                                        <span class="relative inline-flex items-center px-4 py-2 text-sm font-semibold text-gray-500 ring-1 ring-inset ring-gray-300">
                                            ...
                                        </span>
                                    @endif
                                @endif
                
                                {{-- Show pages around current page --}}
                                @for($i = max(1, $currentPage - $halfShow); $i <= min($lastPage, $currentPage + $halfShow); $i++)
                                    @if($i == $currentPage)
                                        <span class="relative z-10 inline-flex items-center bg-indigo-600 px-4 py-2 text-sm font-semibold text-white focus:z-20 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">
                                            {{ $i }}
                                        </span>
                                    @else
                                        <a href="{{ $bukus->url($i) }}" class="relative inline-flex items-center px-4 py-2 text-sm font-semibold text-gray-900 ring-1 ring-inset ring-gray-300 hover:bg-gray-50 focus:z-20 focus:outline-offset-0">
                                            {{ $i }}
                                        </a>
                                    @endif
                                @endfor
                
                                {{-- Always show last page --}}
                                @if($currentPage < $lastPage - $halfShow - 1)
                                    {{-- Show ellipsis if there's gap --}}
                                    @if($currentPage < $lastPage - $halfShow - 2)
                                        <span class="relative inline-flex items-center px-4 py-2 text-sm font-semibold text-gray-500 ring-1 ring-inset ring-gray-300">
                                            ...
                                        </span>
                                    @endif
                                    
                                    <a href="{{ $bukus->url($lastPage) }}" class="relative inline-flex items-center px-4 py-2 text-sm font-semibold text-gray-900 ring-1 ring-inset ring-gray-300 hover:bg-gray-50 focus:z-20 focus:outline-offset-0">
                                        {{ $lastPage }}
                                    </a>
                                @endif
                
                                {{-- Next Button --}}
                                @if($bukus->hasMorePages())
                                    <a href="{{ $bukus->nextPageUrl() }}" class="relative inline-flex items-center rounded-r-md px-2 py-2 text-gray-400 ring-1 ring-inset ring-gray-300 hover:bg-gray-50 focus:z-20 focus:outline-offset-0">
                                        <span class="sr-only">Selanjutnya</span>
                                        <svg class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                                            <path fill-rule="evenodd" d="M8.22 5.22a.75.75 0 0 1 1.06 0l4.25 4.25a.75.75 0 0 1 0 1.06l-4.25 4.25a.75.75 0 0 1-1.06-1.06L11.94 10 8.22 6.28a.75.75 0 0 1 0-1.06Z" clip-rule="evenodd" />
                                        </svg>
                                    </a>
                                @else
                                    <span class="relative inline-flex items-center rounded-r-md px-2 py-2 text-gray-400 ring-1 ring-inset ring-gray-300 hover:bg-gray-50 focus:z-20 focus:outline-offset-0 cursor-not-allowed">
                                        <span class="sr-only">Selanjutnya</span>
                                        <svg class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                                            <path fill-rule="evenodd" d="M8.22 5.22a.75.75 0 0 1 1.06 0l4.25 4.25a.75.75 0 0 1 0 1.06l-4.25 4.25a.75.75 0 0 1-1.06-1.06L11.94 10 8.22 6.28a.75.75 0 0 1 0-1.06Z" clip-rule="evenodd" />
                                        </svg>
                                    </span>
                                @endif
                            </nav>
                
                            {{-- Result Count --}}
                            <p class="text-sm text-gray-700">
                                Menampilkan
                                <span class="font-medium">{{ $bukus->firstItem() }}</span>
                                sampai
                                <span class="font-medium">{{ $bukus->lastItem() }}</span>
                                dari
                                <span class="font-medium">{{ $bukus->total() }}</span>
                                hasil
                            </p>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>

<script>
document.addEventListener('DOMContentLoaded', function() {
    const gridViewBtn = document.getElementById('gridViewBtn');
    const listViewBtn = document.getElementById('listViewBtn');
    const booksContainer = document.getElementById('booksContainer');
    const filterButtonMobile = document.getElementById('filterButtonMobile');
    const filterSidebar = document.getElementById('filterSidebar');
    const filterOverlay = document.getElementById('filterOverlay');
    const filterFormSidebar = document.getElementById('filterFormSidebar');
    const cancelFilterButton = document.getElementById('cancelFilterButton');

    // Add this line to get the sort dropdown
    const sortDropdown = document.getElementById('sortDropdown');

    // Fungsi untuk membuka sidebar filter
    function openFilterSidebar() {
        filterSidebar.classList.remove('-translate-x-full');
        filterSidebar.classList.add('translate-x-0');
        filterOverlay.classList.remove('hidden');
    }

    // Fungsi untuk menutup sidebar filter
    function closeFilterSidebar() {
        filterSidebar.classList.remove('translate-x-0');
        filterSidebar.classList.add('-translate-x-full');
        filterOverlay.classList.add('hidden');
    }

    // Event listener untuk tombol filter mobile
    if (filterButtonMobile) {
        filterButtonMobile.addEventListener('click', openFilterSidebar);
    }

    // Event listener untuk overlay (menutup sidebar)
    if (filterOverlay) {
        filterOverlay.addEventListener('click', closeFilterSidebar);
    }
    
    // Event listener untuk tombol Cancel
    if (cancelFilterButton && filterFormSidebar) {
        cancelFilterButton.addEventListener('click', function() {
            // Reset input teks, number, dan select
            filterFormSidebar.querySelectorAll('input[type="text"], input[type="number"], select').forEach(input => {
                if (input.type === 'select-one' || input.type === 'select-multiple') {
                    input.selectedIndex = 0; // Pilih opsi pertama (Semua Bahasa)
                } else {
                    input.value = ''; // Kosongkan input teks dan number
                }
            });

            // Reset semua checkbox genre
            const genreCheckboxes = filterFormSidebar.querySelectorAll('input[name="kategori[]"]');
            genreCheckboxes.forEach(checkbox => {
                checkbox.checked = false;
            });
            
            // Centang 'Semua Genre' secara manual
            const genreAllCheckbox = document.getElementById('genre_all');
            if (genreAllCheckbox) {
                genreAllCheckbox.checked = true;
            }

            // Perbarui tampilan label genre (aktif/tidak aktif) setelah reset
            updateGenreLabels();
        });
    }

    // Fungsi untuk memperbarui tampilan label genre berdasarkan status checkbox
    function updateGenreLabels() {
        const genreCheckboxes = filterFormSidebar.querySelectorAll('input[name="kategori[]"]');
        genreCheckboxes.forEach(checkbox => {
            const label = filterFormSidebar.querySelector(`label[for="${checkbox.id}"]`);
            if (label) {
                if (checkbox.checked) {
                    label.classList.remove('bg-gray-100', 'text-gray-800');
                    label.classList.add('bg-indigo-100', 'text-indigo-800');
                } else {
                    label.classList.remove('bg-indigo-100', 'text-indigo-800');
                    label.classList.add('bg-gray-100', 'text-gray-800');
                }
            } else {
                 console.error(`Label for checkbox with id ${checkbox.id} not found.`);
            }
        });
    }

    // Handle logika checkbox genre
    const genreCheckboxes = filterFormSidebar.querySelectorAll('input[name="kategori[]"]');
    const genreAllCheckbox = document.getElementById('genre_all');

    genreCheckboxes.forEach(checkbox => {
        checkbox.addEventListener('change', function() {
            if (this.id === 'genre_all') {
                // Jika 'Semua Genre' dicentang, hapus centang dari semua genre lain
                if (this.checked) {
                    genreCheckboxes.forEach(cb => {
                        if (cb.id !== 'genre_all') {
                            cb.checked = false;
                        }
                    });
                }
            } else {
                // Jika genre lain dicentang, hapus centang dari 'Semua Genre'
                if (this.checked && genreAllCheckbox) {
                    genreAllCheckbox.checked = false;
                }

                // Jika tidak ada genre lain yang dicentang, centang 'Semua Genre' kembali
                const anyOtherGenreChecked = Array.from(genreCheckboxes).some(cb => cb.id !== 'genre_all' && cb.checked);
                if (!anyOtherGenreChecked && genreAllCheckbox) {
                    genreAllCheckbox.checked = true;
                }
            }

            // Perbarui tampilan label setelah perubahan
            updateGenreLabels();
        });
    });

    // Panggil saat halaman dimuat untuk mengatur tampilan awal
    updateGenreLabels();

    // Fungsi untuk mengatur tampilan grid
    function setGridView() {
        // Reset container class
        booksContainer.className = '';
        booksContainer.classList.add('grid', 'grid-cols-2', 'sm:grid-cols-3', 'md:grid-cols-4', 'lg:grid-cols-5', 'xl:grid-cols-6', 'gap-4');
        
        // Mengubah tampilan tombol
        gridViewBtn.classList.remove('text-gray-600', 'bg-gray-100');
        gridViewBtn.classList.add('bg-indigo-500', 'text-white');
        listViewBtn.classList.remove('bg-indigo-600', 'text-white');
        listViewBtn.classList.add('text-gray-600', 'bg-gray-100');
        
        // Simpan preferensi di localStorage
        localStorage.setItem('bookViewMode', 'grid');
        
        // Reset dan atur ulang tampilan item dalam grid view
        const bookItems = booksContainer.querySelectorAll('a.group');
        bookItems.forEach(item => {
            // Hapus semua class yang mungkin ditambahkan oleh list view
            item.className = 'group';
            
            const bookCard = item.querySelector('div');
            if (bookCard) {
                // Reset class pada card
                bookCard.className = 'bg-white rounded-lg overflow-hidden shadow-sm hover:shadow-lg transition-all duration-300 border border-gray-100';
                
                const imageContainer = bookCard.querySelector('div.relative');
                const infoContainer = bookCard.querySelector('div.p-3');
                
                if (imageContainer) {
                    // Reset class pada container gambar
                    imageContainer.className = 'relative';
                    
                    const img = imageContainer.querySelector('img');
                    if (img) {
                        // Atur class gambar untuk grid view
                        img.className = 'w-full h-64 object-cover group-hover:scale-105 transition-transform duration-300';
                    }
                }
                
                if (infoContainer) {
                    // Reset class pada container info
                    infoContainer.className = 'p-3';
                    
                    // Pastikan tampilan teks sesuai untuk grid view
                    const title = infoContainer.querySelector('h2');
                    if (title) title.className = 'font-medium text-gray-900 truncate mb-1';
                    
                    const author = infoContainer.querySelector('p');
                    if (author) author.className = 'text-xs text-gray-500 mb-2';
                    
                    // Jika ada deskripsi, atur tampilan untuk grid view
                    const description = infoContainer.querySelector('p:nth-child(3)');
                    if (description) {
                        description.classList.add('hidden');
                    }
                    
                    // Atur tampilan harga dan toko
                    const priceContainer = infoContainer.querySelector('div');
                    if (priceContainer) priceContainer.className = 'flex justify-between items-center';
                }
            }
        });
    }
    
    // Fungsi untuk mengatur tampilan list
    function setListView() {
        // Reset container class
        booksContainer.className = '';
        booksContainer.classList.add('grid', 'grid-cols-1', 'md:grid-cols-2', 'gap-4');
        
        // Mengubah tampilan tombol
        listViewBtn.classList.remove('text-gray-600', 'bg-gray-100');
        listViewBtn.classList.add('bg-indigo-600', 'text-white');
        gridViewBtn.classList.remove('bg-indigo-500', 'text-white');
        gridViewBtn.classList.add('text-gray-600', 'bg-gray-100');
        
        // Simpan preferensi di localStorage
        localStorage.setItem('bookViewMode', 'list');
        
        // Reset dan atur ulang tampilan item dalam list view
        const bookItems = booksContainer.querySelectorAll('a.group');
        bookItems.forEach(item => {
            // Hapus semua class yang mungkin ada dan tambahkan class untuk list view
            item.className = 'group w-full';
            
            const bookCard = item.querySelector('div');
            if (bookCard) {
                // Reset class pada card dan tambahkan class untuk list view
                bookCard.className = 'bg-white overflow-hidden shadow-sm hover:shadow-lg transition-all duration-300 flex flex-row h-auto';
                
                const imageContainer = bookCard.querySelector('div.relative');
                const infoContainer = bookCard.querySelector('div.p-3');
                
                if (imageContainer) {
                    // Atur class pada container gambar untuk list view
                    imageContainer.className = 'relative w-1/3 sm:w-36 h-auto flex-shrink-0';
                    
                    const img = imageContainer.querySelector('img');
                    if (img) {
                        // Atur class gambar untuk list view
                        img.className = 'w-full h-full object-cover object-center';
                    }
                    
                    // Sembunyikan badge dan flag di list view
                    const badges = imageContainer.querySelectorAll('.absolute');
                    badges.forEach(badge => {
                        badge.classList.add('hidden');
                    });
                }
                
                if (infoContainer) {
                    // Atur class pada container info untuk list view
                    infoContainer.className = 'p-3 flex flex-col justify-between pl-4 flex-grow w-2/3 sm:w-auto overflow-hidden min-w-0';
                    
                    // Atur judul untuk list view
                    const title = infoContainer.querySelector('h2');
                    if (title) {
                        title.className = 'font-medium text-gray-900 text-lg mb-1';
                    }
                    
                    // Atur penulis untuk list view
                    const author = infoContainer.querySelector('p');
                    if (author) {
                        author.className = 'text-sm text-gray-500 mb-1';
                    }
                    
                    // Tampilkan deskripsi di list view
                    const description = infoContainer.querySelector('p:nth-child(3)');
                    if (description) {
                        description.classList.remove('hidden');
                    }
                    
                    // Atur tampilan harga dan toko
                    const priceContainer = infoContainer.querySelector('div');
                    if (priceContainer) {
                        priceContainer.className = 'flex justify-between items-center mt-auto';
                    }
                }
            }
        });
    }
    
    // Event listener untuk tombol grid
    gridViewBtn.addEventListener('click', setGridView);
    
    // Event listener untuk tombol list
    listViewBtn.addEventListener('click', setListView);
    
    // Cek preferensi yang tersimpan
    const savedViewMode = localStorage.getItem('bookViewMode');
    if (savedViewMode === 'list') {
        setListView();
    } else {
        setGridView(); // Default ke grid view
    }

    // Add event listener to the sort dropdown to submit the form on change
    if (sortDropdown) {
        sortDropdown.addEventListener('change', function() {
            // Find the form that contains the dropdown and submit it
            const form = this.closest('form');
            if (form) {
                form.submit();
            }
        });
    }
});
</script>
@endsection
