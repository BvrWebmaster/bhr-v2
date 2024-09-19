<div class="space-y-3 p-4">
    <x-layout.input-search-mobile id="search-special-offer-mobile">
        <label for="search-special-offer">
            <x-ui.icon.search-icon />
        </label>
        <input type="text" id="input-mobile-special-offer" placeholder="Search Special Offers"  class="w-full text-[#989898] font-medium text-base  leading-[24px] focus:outline-none"/>
    </x-layout.input-search-mobile>

    <button  id="btn-search-special-offers-mobile" class="transform duration-300 active:scale-95 border bg-[#FF5700] rounded-xl w-full py-3 text-white text-base font-semibold leading-[24px]">
        Search
    </button>

    <script>
        $(document).ready(function () {
           $('#btn-search-special-offers-mobile').on('click', function () {
               const inputSearch = $('#input-mobile-special-offer').val();

               $.ajax({
                   url: "{{ route('special-offers.load') }}",
                   method: "GET",
                   data: { search : inputSearch },
                   success: function (response) {
                       $('#container-special-offers').empty();

                       $.each(response, function (index, specialOffers) {
                           $('#container-special-offers').append(cardSpecialOffers(specialOffers));
                       });
                   },
                   error: function (xhr) {
                       console.log(xhr);
                   }
               })
           })
        });
    </script>
</div>
