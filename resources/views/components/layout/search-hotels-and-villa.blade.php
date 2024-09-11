<div class="hidden laptop:block w-full tablet:max-w-2xl laptop:max-w-4xl laptop-l:max-w-[62rem] mx-auto bg-white -mt-28 rounded-2xl">
    <div class="grid grid-cols-12">
        <div class="col-span-4 hover:bg-gray-200 py-3 px-6 cursor-pointer transform duration-300 hover:rounded-2xl">
            <div class="space-y-2"  id="container-location-destop">
                <h4 class="text-sm font-semibold leading-[21px] font-serif">Location</h4>
                <p class="text-base font-medium leading-[24px] font-serif" id="input-location-desktop">City, destination, or villa name</p>
            </div>
        </div>

        <div class="col-span-2 hover:bg-gray-200 py-3 cursor-pointer transform duration-300 hover:rounded-2xl">
            <div class="space-y-2">
                <h4 class="text-sm font-semibold leading-[21px] font-serif">Check in</h4>
                <p class="text-base font-semibold leading-[24px] font-serif" id="input-startDate-desktop">startDate</p>
            </div>
        </div>
        <div class="col-span-2 hover:bg-gray-200 py-3 cursor-pointer transform duration-300 hover:rounded-2xl">
            <div class="space-y-2">
                <h4 class="text-sm font-semibold leading-[21px] font-serif">Check out</h4>
                <p class="text-base font-semibold leading-[24px] font-serif" id="input-endDate-desktop">endDate</p>
            </div>
        </div>

        <div class="col-span-2 hover:bg-gray-200 py-3 cursor-pointer transform duration-300 hover:rounded-2xl">
            <div class="space-y-2">
                <h4 class="text-sm font-semibold leading-[21px] font-serif">Guest</h4>
                <p class="text-base text-[#888] font-semibold leading-[24px] font-serif" id="input-guest-desktop">Add Guests</p>
            </div>
        </div>

        <div class="col-span-2 flex items-center justify-center">
            <div class="flex items-center justify-center">
                <button class="bg-[#FF5700] rounded-xl py-3 px-6 transform duration-300 active:scale-95" id="btn-explore">
                    <p class="text-xl font-semibold font-serif leading-[30px] text-white">Search</p>
                </button>
            </div>
        </div>
    </div>

    <x-ui.modal.sarching-panel-destop />

    <script>
        $(document).ready(function () {
            $('#container-location-destop').click(function () {
                $('#modal-searching').fadeIn('slow');
            });
        });
    </script>
</div>
