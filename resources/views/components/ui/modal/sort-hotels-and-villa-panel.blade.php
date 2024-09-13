<div class="h-full bottom-0 mt-5 pt-4 w-full bg-black/50 fixed z-30 space-y-2 translate-y-full"
     id="sort-hotels-and-villa">
    <div class="h-[70vh] bg-white fixed bottom-0 w-full  rounded-t-2xl overflow-scroll no-scrollbar space-y-4 p-4" id="container-sort-hotels-and-villa">
        <div id="btn-close-sort-hotels-and-villa">
            <x-ui.icon.close-icon-black />
        </div>

        <x-layout.panel-mobile-layout>
            <x-ui.label.text-header-filter-sort />
            <div class="flex flex-col space-y-3 transition-max-height duration-700 ease-in-out" id="container-sort">
                <div class="flex items-center space-x-3">
                    <input type="radio" name="sort-recommended" class="rounded-xl accent-[#FF5700] h-3 w-3 cursor-pointer filter-location" id="mob-a-z" data-sort-id="asc"/>
                    <label for="mob-a-z" class="text-[#292929] text-sm font-medium leading-[21px] cursor-pointer">A - Z</label>
                </div>

                <div class="flex items-center space-x-3">
                    <input type="radio"  name="sort-recommended" class="rounded-xl accent-[#FF5700] h-3 w-3 cursor-pointer filter-location" id="mob-z-a" data-sort-id="desc"/>
                    <label for="mob-z-a" class="text-[#292929] text-sm font-medium leading-[21px] cursor-pointer">Z - A</label>
                </div>
            </div>
        </x-layout.panel-mobile-layout>
    </div>
</div>
