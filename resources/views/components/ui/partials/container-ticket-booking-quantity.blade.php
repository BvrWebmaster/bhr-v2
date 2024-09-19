<div class="w-full">
    <div class="flex justify-between items-end">
        <div class="flex flex-col space-y-2">
            <h3 class="text-[#292929] text-sm tablet:text-base laptop:text-lg laptop-l:text-xl font-semibold leading-[30px]">{{ $label }}</h3>
            <p class="text-[#7C7C7C] text-sm tablet:text-base laptop:text-lg laptop-l:text-xl font-medium leading-[27px]">{{ $subLabel }}</p>
        </div>
        <div class="flex flex-col laptop:flex-row laptop:gap-x-8 justify-between items-center">
            <div class="flex flex-col items-start laptop:items-end">
                <p class="text-[#989898] text-sm laptop:text-base font-medium leading-[24px] line-through">IDR 3.456.789</p>
                <h3 class="text-[#292929] text-base laptop:text-lg laptop-l:text-xl  desktop:text-2xl font-semibold leading-[36px] tracking-[0.5px]">IDR 2.345.678</h3>
            </div>
            <div class="hidden w-[120px] laptop:flex justify-between items-center">
                <div class="{{ $btnDecrement }} transform duration-150 active:scale-95 rounded-full p-2 border border-[#DCDCDC]">
                    <x-ui.icon.minus-icon />
                </div>
                <p class="{{ $quantity }} text-[#292929] text-sm tablet:text-base laptop:text-lg laptop-l:text-xl font-medium leading-[30px]">0</p>
                <div class="{{ $btnIncrement }} transform duration-150 active:scale-95 rounded-full p-2 border border-[#DCDCDC]">
                    <x-ui.icon.plus-icon />
                </div>
            </div>
        </div>
    </div>
</div>
