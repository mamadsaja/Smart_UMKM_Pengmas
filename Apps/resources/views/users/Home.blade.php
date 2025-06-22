@extends('layouts.app')
@section('title', 'Home')
@section('content')

    <div class="container mx-auto px-4 sm:px-6 lg:px-8 py-8 sm:py-12 lg:py-16 mt-16 sm:mt-20">
        <!-- Swiper -->
        <div class="swiper w-full h-[70vh] mb-16 sm:mb-20 lg:mb-24">
            <div class="swiper-wrapper">
                <div class="swiper-slide rounded-md overflow-hidden shadow-lg">
                    <img src="{{ asset('asset/gambar1.jpeg') }}" class="w-full h-[70vh] object-cover" alt="Slide 1" />
                </div>
                <div class="swiper-slide rounded-md overflow-hidden shadow-lg">
                    <img src="{{ asset('asset/gambar2.jpeg') }}" class="w-full h-[70vh] object-cover" alt="Slide 2" />
                </div>
                <div class="swiper-slide rounded-md overflow-hidden shadow-lg">
                    <img src="{{ asset('asset/gambar3.jpeg') }}" class="w-full h-[70vh] object-cover" alt="Slide 3" />
                </div>
                <div class="swiper-slide rounded-md overflow-hidden shadow-lg">
                    <img src="{{ asset('asset/gambar4.jpg') }}" class="w-full h-[70vh] object-cover" alt="Slide 4" />
                </div>
                <div class="swiper-slide rounded-md overflow-hidden shadow-lg">
                    <img src="{{ asset('asset/gambar5.jpg') }}" class="w-full h-[70vh] object-cover" alt="Slide 5" />
                </div>
            </div>
            
          
            <div class="swiper-pagination mt-6"></div>
            
            <div class="swiper-button-prev text-white"></div>
            <div class="swiper-button-next text-white"></div>
        </div>

      
        <div class="py-16 bg-white rounded-xl mb-16 sm:mb-20 lg:mb-24">
            <div class="relative flex items-center justify-center mb-12">
                <div class="w-1/2 border-t-2 border border-gray-600"></div>
                <span class="absolute px-6 sm:px-8 bg-white font-extrabold text-xl sm:text-2xl text-gray-800">WHAT'S KAMPUNG ILMU</span>
                <div class="w-1/2 border-t-2 border border-gray-600"></div>
            </div>

            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                <div class="grid md:grid-cols-2 gap-12 items-center">
                    <div class="order-2 md:order-1">
                        <img class="rounded-md w-full h-auto object-cover shadow-xl transform hover:scale-105 transition-transform duration-300" src="{{ asset('asset/gambar6.webp') }}" alt="Features Image">
                    </div>
                    <div class="order-1 md:order-2 space-y-6 sm:space-y-8">
                        <h2 class="font-bold text-3xl sm:text-4xl lg:text-5xl text-gray-800 leading-tight">
                            Platform Digital untuk Kampoeng Ilmu
                        </h2>
                        <p class="text-gray-600 text-base sm:text-lg leading-relaxed">
                            Kampoeng Ilmu adalah tempat jual beli buku di pusat Kota Surabaya yang penuh dengan semangat belajar dan berbagi ilmu. Di sini, pengunjung bisa menemukan berbagai jenis buku dengan harga terjangkau, membaca di tempat, hingga mengikuti diskusi atau pertunjukan seni. Dahulu, tempat ini dibangun sebagai wadah bagi pedagang buku bekas agar bisa berjualan dengan lebih tertib dan nyaman. Kini, Kampung Ilmu menjadi simbol semangat literasi, tempat berkumpulnya orang-orang yang mencintai pengetahuan, seni, dan budaya.                        </p>
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

        <div class="py-16 bg-white rounded-xl mb-16 sm:mb-20 lg:mb-24">
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

        <div class="py-16 bg-white rounded-xl mb-16 sm:mb-20 lg:mb-24">
            <div class="relative flex items-center justify-center mb-12">
                <div class="w-1/2 border-t-2 border border-gray-600"></div>
                <span class="absolute px-6 sm:px-8 bg-white font-extrabold text-xl sm:text-2xl text-gray-800">WHAT'S NEWS</span>
                <div class="w-1/2 border-t-2 border border-gray-600"></div>
            </div>

            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                <div class="grid grid-cols-2 sm:grid-cols-2 lg:grid-cols-4 gap-3"> 
                    @foreach($latestBooks as $index => $book)
                    <!-- Card {{ $index + 1 }} -->                    
                    <div class="group relative overflow-hidden rounded-md shadow-md hover:shadow-lg transition-all duration-300 bg-white"> 
                        <div class="absolute top-1 left-1 z-20 bg-blue-600 text-white text-[10px] font-bold px-1.5 py-1 rounded-full shadow-sm"> 
                            Buku Baru
                        </div>
                        <div class="w-full aspect-[3/4] overflow-hidden relative">
                            @if($book->gambar && !filter_var($book->gambar, FILTER_VALIDATE_URL))
                                <!-- Gambar dari local storage -->
                                <img src="{{ asset('storage/' . $book->gambar) }}" 
                                     alt="{{ $book->judul }}" 
                                     class="w-full h-full object-cover transform group-hover:scale-105 transition-transform duration-500 ease-in-out"/>
                            @else
                                <!-- Gambar dari URL eksternal (https) -->
                                <img src="{{ $book->gambar ?? 'https://via.placeholder.com/300x400/f3f4f6/9ca3af?text=Book+Cover' }}" 
                                     alt="{{ $book->judul }}" 
                                     class="w-full h-full object-cover transform group-hover:scale-105 transition-transform duration-500 ease-in-out"
                                     onerror="this.src='https://via.placeholder.com/300x400/f3f4f6/9ca3af?text=Book+Cover'"/>
                            @endif
                            <div class="absolute inset-0 bg-gradient-to-t from-black/70 via-transparent to-transparent opacity-0 group-hover:opacity-100 transition-opacity duration-300 pointer-events-none"></div>
                        </div>
                        <div class="p-4 text-center pb-16"> 
                            <h1 class="text-base font-bold text-gray-800 group-hover:text-blue-600 transition-colors duration-300 truncate">{{ $book->judul }}</h1> 
                            <p class="text-[10px] text-gray-500 mt-0.5">Oleh: <span class="font-medium">{{ $book->penulis }}</span></p> 
                            <p class="text-[10px] text-gray-500">Penerbit: <span class="font-medium">{{ $book->penerbit }}</span></p> 
                            <p class="text-[10px] font-semibold text-blue-600 mt-0.5">Rp {{ number_format($book->harga, 0, ',', '.') }}</p> 
                            <div class="mt-0.5 flex justify-center space-x-1"> 
                                @if($book->stok > 0)
                                    <span class="px-1 py-0.5 bg-green-100 text-green-800 text-[9px] rounded-full">Stok: {{ $book->stok }}</span> 
                                @else
                                    <span class="px-1 py-0.5 bg-red-100 text-red-800 text-[9px] rounded-full">Stok Habis</span> 
                                @endif
                                <span class="px-1 py-0.5 bg-blue-100 text-blue-800 text-[9px] rounded-full">{{ $book->tahun_terbit }}</span> 
                            </div>
                        </div>
                        <div class="absolute bottom-4 left-0 right-0 px-4 z-10 opacity-0 group-hover:opacity-100 transition-all duration-300 ease-in-out transform group-hover:translate-y-0 translate-y-2">
                            <a href="{{ route('book_detail', ['id' => \App\Http\Controllers\BukuController::hashId($book->id)]) }}" 
                               class="block w-full px-4 py-3 bg-blue-600 text-white rounded-full text-sm font-medium hover:bg-blue-700 transition-colors duration-300 text-center shadow-lg">
                               Lihat Detail
                            </a>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>

        <!-- Our Store Section -->
        <div class="py-16 bg-white rounded-xl mb-16 sm:mb-20 lg:mb-24">
            <div class="relative flex items-center justify-center mb-12">
                <div class="w-1/2 border-t-2 border border-gray-600"></div>
                <span class="absolute px-6 sm:px-8 bg-white font-extrabold text-xl sm:text-2xl text-gray-800">OUR STORE</span>
                <div class="w-1/2 border-t-2 border border-gray-600"></div>
            </div>

            <div class="max-w-7xl py-12 mx-auto px-4 sm:px-6 lg:px-8">                
                <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-8">
                    @foreach($topStores as $index => $toko)
                    <!-- Store Card {{ $index + 1 }} -->
                    <div class="group bg-white border border-gray-100 rounded-lg overflow-hidden transition-all duration-300 hover:shadow-xl hover:-translate-y-1 relative">
                        @if($index === 0)
                        <div class="absolute top-0 right-0 bg-blue-500 text-white text-xs px-2 py-1 rounded-bl-lg font-medium z-10">Popular</div>
                        @elseif($toko->created_at > now()->subDays(30))
                        <div class="absolute top-0 right-0 bg-purple-500 text-white text-xs px-2 py-1 rounded-bl-lg font-medium z-10">New</div>
                        @endif
                        <div class="h-40 bg-{{ ['blue', 'green', 'purple', 'red', 'amber', 'indigo'][$index % 6] }}-50 flex items-center justify-center overflow-hidden relative">
                            @if($toko->gambar_toko)
                            <img src="{{ asset('storage/' . $toko->gambar_toko) }}" alt="{{ $toko->Nama_Toko }}" class="absolute inset-0 w-full h-full object-cover opacity-80">
                            @endif
                        </div>
                        <div class="p-6">
                            <div class="flex justify-between items-start mb-2">
                                <h3 class="text-xl font-bold font-serif tracking-tight">{{ $toko->Nama_Toko }}</h3>
                                <span class="inline-flex items-center justify-center w-8 h-8 rounded-full bg-{{ ['blue', 'green', 'purple', 'red', 'amber', 'indigo'][$index % 6] }}-100 text-{{ ['blue', 'green', 'purple', 'red', 'amber', 'indigo'][$index % 6] }}-500">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" viewBox="0 0 20 20" fill="currentColor">
                                        <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118l-2.8-2.034c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z" />
                                    </svg>
                                </span>
                            </div>
                            <p class="text-sm text-gray-600 mb-4">{{ $toko->name }}</p>
                            <div class="flex items-center text-amber-400 mb-4">
                                @for($i = 0; $i < 5; $i++)
                                <svg class="w-4 h-4 fill-current" viewBox="0 0 20 20">
                                    <path d="M10 15l-5.878 3.09 1.122-6.545L.488 6.91l6.561-.955L10 0l2.951 5.955 6.561.955-4.756 4.635 1.122 6.545z"/>
                                </svg>
                                @endfor
                                <span class="text-xs text-gray-500 ml-2">({{ $toko->bukus_count }})</span>
                            </div>
                            <div class="flex justify-between items-center">
                                <span class="text-xs bg-{{ ['blue', 'green', 'purple', 'red', 'amber', 'indigo'][$index % 6] }}-100 text-{{ ['blue', 'green', 'purple', 'red', 'amber', 'indigo'][$index % 6] }}-700 px-2 py-1 rounded-full">{{ $toko->bukus_count }} Buku</span>
                                <a href="{{ route('shop_detail', $toko->id) }}" class="text-sm font-medium text-{{ ['blue', 'green', 'purple', 'red', 'amber', 'indigo'][$index % 6] }}-600 hover:text-{{ ['blue', 'green', 'purple', 'red', 'amber', 'indigo'][$index % 6] }}-800 transition-colors duration-300 inline-flex items-center group">
                                    Kunjungi
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 ml-1 transform group-hover:translate-x-1 transition-transform duration-200" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3" />
                                    </svg>
                                </a>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
                
                <!-- Pixel Style Pagination -->
                <div class="mt-10 flex justify-center">
                    <div class="inline-flex items-center px-2 py-2 bg-white border-2 border-gray-900 shadow-[4px_4px_0px_0px_rgba(0,0,0,1)]">
                        <div class="flex space-x-1">
                            <a href="{{ $topStores->previousPageUrl() }}" class="w-10 h-10 flex items-center justify-center {{ $topStores->onFirstPage() ? 'bg-gray-600 cursor-not-allowed' : 'bg-gray-700 hover:bg-blue-500 hover:border-blue-700' }} border-2 border-gray-900 text-white font-bold transition-colors duration-200 shadow-[2px_2px_0px_0px_rgba(0,0,0,1)]" {{ $topStores->onFirstPage() ? 'aria-disabled="true"' : '' }}>
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                                    <path fill-rule="evenodd" d="M12.707 5.293a1 1 0 010 1.414L9.414 10l3.293 3.293a1 1 0 01-1.414 1.414l-4-4a1 1 0 010-1.414l4-4a1 1 0 011.414 0z" clip-rule="evenodd" />
                                </svg>
                            </a>
                            
                            @for ($i = 1; $i <= $topStores->lastPage(); $i++)
                                <a href="{{ $topStores->url($i) }}" class="w-10 h-10 flex items-center justify-center {{ $topStores->currentPage() == $i ? 'bg-blue-500 border-blue-700' : 'bg-gray-700 hover:bg-blue-500 hover:border-blue-700' }} border-2 border-gray-900 text-white font-bold transition-colors duration-200 shadow-[2px_2px_0px_0px_rgba(0,0,0,1)]">
                                    {{ $i }}
                                </a>
                            @endfor
                            
                            <a href="{{ $topStores->nextPageUrl() }}" class="w-10 h-10 flex items-center justify-center {{ $topStores->hasMorePages() ? 'bg-gray-700 hover:bg-blue-500 hover:border-blue-700' : 'bg-gray-600 cursor-not-allowed' }} border-2 border-gray-900 text-white font-bold transition-colors duration-200 shadow-[2px_2px_0px_0px_rgba(0,0,0,1)]" {{ $topStores->hasMorePages() ? '' : 'aria-disabled="true"' }}>
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                                    <path fill-rule="evenodd" d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z" clip-rule="evenodd" />
                                </svg>
                            </a>
                        </div>
                    </div>
                </div>
                
                <div class="flex justify-center mt-4">
                    <div class="flex space-x-1">
                        @foreach(['red', 'blue', 'green', 'yellow', 'purple'] as $color)
                        <div class="w-3 h-3 bg-{{ $color }}-500 border border-gray-900"></div>
                        @endforeach
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

    <script>
        const swiper = new Swiper('.swiper', {
        effect: 'coverflow',
        grabCursor: true,
        centeredSlides: true,
        slidesPerView: 'auto',
        spaceBetween: 30,
        coverflowEffect: {
            rotate: 30,
            stretch: 0,
            depth: 100,
            modifier: 1,
            slideShadows: true,
        },
        pagination: {
            el: '.swiper-pagination',
            clickable: true,
        },
        navigation: {
            nextEl: '.swiper-button-next',
            prevEl: '.swiper-button-prev',
        },
        });
    </script>
@endsection