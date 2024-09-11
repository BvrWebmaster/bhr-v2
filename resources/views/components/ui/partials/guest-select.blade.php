<div class="px-4 py-4 flex justify-between items-center border-b border-[#EFEFEF]">
    <div>
        <h3 class="text-[#292929] text-lg font-semibold leading-[27px]">{{ $label }}</h3>
        <p class="text-[#7C7C7C] text-sm font-medium leading-[21px]">{{ $subLabel }}</p>
    </div>
    <div class="flex space-x-3 items-center">
        <x-ui.button.button-decrement id="{{ $idBtnDecrement }}" />
        <p class="text-[#292929] text-xl font-medium leading-[30px]" id="{{ $adultValue }}"></p>
        <x-ui.button.button-increment id="{{ $idBtnIncrement }}" />
    </div>
</div>
