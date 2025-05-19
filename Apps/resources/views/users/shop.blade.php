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
            {{-- Dummy Store 1 --}}
            <div class="bg-white rounded-2xl shadow-lg hover:shadow-xl transition-all duration-300 overflow-hidden">
                <div class="relative h-48">
                    <img src="https://images.unsplash.com/photo-1507842217343-583bb7270b66?ixlib=rb-1.2.1&auto=format&fit=crop&w=1000&q=80" 
                         alt="Book Store" 
                         class="w-full h-full object-cover"
                    />
                    <div class="absolute inset-0 bg-gradient-to-t from-black/60 to-transparent"></div>
                </div>

                <div class="relative px-6 pb-6">
                    <div class="absolute -top-12 left-6">
                        <div class="w-24 h-24 rounded-full border-4 border-white overflow-hidden shadow-lg">
                            <img src="https://images.unsplash.com/photo-1472099645785-5658abf4ff4e?ixlib=rb-1.2.1&auto=format&fit=crop&w=500&q=80" 
                                 alt="Owner" 
                                 class="w-full h-full object-cover"
                            />
                        </div>
                    </div>

                    <div class="pt-16">
                        <h3 class="text-xl font-bold text-gray-900 mb-1">Gramedia Book Store</h3>
                        <p class="text-sm text-gray-600 mb-3">Pemilik: John Doe</p>
                        
                        <div class="flex items-center space-x-4 text-sm text-gray-500 mb-4">
                            <div class="flex items-center">
                                <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6" />
                                </svg>
                                <span>150 Buku</span>
                            </div>
                            <div class="flex items-center">
                                <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8h2a2 2 0 012 2v6a2 2 0 01-2 2h-2v4l-4-4H9a1.994 1.994 0 01-1.414-.586m0 0L11 14h4a2 2 0 002-2V6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2v4l.586-.586z" />
                                </svg>
                                <span>4.8</span>
                            </div>
                        </div>

                        <a href="#" class="block w-full text-center py-2 px-4 bg-blue-600 hover:bg-blue-700 text-white font-medium rounded-lg transition duration-300">
                            Lihat Toko
                        </a>
                    </div>
                </div>
            </div>

            @foreach ($tokos as $toko)
                <div class="bg-white rounded-2xl shadow-lg hover:shadow-xl transition-all duration-300 overflow-hidden">
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

                            <a href="{{ route('shop_detail', $toko->id) }}" 
                                class="block w-full text-center py-2 px-4 bg-blue-600 hover:bg-blue-700 text-white font-medium rounded-lg transition duration-300">
                                Lihat Toko
                            </a>
                        </div>
                    </div>
                </div>
                @endforeach
        </div>

        {{-- Pagination --}}
        <div class="mt-12 flex justify-center">
            <nav class="inline-flex items-center space-x-2">
              <a href="#" class="flex h-10 w-10 items-center justify-center rounded-xl border border-gray-300 bg-white text-gray-500 hover:bg-blue-100 hover:text-blue-600 transition">
                <svg class="w-4 h-4" viewBox="0 0 20 20" fill="currentColor">
                  <path fill-rule="evenodd" d="M12.79 5.23a.75.75 0 01-.02 1.06L8.832 10l3.938 3.71a.75.75 0 11-1.04 1.08l-4.5-4.25a.75.75 0 010-1.08l4.5-4.25a.75.75 0 011.06.02z" clip-rule="evenodd" />
                </svg>
              </a>
                <div class="mt-12 flex justify-center">
                    {{ $tokos->links() }}
                </div>
              <a href="#" class="flex h-10 w-10 items-center justify-center rounded-xl border border-gray-300 bg-white text-gray-500 hover:bg-blue-100 hover:text-blue-600 transition">
                <svg class="w-4 h-4" viewBox="0 0 20 20" fill="currentColor">
                  <path fill-rule="evenodd" d="M7.21 14.77a.75.75 0 01.02-1.06L11.168 10 7.23 6.29a.75.75 0 111.04-1.08l4.5 4.25a.75.75 0 010 1.08l-4.5 4.25a.75.75 0 01-1.06-.02z" clip-rule="evenodd" />
                </svg>
              </a>
            </nav>
        </div>
    </div>
</div>
@endsection