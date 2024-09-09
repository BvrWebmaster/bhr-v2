@props(['index', 'title', 'active' => false])

@php
    $cekActiveBorder = $active ? 'border-[#FF5700] bg-[#FFF7EC]': 'border-[#BDBDBD]';
    $cekActiveText = $active  ? 'text-[#FF5700]' : 'text-[#989898]';
@endphp

<div class="flex items-center justify-center px-4 py-2 rounded-[50px] border cursor-pointer {{ $cekActiveBorder }} transform duration-300">
    <div class="text-base font-semibold {{ $cekActiveText }} leading-6">
        {{ $title }}
    </div>
</div>
