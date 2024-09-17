<div class="hidden h-[100vh] w-full bg-black/70 fixed z-40 items-center justify-center" id="image-panel-desktop">
    <div class="w-[75%] bg-black/90 h-[65vh] bg-white grid grid-cols-2 gap-2 rounded-xl overflow-y-hidden">
        <div class="bg-white w-full h-full">
            <div class="border-b border-r py-4 px-3">
                <p class="text-xl">Galery</p>
            </div>
            <div class="border-r grid grid-cols-2 h-[55vh] overflow-y-auto">
                @foreach($images as $image)
                    <img src="{{ $image->featured_image }}" alt="{{ $image->name }}" class="h-full w-full images-list cursor-pointer" data-images-panel="{{ $image }}">
                @endforeach
            </div>
        </div>

        <div class="w-full h-full py-4 ">
            <div class="w-full flex justify-end px-4 py-2">
                <div id="close-image-panel">
                    <x-ui.icon.close-icon />
                </div>
            </div>

            <!-- load images -->
            <div id="list-images-container">
{{--                <img src="{{ $images[0]->featured_image }}" alt="{{ $images[0]->name }}" class="w-full object-cover">--}}
            </div>
        </div>
    </div>

    <script>
        $(document).ready(function () {

            $('#close-image-panel').click(function () {
                $('#image-panel-desktop').toggleClass('laptop:flex');
            });

            $('.images-list').click(function () {
                let images = $(this).data('images-panel');
                const imageFeatured = images.featured_image;

                $('#list-images-container').html(`
                        <img src="${imageFeatured}" alt="" class="w-full object-cover">
                 `);
            })
        })
    </script>
</div>
