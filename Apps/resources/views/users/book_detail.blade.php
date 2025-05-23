@extends('layouts.app')
@section('title', 'Detail Buku')
@section('content')

<style>
body {
    background-color: #f5f5f5;
}

.overflow-x-auto::-webkit-scrollbar {
    display: none;
}

.overflow-x-auto {
    -ms-overflow-style: none;
    scrollbar-width: none;
}
</style>

<div class="bg-[#f5f5f5] flex justify-center py-0">
    <div class="max-w-5xl w-full mx-auto flex flex-col mt-[20vh] shadow-2xl">
        <!-- Top Section -->
        <div class="bg-white pb-[8vh] rounded-2xl shadow-sm overflow-hidden flex flex-col md:flex-row relative">
            <!-- Cover Buku -->
            <div class="md:w-1/3 flex items-center justify-center p-8 md:p-12">
                <img src="{{  asset('storage/' . $buku->gambar) }}"
                     alt="The Subtle Art of Not Giving a F*ck"
                     class="rounded-lg shadow-md w-full object-cover max-w-xs md:max-w-none">
            </div>

            <!-- Detail Buku -->
            <div class="md:w-2/3 p-8 md:p-12 text-gray-700">
                <div class="text-lg font-medium mb-2">{{ $buku->penulis }}</div>
                <h1 class="text-3xl md:text-4xl font-bold mb-4 leading-tight">{{ $buku->judul }}</h1>

                <div class="flex items-center gap-4 mb-6 text-sm text-gray-500">
                    <span class="flex items-center gap-1">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                        9 min read
                    </span>
                    <span class="flex items-center gap-1">
                        <svg class="w-4 h-4 text-yellow-400 fill-current" viewBox="0 0 20 20"><path d="M10 15l-5.878 3.09 1.123-6.545L.487 7.26l6.572-.955L10 0l2.941 6.305 6.573.955-4.768 4.384 1.123 6.545z"/></svg>
                        <span class="text-gray-600">3.9</span> (1,190,272 ratings)
                    </span>
                </div>

                <div class="mb-6">
                    <div class="text-sm text-gray-500 mb-2">Genres</div>
                    <div class="flex flex-wrap gap-2">
                        @foreach ($buku->kategori_list as $kategori)
                            <span class="px-3 py-1 bg-gray-100 text-gray-600 text-sm rounded-full">{{ $kategori }}</span>
                        @endforeach
                    </div>
                </div>

                <button class="flex items-center px-6 py-3 bg-orange-500 text-white font-medium rounded-lg hover:bg-orange-600 transition-colors shadow-sm">
                    <svg class="w-5 h-5 mr-2" fill="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path d="M12 0c-6.627 0-12 5.373-12 12s5.373 12 12 12 12-5.373 12-12-5.373-12-12-12zm-2 17l-5-5 1.414-1.414L10 14.172l7.586-7.586L19 8l-9 9z"></path></svg>
                    Buy book on Amazon
                </button>
            </div>
        </div>

        <!-- Bottom Section -->
        <div class="bg-white rounded-2xl shadow-sm mt-8 p-8 md:p-12 flex flex-col md:flex-row gap-8">
            <!-- Table of Contents -->
            <div class="md:w-1/3 bg-gray-50 rounded-lg p-6">
                <h2 class="text-xl font-semibold text-gray-800 mb-4">Deskripisi Buku atau Sinopsis</h2>
            </div>

            <!-- Description -->
            <div class="md:w-2/3">
                <p class="text-gray-600 text-base leading-relaxed text-justify">
                  {{ $buku->deskripsi }}
                </p>
            </div>
        </div>

        <!-- Other Books Section -->
        <div class="px-4 flex flex-col items-center justify-center mt-12 md:px-8 py-8 bg-white rounded-2xl shadow-sm">
            <h2 class="text-3xl font-bold text-gray-800 mb-6 text-center">Recent Bestsellers</h2>
            <div class="overflow-x-auto w-full py-20">
              <div class="flex gap-8 items-start px-4 md:px-8 w-max snap-x snap-mandatory overflow-x-scroll scrollbar-hide">
                @foreach($buku->tokoBuku->bukus()->where('id', '!=', $buku->id)->latest()->take(5)->get() as $recentBook)
                <a href="{{ route('book_detail', ['id' => $recentBook->id]) }}" class="flex-shrink-0 flex items-start gap-6 w-72 snap-start hover:bg-gray-50 p-2 rounded-lg transition-colors">
                  <img src="{{ asset('storage/' . $recentBook->gambar) }}"
                       alt="{{ $recentBook->judul }}"
                       class="w-32 h-48 object-cover rounded-lg shadow-2xl">
                  <div class="flex flex-col justify-between h-48 py-1">
                    <div class="flex items-center text-yellow-400 text-base">
                      <svg class="w-5 h-5 fill-current" viewBox="0 0 20 20"><path d="..."/></svg>
                      <svg class="w-5 h-5 fill-current" viewBox="0 0 20 20"><path d="..."/></svg>
                      <svg class="w-5 h-5 fill-current" viewBox="0 0 20 20"><path d="..."/></svg>
                      <svg class="w-5 h-5 text-gray-300 fill-current" viewBox="0 0 20 20"><path d="..."/></svg>
                      <svg class="w-5 h-5 text-gray-300 fill-current" viewBox="0 0 20 20"><path d="..."/></svg>
                    </div>
                    <div class="text-base font-semibold text-gray-800 leading-tight">{{ $recentBook->judul }}</div>
                    <div class="text-sm text-gray-600">{{ $recentBook->penulis }}</div>
                    <div class="mt-2 px-5 py-2 border border-gray-300 text-gray-700 text-sm font-medium rounded-full hover:bg-gray-100 transition-colors self-start">Lihat Detail</div>
                  </div>
                </a>
                @endforeach
              </div>
            </div>
          </div>
        </div>
    </div>
</div>
@endsection
