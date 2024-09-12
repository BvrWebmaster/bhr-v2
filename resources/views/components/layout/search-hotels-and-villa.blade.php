<div class="hidden laptop:block w-full tablet:max-w-2xl laptop:max-w-4xl laptop-l:max-w-[1102px] mx-auto bg-white -mt-28 rounded-2xl">
   <div class="flex justify-between pr-4">
       <div class="flex">
           <div class="px-4 laptop-l:px-6 col-span-3 hover:bg-gray-200 py-3 pl-6 cursor-pointer transform duration-300 hover:rounded-2xl">
               <div class="laptop-l:w-[284px]  space-y-2"  id="container-location-destop">
                   <h4 class="text-sm font-semibold leading-[21px] font-serif">Location</h4>
                   <p class="text-base laptop-l:text-lg font-medium leading-[24px] font-serif" id="input-location-desktop">City, destination, or villa name</p>
               </div>
           </div>

           <div class="px-4 laptop-l:px-6 hover:bg-gray-200 py-3 cursor-pointer transform duration-300 hover:rounded-2xl">
               <div class="space-y-2" id="container-start-date-desktop">
                   <h4 class="text-sm font-semibold leading-[21px] font-serif">Check in</h4>
                   <p class="text-base laptop-l:text-lg font-semibold leading-[24px] font-serif" id="input-startDate-desktop">startDate</p>
               </div>
           </div>
           <div class="px-4 laptop-l:px-6 hover:bg-gray-200 py-3 cursor-pointer transform duration-300 hover:rounded-2xl">
               <div class="space-y-2" id="container-end-date-desktop">
                   <h4 class="text-sm font-semibold leading-[21px] font-serif">Check out</h4>
                   <p class="text-base laptop-l:text-lg font-semibold leading-[24px] font-serif" id="input-endDate-desktop">endDate</p>
               </div>
           </div>

           <div class="px-4 laptop-l:px-6 hover:bg-gray-200 py-3 cursor-pointer transform duration-300 hover:rounded-2xl">
               <div class="space-y-2" id="container-guest-desktop">
                   <h4 class="text-sm font-semibold leading-[21px] font-serif">Guest</h4>
                   <p class="text-base laptop-l:text-lg text-[#888] font-semibold leading-[24px] font-serif" id="input-guest-desktop">Add Guests</p>
               </div>
           </div>
       </div>
       <div class="col-span-2 flex items-center justify-center">
           <a href="{{ route('hotels-and-villa.index') }}" class="flex items-center justify-center">
               <div class="bg-[#FF5700] rounded-xl py-3 px-6 transform duration-300 active:scale-95" id="btn-explore">
                   <p class="text-xl font-semibold font-serif leading-[30px] text-white">Search</p>
               </div>
           </a>
       </div>
   </div>

    <x-ui.modal.sarching-panel-destop />

    <script>
        $(document).ready(function () {
            $('#container-location-destop').click(function () {
                $('#modal-searching').fadeIn('slow');
            });

            $('#container-start-date-desktop').click(function () {
                $('#modal-searching').fadeIn('slow');
            });

            $('#container-end-date-desktop').click(function () {
                $('#modal-searching').fadeIn('slow');
            });

            $('#container-guest-desktop').click(function () {
                $('#modal-searching').fadeIn('slow');
            });

            $('.container-location').click(function () {
                $('#modal-searching').fadeIn('slow');
            })
        });
    </script>
</div>
