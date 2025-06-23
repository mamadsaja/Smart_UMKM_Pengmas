@props(['number' => '6281414141927', 'message' => 'Mau Tanya dong bang'])

<div x-data="{ open: false }" class="fixed bottom-6 right-6 z-50">
    <button 
        @click="open = !open" 
        class="bg-[#16BE45] p-3 rounded-full shadow-lg hover:scale-110 transition duration-300"
    >
        <img src="https://img.icons8.com/color/48/000000/whatsapp.png" class="w-7 h-7" alt="WhatsApp" />
    </button>

    <div 
        x-show="open" 
        x-transition:enter="transition ease-out duration-300"
        x-transition:enter-start="opacity-0 transform scale-95"
        x-transition:enter-end="opacity-100 transform scale-100"
        x-transition:leave="transition ease-in duration-200"
        x-transition:leave-start="opacity-100 transform scale-100"
        x-transition:leave-end="opacity-0 transform scale-95"
        class="mt-2 w-80 bg-white rounded-xl shadow-xl border border-gray-200 absolute bottom-16 right-0"
        @click.away="open = false"
        style="display: none;"
    >
        <div class="flex items-center justify-between p-4 bg-[#16BE45] text-white rounded-t-xl">
            <div class="flex items-center gap-2">
                <img src="https://randomuser.me/api/portraits/women/68.jpg" class="w-8 h-8 rounded-full" alt="Admin" />
                <span class="font-semibold">Admin</span>
            </div>
            <button @click="open = false" class="text-white text-xl hover:text-gray-200 transition">&times;</button>
        </div>

        <div class="p-4 bg-gray-50">
            <div class="bg-white text-sm p-3 rounded-lg shadow w-max mb-3">
                <strong>Admin</strong><br />
                Mau Tanya? Silahkan
            </div>
            <a 
                href="https://wa.me/{{ $number }}?text={{ urlencode($message) }}"
                target="_blank"
                class="w-full flex items-center justify-center gap-2 bg-[#16BE45] text-white font-semibold py-2 rounded-full hover:bg-green-600 transition duration-300"
            >
                <img src="https://img.icons8.com/ios-filled/24/ffffff/whatsapp.png" alt="WhatsApp" />
                Start Chat
            </a>
        </div>
    </div>
</div>