<div class="image-preview-container">
    <img src="{{ $url }}" 
         alt="Preview Gambar" 
         class="w-full h-48 object-cover rounded-lg border border-gray-200"
         onerror="this.style.display='none'; this.nextElementSibling.style.display='block';">
    <div class="hidden w-full h-48 bg-gray-100 rounded-lg border border-gray-200 flex items-center justify-center text-gray-500 text-sm">
        Gagal memuat gambar
    </div>
</div> 