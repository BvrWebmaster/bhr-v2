<div class="flex space-x-4">
    {{ $slot }}
    <div class="flex flex-col space-y-2">
        <h4 class="text-white text-xs font-bold leading-[15px]">{{ $label }}</h4>
        <p class="text-[#DCDCDC] text-xs font-normal leading-[15px] tracking-[1px] contact-description">{{ $description }}</p>
    </div>
</div>
