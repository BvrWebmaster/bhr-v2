<header class="w-full overflow-hidden bg-white h-[705px] pt-[128px]">
   <div class="h-[576px] w-full grid grid-cols-2 gap-x-4">
       <img src="{{ $images[0]->featured_image }}" alt="{{ $images[0]->name }}" class="w-full h-full object-cover"/>
       <div class="h-full w-full grid grid-cols-2 gap-4">
           @foreach($images->slice(1,5) as $image)
               <img src="{{ $image->featured_image }}" alt="{{ $image->name }}" class="w-full h-full object-cover"/>
           @endforeach
       </div>
   </div>
</header>
