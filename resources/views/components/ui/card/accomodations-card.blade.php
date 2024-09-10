<div class="cursor-pointer grid grid-cols-9 max-h-[386px]">
    <div class="col-span-9 tablet:col-span-3 relative">
        <img class="h-[200px] tablet:h-full w-full object-cover rounded-t-2xl tablet:rounded-l-2xl tablet:rounded-t-none tablet:rounded-tl-2xl" src="{{ $images }}" alt="{{ $title }}" />
    </div>
    <div class="col-span-9 laptop:max-h-[286px] laptop-l:max-h-[386px] tablet:col-span-6 border border-t-[#BDBDBD] border-b-[#BDBDBD] border-r-[#BDBDBD] rounded-b-2xl tablet:rounded-r-2xl tablet:rounded-bl-none no-scrollbar">
        <div class="px-5 laptop:px-5 laptop-l:px-10 py-3 laptop-l:py-8 space-y-4">
            <div class="flex flex-col space-y-[6px]">
                <x-ui.label.title-card-hotels-and-villa :label="$title" />
                <x-ui.partials.location-hotels-and-villa :location="$location" />
            </div>

            <div class="font-sans text-[#7C7C7C] text-xs laptop:text-base font-medium leading-[26px] tracking-[0.3px] w-full">
                <div class="flex space-x-2 w-full">
                    <div>
                        <x-ui.icon.bali-zoo-icon />
                    </div>
                    <div class="flex space-x-1">
                        <p class="font-medium">Near</p>
                        <p class="font-semibold">Bali Zoo</p>
                    </div>
                </div>
            </div>

            <div class="w-full flex space-x-1 overflow-scroll tablet:hidden">
                @foreach($facilities as $facility)
                    <div class="rounded-full py-1 bg-[#FFEDD3] px-2 flex justify-center items-center">
                        <p class="font-sans text-[#FF5700] text-xs tablet:text-sm font-semibold leading-[18px]">{{ $facility->name }}</p>
                    </div>
                @endforeach
            </div>
            <div class="flex justify-end tablet:justify-between">
                <div class="hidden tablet:grid grid-cols-2  gap-y-2 gap-x-2">
                    @foreach($facilities as $facility)
                        <div class="rounded-full py-1 bg-[#FFEDD3] px-4 laptop:px-4 flex justify-center items-center">
                            <p class="text-[#FF5700] text-xs laptop:text-sm font-bold leading-[21px]">{{ $facility->name }}</p>
                        </div>
                    @endforeach
                </div>

                <div class="flex flex-col space-y-1 items-start">
                    <h3 class="font-sans text-[#7C7C7C] text-xs tablet:text-base font-medium leading-[24px]">Starts from</h3>
                    <div class="flex space-x-2 items-center">
                        <p class="font-sans line-through text-[#7C7C7C] text-xs tablet:text-base font-medium">IDR 3.456.789</p>
                        <button class="rounded-[10px] px-1 py-[2px] bg-[#FFEDD3] text-[#FF5700] text-xs tablet:text-base font-bold leading-[18px]">
                            -10%
                        </button>
                    </div>
                    <p class="font-sans text-[#FF5700] text-base laptop:text-2xl font-semibold leading-[24px] tracking-[0.5px]">IDR 2.345.678</p>
                </div>
            </div>
        </div>
    </div>
</div>
