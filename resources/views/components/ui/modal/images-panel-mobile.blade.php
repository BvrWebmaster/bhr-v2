<div class="laptop:hidden h-[100vh] w-full bg-black fixed z-40 translate-x-full transform ease-in-out duration-300" id="image-panel-mobile">
    <button class="fixed top-10 bg-white rounded-full left-5 shadow" id="btn-back-images">
        <x-ui.icon.arrow-left-icon />
    </button>
    <div class="w-full h-full overflow-y-auto grid grid-cols-2 gap-1">
        @foreach($images as $key => $image)
            @if($key % 3 == 0)
                <img src="{{ $image->featured_image }}" alt="{{ $image->name }}" class="w-full bg-contain col-span-2">
            @else
                <img src="{{ $image->featured_image }}" alt="{{ $image->name }}" class="w-full bg-contain col-span-1">
            @endif
        @endforeach
    </div>

    <script>
        $(document).ready(function () {
            $('#btn-back-images').click(function () {
                $('#image-panel-mobile').removeClass('translate-x-0').addClass('translate-x-full');
            })
        })
    </script>
</div>
