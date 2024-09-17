<x-ui.modal.images-panel-mobile :images="$images"/>

<x-ui.modal.image-panel-desktop :images="$images"/>

<header class="w-full overflow-hidden h-[320px] laptop:h-[705px] pt-8">
    <div class="pb-4 w-full">
        <x-layout.navigation-detailed />
    </div>
    <div class="h-[250px] laptop:h-[576px] w-full laptop:grid laptop:grid-cols-2 laptop:gap-2 laptop-l:gap-x-4">
       <img src="{{ $images[0]->featured_image }}" alt="{{ $images[0]->name }}" class="w-full h-full object-cover show-hotels-and-villa-desktop image-list  cursor-pointer" data-images-panel="{{ $images[0] }}"/>
       <div class="h-[70px] laptop:h-full w-full laptop:grid laptop:grid-cols-2 laptop:gap-2 laptop-l:gap-4 flex">
           @foreach($images->slice(1,4) as $key => $image)
               @if($key === 4)
                   <div class="brightness-50 bg-black w-full h-full cursor-pointer show-hotels-and-villa-mobile show-hotels-and-villa-desktop image-list " data-images-panel="{{ $image }}">
                       <img src="{{ $image->featured_image }}" alt="{{ $image->name }}" class="w-full h-full object-cover relative"/>
                       <p class="text-white laptop:text-2xl top-1/2 absolute text-xs">Show All Images</p>
                   </div>
               @else
                   <img src="{{ $image->featured_image }}" alt="{{ $image->name }}" class="w-full h-full object-cover cursor-pointer show-hotels-and-villa-desktop image-list" data-images-panel="{{ $image }}"/>
               @endif
           @endforeach
       </div>
   </div>

    <x-ui.modal.modal-login />

    <x-ui.modal.get-started-modal />

    <script>
        $(document).ready(function () {
            // logic show panel
           $('.show-hotels-and-villa-mobile').click(function () {
               $('#image-panel-mobile').addClass('translate-x-0').removeClass('translate-x-full');
           });

           $('.show-hotels-and-villa-desktop').click(function () {
               $('#image-panel-desktop').toggleClass('laptop:flex');
           });

           $('.image-list').click(function () {
               let images = $(this).data('images-panel');
               const imageFeatured = images.featured_image;

               $('#list-images-container').html(`
                        <img src="${imageFeatured}" alt="" class="w-full object-cover">
                 `);
           })
        });
    </script>
</header>
