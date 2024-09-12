<x-guest-layout>
    <main>
        <!-- container searching mobile -->
        <div class="-mt-4 w-full bg-white tablet:hidden rounded-t-[20px]">
            <x-layout.search-and-villa-mobile location="Canggu" />
        </div>

        <!-- container button filter and sort mobile -->
        <div class="pt-7 px-4 w-full tablet:max-w-2xl mx-auto flex justify-start space-x-4 laptop:hidden">
            <x-ui.button.button-filter />
            <x-ui.button.button-sort />
        </div>

        <div class="py-4">
            <div class="w-full tablet:max-w-2xl laptop:max-w-4xl laptop-l:max-w-7xl desktop:max-w-[1440px] mx-auto px-4 tablet:px-0 space-y-6">
                <div class="grid grid-cols-12 gap-x-6">

                    <!-- filter panel -->
                    <section class="col-span-3">
                        <div class="col-span-12 laptop:col-span-4 laptop-l:col-span-3 space-y-5 hidden laptop-l:block sticky top-36 z-30">

                            <!-- sort accomodations -->
                            <x-layout.filter-layout>
                                <x-ui.label.text-header-filter-sort />
                                <div class="flex flex-col space-y-3 transition-max-height duration-700 ease-in-out" id="container-sort">
                                    <div class="flex items-center space-x-3">
                                        <input type="radio" name="sort-recommended" class="rounded-xl accent-[#FF5700] h-3 w-3 cursor-pointer filter-location" id="a-z" data-sort-id="asc"/>
                                        <label for="a-z" class="text-[#292929] text-sm font-medium leading-[21px] cursor-pointer">A - Z</label>
                                    </div>

                                    <div class="flex items-center space-x-3">
                                        <input type="radio"  name="sort-recommended" class="rounded-xl accent-[#FF5700] h-3 w-3 cursor-pointer filter-location" id="z-a" data-sort-id="desc"/>
                                        <label for="z-a" class="text-[#292929] text-sm font-medium leading-[21px] cursor-pointer">Z - A</label>
                                    </div>
                                </div>

                            </x-layout.filter-layout>

                            <!-- filter facilites -->
                            <x-layout.filter-layout>
                                <x-ui.label.header-checkbox-filter label="Facilities" subLabel="Essential amenities" />
                                <div class="flex flex-col space-y-3 transition-max-height duration-700 ease-in-out"  id="container-facilities">
                                    @foreach($facilities as $facility)
                                        <x-ui.label.cekbox-filter-hotels-and-villa :label="$facility->name" :title="$facility->name" :index="$facility->id" />
                                    @endforeach
                                </div>
                            </x-layout.filter-layout>

                            <!-- filter location -->
                            <x-layout.filter-layout>
                                <x-ui.label.header-checkbox-filter label="Locations" subLabel="Essential Location" />
                                <div class="flex flex-col space-y-3 transition-max-height duration-700 ease-in-out" id="container-filter-location">
                                    @foreach($locations as $location)
                                        <x-ui.label.filter-locations :label="$location->name" :title="$location->name" :index="$location->id" />
                                    @endforeach
                                </div>
                            </x-layout.filter-layout>

                        </div>
                    </section>

                    <!-- section list accomodation-->
                    <section class="col-span-12 laptop-l:col-span-9 space-y-6" id="hotels-and-villa-container"></section>

                </div>
            </div>
        </div>

        <!-- panel filter mobile -->
        <x-ui.modal.filter-hotels-and-villa-panel :facilities="$facilities" />

        <!-- panel sort mobile -->
        <x-ui.modal.sort-hotels-and-villa-panel />

        <script>
            $(document).ready(function () {
                function loadAccomodations(page) {
                    $.ajax({
                        url: "{{ route('load-hotels-and-villa') }}",
                        method: "GET",
                        data: {
                            page: page
                        },
                        success: function (response) {
                            $('#hotels-and-villa-container').empty();

                            $.each(response.data, function (index, accomodation) {
                                $('#hotels-and-villa-container').append(accomodationCardHotelsAndVilla(accomodation));
                            });
                        }
                    })
                }

                function filterAccomodation() {
                    let selectedLocation = [];
                    let selectedFacilities = [];
                    let selectedSort = $('input[name="sort-recommended"]:checked').data('sort-id');

                    $('.filter-location:checked').each(function () {
                        selectedLocation.push($(this).data('location-filter'));
                    });

                    $('.filter-facility:checked').each(function () {
                        selectedFacilities.push($(this).data('facilities-id'));
                    });

                    $.ajax({
                        url: "{{ route('load-hotels-and-villa') }}",
                        method: "GET",
                        data: {
                            location: selectedLocation,
                            facilities: selectedFacilities,
                            sortName: selectedSort,
                            page: 1
                        },
                        success: function (response) {
                            $('#hotels-and-villa-container').empty();

                            $.each(response.data, function (index, accomodation) {
                                $('#hotels-and-villa-container').append(accomodationCardHotelsAndVilla(accomodation))
                            });
                        },
                        error: function (xhr) {
                            console.log(xhr);
                        }
                    })
                }

                // filter locations
                $('.filter-location').on('click', function () {
                    filterAccomodation();
                });

                // filter facilities
                $('.filter-facility').on('click', function () {
                    filterAccomodation();
                });

                loadAccomodations(1);

                $('#btn-filter').on('click', function () {
                    $('#panel-hotels-and-villa').removeClass('translate-y-full');
                    $('#container-hotels-and-villa').removeClass('translate-y-full').addClass('translate-y-0 transform duration-500');
                });

                $('#btn-close-hotels-and-villa').on('click', function () {
                    $('#panel-hotels-and-villa').removeClass('translate-y-0').addClass('translate-y-full');
                });

                $('#btn-sort').on('click', function () {
                    $('#sort-hotels-and-villa').removeClass('translate-y-full');
                    $('#container-sort-hotels-and-villa').removeClass('translate-y-full').addClass('translate-y-0 transform duration-500');
                })

                $('#btn-close-sort-hotels-and-villa').on('click', function () {
                    $('#sort-hotels-and-villa').removeClass('translate-y-0').addClass('translate-y-full');
                });

                $('#Facilities').on('click', function () {

                   $('#btn-Facilities').toggleClass('rotate-180');

                    $('#container-facilities').toggleClass('h-0');
                });

                $('#Locations').on('click', function () {
                    $('#btn-Locations').toggleClass('rotate-180');
                    $('#container-filter-location').toggleClass('h-0');
                });

                $('#btn-sort-filter').on('click', function () {
                    $('#container-sort-filter').toggleClass('rotate-180');
                    $('#container-sort').toggleClass('h-0');
                });

                $('#Price').on('click', function () {
                    $('#btn-Price').toggleClass('rotate-180');
                })

            });
        </script>
    </main>
</x-guest-layout>
