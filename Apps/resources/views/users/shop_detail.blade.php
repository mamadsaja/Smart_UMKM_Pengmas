@extends('layouts.app')
@section('title', 'Shop_Detail')
@section('content')
<div class="min-h-screen bg-gray-50">
    <!-- Banner Section -->
    <div class="relative mt-0 h-64 sm:h-80 md:h-96 w-full">
        <img src="{{ asset('storage/' . $toko->banner) }}" 
             alt="Banner Toko" class="w-full h-full object-cover">
        <div class="absolute inset-0 bg-gradient-to-t from-black/60 to-transparent"></div>
    </div>

    <!-- Profile Section -->
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 -mt-20 relative z-10">
        <div class="bg-white rounded-2xl shadow-lg p-6 md:p-8">
            <div class="flex flex-col md:flex-row items-start md:items-center gap-6">
                <!-- Profile Image -->
                <div class="relative">
                    <img src="{{ asset('storage/' . $toko->gambar_toko) }}" 
                         alt="Logo Toko" class="w-32 h-32 rounded-full border-4 border-white shadow-lg object-cover">
                </div>
                
                <!-- Shop Info -->
                <div class="flex-1">
                    <h1 class="text-3xl font-bold text-gray-900 mb-2">{{ $toko->Nama_Toko }}</h1>
                    <div class="flex items-center gap-4 text-gray-600 mb-4">
                        <div class="flex items-center">
                            <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" 
                                      d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"/>
                            </svg>
                            <span>{{ $toko->name }}</span>
                        </div>
                        <div class="flex items-center">
                            <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" 
                                      d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"/>
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" 
                                      d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"/>
                            </svg>
                            <span>{{ $toko->Alamat }}</span>
                        </div>
                    </div>
                    
                    <!-- Social Links -->
                    <div class="flex gap-4">
                        <!-- Tokopedia Button - hanya tampil jika ada link -->
                        @if(isset($toko->Toko_Tokopedia) && $toko->Toko_Tokopedia != '#' && $toko->Toko_Tokopedia != '')
                        <a href="{{ $toko->Toko_Tokopedia }}" target="_blank" 
                           class="inline-flex items-center px-4 py-2 bg-white text-green-600 rounded-lg hover:bg-gray-200 transition shadow-md">
                            <img src="{{ asset('asset/tokopedia.png') }}" alt="Tokopedia Logo" class="w-5 h-5 mr-2">
                            Tokopedia
                        </a>
                        @endif
                        
                        <!-- Shopee Button - hanya tampil jika ada link -->
                        @if(isset($toko->Toko_Shopee) && $toko->Toko_Shopee != '#' && $toko->Toko_Shopee != '')
                        <a href="{{ $toko->Toko_Shopee }}" target="_blank" 
                           class="inline-flex items-center px-4 py-2 bg-white text-orange-600 rounded-lg hover:bg-gray-200 transition shadow-md">
                            <img src="{{ asset('asset/Shopee-logo.jpg') }}" alt="Shopee Logo" class="w-5 h-5 mr-2">
                            Shopee
                        </a>
                        @endif
                        
                        <!-- Web Store Button - hanya tampil jika ada link -->
                        @if(isset($toko->Toko_Marketplace) && !is_array($toko->Toko_Marketplace) && $toko->Toko_Marketplace != '#' && $toko->Toko_Marketplace != '')
                        <a href="{{ $toko->Toko_Marketplace }}" target="_blank" 
                           class="inline-flex items-center px-4 py-2 bg-white text-blue-600 rounded-lg hover:bg-gray-200 transition shadow-md">
                            <img src="{{ asset('asset/planet-earth.png') }}" alt="Web Store Logo" class="w-5 h-5 mr-2">
                            Toko Online
                        </a>
                        @endif
                    </div>
                    <!-- Social Media Section -->
                    <div class="mt-6">
                        <h3 class="text-lg font-semibold text-gray-900 mb-3">Sosial Media</h3>
                        <div class="flex flex-wrap gap-3">
                            <!-- Instagram -->
                            @if(isset($toko->Instagram) && $toko->Instagram != '#' && $toko->Instagram != '')
                            <a href="{{ $toko->Instagram }}" target="_blank" 
                               class="inline-flex items-center px-4 py-2 bg-gradient-to-r from-purple-500 to-pink-500 text-white rounded-lg hover:from-purple-600 hover:to-pink-600 transition-all duration-300 shadow-md hover:shadow-lg transform hover:-translate-y-1">
                                <svg class="w-5 h-5 mr-2" fill="currentColor" viewBox="0 0 24 24">
                                    <path d="M12 2.163c3.204 0 3.584.012 4.85.07 3.252.148 4.771 1.691 4.919 4.919.058 1.265.069 1.645.069 4.849 0 3.205-.012 3.584-.069 4.849-.149 3.225-1.664 4.771-4.919 4.919-1.266.058-1.644.07-4.85.07-3.204 0-3.584-.012-4.849-.07-3.26-.149-4.771-1.699-4.919-4.92-.058-1.265-.07-1.644-.07-4.849 0-3.204.013-3.583.07-4.849.149-3.227 1.664-4.771 4.919-4.919 1.266-.057 1.645-.069 4.849-.069zm0-2.163c-3.259 0-3.667.014-4.947.072-4.358.2-6.78 2.618-6.98 6.98-.059 1.281-.073 1.689-.073 4.948 0 3.259.014 3.668.072 4.948.2 4.358 2.618 6.78 6.98 6.98 1.281.058 1.689.072 4.948.072 3.259 0 3.668-.014 4.948-.072 4.354-.2 6.782-2.618 6.979-6.98.059-1.28.073-1.689.073-4.948 0-3.259-.014-3.667-.072-4.947-.196-4.354-2.617-6.78-6.979-6.98-1.281-.059-1.69-.073-4.949-.073zm0 5.838c-3.403 0-6.162 2.759-6.162 6.162s2.759 6.163 6.162 6.163 6.162-2.759 6.162-6.163c0-3.403-2.759-6.162-6.162-6.162zm0 10.162c-2.209 0-4-1.79-4-4 0-2.209 1.791-4 4-4s4 1.791 4 4c0 2.21-1.791 4-4 4zm6.406-11.845c-.796 0-1.441.645-1.441 1.44s.645 1.44 1.441 1.44c.795 0 1.439-.645 1.439-1.44s-.644-1.44-1.439-1.44z"/>
                                </svg>
                                Instagram
                            </a>
                            @endif

                            <!-- Facebook -->
                            @if(isset($toko->Facebook) && $toko->Facebook != '#' && $toko->Facebook != '')
                            <a href="{{ $toko->Facebook }}" target="_blank" 
                               class="inline-flex items-center px-4 py-2 bg-blue-600 text-white rounded-lg hover:bg-blue-700 transition-all duration-300 shadow-md hover:shadow-lg transform hover:-translate-y-1">
                                <svg class="w-5 h-5 mr-2" fill="currentColor" viewBox="0 0 24 24">
                                    <path d="M24 12.073c0-6.627-5.373-12-12-12s-12 5.373-12 12c0 5.99 4.388 10.954 10.125 11.854v-8.385H7.078v-3.47h3.047V9.43c0-3.007 1.792-4.669 4.533-4.669 1.312 0 2.686.235 2.686.235v2.953H15.83c-1.491 0-1.956.925-1.956 1.874v2.25h3.328l-.532 3.47h-2.796v8.385C19.612 23.027 24 18.062 24 12.073z"/>
                                </svg>
                                Facebook
                            </a>
                            @endif

                            <!-- TikTok -->
                            @if(isset($toko->Tiktok) && $toko->Tiktok != '#' && $toko->Tiktok != '')
                            <a href="{{ $toko->Tiktok }}" target="_blank" 
                               class="inline-flex items-center px-4 py-2 bg-black text-white rounded-lg hover:bg-gray-800 transition-all duration-300 shadow-md hover:shadow-lg transform hover:-translate-y-1">
                                <svg class="w-5 h-5 mr-2" fill="currentColor" viewBox="0 0 24 24">
                                    <path d="M12.525.02c1.31-.02 2.61-.01 3.91-.02.08 1.53.63 3.09 1.75 4.17 1.12 1.11 2.7 1.62 4.24 1.79v4.03c-1.44-.05-2.89-.35-4.2-.97-.57-.26-1.1-.59-1.62-.93-.01 2.92.01 5.84-.02 8.75-.08 1.4-.54 2.79-1.35 3.94-1.31 1.92-3.58 3.17-5.91 3.21-1.43.08-2.86-.31-4.08-1.03-2.02-1.19-3.44-3.37-3.65-5.71-.02-.5-.03-1-.01-1.49.18-1.9 1.12-3.72 2.58-4.96 1.66-1.44 3.98-2.13 6.15-1.72.02 1.48-.04 2.96-.04 4.44-.99-.32-2.15-.23-3.02.37-.63.41-1.11 1.04-1.36 1.75-.21.51-.15 1.07-.14 1.61.24 1.64 1.82 3.02 3.5 2.87 1.12-.01 2.19-.66 2.77-1.61.19-.33.4-.67.41-1.06.1-1.79.06-3.57.07-5.36.01-4.03-.01-8.05.02-12.07z"/>
                                </svg>
                                TikTok
                            </a>
                            @endif
                        </div>
                    </div>
                </div>
            </div>

            <!-- Description Section -->
            <div class="mt-8 border-t pt-8">
                <h2 class="text-2xl font-semibold text-gray-900 mb-4">Deskripsi Toko</h2>
                <div class="prose max-w-5xl text-gray-600 break-words">
                    <p>{{ $toko->deskripsi_toko }}</p>
                    {{-- <p>Dengan pengalaman lebih dari 10 tahun, kami berkomitmen untuk memberikan pelayanan terbaik dan koleksi buku terlengkap untuk memenuhi kebutuhan literasi Anda.</p> --}}
                </div>
            </div>

            <!-- Contact Information -->
            <div class="mt-8 border-t pt-8">
                <h2 class="text-2xl font-semibold text-gray-900 mb-4">Informasi Kontak</h2>
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <div class="flex items-start space-x-4">
                        <svg class="w-6 h-6 text-gray-500 mt-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" 
                                  d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"/>
                        </svg>
                        <div>
                            <h3 class="font-medium text-gray-900">Telepon</h3>
                            <p class="text-gray-600">{{ $toko->Kontak }}</p>
                        </div>
                    </div>
                    <div class="flex items-start space-x-4">
                        <svg class="w-6 h-6 text-gray-500 mt-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" 
                                  d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/>
                        </svg>
                        <div>
                            <h3 class="font-medium text-gray-900">Email</h3>
                            <p class="text-gray-600"> {{ $toko->seller->email }}</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    <!-- Books Section -->
    <div class="mt-12 px-2 sm:px-4 lg:px-20 xl:px-32">
        <div class="flex items-center justify-between mb-8">
            <h2 class="text-4xl font-extrabold text-black drop-shadow-lg tracking-wide uppercase">Koleksi Buku</h2>
        </div>

        <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-6 justify-center w-full max-w-screen-lg mx-auto">
            @foreach ($bukus as $buku)
                <div class="bg-white rounded-lg shadow-sm hover:shadow-xl transition-all duration-300 overflow-hidden group w-full max-w-[300px] mx-auto h-[420px] flex flex-col">
                    <div class="relative">
                        <img src="{{ asset('storage/' . $buku->gambar) }}" 
                            alt="Book Cover" class="w-full h-60 object-cover group-hover:scale-105 transition-transform duration-300">
                        <div class="absolute top-2 left-2">
                            <span class="bg-white text-black text-xs font-bold px-2 py-1 rounded-md shadow-sm">NEW</span>
                        </div>
                    </div>
                    <div class="p-4 flex-1 flex flex-col">
                        <h3 class="text-base font-semibold text-gray-900 mb-1 line-clamp-2">{{ $buku->judul }}</h3>
                        <p class="text-xs text-gray-600 mb-3 line-clamp-1">{{ $buku->penulis }}</p>
                        <div class="mt-auto flex items-center justify-between">
                            <span class="text-base font-bold text-blue-600">Rp {{ number_format($buku->harga, 0, ',', '.') }}</span>
                            <a href="{{ route('book_detail', ['id' => $buku->id]) }}" 
                               class="inline-block text-center px-4 py-2 bg-blue-600 text-white text-sm font-medium rounded-md hover:bg-blue-700 transition-colors duration-200">
                                Read
                            </a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>

        <!-- Pagination -->
        <div class="mt-12 flex justify-center">
            <nav class="inline-flex items-center space-x-2">
                <a href="#" class="flex h-10 w-10 items-center justify-center rounded-xl border border-gray-300 bg-white text-gray-500 hover:bg-blue-100 hover:text-blue-600 transition">
                    <svg class="w-4 h-4" viewBox="0 0 20 20" fill="currentColor">
                        <path fill-rule="evenodd" d="M12.79 5.23a.75.75 0 01-.02 1.06L8.832 10l3.938 3.71a.75.75 0 11-1.04 1.08l-4.5-4.25a.75.75 0 010-1.08l4.5-4.25a.75.75 0 011.06.02z" clip-rule="evenodd"/>
                    </svg>
                </a>
                <div class="mt-4">
                    {{ $bukus->links() }}
                </div>
                    <svg class="w-4 h-4" viewBox="0 0 20 20" fill="currentColor">
                        <path fill-rule="evenodd" d="M7.21 14.77a.75.75 0 01.02-1.06L11.168 10 7.23 6.29a.75.75 0 111.04-1.08l4.5 4.25a.75.75 0 010 1.08l-4.5 4.25a.75.75 0 01-1.06-.02z" clip-rule="evenodd"/>
                    </svg>
                </a>
            </nav>
        </div>
    </div>
</div>
@endsection