{!! seo($seoData) !!}

<x-guest-layout>
    <main>
        <!-- container searching mobile -->
        <div class="-mt-4 w-full bg-white tablet:hidden rounded-t-[20px]">
            <x-layout.search-and-villa-mobile  />
        </div>

        <!-- panel searching mobile -->
        <x-ui.modal.searching-panel-mobile />

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

                            <!-- filter accomodation categories -->
                            <x-layout.filter-layout>
                                <x-ui.label.header-checkbox-filter label="Accommodation" subLabel="Find your preferred stay" />
                                <div class="flex flex-col space-y-3 transition-max-height duration-700 ease-in-out" id="container-filter-categories">
                                    @foreach($accomodationCategories as $accomodationCategory)
                                        <x-ui.label.filter-categories-accomodation
                                            :label="$accomodationCategory->name"
                                            :title="$accomodationCategory->name"
                                            :index="$accomodationCategory->id" />
                                    @endforeach
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
        <x-ui.modal.filter-hotels-and-villa-panel
            :facilities="$facilities"
            :accomodationCategories="$accomodationCategories"
            :locations="$locations"
        />

        <!-- panel sort mobile -->
        <x-ui.modal.sort-hotels-and-villa-panel />

        <x-layout.section-cta />

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
                    let selectedCategoriesAccomodations = [];
                    let selectedSort = $('input[name="sort-recommended"]:checked').data('sort-id');

                    $('.filter-location:checked').each(function () {
                        selectedLocation.push($(this).data('location-filter'));
                    });

                    $('.filter-facility:checked').each(function () {
                        selectedFacilities.push($(this).data('facilities-id'));
                    });

                    $('.filter-accomodation-categories:checked').each(function () {
                        selectedCategoriesAccomodations.push($(this).data('categories-accomodation-filter'));
                    });

                    $.ajax({
                        url: "{{ route('load-hotels-and-villa') }}",
                        method: "GET",
                        data: {
                            location: selectedLocation,
                            facilities: selectedFacilities,
                            sortName: selectedSort,
                            accomodationCategories: selectedCategoriesAccomodations,
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

                // filter categories
                $('.filter-accomodation-categories').on('click', function () {
                    filterAccomodation();
                })

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
                });

                $('#Accommodation').on('click', function () {
                    $('#btn-Accommodation').toggleClass('rotate-180');
                })
            });

            function accomodationCardHotelsAndVilla(accomodation) {
                console.log(accomodation);
                const hotelsAndVillaBaseURL = "hotels-and-villa/";

                return `
            <a href="${hotelsAndVillaBaseURL}${accomodation.slug}" class="cursor-pointer grid grid-cols-9 ">
                <div class="col-span-9 tablet:col-span-3 relative">
                    <img class="h-[200px] tablet:h-full w-full object-cover rounded-t-2xl tablet:rounded-l-2xl laptop:rounded-l-[28px] tablet:rounded-t-none tablet:rounded-tl-2xl laptop:rounded-tl-[28px]" src="${accomodation.featured_image}" alt="${accomodation.title}" />
                </div>
                <div class="col-span-9 laptop:max-h-[286px] laptop-l:max-h-[386px] tablet:col-span-6 border border-t-[#BDBDBD] border-b-[#BDBDBD] border-r-[#BDBDBD] rounded-b-2xl tablet:rounded-r-2xl laptop-l:rounded-r-[28px] tablet:rounded-bl-none no-scrollbar">
                    <div class="px-5 laptop:px-5 laptop-l:px-10 py-3 laptop-l:py-8 space-y-4 laptop-l:space-y-6">

                        <!-- location -->
                        <div class="flex flex-col space-y-2">
                            <div class="pl-[0.9px]">
                                 <h2 class="font-sans text-[#292929] text-base tablet:text-xl laptop:text-2xl font-semibold leading-[36px]">${accomodation.name}</h2>
                            </div>
                            <div class="flex space-x-1 items-center">
                                <div>
                                      <div class="hidden laptop:block">
                                             <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                                              <path d="M21 10C21 17 12 23 12 23C12 23 3 17 3 10C3 7.61305 3.94821 5.32387 5.63604 3.63604C7.32387 1.94821 9.61305 1 12 1C14.3869 1 16.6761 1.94821 18.364 3.63604C20.0518 5.32387 21 7.61305 21 10Z" stroke="#7C7C7C" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                                              <path d="M12 13C13.6569 13 15 11.6569 15 10C15 8.34315 13.6569 7 12 7C10.3431 7 9 8.34315 9 10C9 11.6569 10.3431 13 12 13Z" stroke="#7C7C7C" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                                            </svg>
                                        </div>
                                        <div class="laptop:hidden">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 16 16" fill="none">
                                              <g clip-path="url(#clip0_1589_3620)">
                                                <path d="M14.498 6.66559C14.498 11.3323 8.49805 15.3323 8.49805 15.3323C8.49805 15.3323 2.49805 11.3323 2.49805 6.66559C2.49805 5.07429 3.13019 3.54817 4.25541 2.42295C5.38062 1.29773 6.90675 0.665588 8.49805 0.665588C10.0893 0.665588 11.6155 1.29773 12.7407 2.42295C13.8659 3.54817 14.498 5.07429 14.498 6.66559Z" stroke="#7C7C7C" stroke-width="1.33333" stroke-linecap="round" stroke-linejoin="round"/>
                                                <path d="M8.49902 8.66663C9.60359 8.66663 10.499 7.7712 10.499 6.66663C10.499 5.56206 9.60359 4.66663 8.49902 4.66663C7.39445 4.66663 6.49902 5.56206 6.49902 6.66663C6.49902 7.7712 7.39445 8.66663 8.49902 8.66663Z" stroke="#7C7C7C" stroke-width="1.33333" stroke-linecap="round" stroke-linejoin="round"/>
                                              </g>
                                              <defs>
                                                <clipPath id="clip0_1589_3620">
                                                  <rect width="16" height="16" fill="white" transform="translate(0.498047)"/>
                                                </clipPath>
                                              </defs>
                                            </svg>
                                        </div>
                                </div>
                                <p class="font-sans text-[#7C7C7C] text-xs tablet:text-base font-medium leading-[12px] tablet:leading-[26px] tracking-[0.3px]">${accomodation.location.name}</p>
                            </div>
                        </div>

                        <!-- card near bali -->
                        <div class="font-sans text-[#7C7C7C] text-xs laptop:text-base font-medium leading-[26px] tracking-[0.3px] space-y-4">
                            <div class="flex space-x-2 items-center pl-[2px]">
                                <div class="bg-[#FF9132] py-[4.25px] px-[3px] rounded-full flex items-center justify-center">
                                    <div>
                                        <svg xmlns="http://www.w3.org/2000/svg" width="11" height="8" viewBox="0 0 11 8" fill="none">
                                            <path d="M9.24805 5.875C9.24805 5.94604 9.22171 6.01417 9.17482 6.0644C9.12794 6.11464 9.06435 6.14286 8.99805 6.14286C8.93174 6.14286 8.86815 6.11464 8.82127 6.0644C8.77439 6.01417 8.74805 5.94604 8.74805 5.875V2.125C8.74805 1.09107 7.71305 0.25 6.74805 0.25H2.49805C1.96761 0.25 1.45891 0.475765 1.08383 0.877628C0.708761 1.27949 0.498047 1.82454 0.498047 2.39286V7.75H2.49805V5.60714H4.99805V7.75H6.99805V5.33929C6.99805 5.26825 7.02439 5.20011 7.07127 5.14988C7.11815 5.09965 7.18174 5.07143 7.24805 5.07143C7.31435 5.07143 7.37794 5.09965 7.42482 5.14988C7.47171 5.20011 7.49805 5.26825 7.49805 5.33929V6.14286C7.49805 6.5691 7.65608 6.97788 7.93739 7.27928C8.21869 7.58068 8.60022 7.75 8.99805 7.75C9.39587 7.75 9.7774 7.58068 10.0587 7.27928C10.34 6.97788 10.498 6.5691 10.498 6.14286V5.07143H9.24805V5.875Z" fill="white"/>
                                        </svg>
                                    </div>
                                </div>
                                <div class="flex space-x-1">
                                    <p class="font-medium">Near</p>
                                    <p class="font-semibold">Bali Zoo</p>
                                </div>
                            </div>

                        </div>

                        <!-- mobile card -->
                        <div class="w-full flex overflow-x-scroll space-x-2 relative tablet:hidden">
                            ${accomodation.facilities.slice(0,3).map(facility =>
                                `<div class="rounded-full px-2 py-1 bg-[#FFEDD3] flex justify-center items-center">
                                        <p class="font-sans text-[#FF5700] text-xs tablet:text-sm font-semibold leading-[18px]">${facility.name}</p>
                                    </div>`
                                ).join('')
                            }
                        </div>

                        <!-- destop card -->
                        <div class="flex justify-between">
                            <div>
                                <div class="hidden tablet:flex flex-wrap space-y-4 space-x-2">
                                    ${accomodation.facilities.slice(0,4).map(facility =>`
                                      <div class="rounded-full py-1 bg-[#FFEDD3] px-4 laptop:px-4 flex justify-center items-center">
                                        <p class="text-[#FF5700] text-xs laptop:text-sm font-bold leading-[21px]">${facility.name}</p>
                                      </div>
                                    `).join('')}
                                </div>
                            </div>
                            <div class="flex flex-col space-y-1 items-end laptop:items-start">
                                <h3 class="font-sans text-[#7C7C7C] text-xs tablet:text-base font-medium leading-[24px]">Starts from</h3>
                                <div class="flex space-x-2 items-center">
                                    <p class="font-sans line-through text-[#7C7C7C] text-xs tablet:text-base font-medium">${convertToRupiah(accomodation.price)}</p>
                                    <button class="rounded-[10px] px-1 py-[2px] bg-[#FFEDD3] text-[#FF5700] text-xs tablet:text-base font-bold leading-[18px]">
                                        -10%
                                    </button>
                                </div>
                                <p class="font-sans text-[#FF5700] text-base laptop:text-2xl font-semibold leading-[24px] tracking-[0.5px]">${convertToRupiah(accomodation.discounted_price)}</p>
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
