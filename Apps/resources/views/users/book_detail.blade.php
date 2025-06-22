@extends('layouts.app')
@section('title', 'Detail Buku')
@section('content')

<style>
body {
    background-color: #f5f5f5;
}

/* Menghapus scrollbar default tetapi tetap bisa scroll */
.overflow-x-auto::-webkit-scrollbar {
    display: none;
}

.overflow-x-auto {
    -ms-overflow-style: none;
    scrollbar-width: none;
}

/* Custom Pixel Scroll untuk scroll horizontal */
.pixel-scroll-container {
    position: relative;
}

/* Tombol scroll dengan desain pixel */
.pixel-scroll-button {
    position: absolute;
    top: 50%;
    transform: translateY(-50%);
    width: 40px;
    height: 40px;
    background-color: rgba(59, 130, 246, 0.9);
    color: white;
    border-radius: 8px;
    display: flex;
    align-items: center;
    justify-content: center;
    cursor: pointer;
    z-index: 10;
    transition: all 0.3s;
    border: 2px solid rgba(255, 255, 255, 0.5);
    box-shadow: 0 0 0 2px rgba(37, 99, 235, 0.3);
}

.pixel-scroll-button:hover {
    background-color: rgba(37, 99, 235, 1);
    transform: translateY(-50%) scale(1.1);
}

.pixel-scroll-button:active {
    transform: translateY(-50%) scale(0.95);
}

.pixel-scroll-left {
    left: 0;
}

.pixel-scroll-right {
    right: 0;
}

/* Indikator scroll dengan desain pixel */
.pixel-scroll-indicators {
    display: flex;
    justify-content: center;
    gap: 8px;
    margin-top: 16px;
}

.pixel-scroll-dot {
    width: 10px;
    height: 10px;
    background-color: #e5e7eb;
    border-radius: 2px;
    transition: all 0.3s;
}

.pixel-scroll-dot.active {
    background-color: #3b82f6;
    transform: scale(1.2);
}

/* Efek pixel pada scroll */
.pixel-scroll-content {
    scroll-behavior: smooth;
    scroll-snap-type: x mandatory;
    position: relative;
}

.pixel-scroll-content::after {
    content: '';
    position: absolute;
    top: 0;
    right: 0;
    bottom: 0;
    width: 60px;
    background: linear-gradient(to right, rgba(255, 255, 255, 0), rgba(255, 255, 255, 0.8));
    pointer-events: none;
    z-index: 1;
}

.pixel-scroll-content::before {
    content: '';
    position: absolute;
    top: 0;
    left: 0;
    bottom: 0;
    width: 60px;
    background: linear-gradient(to left, rgba(255, 255, 255, 0), rgba(255, 255, 255, 0.8));
    pointer-events: none;
    z-index: 1;
}

.pixel-scroll-item {
    scroll-snap-align: start;
}
</style>

<div class="bg-[#f5f5f5] flex justify-center py-16 md:py-24 lg:py-32">
    <div class="max-w-5xl w-full mx-auto flex flex-col shadow-2xl">
        <!-- Top Section -->
        <div class="bg-white pb-[8vh] rounded-2xl shadow-sm overflow-hidden flex flex-col md:flex-row relative">
            <!-- Cover Buku -->
            <div class="md:w-1/3 flex items-center justify-center p-8 md:p-12">
                @if($buku->gambar && !filter_var($buku->gambar, FILTER_VALIDATE_URL))
                    <!-- Gambar dari local storage -->
                    <img src="{{ asset('storage/' . $buku->gambar) }}"
                         alt="{{ $buku->judul }}"
                         class="rounded-lg shadow-md w-full object-cover max-w-xs md:max-w-none">
                @else
                    <!-- Gambar dari URL eksternal (https) -->
                    <img src="{{ $buku->gambar ?? 'https://via.placeholder.com/300x400/f3f4f6/9ca3af?text=No+Image' }}"
                         alt="{{ $buku->judul }}"
                         class="rounded-lg shadow-md w-full object-cover max-w-xs md:max-w-none"
                         onerror="this.src='https://via.placeholder.com/300x400/f3f4f6/9ca3af?text=No+Image'">
                @endif
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

                <div>

                <div class="mb-6">
                    <div class="text-sm text-gray-500 mb-2">Harga</div>
                    <div class="flex items-center gap-2">
                        <span class="text-4xl font-bold text-gray-900">Rp {{ number_format($buku->harga, 0, ',', '.') }}</span>
                        @if($buku->harga_asli > $buku->harga)
                            <span class="text-lg text-gray-400 line-through">Rp {{ number_format($buku->harga_asli, 0, ',', '.') }}</span>
                            <span class="px-2 py-1 bg-red-100 text-red-600 text-sm font-medium rounded-full">
                                -{{ round((($buku->harga_asli - $buku->harga) / $buku->harga_asli) * 100) }}%
                            </span>
                        @endif
                    </div>
                </div>
                </div>

                <div class="mb-6">
                    <div class="text-sm text-gray-500 mb-2">Genres</div>
                    <div class="flex flex-wrap gap-2">
                        @foreach ($buku->kategori_list as $kategori)
                            <span class="px-3 py-1 bg-gray-100 text-gray-600 text-sm rounded-full">{{ $kategori }}</span>
                        @endforeach
                    </div>
                </div>

                <!-- Wrapper Tombol Marketplace -->
                <div class="flex flex-col md:flex-row gap-7 mb-6">
                    <!-- Shopee Button - hanya tampil jika ada link -->
                    @if(isset($buku->Link_Shopee) && $buku->tokoBuku->Link_Shopee != '#' && $buku->Link_Shopee != '')
                    <a href="{{ $buku->Link_Shopee }}" target="_blank">
                        <button class="flex items-center justify-center px-4 py-2 bg-white text-orange-600 text-sm font-semibold rounded-md hover:bg-gray-200 transition-colors shadow-md">
                            <span class="mr-2">Shopee</span>
                            <img src="{{ asset('asset/Shopee-logo.jpg') }}" alt="Shopee Logo" class="w-7 h-7">
                        </button>
                    </a>
                    @endif
                
                    <!-- Tokopedia Button - hanya tampil jika ada link -->
                    @if(isset($buku->Link_Tokopedia) && $buku->Link_Tokopedia != '#' && $buku->Link_Tokopedia != '')
                    <a href="{{ $buku->Link_Tokopedia }}" target="_blank">
                        <button class="flex items-center justify-center px-4 py-2 bg-white text-green-600 text-sm font-semibold rounded-md hover:bg-gray-200 transition-colors shadow-md">
                            <span class="mr-2">Tokopedia</span>
                            <img src="{{ asset('asset/tokopedia.png') }}" alt="Tokopedia Logo" class="w-7 h-7">
                        </button>
                    </a>
                    @endif
                
                    <!-- Web Store Button - hanya tampil jika ada link -->
                    @if(isset($buku->Link_Marketplace) && $buku->Link_Marketplace != '#' && $buku->Link_Marketplace != '')
                    <a href="{{ $buku->Link_Marketplace }}" target="_blank">
                        <button class="flex items-center justify-center px-4 py-2 bg-white text-blue-600 text-sm font-semibold rounded-md hover:bg-gray-200 transition-colors shadow-md">
                            <span class="mr-2">Toko Online</span>
                            <img src="{{ asset('asset/planet-earth.png') }}" alt="Web Store Logo" class="w-6 h-6">
                        </button>
                    </a>
                    @endif
                </div>

                <!-- Tombol Kunjungi Toko (dibikin lebih besar) -->
                <a href="{{ route('shop_detail', ['id' => \App\Http\Controllers\TokoBukuController::hashId($buku->tokoBuku->id)]) }}"
                class="inline-flex items-center px-6 py-3 bg-orange-500 text-white text-base font-semibold rounded-lg hover:bg-orange-600 transition-colors shadow-md">
                    <svg class="w-6 h-6 mr-2" fill="currentColor" viewBox="0 0 24 24">
                        <path d="M12 0c-6.627 0-12 5.373-12 12s5.373 12 12 12 12-5.373 12-12-5.373-12-12-12zm-2 17l-5-5 1.414-1.414L10 14.172l7.586-7.586L19 8l-9 9z"/>
                    </svg>
                    Kunjungi Toko {{ $buku->tokoBuku->Nama_Toko }}
                </a>

                
            </div>
        </div>

        <!-- Bottom Section -->
        <div class="bg-white rounded-2xl shadow-sm mt-8 p-8 md:p-12 flex flex-col md:flex-row gap-8">
            <!-- Table of Contents -->
            <div class="md:w-1/3 bg-gray-50 rounded-lg p-6">
                <h2 class="text-xl font-semibold text-gray-800 mb-4">Deskripisi Buku dan Sinopsis</h2>
            </div>

            <!-- Description -->
            <div class="md:w-2/3">
                <p class="text-gray-600 text-base leading-relaxed text-justify break-words">
                  {{ $buku->deskripsi }}
                </p>
            </div>
        </div>

        <!-- Other Books Section -->
        <div class="px-4 flex flex-col items-center justify-center mt-12 md:px-8 py-8 bg-white rounded-2xl shadow-sm">
            <h2 class="text-3xl font-bold text-gray-800 mb-6 text-center">Recent Bestsellers</h2>
            <!-- Sorting Navigator -->
            <div class="flex justify-center mb-6">
                <div class="relative inline-block">
                    <div class="flex items-center space-x-1 bg-white border border-gray-200 rounded-full shadow-sm px-1 py-1">
                        <button class="px-4 py-2 text-sm font-medium rounded-full bg-blue-600 text-white hover:bg-blue-700 transition-all duration-200">All</button>
                        <button class="px-4 py-2 text-sm font-medium rounded-full text-gray-700 hover:bg-gray-100 transition-all duration-200">Fiction</button>
                        <button class="px-4 py-2 text-sm font-medium rounded-full text-gray-700 hover:bg-gray-100 transition-all duration-200">Non-Fiction</button>
                        <button class="px-4 py-2 text-sm font-medium rounded-full text-gray-700 hover:bg-gray-100 transition-all duration-200">Mystery</button>
                        <button class="px-3 py-2 text-gray-500 hover:text-gray-700 transition-all duration-200">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                                <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
                            </svg>
                        </button>
                    </div>
                </div>
            </div>
            
            <!-- Pixel Scroll Container -->
            <div class="w-full pixel-scroll-container relative px-10">
                <!-- Scroll Buttons -->
                <button class="pixel-scroll-button pixel-scroll-left" id="scrollLeft">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M15 19l-7-7 7-7"></path>
                    </svg>
                </button>
                
                <button class="pixel-scroll-button pixel-scroll-right" id="scrollRight">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M9 5l7 7-7 7"></path>
                    </svg>
                </button>
                
                <!-- Scroll Content -->
                <div id="scrollContainer" class="overflow-x-auto w-full py-8 pixel-scroll-content">
                    <div id="scrollContent" class="flex gap-8 items-start px-4 md:px-8 w-max snap-x snap-mandatory overflow-x-scroll scrollbar-hide">
                        @foreach($buku->tokoBuku->bukus()->where('id', '!=', $buku->id)->latest()->take(5)->get() as $index => $recentBook)
                        <div class="flex-shrink-0 w-96 bg-white rounded-lg shadow-md hover:shadow-lg transition-shadow duration-300 snap-start pixel-scroll-item" data-index="{{ $index }}">
                            <div class="flex p-6 gap-6">
                                <!-- Book Cover -->
                                <div class="flex-shrink-0">
                                    <img src="{{ asset('storage/' . $recentBook->gambar) }}"
                                        alt="{{ $recentBook->judul }}"
                                        class="w-24 h-36 object-cover rounded-lg shadow-sm">
                                </div>
                                
                                <!-- Book Details -->
                                <div class="flex-1 flex flex-col justify-between">
                                    <!-- Star Rating -->
                                    <div class="flex items-center mb-2">
                                        @for($i = 1; $i <= 5; $i++)
                                        @if($i <= 4)
                                            <svg class="w-4 h-4 text-yellow-400 fill-current" viewBox="0 0 20 20">
                                            <path d="M10 15l-5.878 3.09 1.123-6.545L.487 7.26l6.572-.955L10 0l2.941 6.305 6.573.955-4.768 4.384 1.123 6.545z"/>
                                            </svg>
                                        @else
                                            <svg class="w-4 h-4 text-gray-300 fill-current" viewBox="0 0 20 20">
                                            <path d="M10 15l-5.878 3.09 1.123-6.545L.487 7.26l6.572-.955L10 0l2.941 6.305 6.573.955-4.768 4.384 1.123 6.545z"/>
                                            </svg>
                                        @endif
                                        @endfor
                                    </div>
                                    
                                    <!-- Book Title -->
                                    <h3 class="text-sm font-semibold text-gray-800 leading-tight mb-1 line-clamp-2">{{ $recentBook->judul }}</h3>
                                    
                                    <!-- Author -->
                                    <p class="text-xs text-gray-600 mb-3">{{ $recentBook->penulis }}</p>
                                    
                                    <!-- Read Button -->
                                    <a href="#" 
                                        class="inline-block text-center px-4 py-2 bg-blue-600 text-white text-xs font-medium rounded-md hover:bg-blue-700 transition-colors duration-200" 
                                        onclick="showBookModal('{{ asset('storage/' . $recentBook->gambar) }}', '{{ $recentBook->judul }}', '{{ $recentBook->deskripsi }}', '{{ \App\Http\Controllers\BukuController::hashId($recentBook->id) }}'); return false;">
                                        Read
                                    </a>
                                </div>
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>
                
                <!-- Pixel Scroll Indicators -->
                <div class="pixel-scroll-indicators" id="scrollIndicators">
                    @for($i = 0; $i < min(5, $buku->tokoBuku->bukus()->where('id', '!=', $buku->id)->count()); $i++)
                        <div class="pixel-scroll-dot {{ $i == 0 ? 'active' : '' }}" data-index="{{ $i }}"></div>
                    @endfor
                </div>
            </div>
        </div>

        <!-- Book Detail Modal Structure -->
        <div id="bookModal" class="fixed inset-0 bg-gray-600 bg-opacity-50 overflow-y-auto h-full w-full hidden z-50 flex items-center justify-center p-4">
            <div class="relative mx-auto p-6 border w-full max-w-md md:max-w-xl shadow-lg rounded-lg bg-white">
                <div class="mt-3 text-center">
                    <img id="modalBookCover" src="" alt="Book Cover" class="mx-auto h-72 object-cover rounded-md mb-4">
                    <h3 id="modalBookTitle" class="text-xl leading-6 font-medium text-gray-900 mb-2"></h3>
                    <div class="mt-2 px-4 py-3 text-left">
                        <p id="modalBookDescription" class="text-sm text-gray-600"></p>
                    </div>
                    <div class="items-center px-4 py-3 flex space-x-3">
                        <button id="closeModalBtn" class="px-6 py-2 bg-blue-600 text-white text-base font-medium rounded-md w-full shadow-sm hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-500">Close</button>
                        <a id="viewBookBtn" href="#" class="px-6 py-2 bg-orange-500 text-white text-base font-medium rounded-md w-full shadow-sm hover:bg-orange-600 focus:outline-none focus:ring-2 focus:ring-orange-500">Lihat Buku</a>
                    </div>
                </div>
            </div>
        </div>

        <script>
            function showBookModal(cover, title, description, bookId) {
                document.getElementById('modalBookCover').src = cover;
                document.getElementById('modalBookTitle').innerText = title;
                document.getElementById('modalBookDescription').innerText = description;
                document.getElementById('viewBookBtn').href = "{{ route('book_detail', '') }}/" + bookId;
                document.getElementById('bookModal').classList.remove('hidden');
            }
        
            document.getElementById('closeModalBtn').onclick = function() {
                document.getElementById('bookModal').classList.add('hidden');
            }
        
            // Close the modal when clicking outside of it
            window.onclick = function(event) {
                const modal = document.getElementById('bookModal');
                if (event.target == modal) {
                    modal.classList.add('hidden');
                }
            }
        
            // Custom pixel scroll functionality
            document.addEventListener('DOMContentLoaded', function() {
                const scrollContainer = document.getElementById('scrollContainer');
                const scrollContent = document.getElementById('scrollContent');
                const scrollLeftBtn = document.getElementById('scrollLeft');
                const scrollRightBtn = document.getElementById('scrollRight');
                const scrollDots = document.querySelectorAll('.pixel-scroll-dot');
                const scrollItems = document.querySelectorAll('.pixel-scroll-item');
                
                let currentIndex = 0;
                const itemCount = scrollItems.length;
                
                // Function to update active dot
                function updateActiveDot(index) {
                    scrollDots.forEach(dot => dot.classList.remove('active'));
                    if (scrollDots[index]) {
                        scrollDots[index].classList.add('active');
                    }
                }
                
                // Function to scroll to specific item
                function scrollToItem(index) {
                    if (index < 0) index = 0;
                    if (index >= itemCount) index = itemCount - 1;
                    
                    currentIndex = index;
                    const targetItem = scrollItems[index];
                    
                    if (targetItem) {
                        // Add pixel animation effect
                        scrollContent.style.transition = 'transform 0.01s';
                        setTimeout(() => {
                            scrollContent.style.transition = 'transform 0.5s cubic-bezier(0.22, 1, 0.36, 1)';
                            targetItem.scrollIntoView({ behavior: 'smooth', inline: 'start', block: 'nearest' });
                        }, 10);
                        
                        updateActiveDot(index);
                    }
                }
                
                // Scroll left button
                scrollLeftBtn.addEventListener('click', function() {
                    scrollToItem(currentIndex - 1);
                });
                
                // Scroll right button
                scrollRightBtn.addEventListener('click', function() {
                    scrollToItem(currentIndex + 1);
                });
                
                // Click on dots
                scrollDots.forEach((dot, index) => {
                    dot.addEventListener('click', function() {
                        scrollToItem(index);
                    });
                });
                
                // Detect scroll and update active dot
                scrollContainer.addEventListener('scroll', function() {
                    // Debounce scroll events
                    clearTimeout(scrollContainer.scrollTimeout);
                    scrollContainer.scrollTimeout = setTimeout(() => {
                        // Find which item is most visible
                        let closestItem = null;
                        let closestDistance = Infinity;
                        
                        scrollItems.forEach((item, index) => {
                            const rect = item.getBoundingClientRect();
                            const containerRect = scrollContainer.getBoundingClientRect();
                            
                            // Calculate distance from item center to container center
                            const itemCenter = rect.left + rect.width / 2;
                            const containerCenter = containerRect.left + containerRect.width / 2;
                            const distance = Math.abs(itemCenter - containerCenter);
                            
                            if (distance < closestDistance) {
                                closestDistance = distance;
                                closestItem = index;
                            }
                        });
                        
                        if (closestItem !== null && closestItem !== currentIndex) {
                            currentIndex = closestItem;
                            updateActiveDot(closestItem);
                        }
                    }, 100);
                });
                
                // Add keyboard navigation
                document.addEventListener('keydown', function(e) {
                    if (e.key === 'ArrowLeft') {
                        scrollToItem(currentIndex - 1);
                    } else if (e.key === 'ArrowRight') {
                        scrollToItem(currentIndex + 1);
                    }
                });
                
                // Add touch swipe support
                let touchStartX = 0;
                let touchEndX = 0;
                
                scrollContainer.addEventListener('touchstart', function(e) {
                    touchStartX = e.changedTouches[0].screenX;
                });
                
                scrollContainer.addEventListener('touchend', function(e) {
                    touchEndX = e.changedTouches[0].screenX;
                    handleSwipe();
                });
                
                function handleSwipe() {
                    const swipeThreshold = 50;
                    if (touchEndX < touchStartX - swipeThreshold) {
                        // Swipe left, go right
                        scrollToItem(currentIndex + 1);
                    } else if (touchEndX > touchStartX + swipeThreshold) {
                        // Swipe right, go left
                        scrollToItem(currentIndex - 1);
                    }
                }
                
                // Add pixel animation effect on hover
                scrollItems.forEach(item => {
                    item.addEventListener('mouseenter', function() {
                        this.style.transform = 'translateY(-5px)';
                        this.style.transition = 'transform 0.3s cubic-bezier(0.22, 1, 0.36, 1)';
                    });
                    
                    item.addEventListener('mouseleave', function() {
                        this.style.transform = 'translateY(0)';
                    });
                });
                
                // Initialize
                updateActiveDot(0);
            });
        </script>
    </div>
</div>
@endsection

<!-- Jika ada link ke buku lain, ubah dari: -->
<a href="{{ route('book_detail', ['id' => $recentBook->id]) }}">

<!-- Menjadi: -->
<a href="{{ route('book_detail', ['id' => \App\Http\Controllers\BukuController::hashId($recentBook->id)]) }}">
