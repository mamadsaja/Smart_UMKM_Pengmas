@extends('layouts.app')
@section('title', 'Shop')
@section('content')
<div class="min-h-screen bg-gray-100 py-16 px-4 sm:px-6 lg:px-8">
    <div class="text-center mb-10 mt-24 sm:mt-28">
        <h1 class="text-5xl font-extrabold text-gray-900 mb-6 tracking-wide drop-shadow">STORES</h1>
        <div class="max-w-lg mx-auto mt-10 sm:mt-12">
            <form action="{{ route('shop') }}" method="GET" class="relative">
                <input 
                    type="text" 
                    name="search"
                    value="{{ request('search') }}"
                    placeholder="Cari toko atau pemilik ..." 
                    class="w-full pl-4 pr-12 py-3 border rounded-full shadow focus:outline-none focus:ring-2 focus:ring-blue-400 focus:border-transparent text-base sm:text-lg bg-white"
                />
                <button type="submit" class="absolute right-4 top-1/2 -translate-y-1/2 text-blue-500 hover:text-blue-700">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M21 21l-4.35-4.35M11 19a8 8 0 100-16 8 8 0 000 16z" />
                    </svg>
                </button>
            </form>
        </div>
    </div>

    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-6">
            @foreach ($tokos as $toko)
                <div class="bg-white rounded-md shadow-lg hover:shadow-xl transition-all duration-300 overflow-hidden">
                    <div class="relative h-48">
                        <img src="{{ asset('storage/' . $toko->banner) }}" 
                            alt="Banner {{ $toko->Nama_Toko }}" 
                            class="w-full h-full object-cover"
                        />
                        <div class="absolute inset-0 bg-gradient-to-t from-black/60 to-transparent"></div>
                    </div>

                    <div class="relative px-6 pb-6">
                        <div class="absolute -top-12 left-6">
                            <div class="w-24 h-24 rounded-full border-4 border-white overflow-hidden shadow-lg">
                                <img src="{{ asset('storage/' . $toko->gambar_toko) }}" 
                                    alt="{{ $toko->name }}" 
                                    class="w-full h-full object-cover"
                                />
                            </div>
                        </div>

                        <div class="pt-16">
                            <h3 class="text-xl font-bold text-gray-900 mb-1">{{ $toko->Nama_Toko }}</h3>
                            <p class="text-sm text-gray-600 mb-3">Pemilik: {{ $toko->name }}</p>
                            
                            <div class="flex items-center space-x-4 text-sm text-gray-500 mb-4">
                                <div class="flex items-center">
                                    <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6" />
                                    </svg>
                                    <span>{{ $toko->bukus_count ?? '0' }} Buku</span>
                                </div>
                                <div class="flex items-center">
                                    <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8h2a2 2 0 012 2v6a2 2 0 01-2 2h-2v4l-4-4H9a1.994 1.994 0 01-1.414-.586m0 0L11 14h4a2 2 0 002-2V6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2v4l.586-.586z" />
                                    </svg>
                                    <span>{{ number_format($toko->rating ?? 4.8, 1) }}</span>
                                </div>
                            </div>

                            <a href="{{ route('shop_detail', ['id' => \App\Http\Controllers\TokoBukuController::hashId($toko->id)]) }}" 
                                class="block w-full text-center py-2 px-4 bg-blue-600 hover:bg-blue-700 text-white font-medium rounded-lg transition duration-300">
                                Lihat Toko
                            </a>
                        </div>
                    </div>
                </div>
                @endforeach
        </div>

        {{-- Pagination --}}
        <div class="mt-8 flex justify-center">
            @if($tokos->hasPages())
                <div class="flex flex-col items-center">
                    {{-- Desktop and Mobile Pagination Controls --}}
                    <nav class="isolate inline-flex -space-x-px rounded-md shadow-sm mb-4" aria-label="Pagination">
                        {{-- Previous Button --}}
                        @if($tokos->onFirstPage())
                            <span class="relative inline-flex items-center rounded-l-md px-2 py-2 text-gray-400 ring-1 ring-inset ring-gray-300 hover:bg-gray-50 focus:z-20 focus:outline-offset-0 cursor-not-allowed">
                                <span class="sr-only">Sebelumnya</span>
                                <svg class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                                    <path fill-rule="evenodd" d="M11.78 5.22a.75.75 0 0 1 0 1.06L8.06 10l3.72 3.72a.75.75 0 1 1-1.06 1.06l-4.25-4.25a.75.75 0 0 1 0-1.06l4.25-4.25a.75.75 0 0 1 1.06 0Z" clip-rule="evenodd" />
                                </svg>
                            </span>
                        @else
                            <a href="{{ $tokos->previousPageUrl() }}" class="relative inline-flex items-center rounded-l-md px-2 py-2 text-gray-400 ring-1 ring-inset ring-gray-300 hover:bg-gray-50 focus:z-20 focus:outline-offset-0">
                                <span class="sr-only">Sebelumnya</span>
                                <svg class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                                    <path fill-rule="evenodd" d="M11.78 5.22a.75.75 0 0 1 0 1.06L8.06 10l3.72 3.72a.75.75 0 1 1-1.06 1.06l-4.25-4.25a.75.75 0 0 1 0-1.06l4.25-4.25a.75.75 0 0 1 1.06 0Z" clip-rule="evenodd" />
                                </svg>
                            </a>
                        @endif
        
                        {{-- Pagination Logic --}}
                        @php
                            $currentPage = $tokos->currentPage();
                            $lastPage = $tokos->lastPage();
                            $showPages = 3; // Jumlah halaman yang ditampilkan di sekitar halaman aktif (ubah dari 5 ke 3)
                            $halfShow = floor($showPages / 2);
                        @endphp
        
                        {{-- Always show page 1 --}}
                        @if($currentPage > $halfShow + 2)
                            <a href="{{ $tokos->url(1) }}" class="relative inline-flex items-center px-4 py-2 text-sm font-semibold text-gray-900 ring-1 ring-inset ring-gray-300 hover:bg-gray-50 focus:z-20 focus:outline-offset-0">
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
                                <a href="{{ $tokos->url($i) }}" class="relative inline-flex items-center px-4 py-2 text-sm font-semibold text-gray-900 ring-1 ring-inset ring-gray-300 hover:bg-gray-50 focus:z-20 focus:outline-offset-0">
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
                            
                            <a href="{{ $tokos->url($lastPage) }}" class="relative inline-flex items-center px-4 py-2 text-sm font-semibold text-gray-900 ring-1 ring-inset ring-gray-300 hover:bg-gray-50 focus:z-20 focus:outline-offset-0">
                                {{ $lastPage }}
                            </a>
                        @endif
        
                        {{-- Next Button --}}
                        @if($tokos->hasMorePages())
                            <a href="{{ $tokos->nextPageUrl() }}" class="relative inline-flex items-center rounded-r-md px-2 py-2 text-gray-400 ring-1 ring-inset ring-gray-300 hover:bg-gray-50 focus:z-20 focus:outline-offset-0">
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
                        <span class="font-medium">{{ $tokos->firstItem() }}</span>
                        sampai
                        <span class="font-medium">{{ $tokos->lastItem() }}</span>
                        dari
                        <span class="font-medium">{{ $tokos->total() }}</span>
                        hasil
                    </p>
                </div>
            @endif
        </div>
    </div>
</div>
@endsection