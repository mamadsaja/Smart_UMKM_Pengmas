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
                        @if(isset($toko->Toko_Marketplace) && $toko->Toko_Marketplace != '#' && $toko->Toko_Marketplace != '')
                        <!-- Web Store Buttons - untuk marketplace lainnya -->
                        @if(isset($toko->Link_Marketplace) && is_array($toko->Link_Marketplace))
                            @foreach($toko->Link_Marketplace as $marketplace)
                                @if(isset($marketplace['url']) && $marketplace['url'] != '#' && $marketplace['url'] != '')
                                <a href="{{ $marketplace['url'] }}" target="_blank" 
                                   class="inline-flex items-center px-4 py-2 bg-white text-blue-600 rounded-lg hover:bg-gray-200 transition shadow-md">
                                    <img src="{{ asset('asset/planet-earth.png') }}" alt="Web Store Logo" class="w-5 h-5 mr-2">
                                    {{ $marketplace['nama_toko'] ?? 'Toko Online' }}
                                </a>
                                @endif
                            @endforeach
                        @endif
                        <a href="{{ $toko->Toko_Marketplace }}" target="_blank" 
                           class="inline-flex items-center px-4 py-2 bg-white text-blue-600 rounded-lg hover:bg-gray-200 transition shadow-md">
                            <img src="{{ asset('asset/planet-earth.png') }}" alt="Web Store Logo" class="w-5 h-5 mr-2">
                            Toko Online
                        </a>
                        @endif
                    </div>
                </div>
            </div>

            <!-- Description Section -->
            <div class="mt-8 border-t pt-8">
                <h2 class="text-2xl font-semibold text-gray-900 mb-4">Deskripsi Toko</h2>
                <div class="prose max-w-xl text-gray-600 break-words">
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