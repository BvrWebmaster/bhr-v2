<a href="#" class="bg-white w-[167px] tablet:w-[212px] laptop-l:w-[308px] desktop:w-[348px]">
    <img src="https://www.bvrbaliholidayrentals.com/storage/images/6544c31d6db77.jpg" alt="{{ $name }}" class="w-full h-[104px] object-cover tablet:h-[152px] laptop:h-[152px] laptop-l:h-[225px] rounded-t-[6.58px] tablet:rounded-t-[11[x] laptop-l:rounded-t-2xl">

    <div class="px-3 py-2 tablet:px-4 tablet:py-4 desktop:py-5 desktop:px-6 space-y-4 border border-b-[#BDBDBD] border-l-[#BDBDBD] border-r-[#BDBDBD] rounded-b-[7px]">
        <div class="space-y-3">
            <div class="space-y-3 tablet:space-y-4">
                <div class="space-y-2">
                    <h4 class="text-[#292929] text-sm tablet:text-base tablet:leading-[24px] laptop:text-base laptop-l:text-lg font-semibold leading-[23.8px] laptop:leading-[24px] laptop-l:leading-[27px]">
                        {{ $name }}
                    </h4>
                    <p class="text-[#7C7C7C] text-xs font-medium tablet:leading-[18px] laptop-l:text-sm   leading-[18px] laptop-l:leading-[21px]">
                        {{ $location  }}
                    </p>
                </div>
                <div class="flex space-x-2 items-center">
                    <div>
                        <x-ui.icon.umbrella-icon />
                    </div>
                    <div class="text-xs laptop-l:text-sm text-[#7C7C7C]">
                        <span class="font-medium leading-[20.4px] tablet:leading-[18px] laptop:leading-[21px]">Near</span>
                        <span class="font-semibold tablet:leading-[18px] laptop:leading-[21px]">{{ $location }}</span>
                    </div>
                </div>
            </div>
            <div class="space-y-1">
                <div class="flex items-center space-x-2">
                    <div class="line-through text-xs tablet:text-xs tablet:font-medium tablet:leading-[18px] laptop:text-sm font-medium text-[#7C7C7C] leading-[18px] laptop:leading-[21px]">
                        IDR 3.456.789
                    </div>
                    <div class="bg-[#ffedd3] w-fit px-2 py-1 rounded-[10px]">
                        <p class="text-[#ff5700] text-xs laptop:text-sm font-bold leading-[18px] laptop:leading-[21px]">10%</p>
                    </div>
                </div>
                <div class="font-semibold text-sm tablet:text-base laptop:text-base laptop-l:text-xl text-[#ff5700] leading-[21px] laptop:leading-[24px] laptop-l:leading-[30px] tracking-[0.298px] tablet:tracking-[0.5px] laptop:tracking-[0.5px]">
                    IDR 2.345.678
                </div>
            </div>
        </div>
    </div>
</a>
