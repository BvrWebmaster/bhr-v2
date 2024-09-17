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
        <div class="pt-7 px-4 w-full tablet:max-w-2xl laptop:max-w-4xl mx-auto flex justify-start space-x-4 laptop-l:hidden">
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
                    $('#container-filter-categories').toggleClass('h-0');
                });

            });


            function accomodationCardHotelsAndVilla(accomodation) {
                const hotelsAndVillaBaseURL = "hotels-and-villa/";

                return `
            <div  class="cursor-pointer flex flex-col tablet:flex-row">
              <div class="w-full tablet:w-[40%] laptop:w-[453px] relative h-[200px] tablet:h-[286px] laptop:h-[386px] overflow-hidden slide-container-hotels">
                    ${accomodation.roomtypes.map((roomType, index) => `
                        <div class="slider-item">
                            <div class="overflow-hidden w-full flex h-full" id="slider-${index}">
                                <img class="w-full h-full object-cover transition-transform duration-[600ms] ease-in-out motion-reduce:transition-none rounded-t-2xl tablet:rounded-l-2xl laptop:rounded-l-[28px] tablet:rounded-t-none tablet:rounded-tl-2xl laptop:rounded-tl-[28px]" src="${roomType.featured_image}" alt="${roomType.name}" />
                            </div>

                            <!-- Button slide -->
                            <div class="hidden w-full absolute top-1/2 laptop:flex justify-between px-5">
                                <div class="backdrop-blur bg-black/80 rounded-[6px] prev-slide-hotels" data-slider-id="${index}">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" viewBox="0 0 32 32" fill="none">
                                        <path d="M20 24L12 16L20 8" stroke="white" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                                    </svg>
                                </div>

                                <div class="backdrop-blur bg-black/80 rounded-[6px] next-slide-hotels" data-slider-id="${index}">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" viewBox="0 0 32 32" fill="none">
                                        <path d="M12 24L20 16L12 8" stroke="white" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                                    </svg>
                                </div>
                            </div>

                            <!-- corousel -->
                            <div class="hidden w-full h-5 absolute bottom-6 laptop:flex gap-x-2 justify-center items-center">
                                <button type="button" class="bg-white w-6 h-2 rounded-full" aria-current="true" aria-label="Slide 1" data-carousel-slide-to="0"></button>
                                <button type="button" class="bg-gray-200 w-2 h-2 rounded-full" aria-current="false" aria-label="Slide 2" data-carousel-slide-to="1"></button>
                                <button type="button" class="bg-gray-200 w-2 h-2 rounded-full" aria-current="false" aria-label="Slide 3" data-carousel-slide-to="2"></button>
                            </div>
                        </div>
                    `)}
                </div>

                <a href="${hotelsAndVillaBaseURL}${accomodation.slug}" class="w-full tablet:w-[60%] laptop:w-[611px] tablet:h-[286px] laptop:h-[386px] border border-t-[#BDBDBD] border-b-[#BDBDBD] border-r-[#BDBDBD] rounded-b-2xl tablet:rounded-r-2xl laptop-l:rounded-r-[28px] tablet:rounded-bl-none no-scrollbar">
                    <div class="px-5 laptop:px-10 py-3 laptop:py-8 space-y-4 laptop:space-y-6">

                        <!-- location and name-->
                        <div class="flex flex-col space-y-2">
                            <div class="pl-[0.9px]">
                                 <h2 class="font-sans text-[#292929] text-base tablet:text-xl laptop:text-2xl font-semibold leading-[36px]">${getFirstThreeWords(accomodation.name)}</h2>
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

                        <!-- card near bali mobile -->
                        <div class="pl-[2.3px] laptop:hidden w-full overflow-x-auto items-center font-sans flex space-x-3 text-[#7C7C7C] text-xs laptop:text-base font-medium leading-[18px] laptop:leading-[26px] laptop:tracking-[0.3px] laptop:space-y-4 no-scrollbar">
                            <div class="flex flex-shrink-0 space-x-1 items-center">
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

                            <div class="flex flex-shrink-0 space-x-1 items-center">
                                <div class="bg-[#FF9132] p-[2.667px] rounded-full flex items-center justify-center">
                                    <div>
                                       <svg xmlns="http://www.w3.org/2000/svg" width="12" height="12" viewBox="0 0 12 12" fill="none">
                                          <g clip-path="url(#clip0_1430_5326)">
                                            <path d="M3.12705 0.666504C3.12705 0.666504 2.7168 3.5383 2.7168 3.94856C2.7168 4.35881 3.63987 5.17932 3.63987 5.17932L3.53731 10.6538C3.53731 11.1067 3.9049 11.3332 4.35782 11.3332C4.81075 11.3332 5.17834 11.1067 5.17834 10.6538L5.07577 5.17932C5.07577 5.17932 5.99885 4.34158 5.99885 3.94856C5.99885 3.55553 5.58859 0.666504 5.58859 0.666504H5.17834V3.33317C5.17834 3.38757 5.15672 3.43975 5.11825 3.47822C5.07979 3.51669 5.02761 3.5383 4.97321 3.5383C4.9188 3.5383 4.86663 3.51669 4.82816 3.47822C4.78969 3.43975 4.76808 3.38757 4.76808 3.33317C4.76808 3.29502 4.62695 0.666504 4.62695 0.666504H4.08869C4.08869 0.666504 3.94757 3.29502 3.94757 3.33317C3.94757 3.38757 3.92595 3.43975 3.88749 3.47822C3.84902 3.51669 3.79684 3.5383 3.74244 3.5383C3.68803 3.5383 3.63586 3.51669 3.59739 3.47822C3.55892 3.43975 3.53731 3.38757 3.53731 3.33317V0.666504H3.12705ZM7.52459 0.69235C7.28295 0.750196 7.22962 1.00907 7.22962 1.2942V10.6534C7.22962 11.1063 7.59721 11.3328 8.05013 11.3328C8.50305 11.3328 8.85792 11.1059 8.85792 10.6534C8.85792 8.5664 8.44767 7.45379 8.44767 6.40968C8.44767 5.93871 9.2809 5.33235 9.2809 3.14035C9.2809 1.79963 8.0928 0.69194 7.63987 0.69194C7.59721 0.69194 7.55905 0.683735 7.52459 0.69194V0.69235Z" fill="white"/>
                                          </g>
                                          <defs>
                                            <clipPath id="clip0_1430_5326">
                                              <rect width="10.6667" height="10.6667" fill="white" transform="translate(0.665039 0.666504)"/>
                                            </clipPath>
                                          </defs>
                                        </svg>
                                    </div>
                                </div>
                                <div class="flex space-x-1">
                                    <p class="font-medium">Near</p>
                                    <p class="font-semibold">Mrs. Sippy Bali</p>
                                </div>
                            </div>

                            <div class="flex flex-shrink-0 space-x-1 items-center">
                                <div class="bg-[#FF9132] p-[2.667px] rounded-full flex items-center justify-center">
                                    <div>
                                       <svg xmlns="http://www.w3.org/2000/svg" width="12" height="12" viewBox="0 0 12 12" fill="none">
                                          <path d="M4.13149 3.77751L4.65371 2.05529V1.55529C4.65371 1.42936 4.69638 1.32388 4.78171 1.23884C4.86704 1.1538 4.97238 1.11114 5.09771 1.11084C5.22304 1.11055 5.32867 1.15321 5.4146 1.23884C5.50053 1.32447 5.54304 1.42995 5.54216 1.55529V1.99973H6.4426V1.55529C6.4426 1.42936 6.48527 1.32388 6.5706 1.23884C6.65593 1.1538 6.76141 1.11114 6.88704 1.11084C7.01267 1.11055 7.1183 1.15321 7.20393 1.23884C7.28956 1.32447 7.33208 1.42995 7.33149 1.55529V1.99973L7.86482 3.77751H4.13149ZM1.55371 9.55529V5.99973C1.55371 5.8738 1.59638 5.76832 1.68171 5.68329C1.76704 5.59825 1.87253 5.55558 1.99816 5.55529C2.12378 5.55499 2.22941 5.59766 2.31504 5.68329C2.40067 5.76892 2.44319 5.8744 2.4426 5.99973V6.44417H9.55371V5.99973C9.55371 5.8738 9.59638 5.76832 9.68171 5.68329C9.76704 5.59825 9.87253 5.55558 9.99815 5.55529C10.1238 5.55499 10.2294 5.59766 10.315 5.68329C10.4007 5.76892 10.4432 5.8744 10.4426 5.99973V9.55529C10.4426 9.79973 10.3556 10.0091 10.1817 10.1833C10.0078 10.3575 9.79845 10.4445 9.55371 10.4442H6.88704C6.76112 10.4442 6.65564 10.4015 6.5706 10.3162C6.48556 10.2308 6.4429 10.1254 6.4426 9.99973V8.6664C6.4426 8.54047 6.39993 8.43499 6.3146 8.34995C6.22927 8.26492 6.12378 8.22225 5.99816 8.22195C5.87253 8.22166 5.76704 8.26432 5.68171 8.34995C5.59638 8.43558 5.55371 8.54106 5.55371 8.6664V9.99973C5.55371 10.1257 5.51104 10.2313 5.42571 10.3166C5.34038 10.402 5.2349 10.4445 5.10927 10.4442H2.4426C2.19816 10.4442 1.98897 10.3572 1.81504 10.1833C1.64112 10.0094 1.55401 9.80003 1.55371 9.55529ZM3.59816 5.55529L3.86482 4.6664H8.13149L8.39815 5.55529H3.59816Z" fill="white"/>
                                        </svg>
                                    </div>
                                </div>
                                <div class="flex space-x-1">
                                    <p class="font-medium">Near</p>
                                    <p class="font-semibold">Pura Petitenget</p>
                                </div>
                            </div>
                        </div>

                        <!-- card near bali destop -->
                        <div class="w-full hidden laptop:flex flex-col space-y-4">
                            <div class="flex space-x-2">
                                <div class="bg-[#FF9132] rounded-[50px] py-[7px] px-[5.33px]">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="14" height="10" viewBox="0 0 14 10" fill="none">
                                      <path d="M11.9997 7.5C11.9997 7.59472 11.9646 7.68556 11.902 7.75254C11.8395 7.81952 11.7547 7.85714 11.6663 7.85714C11.5779 7.85714 11.4932 7.81952 11.4306 7.75254C11.3681 7.68556 11.333 7.59472 11.333 7.5V2.5C11.333 1.12143 9.95301 0 8.66634 0H2.99967C2.29243 0 1.61415 0.301019 1.11406 0.836838C0.613959 1.37266 0.333008 2.09938 0.333008 2.85714V10H2.99967V7.14286H6.33301V10H8.99968V6.78571C8.99968 6.69099 9.03479 6.60015 9.09731 6.53318C9.15982 6.4662 9.2446 6.42857 9.33301 6.42857C9.42141 6.42857 9.5062 6.4662 9.56871 6.53318C9.63122 6.60015 9.66634 6.69099 9.66634 6.78571V7.85714C9.66634 8.42546 9.87706 8.97051 10.2521 9.37237C10.6272 9.77424 11.1359 10 11.6663 10C12.1968 10 12.7055 9.77424 13.0806 9.37237C13.4556 8.97051 13.6663 8.42546 13.6663 7.85714V6.42857H11.9997V7.5Z" fill="white"/>
                                    </svg>
                                </div>
                                <div class="flex space-x-1">
                                    <p class="text-[#7C7C7C] text-base font-medium leading-[24px]">Near</p>
                                    <p class="text-[#7C7C7C] text-base font-semibold leading-[24px]">Bali Zoo</p>
                                </div>
                            </div>

                            <div class="flex space-x-2">
                                <div class="bg-[#FF9132] rounded-[50px] p-1">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 16 16" fill="none">
                                      <g clip-path="url(#clip0_952_7090)">
                                        <path d="M3.69253 0C3.69253 0 3.07715 4.30769 3.07715 4.92308C3.07715 5.53846 4.46176 6.76923 4.46176 6.76923L4.30792 14.9809C4.30792 15.6603 4.8593 16 5.53869 16C6.21807 16 6.76946 15.6603 6.76946 14.9809L6.61561 6.76923C6.61561 6.76923 8.00023 5.51262 8.00023 4.92308C8.00023 4.33354 7.38484 0 7.38484 0H6.76946V4C6.76946 4.08161 6.73704 4.15987 6.67934 4.21757C6.62163 4.27527 6.54337 4.30769 6.46176 4.30769C6.38016 4.30769 6.3019 4.27527 6.24419 4.21757C6.18649 4.15987 6.15407 4.08161 6.15407 4C6.15407 3.94277 5.94238 0 5.94238 0H5.13499C5.13499 0 4.9233 3.94277 4.9233 4C4.9233 4.08161 4.89088 4.15987 4.83318 4.21757C4.77548 4.27527 4.69722 4.30769 4.61561 4.30769C4.534 4.30769 4.45574 4.27527 4.39804 4.21757C4.34034 4.15987 4.30792 4.08161 4.30792 4V0H3.69253ZM10.2888 0.0387692C9.92638 0.125538 9.84638 0.513846 9.84638 0.941538V14.9803C9.84638 15.6597 10.3978 15.9994 11.0771 15.9994C11.7565 15.9994 12.2888 15.6591 12.2888 14.9803C12.2888 11.8498 11.6735 10.1809 11.6735 8.61477C11.6735 7.90831 12.9233 6.99877 12.9233 3.71077C12.9233 1.69969 11.1411 0.0381538 10.4618 0.0381538C10.3978 0.0381538 10.3405 0.0258462 10.2888 0.0381538V0.0387692Z" fill="white"/>
                                      </g>
                                      <defs>
                                        <clipPath id="clip0_952_7090">
                                          <rect width="16" height="16" fill="white"/>
                                        </clipPath>
                                      </defs>
                                    </svg>
                                </div>
                                <div class="flex space-x-1">
                                    <p class="text-[#7C7C7C] text-base font-medium leading-[24px]">Near</p>
                                    <p class="text-[#7C7C7C] text-base font-semibold leading-[24px]">Mrs. Sippy Bali</p>
                                </div>
                            </div>

                            <div class="flex space-x-2">
                                <div class="bg-[#FF9132] rounded-[50px] p-1">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 16 16" fill="none">
                                      <path d="M5.19967 4.66651L5.98301 2.08317V1.33317C5.98301 1.14428 6.04701 0.986062 6.17501 0.858506C6.30301 0.730951 6.46101 0.666951 6.64901 0.666506C6.83701 0.666062 6.99545 0.730062 7.12434 0.858506C7.25323 0.986951 7.31701 1.14517 7.31567 1.33317V1.99984H8.66634V1.33317C8.66634 1.14428 8.73034 0.986062 8.85834 0.858506C8.98634 0.730951 9.14456 0.666951 9.33301 0.666506C9.52145 0.666062 9.6799 0.730062 9.80834 0.858506C9.93679 0.986951 10.0006 1.14517 9.99967 1.33317V1.99984L10.7997 4.66651H5.19967ZM1.33301 13.3332V7.99984C1.33301 7.81095 1.39701 7.65273 1.52501 7.52517C1.65301 7.39762 1.81123 7.33362 1.99967 7.33317C2.18812 7.33273 2.34656 7.39673 2.47501 7.52517C2.60345 7.65362 2.66723 7.81184 2.66634 7.99984V8.66651H13.333V7.99984C13.333 7.81095 13.397 7.65273 13.525 7.52517C13.653 7.39762 13.8112 7.33362 13.9997 7.33317C14.1881 7.33273 14.3466 7.39673 14.475 7.52517C14.6035 7.65362 14.6672 7.81184 14.6663 7.99984V13.3332C14.6663 13.6998 14.5359 14.0138 14.275 14.2752C14.0141 14.5365 13.7001 14.667 13.333 14.6665H9.33301C9.14412 14.6665 8.9859 14.6025 8.85834 14.4745C8.73079 14.3465 8.66679 14.1883 8.66634 13.9998V11.9998C8.66634 11.811 8.60234 11.6527 8.47434 11.5252C8.34634 11.3976 8.18812 11.3336 7.99967 11.3332C7.81123 11.3327 7.65301 11.3967 7.52501 11.5252C7.39701 11.6536 7.33301 11.8118 7.33301 11.9998V13.9998C7.33301 14.1887 7.26901 14.3472 7.14101 14.4752C7.01301 14.6032 6.85479 14.667 6.66634 14.6665H2.66634C2.29967 14.6665 1.9859 14.5361 1.72501 14.2752C1.46412 14.0143 1.33345 13.7003 1.33301 13.3332ZM4.39967 7.33317L4.79967 5.99984H11.1997L11.5997 7.33317H4.39967Z" fill="white"/>
                                    </svg>
                                </div>
                                <div class="flex space-x-1">
                                    <p class="text-[#7C7C7C] text-base font-medium leading-[24px]">Near</p>
                                    <p class="text-[#7C7C7C] text-base font-semibold leading-[24px]">Pura Petitenget</p>
                                </div>
                            </div>

                        </div>

                        <!-- mobile card -->
                        <div class="w-full flex overflow-x-auto space-x-2 relative laptop:hidden no-scrollbar">
                            ${accomodation.facilities.slice(0,5).map(facility =>
                                `<div class="flex-shrink-0 rounded-full px-2 py-1 bg-[#FFEDD3] flex justify-center items-center">
                                        <p class="font-sans text-[#FF5700] text-xs tablet:text-sm font-semibold leading-[18px]">${facility.name}</p>
                                    </div>`
                                ).join('')
                            }
                        </div>

                        <!-- destop card -->
                        <div class="h-auto flex justify-between">
                            <div class="h-full">
                                <div class="w-[281px] h-[100px] overflow-hidden hidden laptop:flex flex-wrap gap-x-2 justify-start items-center">
                                    ${accomodation.facilities.slice(0,3).map(facility =>`
                                      <div class="flex-shrink-1 rounded-full py-1 bg-[#FFEDD3] px-4 laptop:px-4 flex ">
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
                </a>
            </div>
        `;
            }

        </script>
    </main>
</x-guest-layout>
