@props(['kategoris'])

<!-- Overlay for mobile filter -->
<div id="filterOverlay" class="fixed inset-0 bg-black bg-opacity-50 z-40 hidden md:hidden"></div>
<div id="filterSidebar" class="fixed top-0 left-0 h-full w-64 bg-white text-gray-800 p-6 z-50 transform -translate-x-full transition-transform duration-300 md:relative md:translate-x-0 md:z-0 md:block shadow-md border-r border-gray-100 overflow-y-auto pb-24">
    <form id="filterFormSidebar" method="GET" action="{{ route('book') }}">
    <!-- Genre Section -->
    <div class="mb-8">
        <div class="flex items-center justify-between mb-4">
            <h3 class="text-lg font-semibold">Genre</h3>
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

<script>
document.addEventListener('DOMContentLoaded', function() {
    const filterButtonMobile = document.getElementById('filterButtonMobile');
    const filterSidebar = document.getElementById('filterSidebar');
    const filterOverlay = document.getElementById('filterOverlay');
    const filterFormSidebar = document.getElementById('filterFormSidebar');
    const cancelFilterButton = document.getElementById('cancelFilterButton');

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

    // Tambahkan fungsi untuk memastikan sidebar terlihat pada desktop
    function checkSidebarVisibility() {
        if (window.innerWidth >= 768) { // md breakpoint
            filterSidebar.classList.remove('-translate-x-full');
            filterSidebar.classList.add('md:translate-x-0');
        }
    }

    // Panggil fungsi saat halaman dimuat dan saat ukuran window berubah
    window.addEventListener('load', checkSidebarVisibility);
    window.addEventListener('resize', checkSidebarVisibility);
});
</script>