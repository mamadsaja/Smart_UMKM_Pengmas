@extends('layouts.app')
@section('title', 'Home')
@section('content')
    <div class="container mx-auto px-4 sm:px-6 lg:px-8 py-8 sm:py-12 lg:py-16 mt-16 sm:mt-20">
        <!-- Carousel Section -->
        <div class="w-full max-w-[1200px] mx-auto px-2 sm:px-4 py-6 sm:py-12 lg:py-16">
            <div class="relative bg-white rounded-xl shadow-xl overflow-hidden">
                <div data-hs-carousel='{
                    "isAutoPlay": true,
                    "loadingClasses": "opacity-0",
                    "dotsItemClasses": "hs-carousel-active:bg-blue-700 hs-carousel-active:border-blue-700 size-3 border border-gray-400 rounded-full cursor-pointer"
                }' class="relative">
                    <div class="hs-carousel relative overflow-hidden aspect-[4/3] sm:aspect-[21/9] md:aspect-[16/9] bg-white">
                        <div class="hs-carousel-body absolute top-0 bottom-0 start-0 flex flex-nowrap transition-transform duration-700 opacity-100">
                            <div class="hs-carousel-slide w-full flex-shrink-0">
                                <div class="flex justify-center items-center h-full bg-gradient-to-r from-blue-100 to-blue-200 p-2 sm:p-4 md:p-6">
                                    <span class="text-lg sm:text-2xl md:text-3xl lg:text-4xl text-gray-800 font-bold transition duration-700 break-words text-center">Selamat Datang di Kampung Buku</span>
                                </div>
                            </div>
                            <div class="hs-carousel-slide w-full flex-shrink-0">
                                <div class="flex justify-center items-center h-full bg-gradient-to-r from-purple-100 to-purple-200 p-2 sm:p-4 md:p-6">
                                    <span class="text-lg sm:text-2xl md:text-3xl lg:text-4xl text-gray-800 font-bold transition duration-700 break-words text-center">Temukan Buku Favoritmu</span>
                                </div>
                            </div>
                            <div class="hs-carousel-slide w-full flex-shrink-0">
                                <div class="flex justify-center items-center h-full bg-gradient-to-r from-green-100 to-green-200 p-2 sm:p-4 md:p-6">
                                    <span class="text-lg sm:text-2xl md:text-3xl lg:text-4xl text-gray-800 font-bold transition duration-700 break-words text-center">Dukung UMKM Lokal</span>
                                </div>
                            </div>
                        </div>
                    </div>

                    <button type="button" class="hs-carousel-prev hs-carousel-disabled:opacity-50 disabled:pointer-events-none absolute inset-y-0 start-0 inline-flex justify-center items-center w-12 sm:w-16 h-full text-gray-800 hover:bg-gray-800/10 focus:outline-hidden focus:bg-gray-800/10 rounded-s-lg transition-all duration-300">
                        <span class="text-2xl" aria-hidden="true">
                            <svg class="shrink-0 size-5 sm:size-6" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                <path d="m15 18-6-6 6-6"></path>
                            </svg>
                        </span>
                        <span class="sr-only">Previous</span>
                    </button>
                    <button type="button" class="hs-carousel-next hs-carousel-disabled:opacity-50 disabled:pointer-events-none absolute inset-y-0 end-0 inline-flex justify-center items-center w-12 sm:w-16 h-full text-gray-800 hover:bg-gray-800/10 focus:outline-hidden focus:bg-gray-800/10 rounded-e-lg transition-all duration-300">
                        <span class="sr-only">Next</span>
                        <span class="text-2xl" aria-hidden="true">
                            <svg class="shrink-0 size-5 sm:size-6" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                <path d="m9 18 6-6-6-6"></path>
                            </svg>
                        </span>
                    </button>

                    <div class="hs-carousel-pagination flex justify-center absolute bottom-4 start-0 end-0 space-x-3"></div>
                </div>
            </div>
        </div>

        <!-- What's Kampung Buku Section -->
        <div class="mt-16 sm:mt-20 lg:mt-24">
            <div class="relative flex items-center justify-center my-12">
                <div class="w-1/2 border-t-2 border border-gray-600"></div>
                <span class="absolute px-6 sm:px-8 bg-white font-extrabold text-xl sm:text-2xl text-gray-800">WHAT'S KAMPUNG BUKU</span>
                <div class="w-1/2 border-t-2 border border-gray-600"></div>
            </div>

            <div class="max-w-7xl py-12 mx-auto px-4 sm:px-6 lg:px-8">
                <div class="grid md:grid-cols-2 gap-12 items-center">
                    <div class="order-2 md:order-1">
                        <img class="rounded-2xl w-full h-auto object-cover shadow-xl transform hover:scale-105 transition-transform duration-300" src="https://images.unsplash.com/photo-1648737963503-1a26da876aca?ixlib=rb-4.0.3&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=900&h=900&q=80" alt="Features Image">
                    </div>
                    <div class="order-1 md:order-2 space-y-6 sm:space-y-8">
                        <h2 class="font-bold text-3xl sm:text-4xl lg:text-5xl text-gray-800 leading-tight">
                            Platform Digital untuk UMKM Buku
                        </h2>
                        <p class="text-gray-600 text-base sm:text-lg leading-relaxed">
                            Kampung Buku adalah platform digital yang menghubungkan UMKM buku dengan pembaca. Kami menyediakan wadah bagi para penjual buku lokal untuk menjangkau lebih banyak pembaca dan membantu pembaca menemukan buku-buku berkualitas dari UMKM lokal.
                        </p>
                        <div class="flex flex-wrap gap-4">
                            <button class="px-6 py-3 bg-blue-600 text-white rounded-lg hover:bg-blue-700 transition-colors duration-300">
                                Pelajari Lebih Lanjut
                            </button>
                            <button class="px-6 py-3 border-2 border-blue-600 text-blue-600 rounded-lg hover:bg-blue-50 transition-colors duration-300">
                                Bergabung Bersama Kami
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Counter Section -->
        <div class="mt-12 sm:mt-16 lg:mt-20">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                <div class="grid grid-cols-1 sm:grid-cols-2 gap-8">
                    <div class="flex flex-col items-center">
                        <div class="flex items-center">
                            <span id="counter1" class="text-4xl sm:text-5xl md:text-6xl lg:text-7xl font-bold text-gray-800">1</span>
                            <span class="text-4xl sm:text-5xl md:text-6xl lg:text-7xl font-bold text-gray-800">+</span>
                        </div>
                        <p class="font-bold text-xl sm:text-2xl md:text-3xl text-gray-800 py-3 sm:py-5">Buku</p>
                    </div>
                    <div class="flex flex-col items-center">
                        <div class="flex items-center">
                            <span id="counter2" class="text-4xl sm:text-5xl md:text-6xl lg:text-7xl font-bold text-gray-800">1</span>
                            <span class="text-4xl sm:text-5xl md:text-6xl lg:text-7xl font-bold text-gray-800">+</span>
                        </div>
                        <p class="font-bold text-xl sm:text-2xl md:text-3xl text-gray-800 py-3 sm:py-5">Toko</p>
                    </div>
                </div>
            </div>
        </div>

        <!-- What's News Section -->
        <div class="mt-16 py-12 sm:mt-20 lg:mt-24 bg-gray-50">
            <div class="relative flex items-center justify-center my-12">
                <div class="w-1/2 border-t-2 border border-gray-600"></div>
                <span class="absolute px-6 sm:px-8 bg-gray-50 font-extrabold text-xl sm:text-2xl text-gray-800">WHAT'S NEWS</span>
                <div class="w-1/2 border-t-2 border border-gray-600"></div>
            </div>

            <div class="max-w-7xl mx-auto py-12 px-4 sm:px-6 lg:px-8">
                <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-8">
                    <!-- Card 1 -->
                    <div class="flex flex-col items-center text-center group">
                        <div class="w-full aspect-[3/4] relative overflow-hidden rounded-xl shadow-lg">
                            <img src="https://marketplace.canva.com/EAGPDf0i3PM/1/0/1003w/canva-ungu-estetik-surat-untuk-senja-sampul-buku-novel-04InGm2FwbU.jpg" alt="Book Cover" class="absolute top-0 left-0 w-full h-full object-cover transform group-hover:scale-110 transition-transform duration-300"/>
                        </div>
                        <p class="text-sm text-blue-600 font-medium mt-4">Buku Baru</p>
                        <h3 class="text-lg font-semibold text-gray-800 mt-2 group-hover:text-blue-600 transition-colors duration-300">Surat untuk Senja</h3>
                        <p class="text-sm text-gray-500 mt-2">Novel romantis karya penulis lokal</p>
                    </div>
                    <!-- Card 2 -->
                    <div class="flex flex-col items-center text-center group">
                        <div class="w-full aspect-[3/4] relative overflow-hidden rounded-xl shadow-lg">
                            <img src="https://marketplace.canva.com/EAGEbpyex6M/1/0/1003w/canva-hijau-emas-ilustrasi-sampul-buku-cerita-dari-negeri-dongeng-oiWRJIQOoOU.jpg" alt="Book Cover" class="absolute top-0 left-0 w-full h-full object-cover transform group-hover:scale-110 transition-transform duration-300"/>
                        </div>
                        <p class="text-sm text-blue-600 font-medium mt-4">Buku Terlaris</p>
                        <h3 class="text-lg font-semibold text-gray-800 mt-2 group-hover:text-blue-600 transition-colors duration-300">Cerita dari Negeri Dongeng</h3>
                        <p class="text-sm text-gray-500 mt-2">Kumpulan cerita anak terbaik</p>
                    </div>
                    <!-- Card 3 -->
                    <div class="flex flex-col items-center text-center group">
                        <div class="w-full aspect-[3/4] relative overflow-hidden rounded-xl shadow-lg">
                            <img src="https://marketplace.canva.com/EAFY7T6tOE0/1/0/1003w/canva-oren-estetik-buku-cerita-pasangan-cinta-romantis-kartun-bagus-laGditSTCv0.jpg" alt="Book Cover" class="absolute top-0 left-0 w-full h-full object-cover transform group-hover:scale-110 transition-transform duration-300"/>
                        </div>
                        <p class="text-sm text-blue-600 font-medium mt-4">Promo Spesial</p>
                        <h3 class="text-lg font-semibold text-gray-800 mt-2 group-hover:text-blue-600 transition-colors duration-300">Cinta dalam Kata</h3>
                        <p class="text-sm text-gray-500 mt-2">Antologi puisi cinta</p>
                    </div>
                    <!-- Card 4 -->
                    <div class="flex flex-col items-center text-center group">
                        <div class="w-full aspect-[3/4] relative overflow-hidden rounded-xl shadow-lg">
                            <img src="https://d1csarkz8obe9u.cloudfront.net/posterpreviews/historical-fiction-book-cover-design-template-abf3ee7b0bb18777c72c5403e8342795_screen.jpg?ts=1658483560" alt="Book Cover" class="absolute top-0 left-0 w-full h-full object-cover transform group-hover:scale-110 transition-transform duration-300"/>
                        </div>
                        <p class="text-sm text-blue-600 font-medium mt-4">Buku Terbaru</p>
                        <h3 class="text-lg font-semibold text-gray-800 mt-2 group-hover:text-blue-600 transition-colors duration-300">Sejarah Nusantara</h3>
                        <p class="text-sm text-gray-500 mt-2">Kisah perjuangan bangsa</p>
                    </div>
                </div>
            </div>
        </div>

        <!-- Our Store Section -->
        <div class="mt-16 py-12 sm:mt-20 lg:mt-24">
            <div class="relative flex items-center justify-center my-12">
                <div class="w-1/2 border-t-2 border border-gray-600"></div>
                <span class="absolute px-6 sm:px-8 bg-white font-extrabold text-xl sm:text-2xl text-gray-800">OUR STORE</span>
                <div class="w-1/2 border-t-2 border border-gray-600"></div>
            </div>

            <div class="max-w-7xl py-12 mx-auto px-4 sm:px-6 lg:px-8">
                <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-8">
                    <!-- Store Card 1 -->
                    <div class="bg-white rounded-xl shadow-lg p-6 hover:shadow-xl transition-shadow duration-300">
                        <div class="flex flex-col items-center">
                            <div class="border-2 border-blue-500 rounded-full w-20 h-20 sm:w-24 sm:h-24 flex items-center justify-center text-2xl font-bold text-blue-500 bg-blue-50">
                                <p>B</p>
                            </div>
                            <div class="mt-4 font-bold text-center">
                                <p class="text-lg sm:text-xl">Buku Kita</p>
                            </div>
                            <div class="mt-1 text-center">
                                <p class="text-sm sm:text-base text-gray-600">Ahmad Rizki</p>
                            </div>
                            <div class="flex mt-3 space-x-1">
                                <svg class="w-5 h-5 text-yellow-400 fill-current" viewBox="0 0 20 20">
                                    <path d="M10 15l-5.878 3.09 1.122-6.545L.488 6.91l6.561-.955L10 0l2.951 5.955 6.561.955-4.756 4.635 1.122 6.545z"/>
                                </svg>
                                <svg class="w-5 h-5 text-yellow-400 fill-current" viewBox="0 0 20 20">
                                    <path d="M10 15l-5.878 3.09 1.122-6.545L.488 6.91l6.561-.955L10 0l2.951 5.955 6.561.955-4.756 4.635 1.122 6.545z"/>
                                </svg>
                                <svg class="w-5 h-5 text-yellow-400 fill-current" viewBox="0 0 20 20">
                                    <path d="M10 15l-5.878 3.09 1.122-6.545L.488 6.91l6.561-.955L10 0l2.951 5.955 6.561.955-4.756 4.635 1.122 6.545z"/>
                                </svg>
                                <svg class="w-5 h-5 text-yellow-400 fill-current" viewBox="0 0 20 20">
                                    <path d="M10 15l-5.878 3.09 1.122-6.545L.488 6.91l6.561-.955L10 0l2.951 5.955 6.561.955-4.756 4.635 1.122 6.545z"/>
                                </svg>
                                <svg class="w-5 h-5 text-yellow-400 fill-current" viewBox="0 0 20 20">
                                    <path d="M10 15l-5.878 3.09 1.122-6.545L.488 6.91l6.561-.955L10 0l2.951 5.955 6.561.955-4.756 4.635 1.122 6.545z"/>
                                </svg>
                            </div>
                            <button class="mt-4 px-4 py-2 bg-blue-500 text-white rounded-lg hover:bg-blue-600 transition-colors duration-300">
                                Kunjungi Toko
                            </button>
                        </div>
                    </div>
                    <!-- Store Card 2 -->
                    <div class="bg-white rounded-xl shadow-lg p-6 hover:shadow-xl transition-shadow duration-300">
                        <div class="flex flex-col items-center">
                            <div class="border-2 border-green-500 rounded-full w-20 h-20 sm:w-24 sm:h-24 flex items-center justify-center text-2xl font-bold text-green-500 bg-green-50">
                                <p>L</p>
                            </div>
                            <div class="mt-4 font-bold text-center">
                                <p class="text-lg sm:text-xl">Literasi Kita</p>
                            </div>
                            <div class="mt-1 text-center">
                                <p class="text-sm sm:text-base text-gray-600">Budi Santoso</p>
                            </div>
                            <div class="flex mt-3 space-x-1">
                                <svg class="w-5 h-5 text-yellow-400 fill-current" viewBox="0 0 20 20">
                                    <path d="M10 15l-5.878 3.09 1.122-6.545L.488 6.91l6.561-.955L10 0l2.951 5.955 6.561.955-4.756 4.635 1.122 6.545z"/>
                                </svg>
                                <svg class="w-5 h-5 text-yellow-400 fill-current" viewBox="0 0 20 20">
                                    <path d="M10 15l-5.878 3.09 1.122-6.545L.488 6.91l6.561-.955L10 0l2.951 5.955 6.561.955-4.756 4.635 1.122 6.545z"/>
                                </svg>
                                <svg class="w-5 h-5 text-yellow-400 fill-current" viewBox="0 0 20 20">
                                    <path d="M10 15l-5.878 3.09 1.122-6.545L.488 6.91l6.561-.955L10 0l2.951 5.955 6.561.955-4.756 4.635 1.122 6.545z"/>
                                </svg>
                                <svg class="w-5 h-5 text-yellow-400 fill-current" viewBox="0 0 20 20">
                                    <path d="M10 15l-5.878 3.09 1.122-6.545L.488 6.91l6.561-.955L10 0l2.951 5.955 6.561.955-4.756 4.635 1.122 6.545z"/>
                                </svg>
                                <svg class="w-5 h-5 text-yellow-400 fill-current" viewBox="0 0 20 20">
                                    <path d="M10 15l-5.878 3.09 1.122-6.545L.488 6.91l6.561-.955L10 0l2.951 5.955 6.561.955-4.756 4.635 1.122 6.545z"/>
                                </svg>
                            </div>
                            <button class="mt-4 px-4 py-2 bg-green-500 text-white rounded-lg hover:bg-green-600 transition-colors duration-300">
                                Kunjungi Toko
                            </button>
                        </div>
                    </div>
                    <!-- Store Card 3 -->
                    <div class="bg-white rounded-xl shadow-lg p-6 hover:shadow-xl transition-shadow duration-300">
                        <div class="flex flex-col items-center">
                            <div class="border-2 border-purple-500 rounded-full w-20 h-20 sm:w-24 sm:h-24 flex items-center justify-center text-2xl font-bold text-purple-500 bg-purple-50">
                                <p>P</p>
                            </div>
                            <div class="mt-4 font-bold text-center">
                                <p class="text-lg sm:text-xl">Pustaka Kita</p>
                            </div>
                            <div class="mt-1 text-center">
                                <p class="text-sm sm:text-base text-gray-600">Dewi Lestari</p>
                            </div>
                            <div class="flex mt-3 space-x-1">
                                <svg class="w-5 h-5 text-yellow-400 fill-current" viewBox="0 0 20 20">
                                    <path d="M10 15l-5.878 3.09 1.122-6.545L.488 6.91l6.561-.955L10 0l2.951 5.955 6.561.955-4.756 4.635 1.122 6.545z"/>
                                </svg>
                                <svg class="w-5 h-5 text-yellow-400 fill-current" viewBox="0 0 20 20">
                                    <path d="M10 15l-5.878 3.09 1.122-6.545L.488 6.91l6.561-.955L10 0l2.951 5.955 6.561.955-4.756 4.635 1.122 6.545z"/>
                                </svg>
                                <svg class="w-5 h-5 text-yellow-400 fill-current" viewBox="0 0 20 20">
                                    <path d="M10 15l-5.878 3.09 1.122-6.545L.488 6.91l6.561-.955L10 0l2.951 5.955 6.561.955-4.756 4.635 1.122 6.545z"/>
                                </svg>
                                <svg class="w-5 h-5 text-yellow-400 fill-current" viewBox="0 0 20 20">
                                    <path d="M10 15l-5.878 3.09 1.122-6.545L.488 6.91l6.561-.955L10 0l2.951 5.955 6.561.955-4.756 4.635 1.122 6.545z"/>
                                </svg>
                                <svg class="w-5 h-5 text-yellow-400 fill-current" viewBox="0 0 20 20">
                                    <path d="M10 15l-5.878 3.09 1.122-6.545L.488 6.91l6.561-.955L10 0l2.951 5.955 6.561.955-4.756 4.635 1.122 6.545z"/>
                                </svg>
                            </div>
                            <button class="mt-4 px-4 py-2 bg-purple-500 text-white rounded-lg hover:bg-purple-600 transition-colors duration-300">
                                Kunjungi Toko
                            </button>
                        </div>
                    </div>
                    <!-- Store Card 4 -->
                    <div class="bg-white rounded-xl shadow-lg p-6 hover:shadow-xl transition-shadow duration-300">
                        <div class="flex flex-col items-center">
                            <div class="border-2 border-red-500 rounded-full w-20 h-20 sm:w-24 sm:h-24 flex items-center justify-center text-2xl font-bold text-red-500 bg-red-50">
                                <p>K</p>
                            </div>
                            <div class="mt-4 font-bold text-center">
                                <p class="text-lg sm:text-xl">Karya Kita</p>
                            </div>
                            <div class="mt-1 text-center">
                                <p class="text-sm sm:text-base text-gray-600">Rina Wijaya</p>
                            </div>
                            <div class="flex mt-3 space-x-1">
                                <svg class="w-5 h-5 text-yellow-400 fill-current" viewBox="0 0 20 20">
                                    <path d="M10 15l-5.878 3.09 1.122-6.545L.488 6.91l6.561-.955L10 0l2.951 5.955 6.561.955-4.756 4.635 1.122 6.545z"/>
                                </svg>
                                <svg class="w-5 h-5 text-yellow-400 fill-current" viewBox="0 0 20 20">
                                    <path d="M10 15l-5.878 3.09 1.122-6.545L.488 6.91l6.561-.955L10 0l2.951 5.955 6.561.955-4.756 4.635 1.122 6.545z"/>
                                </svg>
                                <svg class="w-5 h-5 text-yellow-400 fill-current" viewBox="0 0 20 20">
                                    <path d="M10 15l-5.878 3.09 1.122-6.545L.488 6.91l6.561-.955L10 0l2.951 5.955 6.561.955-4.756 4.635 1.122 6.545z"/>
                                </svg>
                                <svg class="w-5 h-5 text-yellow-400 fill-current" viewBox="0 0 20 20">
                                    <path d="M10 15l-5.878 3.09 1.122-6.545L.488 6.91l6.561-.955L10 0l2.951 5.955 6.561.955-4.756 4.635 1.122 6.545z"/>
                                </svg>
                                <svg class="w-5 h-5 text-yellow-400 fill-current" viewBox="0 0 20 20">
                                    <path d="M10 15l-5.878 3.09 1.122-6.545L.488 6.91l6.561-.955L10 0l2.951 5.955 6.561.955-4.756 4.635 1.122 6.545z"/>
                                </svg>
                            </div>
                            <button class="mt-4 px-4 py-2 bg-red-500 text-white rounded-lg hover:bg-red-600 transition-colors duration-300">
                                Kunjungi Toko
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        function animateCounter(elementId, target, duration) {
            const counter = document.getElementById(elementId);
            let start = 1;
            let increment = target / (duration / 10);

            function updateCounter() {
                start += increment;
                if (start >= target) {
                    counter.innerText = target;
                } else {
                    counter.innerText = Math.floor(start);
                    requestAnimationFrame(updateCounter);
                }
            }

            updateCounter();
        }

        const observerOptions = {
            root: null,
            rootMargin: "0px",
            threshold: 0.5,
        };

        const observerCallback = (entries, observer) => {
            entries.forEach(entry => {
                if (entry.isIntersecting) {
                    animateCounter("counter1", 2000, 2000);
                    animateCounter("counter2", 80, 2000);
                    observer.unobserve(entry.target);
                }
            });
        };

        const observer = new IntersectionObserver(observerCallback, observerOptions);
        observer.observe(document.getElementById("counter1"));
        observer.observe(document.getElementById("counter2"));
    </script>
@endsection