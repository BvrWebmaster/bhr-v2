<div class="h-full w-full flex justify-center pt-[125px] tablet:pt-[182px] laptop-l:pt-[225px] pb-[40px]">
    <div>
        <div class="space-y-2 laptop-l:space-y-4">
            <h1 class="text-[#FFF] text-lg text-center tablet:text-3xl laptop:text-5xl laptop-l:text-6xl font-semibold leading-[90px]">Hidden Retreat for Summer</h1>
            <div class="flex items-center justify-center space-x-3 text-[#DCDCDC] text-base tablet:text-lg laptop:text-xl laptop-l:text-2xl font-medium leading-[36px]">
                <h3>April 24, 2024</h3>
                <x-ui.icon.dot-icon />
                <h3>8 min read</h3>
                <x-ui.icon.dot-icon />
                <h3>Nature</h3>
            </div>
        </div>
        <div class="w-full hidden tablet:flex justify-center">
            <div class="mt-[97px] w-[491px] laptop:w-[691px] bg-white rounded-2xl py-3 px-6 flex justify-between items-center">
                <input type="text" class="h-[30px] w-[330px] focus:outline-none" placeholder="Search Special Offers" id="input-special-offers">
                <button class="btn-search-special-offers rounded-xl py-3 px-6 bg-[#FF5700] text-white text-xl font-semibold leading-[20px] transform duration-150 active:scale-95">
                    Search
                </button>
            </div>
        </div>
    </div>

    <script>
        $(document).ready(function () {
            $('#input-special-offers').on('input', function (event) {
                $('#input-special-offers-nav').val(event.target.value);
            });

            $('#input-special-offers-nav').on('input', function (event) {
               $('#input-special-offers').val(event.target.value);
            });

           $('.btn-search-special-offers').on('click',function () {
               const inputSearch = $('#input-special-offers').val();

               $.ajax({
                   url: "{{ route('special-offers.load') }}",
                   method: "GET",
                   data: { search: inputSearch },
                   success: function (response) {
                       $('#container-special-offers').empty();

                       $.each(response, function (index, specialOffers) {
                           $('#container-special-offers').append(cardSpecialOffers(specialOffers));
                       });
                   },
                   error: function (xhr) {
                       console.log(xhr);
                   }
               });
           });
        });
    </script>
</div>
