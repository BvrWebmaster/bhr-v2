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
                let page = 1;
                let loading = false;

                loadAccomodations(page);

                function loadAccomodations(page) {
                    if (loading) return;
                    loading = true;

                    $.ajax({
                        url: "{{ route('load-hotels-and-villa') }}",
                        method: "GET",
                        data: {
                            page: page
                        },
                        beforeSend: function () {
                            $('#hotels-and-villa-container').append(spinnerLoading());
                        },
                        success: function (response) {
                          if (response.data.length > 0) {
                              $('#loading').remove();
                              $.each(response.data, function (index, accomodation) {
                                  $('#hotels-and-villa-container').append(accomodationCardHotelsAndVilla(accomodation));
                              });

                              loading = false;
                          } else {
                              $('#loading').remove();
                              $('#hotels-and-villa-container').append('<div class="text-center">No more data available</div>');
                          }
                        },
                        error: function (xhr) {
                            $('#loading').remove();
                            alert('Error loading data');
                        }
                    })
                }

                $(window).scroll(function () {
                    if ($(window).scrollTop() + $(window).height() >= $(document).height() - 100) {
                        page++;
                        loadAccomodations(page);
                    }
                })

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

            function accomodationCardHotelsAndVilla(accomodation) {
                const hotelsAndVillaBaseURL = "hotels-and-villa/";

                return `
            <a href="${hotelsAndVillaBaseURL}${accomodation.slug}" class="cursor-pointer grid grid-cols-9 ">
                <div class="col-span-9 tablet:col-span-3 relative">
                    <img class="h-[200px] tablet:h-full w-full object-cover rounded-t-2xl tablet:rounded-l-2xl laptop:rounded-l-[28px] tablet:rounded-t-none tablet:rounded-tl-2xl laptop:rounded-tl-[28px]" src="${accomodation.images}" alt="${accomodation.title}" />

                </div>
                <div class="col-span-9 laptop:max-h-[286px] laptop-l:max-h-[386px] tablet:col-span-6 border border-t-[#BDBDBD] border-b-[#BDBDBD] border-r-[#BDBDBD] rounded-b-2xl tablet:rounded-r-2xl laptop-l:rounded-r-[28px] tablet:rounded-bl-none no-scrollbar">
                    <div class="px-5 laptop:px-5 laptop-l:px-10 py-3 laptop-l:py-8 space-y-6">
                        <div class="flex flex-col space-y-2">
                            <h2 class="font-sans text-[#292929] text-base tablet:text-xl laptop:text-2xl font-semibold leading-[36px]">${accomodation.name}</h2>
                            <div class="flex space-x-2 items-center">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                                  <path d="M21 10C21 17 12 23 12 23C12 23 3 17 3 10C3 7.61305 3.94821 5.32387 5.63604 3.63604C7.32387 1.94821 9.61305 1 12 1C14.3869 1 16.6761 1.94821 18.364 3.63604C20.0518 5.32387 21 7.61305 21 10Z" stroke="#7C7C7C" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                                  <path d="M12 13C13.6569 13 15 11.6569 15 10C15 8.34315 13.6569 7 12 7C10.3431 7 9 8.34315 9 10C9 11.6569 10.3431 13 12 13Z" stroke="#7C7C7C" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                                </svg>
                                <p class="font-sans text-[#7C7C7C] text-xs tablet:text-base font-medium leading-[12px] tablet:leading-[26px] tracking-[0.3px]">${accomodation.location.name}</p>
                            </div>
                        </div>
                        <div class="font-sans text-[#7C7C7C] text-xs laptop:text-base font-medium leading-[26px] tracking-[0.3px] w-full space-y-4">
                            <div class="flex space-x-2 w-full items-center">
                                <div>
                                   <div class="rounded-full py-[4.25px] px-[3px] flex items-center justify-center bg-[#FF9132]">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="10" height="8" viewBox="0 0 10 8" fill="none" class="tablet:hidden">
                                            <path d="M8.74805 5.875C8.74805 5.94604 8.72171 6.01417 8.67482 6.0644C8.62794 6.11464 8.56435 6.14286 8.49805 6.14286C8.43174 6.14286 8.36815 6.11464 8.32127 6.0644C8.27439 6.01417 8.24805 5.94604 8.24805 5.875V2.125C8.24805 1.09107 7.21305 0.25 6.24805 0.25H1.99805C1.46761 0.25 0.958906 0.475765 0.583833 0.877628C0.208761 1.27949 -0.00195312 1.82454 -0.00195312 2.39286V7.75H1.99805V5.60714H4.49805V7.75H6.49805V5.33929C6.49805 5.26825 6.52439 5.20011 6.57127 5.14988C6.61815 5.09965 6.68174 5.07143 6.74805 5.07143C6.81435 5.07143 6.87794 5.09965 6.92482 5.14988C6.97171 5.20011 6.99805 5.26825 6.99805 5.33929V6.14286C6.99805 6.5691 7.15608 6.97788 7.43739 7.27928C7.71869 7.58068 8.10022 7.75 8.49805 7.75C8.89587 7.75 9.2774 7.58068 9.55871 7.27928C9.84001 6.97788 9.99805 6.5691 9.99805 6.14286V5.07143H8.74805V5.875Z" fill="white"/>
                                        </svg>

                                        <svg xmlns="http://www.w3.org/2000/svg" width="14" height="10" viewBox="0 0 14 10" fill="none" class="hidden tablet:block">
                                            <path
                                                d="M11.9987 7.5C11.9987 7.59472 11.9636 7.68556 11.9011 7.75254C11.8386 7.81952 11.7538 7.85714 11.6654 7.85714C11.577 7.85714 11.4922 7.81952 11.4297 7.75254C11.3672 7.68556 11.332 7.59472 11.332 7.5V2.5C11.332 1.12143 9.95203 0 8.66537 0H2.9987C2.29145 0 1.61318 0.301019 1.11308 0.836838C0.612983 1.37266 0.332031 2.09938 0.332031 2.85714V10H2.9987V7.14286H6.33203V10H8.9987V6.78571C8.9987 6.69099 9.03382 6.60015 9.09633 6.53318C9.15884 6.4662 9.24363 6.42857 9.33203 6.42857C9.42044 6.42857 9.50522 6.4662 9.56773 6.53318C9.63025 6.60015 9.66537 6.69099 9.66537 6.78571V7.85714C9.66537 8.42546 9.87608 8.97051 10.2512 9.37237C10.6262 9.77424 11.1349 10 11.6654 10C12.1958 10 12.7045 9.77424 13.0796 9.37237C13.4547 8.97051 13.6654 8.42546 13.6654 7.85714V6.42857H11.9987V7.5Z"
                                                fill="white"/>
                                        </svg>
                                    </div>
                                </div>
                                <div class="flex space-x-1">
                                    <p class="font-medium">Near</p>
                                    <p class="font-semibold">Bali Zoo</p>
                                </div>
                            </div>
                        </div>

                        <div class="w-full flex space-x-1 overflow-scroll tablet:hidden">
                            ${accomodation.facilities.map(facility =>
                    `<div class="rounded-full py-1 bg-[#FFEDD3] px-2 flex justify-center items-center">
                                        <p class="font-sans text-[#FF5700] text-xs tablet:text-sm font-semibold leading-[18px]">${facility.name}</p>
                                    </div>`
                ).join('')}
                        </div>

                        <div class="flex justify-between">
                            <div>
                                <div class="hidden tablet:flex flex-wrap space-y-4 space-x-2">
                                    ${accomodation.facilities.map(facility =>`
                                      <div class="rounded-full py-1 bg-[#FFEDD3] px-4 laptop:px-4 flex justify-center items-center">
                                        <p class="text-[#FF5700] text-xs laptop:text-sm font-bold leading-[21px]">${facility.name}</p>
                                      </div>
                                    `).join('')}
                                </div>
                            </div>
                            <div class="flex flex-col space-y-1 items-start">
                                <h3 class="font-sans text-[#7C7C7C] text-xs tablet:text-base font-medium leading-[24px]">Starts from</h3>
                                <div class="flex space-x-2 items-center">
                                    <p class="font-sans line-through text-[#7C7C7C] text-xs tablet:text-base font-medium">IDR 3.456.789</p>
                                    <button class="rounded-[10px] px-1 py-[2px] bg-[#FFEDD3] text-[#FF5700] text-xs tablet:text-base font-bold leading-[18px]">
                                        -10%
                                    </button>
                                </div>
                                <p class="font-sans text-[#FF5700] text-base laptop:text-2xl font-semibold leading-[24px] tracking-[0.5px]">IDR 2.345.678</p>
                            </div>
                        </div>
                    </div>
                </div>
            </a>
        `;
            }

        </script>
    </main>
</x-guest-layout>
