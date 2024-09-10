<div class="space-y-3 p-4">

    <!-- location -->
    <x-layout.input-search-mobile>
        <label for="search">
            <x-ui.icon.search-icon />
        </label>
        <p class="w-full {{ is_null($location) ? 'text-[#989898] font-medium' : 'text-black font-semibold' }} text-base  leading-[24px]">{{ is_null($location) ? 'Where do you want to stay?' : $location }}</p>
    </x-layout.input-search-mobile>

    <!-- date search -->
    <x-layout.input-search-mobile>
        <label for="datetime">
            <x-ui.icon.date-search-icon />
        </label>
        <p class="w-full text-black text-base font-semibold leading-[24px]">20-01-2024</p>
    </x-layout.input-search-mobile>

    <!-- user guest -->
    <x-layout.input-search-mobile>
        <label for="datetime">
            <x-ui.icon.user-icon />
        </label>
        <p class="w-full text-black text-base font-semibold leading-[24px]">20-01-2024</p>
    </x-layout.input-search-mobile>

    <x-ui.button.button-search-mobile />
</div>
