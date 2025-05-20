@extends('layouts.app')
@section('title', 'Libary')
@section('content')
<div class="min-h-screen bg-gray-100 py-16 px-4 sm:px-6 lg:px-8 overflow-hidden">
    <div class="text-center mb-10 mt-16 sm:mt-20">
        <h1 class="text-5xl font-extrabold text-gray-900 mb-6 tracking-wide drop-shadow">LIBRARY</h1>
        <div class="max-w-lg mx-auto mt-10 sm:mt-12">
            <div class="relative">
                <input
                    type="text"
                    placeholder="Cari buku ..."
                    class="w-full pl-4 pr-12 py-3 border rounded-full shadow focus:outline-none focus:ring-2 focus:ring-blue-400 focus:border-transparent text-base sm:text-lg bg-white"
                />
                <button class="absolute right-4 top-1/2 -translate-y-1/2 text-blue-500 hover:text-blue-700">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M21 21l-4.35-4.35M11 19a8 8 0 100-16 8 8 0 000 16z" />
                    </svg>
                </button>
            </div>
        </div>
    </div>

    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 2xl:grid-cols-5 gap-8 w-full">
            @foreach ($bukus as $buku)
                <a href="{{ route('book_detail', ['id' => $buku->tokoBuku->id]) }}">
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
        </div>

        <div class="mt-12 flex justify-center">
            <nav class="inline-flex items-center space-x-2">
              <a href="#" class="flex h-10 w-10 items-center justify-center rounded-xl border border-gray-300 bg-white text-gray-500 hover:bg-blue-100 hover:text-blue-600 transition">
                <svg class="w-4 h-4" viewBox="0 0 20 20" fill="currentColor">
                  <path fill-rule="evenodd" d="M12.79 5.23a.75.75 0 01-.02 1.06L8.832 10l3.938 3.71a.75.75 0 11-1.04 1.08l-4.5-4.25a.75.75 0 010-1.08l4.5-4.25a.75.75 0 011.06.02z" clip-rule="evenodd" />
                </svg>
              </a>
                <div class="mt-12 flex justify-center">
                    {{ $bukus->links() }}
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
