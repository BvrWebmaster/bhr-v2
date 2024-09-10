<div class="h-full bottom-0 mt-5 pt-4 w-full bg-black/50 fixed z-30 space-y-2 translate-y-full"
     id="panel-hotels-and-villa">
    <div class="h-[70vh] bg-white fixed bottom-0 w-full  rounded-t-2xl overflow-scroll no-scrollbar space-y-4 p-4" id="container-hotels-and-villa">
        <div id="btn-close-hotels-and-villa">
            <x-ui.icon.close-icon-black />
        </div>
        <x-layout.filter-layout>
            <x-ui.label.header-checkbox-filter label="Facilities" subLabel="Essential amenities" />
            <div class="flex flex-col space-y-3 transition-max-height duration-700 ease-in-out">
                @foreach($facilities as $facility)
                    <x-ui.label.cekbox-filter-hotels-and-villa :label="$facility->name" :title="$facility->name" :index="$facility->id"/>
                @endforeach
            </div>
        </x-layout.filter-layout>
    </div>
</div>
