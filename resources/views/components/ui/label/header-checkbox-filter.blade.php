<div class="flex justify-between items-start">
    <div>
        <p class="text-[#292929] text-[18px] font-semibold leading-[27px]">{{ $label }}</p>
        <p class="text-[#7C7C7C] text-sm font-medium leading-[21px]">{{ $subLabel }}</p>
    </div>
    <div class="cursor-pointer">
        <div class="transition duration-300">
            <div id="{{ $label }}">
                <x-ui.icon.arrow-bottom-icon id="btn-{{ $label }}" />
            </div>
        </div>
    </div>
</div>
