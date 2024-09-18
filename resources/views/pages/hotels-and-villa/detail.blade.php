{!! seo($seoData) !!}


<x-app-layout>

    <x-layout.header-detail-layout :images="$accomodation->roomtypes" />

    <!-- body -->
    <main>

        <!-- for seaction -->
        <section class="bg-white w-full sticky top-0 shadow px-4 laptop:px-0" id="section-">
            <div class="tablet:max-w-2xl laptop:max-w-4xl laptop-l:max-w-7xl desktop:max-w-[1440px] mx-auto flex space-x-6 laptop:space-x-10">
                <div class="cursor-pointer py-4 laptop:py-6 section-link" data-target="#general-info">
                    <p class="text-[#989898] laptop:text-xl font-semibold leading-[30px]">General Info</p>
                </div>

                <div class="cursor-pointer py-4 laptop:py-6 section-link" data-target="#facilities">
                    <p class="text-[#989898] laptop:text-xl font-semibold leading-[30px]">Facilities</p>
                </div>

                <div class="cursor-pointer py-4 laptop:py-6 section-link" data-target="#location">
                    <p class="text-[#989898] laptop:text-xl font-semibold leading-[30px]">Location</p>
                </div>

                <div class="cursor-pointer py-4 laptop:py-6 section-link" data-target="#policy">
                    <p class="text-[#989898] laptop:text-xl font-semibold leading-[30px]">Policy</p>
                </div>
            </div>
        </section>

        <!-- section title and price -->
        <x-layout.section-detail id="general-info">
            <!-- description -->
            <div class="space-y-4 py-6">
                <div class="space-y-2">
                    <x-ui.label.text-header-detail :label="$accomodation->name" />
                    <div class="flex space-x-3 items-center">
                        <x-ui.icon.icon-location-detail />
                        <x-ui.label.text-detail-location :label="$accomodation->location->description" />
                    </div>
                </div>
                <div class="flex space-x-8">
                    <div class="flex space-x-3 items-center">
                        <x-ui.icon.room-icon />
                        <x-ui.label.text-detail-header-facilities label="4 Rooms" />
                    </div>
                    <div class="flex space-x-3 items-center">
                        <x-ui.icon.guest-icon />
                        <x-ui.label.text-detail-header-facilities label="Max. 8 Guest" />
                    </div>
                </div>
            </div>

            <!-- price -->
            <div class="hidden space-y-4 laptop:flex flex-col justify-end laptop:pb-12">
                <div class="w-full space-y-1 flex flex-col items-end  justify-end">
                    <p class="text-[#7C7C7C] text-base font-bold leading-[24px] tracking-[0.3px]">Start from</p>
                    <h3 class="text-[#FF5700] font-semibold text-[32px] tracking-[0.5px]">IDR {{ $accomodation->price }}</h3>
                    <p class="text-[#7C7C7C] text-base leading-[24px] tracking-[0.5px]">/room/night</p>
                </div>
                <button class="bg-[#FF5700] py-[13px] px-6 rounded-xl text-[#FFF] text-xl font-semibold leading-[30px]">
                    See Rooms
                </button>
            </div>
        </x-layout.section-detail>


        <!-- section popular facilities -->
        <x-layout.section-detail id="facilities">
            <div class="w-full grid laptop-l:grid-cols-3 gap-x-6 py-2 tablet:py-4 laptop:py-6 gap-y-3">
                <div class="laptop:col-span-2">
                    <x-layout.layout-border-detail>
                        <x-ui.label.text-detail-header-section label="Popular Facilities" />
                        <div class="w-full grid tablet:grid-cols-2 desktop:grid-cols-3 laptop-l:gap-x-16 gap-y-3">
                            @foreach($accomodation->facilities as $facility)
                                <div class="flex space-x-2 items-center">
                                    <x-ui.icon.swin-icon />
                                    <p class="text-[#7C7C7C] text-sm tablet:text-base laptop:text-lg laptop-l:text-xl font-medium leading-[30px]">
                                        {{ $facility->name }}
                                    </p>
                                </div>
                            @endforeach
                        </div>
                    </x-layout.layout-border-detail>
                </div>

                <div class="h-full laptop:col-span-2 laptop-l:col-span-1">
                    <div class="w-full h-full px-4 tablet:px-6 laptop:px-8 py-2 tablet:py-4 laptop:py-6 laptop-l:py-8 space-y-4 border rounded-2xl border-[#BDBDBD]">
                        <x-ui.label.text-detail-header-section label="Popular in the Area" />

                        <div class="flex flex-col space-y-4 laptop:space-y-6">

                            <!-- seminyak beach -->
                            <div class="flex justify-between items-center">
                                <div class="flex space-x-2 items-center laptop:space-x-4">
                                    <x-ui.partials.bali-zoo-rounded-with-icon />
                                    <x-ui.label.text-popular-in-the-area label="Seminyak Beach" />
                                </div>
                                <div>
                                    <x-ui.label.text-popular-in-the-area label="1,72 km" />
                                </div>
                            </div>

                            <!-- mrs sippy -->
                            <div class="flex justify-between items-center">
                                <div class="flex space-x-2 items-center laptop:space-x-4">
                                    <x-ui.partials.mr-spicy-icon-rounded />
                                    <x-ui.label.text-popular-in-the-area label="Mrs. Sippy Bali" />
                                </div>
                                <div>
                                    <x-ui.label.text-popular-in-the-area label="311 m" />
                                </div>
                            </div>

                            <!-- pura pettitenget -->
                            <div class="flex justify-between items-center">
                                <div class="flex space-x-2 items-center laptop:space-x-4">
                                    <x-ui.partials.pura-petitenget-icon-rounded />
                                    <x-ui.label.text-popular-in-the-area label="Pura Petitenget" />
                                </div>
                                <div>
                                    <x-ui.label.text-popular-in-the-area label="474 m" />
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </x-layout.section-detail>

        <!-- section about -->
        <x-layout.section-detail id="about">
            <div class="py-2 tablet:py-4 laptop:py-6">
                <x-layout.layout-border-detail>
                    <x-ui.label.text-detail-header-section label="About Accomodation" />
                    <div>
                        <p class="text-[#7C7C7C] text-sm tablet:text-base laptop:text-lg laptop-l:text-xl font-medium leading-[40px] tracking-[0.7px]">
                            The Yubi Boutique Villas is one of the premium private villas. All villas are equipped with private swim
                            ming pools and are provided with an open floor with a fully equipped lounge, dining and kitchenette area. The design and layout of the villa has created a comfortable and perfect solution for romantic, recreation for couples and families. This villa is the perfect choice for couples who are looking for a
                            romantic vacation or honeymoon vacation. Enjoy the most memorable night with your loved ones by staying at The Yubi Boutique Villas. This villa is a suitable lodging for those who want privacy and tranquility while on vacation.
                        </p>

                    </div>
                    <x-ui.button.button-see-more id="btn-see-more-about" label="See More" />
                </x-layout.layout-border-detail>
            </div>
        </x-layout.section-detail>

        <!-- section location -->
        <x-layout.section-detail id="location">
            <div class="w-full py-2 tablet:py-4 laptop:py-6">
                <x-layout.layout-border-detail>
                    <x-ui.label.text-detail-header-section label="Location" />
                    <div class="w-full grid laptop-l:grid-cols-3 space-y-4 laptop-l:space-y-0 laptop-l:gap-x-8">

                        <div class="h-[264px] tablet:h-[284px] laptop:h-[344px]  laptop-l:h-[364px] laptop-l:col-span-2">
                            <div id="map" class="h-full w-full rounded-2xl -z-10"></div>
                        </div>

                        <div class="h-full space-y-6">
                            <h3 class="text-[#292929] text-base tablet:text-lg laptop:text-xl laptop-l:text-2xl font-semibold leading-[36px]">
                                Nearest Destination
                            </h3>

                            <div class="w-full flex flex-col space-y-6">
                                <div class="w-full flex justify-between items-center">
                                    <div class="flex space-x-2 tablet:space-x-4 items-center">
                                        <x-ui.partials.bali-zoo-rounded-with-icon />
                                        <div class="flex flex-col space-y-1">
                                            <h3 class="text-[#7C7C7C] text-sm tablet:text-base laptop:text-lg laptop-l:text-xl font-semibold leading-[30px]">Red Ruby</h3>
                                            <p class="text-[#989898] text-sm laptop:text-base font-medium leading-[24px]">Restaurant</p>
                                        </div>
                                    </div>
                                    <div>
                                        <p class="text-[#7C7C7C] text-sm tablet:text-base laptop:text-lg laptop-l:text-xl font-medium leading-[30px]">21 m</p>
                                    </div>
                                </div>

                                <div class="w-full flex justify-between items-center">
                                    <div class="flex space-x-2 tablet:space-x-4 items-center">
                                        <x-ui.partials.mr-spicy-icon-rounded />
                                        <div class="flex flex-col space-y-1">
                                            <h3 class="text-[#7C7C7C] text-sm tablet:text-base laptop:text-lg laptop-l:text-xl font-semibold leading-[30px]">Mrs. Sippy Bali</h3>
                                            <p class="text-[#989898] text-sm laptop:text-base font-medium leading-[24px]">Lounge & Bar</p>
                                        </div>
                                    </div>
                                    <div>
                                        <p class="text-[#7C7C7C] text-sm tablet:text-base laptop:text-lg laptop-l:text-xl font-medium leading-[30px]">311 m</p>
                                    </div>
                                </div>

                                <div class="w-full flex justify-between items-center">
                                    <div class="flex space-x-2 tablet:space-x-4 items-center">
                                        <x-ui.partials.pura-petitenget-icon-rounded />
                                        <div class="flex flex-col space-y-1">
                                            <h3 class="text-[#7C7C7C] text-sm tablet:text-base laptop:text-lg laptop-l:text-xl font-semibold leading-[30px]">Pura Petitenget</h3>
                                            <p class="text-[#989898] text-sm laptop:text-base font-medium leading-[24px]">Local Attraction</p>
                                        </div>
                                    </div>
                                    <div>
                                        <p class="text-[#7C7C7C] text-sm tablet:text-base laptop:text-lg laptop-l:text-xl font-medium leading-[30px]">474 m</p>
                                    </div>
                                </div>

                                <div class="w-full flex justify-between items-center">
                                    <div class="flex space-x-2 tablet:space-x-4 items-center">
                                        <x-ui.partials.pura-petitenget-icon-rounded />
                                        <div class="flex flex-col space-y-1">
                                            <h3 class="text-[#7C7C7C] text-sm tablet:text-base laptop:text-lg laptop-l:text-xl font-semibold leading-[30px]">Kim Soo</h3>
                                            <p class="text-[#989898] text-sm laptop:text-base font-medium leading-[24px]">Supermarket</p>
                                        </div>
                                    </div>
                                    <div>
                                        <p class="text-[#7C7C7C] text-sm tablet:text-base laptop:text-lg laptop-l:text-xl font-medium leading-[30px]">474 m</p>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                    <x-ui.button.button-see-more id="open-map" label="See Maps" />
                </x-layout.layout-border-detail>
            </div>
        </x-layout.section-detail>

        <!-- section all facilities -->
        <x-layout.section-detail id="all-facilities">
            <div class="w-full py-2 tablet:py-4 laptop:py-6">
                <x-layout.layout-border-detail>
                    <x-ui.label.text-detail-header-section label="All Facilities" />
                    <div class="w-full flex flex-col laptop:flex-row space-y-10 laptop:space-y-0 laptop:space-x-[72px] items-start">
                        <x-layout.layout-all-facilities>
                            <x-ui.label.text-header-all-facilities label="General">
                                <x-ui.icon.general-icon />
                            </x-ui.label.text-header-all-facilities>

                            <div class="flex flex-col space-y-4 items-start">
                                <x-ui.label.text-all-facilities label="Restaurant" />
                                <x-ui.label.text-all-facilities label="Smoking Area" />
                                <x-ui.label.text-all-facilities label="Non-smoking Area" />
                                <x-ui.label.text-all-facilities label="Room Service" />
                                <x-ui.label.text-all-facilities label="Safety Deposit Box" />
                                <x-ui.label.text-all-facilities label="Free Wifi" />
                            </div>
                        </x-layout.layout-all-facilities>

                        <x-layout.layout-all-facilities>
                            <x-ui.label.text-header-all-facilities label="Accomodation Services">
                                <x-ui.icon.home-icon />
                            </x-ui.label.text-header-all-facilities>

                            <div class="flex flex-col space-y-4 items-start">
                                <x-ui.label.text-all-facilities label="Concierge" />
                                <x-ui.label.text-all-facilities label="Laundry Service" />
                                <x-ui.label.text-all-facilities label="Luggage Storage" />
                                <x-ui.label.text-all-facilities label="Daily Housekeeping" />
                                <x-ui.label.text-all-facilities label="24-hour Receptionist" />
                            </div>
                        </x-layout.layout-all-facilities>

                        <x-layout.layout-all-facilities>
                            <x-ui.label.text-header-all-facilities label="Transportation">
                                <x-ui.icon.transport-icon />
                            </x-ui.label.text-header-all-facilities>

                            <div class="flex flex-col space-y-4 items-start">
                                <x-ui.label.text-all-facilities label="Airport Shuttle" />
                                <x-ui.label.text-all-facilities label="Car Rental" />
                                <x-ui.label.text-all-facilities label="Free Parking" />
                                <x-ui.label.text-all-facilities label="Parking Area" />
                            </div>
                        </x-layout.layout-all-facilities>
                    </div>
                </x-layout.layout-border-detail>
            </div>
        </x-layout.section-detail>


        <!-- section policy -->
        <x-layout.section-detail  id="policy">
            <div class="w-full py-2 tablet:py-4 laptop:py-6">
                <x-layout.layout-border-detail>
                    <x-ui.label.text-detail-header-section label="Accomodation Policies" />

                    <x-layout.layut-border-sub-detail>

                        <div class="flex space-x-4 items-center">
                            <x-ui.icon.clock-icon />
                            <x-ui.label.text-header-policy-detail label="Check-in Procedure" />
                        </div>

                        <div class="flex space-x-[52px]">
                            <div class="flex flex-col space-y-1">
                                <x-ui.label.text-sub-header-policy label="Check-in" />
                                <x-ui.label.text-header-start label="From 14:00" />
                            </div>

                            <div class="flex flex-col space-y-1">
                                <x-ui.label.text-sub-header-policy label="Check-out" />
                                <x-ui.label.text-header-start label="Before 12:00" />
                            </div>
                        </div>

                        <div>
                            <p class="overflow-hidden text-[#7C7C7C] text-ellipsis font-montserrat text-base tablet:text-lg laptop:text-xl laptop-l:text-2xl font-medium leading-[44px] tracking-[0.7px]">You may be required to present valid government-issued identification at check-in, along with credit card or cash to cover deposits and incidentals. Special request may depend on hotel's availability at check-in and may cost extra fee. Special request availability is not guaranteed. Hotel may charge you additional fee for each extra person after reserved room's maximum capacity.</p>
                        </div>

                    </x-layout.layut-border-sub-detail>

                    <x-layout.layut-border-sub-detail>
                        <div class="flex space-x-4 items-center">
                            <x-ui.icon.more-policy-icon />
                            <x-ui.label.text-header-policy-detail label="More Policies" />
                        </div>

                        <div class="flex flex-col space-y-4">
                            <x-ui.partials.text-more-policy label="Children of any age are welcome" />
                            <x-ui.partials.text-more-policy label="Children aged 13 years and above are considered adults at this property" />
                            <x-ui.partials.text-more-policy label="12+ years extra bed upon request Rp 750,000 per person, per night" />
                        </div>
                    </x-layout.layut-border-sub-detail>

                </x-layout.layout-border-detail>
            </div>
        </x-layout.section-detail>


        <x-layout.section-cta />

        <!-- section price mobile -->
        <div class="laptop:hidden fixed z-30 bottom-0 w-full py-4 bg-white rounded-t-2xl shadow">
            <div class="w-full flex justify-between px-4">
                <div class="space-y-1 flex flex-col items-start">
                    <p class="text-[#7C7C7C] text-sm font-bold leading-[24px] tracking-[0.3px]">Start from</p>
                    <h3 class="text-[#FF5700] font-semibold text-lg tracking-[0.5px]">IDR {{ $accomodation->price }}</h3>
                    <p class="text-[#7C7C7C] text-sm leading-[24px] tracking-[0.5px]">/room/night</p>
                </div>
                <div class="flex items-center">
                    <button class="bg-[#FF5700] py-3 px-3  rounded-xl text-[#FFF] text-base font-semibold leading-[30px]">
                        See Rooms
                    </button>
                </div>
            </div>
        </div>
    </main>

    <script>
        window.onload = function () {
            const latitude = -8.469656;
            const longitude = 115.159928;

            const map = L.map('map', {
                center: [latitude, longitude],
                zoom: 13
            });

            const circle = L.circle([latitude, longitude], {
                color: 'red',
                fillColor: '#f03',
                fillOpacity: 0.2,
                radius: 800
            }).addTo(map);

            L.tileLayer('https://tile.openstreetmap.org/{z}/{x}/{y}.png', {
                maxZoom: 19,
                attribution: '&copy; <a href="http://www.openstreetmap.org/copyright">OpenStreetMap</a>'
            }).addTo(map);

            $('#open-map').on('click', function (event) {
                event.preventDefault();

                const maps = `https://www.google.com/maps?q=${latitude},${longitude}`;
                window.open(maps, '_blank');
            });
        };

        $(document).ready(function () {
            $('.section-link').on('click', function () {
               let target = $(this).data('target');
               $('html, body').animate({
                   scrollTop: $(target).offset().top - 100
               }, 100);
            });

            $(window).on('scroll', function () {
                let scrollPosition = $(window).scrollTop();

                $('.section').each(function () {
                    let sectionTop = $(this).offset().top - 120; // Sesuaikan dengan tinggi offset
                    let sectionBottom = sectionTop + $(this).outerHeight();
                    let sectionId = $(this).attr('id');

                    if (scrollPosition >= sectionTop && scrollPosition < sectionBottom) {
                        $('.section-link').removeClass('active').find('p').removeClass('text-[#FF5700]').addClass('text-[#989898]');
                        $('.section-link').removeClass('border-b-[5px] border-[#FF5700]');
                        $('.section-link[data-target="#' + sectionId + '"]').addClass('active').find('p').removeClass('text-[#989898]').addClass('text-[#FF5700]');
                        $('.section-link[data-target="#' + sectionId +'"]').addClass('border-b-[5px] border-[#FF5700]');
                    }
                });
            });



        })
    </script>
</x-app-layout>
