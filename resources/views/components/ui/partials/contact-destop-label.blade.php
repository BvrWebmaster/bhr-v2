<div class="flex space-x-4 items-center">
    {{ $slot }}
    <div class="space-y-2">
        <h3 class="text-white text-sm font-bold leading-[17.5px]">{{ $label }}</h3>
        <p class="text-[#DCDCDC] text-xs font-normal leading-[15px] tracking-[1px]">{{ $description }}</p>
    </div>
</div>
