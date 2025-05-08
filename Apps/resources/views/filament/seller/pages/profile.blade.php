<x-filament::page>
    <x-filament::card>
        <x-slot name="header">
            <div class="flex items-center justify-between">
                <h2 class="text-xl font-bold text-gray-900 dark:text-white">
                    Pengaturan Profil
                </h2>
            </div>
        </x-slot>

        {{ $this->form }}

        <div class="flex justify-end mt-6">
            {{ $this->getFormActions()[0] }}
        </div>
    </x-filament::card>
</x-filament::page>
