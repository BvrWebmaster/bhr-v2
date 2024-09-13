{!! seo($seoData) !!}

<x-guest-layout>
    <main>
        <!-- searching mobile -->
        <div class="-mt-4 w-full bg-white laptop:hidden rounded-t-[20px]">
            <x-layout.search-and-villa-mobile />
        </div>

        <!-- panel searching mobile -->
        <x-ui.modal.searching-panel-mobile />

        <!-- special promo -->
        <section class="py-6 lg:py-7" id="section-promo">
            <div class="max-w-full tablet:max-w-2xl laptop:max-w-4xl laptop-l:max-w-7xl desktop:max-w-[1440px] mx-auto px-4 tablet:px-0 space-y-10">
                <div class="space-y-2">
                    <div class="flex items-center space-x-3">
                        <x-ui.icon.percent-icon />
                        <x-ui.label.thrid-heading :label="'Don`t miss our special promo'"/>
                    </div>
                    <x-ui.label.sub-heading :label="'Here are some promo that we have made special for you. Pick before it expires!'" />
                </div>
                <div class="flex flex-col tablet:flex-row gap-4">
                    @foreach($promos as $promo)
                        <x-ui.card.promo-card :label="$promo" :image="$promo" />
                    @endforeach
                </div>
            </div>
        </section>

        <!-- accomodations section -->
        <section class="w-full py-7">
            <div class="max-w-full tablet:max-w-2xl laptop:max-w-4xl laptop-l:max-w-7xl desktop:max-w-[1440px] mx-auto px-4 tablet:px-0 space-y-6 laptop-l:space-y-10">
                <div class="space-y-4">
                    <div class="space-y-2">
                        <div class="flex items-center space-x-3">
                            <x-ui.icon.flame-icon />
                            <x-ui.label.thrid-heading :label="'Hottest Accomodation in Bali'" />
                        </div>
                        <x-ui.label.sub-heading :label="'Here are some promo that we have made special for you. Pick before it expires!'" />
                    </div>

                    <!-- button tabbar -->
                    <div class="max-w-full tablet:max-w-2xl laptop:max-w-4xl laptop-l:max-w-7xl">
                        <div class="flex space-x-2 overflow-x-scroll no-scrollbar">
                            @foreach($locations as $location)
                                <x-ui.button.button-tab-accomodation
                                    index="{{ $location->id }}"
                                    title="{{ $location->name }}"
                                    active="{{ $location->id == $activeLocation ? true : false }}" />
                            @endforeach
                        </div>
                    </div>

                    <!-- accomodation list -->
                    <div class="w-full relative">
                        <div class="overflow-hidden" id="slider-container-accomodations">
                            <!-- load accomodation -->
                            <div class="flex items-stretch md:flex-row space-x-1 static transition duration-700" id="slider-accomodations"></div>
                        </div>
                        <x-ui.icon.icon-slider id="btn-next-accomodation" />
                        <x-ui.icon.icon-slider-prev id="btn-prev-accomodation" />
                    </div>
                    <div>
                        <x-ui.label.text-orange-button label="See More Accomodations" routes="hotels-and-villa.index"/>
                    </div>
                </div>
            </div>
        </section>

        <!-- activities section -->
        <section class="py-7 w-full">
            <div class="max-w-full tablet:max-w-2xl laptop:max-w-4xl laptop-l:max-w-7xl desktop:max-w-[1440px] mx-auto px-4 tablet:px-0 space-y-6">
                <div class="space-y-6">
                    <div class="space-y-2">
                        <div class="flex items-center space-x-3">
                            <x-ui.icon.trending-icon />
                            <x-ui.label.thrid-heading :label="'Trending Activities in Bali'" />
                        </div>
                        <p class="text-sm tablet:text-base font-medium text-[#7C7C7C]">
                            We serve you villa, resort, and hotel for your convenience in Bali - The Land of Gods
                        </p>
                    </div>
                </div>
                <div class="w-full relative">
                    <div class="overflow-hidden" id="slider-container-activities">
                        <div class="flex items-stretch md:flex-row gap-x-2 static transition duration-700" id="slider-activities">
                            @foreach($activities as $activity)
                              <div class="w-[37%] tablet:w-[30%] laptop:w-[34%] laptop-l:w-[24.4%] flex-shrink-0">
                                  <x-ui.card.activities-card-slider
                                      :images="'https://www.bvrbaliholidayrentals.com/storage/images//65b71a8b121a2.JPG'"
                                      :title="'Bali Zoo'" />
                              </div>
                            @endforeach
                        </div>

                    </div>
                    <x-ui.icon.icon-slider id="btn-next-activities"/>
                    <x-ui.icon.icon-slider-prev id="btn-prev-activities" />
                </div>
                <x-ui.label.text-orange-button label="Explore More Activities" routes="activities.index" />
            </div>
        </section>

        <!-- packages section -->
        <section class="py-6 lg:py-7">
            <div class="max-w-full tablet:max-w-2xl laptop:max-w-4xl laptop-l:max-w-7xl desktop:max-w-[1440px] mx-auto px-4 tablet:px-0 space-y-10">
                <div class="space-y-2">
                    <div class="flex items-center space-x-3">
                        <x-ui.icon.percent-icon />
                        <x-ui.label.thrid-heading :label="'Grab our special package for you'"/>
                    </div>
                    <x-ui.label.sub-heading :label="'Here are some package that we have made special for you. Grab before it expires!'" />
                </div>
                <div class="flex flex-col tablet:flex-row gap-4">
                    @foreach($promos as $promo)
                        <x-ui.card.promo-card :label="$promo" :image="$promo" />
                    @endforeach
                </div>
                <x-ui.label.text-orange-button label="See More Packages" routes="special-offers.index" />
            </div>
        </section>

        <!-- section cta -->
        <x-layout.section-cta />

        <!-- section YouTube -->
        <section class="py-7 w-full">
            <div class="max-w-full tablet:max-w-2xl laptop:max-w-4xl laptop-l:max-w-7xl desktop:max-w-[1440px] mx-auto px-4 tablet:px-0 space-y-10">
                <div class="space-y-2">
                    <div class="flex items-center space-x-3">
                        <x-ui.icon.youtube-icon />
                        <x-ui.label.thrid-heading :label="'Check our videos'" />
                    </div>
                    <p class="text-sm tablet:text-base font-medium leading-[21px] laptop:leading-[24px] text-[#7C7C7C]">
                        Here, we explore the best Bali Villas & Hotels while enjoying fun activities.
                    </p>
                </div>
                <div class="w-full relative">
                    <div class="overflow-hidden" id="container-slider-youtube">
                        <div class="flex items-stretch md:flex-row gap-x-2 static transition duration-700" id="slider-youtube">
                            @for($i = 0; $i<6; $i++)
                                <x-ui.card.youtube-card
                                    :embed="'ByzQhArnp_c'"
                                    :title="'Royal Manuaba Ubud X BVR Property'"
                                    :description="'Lorem Ipsum'" />
                            @endfor
                        </div>

                    </div>
                    <x-ui.icon.icon-slider id="btn-next-youtube"/>
                    <x-ui.icon.icon-slider-prev id="btn-prev-youtube" />
                </div>
                <div>
                    <x-ui.label.text-orange-button :label="'See More Videos'" routes="welcome" />
                </div>
            </div>
        </section>
    </main>

    <script>
        $(document).ready(function() {
            function loadAccomodations(locationId) {
                $.ajax({
                    url: "{{ route('accomodations') }}",
                    method: 'GET',
                    data: { location_id: locationId },
                    success: function(response) {
                        $('#slider-accomodations').empty();

                        $.each(response, function(index, accomodation) {
                            $('#slider-accomodations').append(cardAccomodationHome(accomodation));
                        });
                    }
                });
            }

            loadAccomodations(1);

            $('.filter-btn').on('click', function() {
                let locationId = $(this).data('location-id');

                loadAccomodations(locationId);

                $('.filter-btn').removeClass('border-[#FF5700] bg-[#FFF7EC]').addClass('border-[#BDBDBD]');
                $('.text-btn').removeClass('text-[#FF5700]').addClass('text-[#989898]');
                $(this).removeClass('border-[#BDBDBD]').addClass('border-[#FF5700] bg-[#FFF7EC]');
                $(this).find('.text-btn').removeClass('text-[#989898]').addClass('text-[#FF5700]');
            });



            // variabel of container YouTube slider
            const sliderRefYoutube = $('#container-slider-youtube');
            const btnPrevYoutube = $('#btn-prev-youtube');
            const btnNextYoutube = $('#btn-next-youtube');
            const itemWidthYoutube = sliderRefYoutube.width();
            let slidePrevYoutube = false;

            function setSlidePrevYoutube(newSlidePrev) {
                slidePrevYoutube = newSlidePrev;

                if (slidePrevYoutube) {
                    btnPrevYoutube.removeClass('hidden');
                }
            }

            function onNextSlideYoutube() {
                const maxScrollLeft = sliderRefYoutube[0].scrollWidth - sliderRefYoutube.width();

                sliderRefYoutube.animate({
                    scrollLeft: '+=' + sliderRefYoutube.width()
                }, 100, function () {
                    setSlidePrevYoutube(true);

                    if (sliderRefYoutube.scrollLeft() >= maxScrollLeft - itemWidthYoutube) {
                        btnNextYoutube.addClass('hidden');
                    }
                });
            }

            function onPrevSlideYoutube() {
                sliderRefYoutube.animate({
                    scrollLeft: '-=' + sliderRefYoutube.width()
                }, 100, function () {

                    btnNextYoutube.removeClass('hidden');

                    if (sliderRefYoutube.scrollLeft() <= sliderRefYoutube.width()) {
                        btnPrevYoutube.addClass('hidden');
                    }
                });
            }

            btnNextYoutube.on('click', onNextSlideYoutube);
            btnPrevYoutube.on('click', onPrevSlideYoutube);

            // variable of container activities slider
            const sliderRefActivities = $('#slider-container-activities');
            const btnPrevActivities = $('#btn-prev-activities');
            const btnNextActivities = $('#btn-next-activities');
            const itemWidthActivities = sliderRefActivities.width();
            let slidePrevActivities = false;

            function setSlidePrevActivities(newSlidePrev) {
                slidePrevActivities = newSlidePrev;

                if (slidePrevActivities) {
                    btnPrevActivities.removeClass('hidden');
                }
            }

            function onNextSlideActivities() {
                const maxScrollLeft = sliderRefActivities[0].scrollWidth - sliderRefActivities.width();

                sliderRefActivities.animate({
                    scrollLeft: '+=' + sliderRefActivities.width()
                }, 100, function () {
                    setSlidePrevActivities(true);

                    if (sliderRefActivities.scrollLeft() >= maxScrollLeft - itemWidthActivities) {
                        btnNextActivities.addClass('hidden');
                    }
                });
            }

            function onPrevSlideActivities() {
                sliderRefActivities.animate({
                    scrollLeft: '-=' + sliderRef.width()
                }, 100, function () {

                    btnNextActivities.removeClass('hidden');

                    if (sliderRefActivities.scrollLeft() <= sliderRefActivities.width()) {
                        btnPrevActivities.addClass('hidden');
                    }
                });
            }

            // action
            btnNextActivities.on('click', onNextSlideActivities);
            btnPrevActivities.on('click', onPrevSlideActivities);


            // variable of container accomodation slider
            const sliderRef = $('#slider-container-accomodations');
            const btnPrev = $('#btn-prev-accomodation');
            const btnNext = $('#btn-next-accomodation');
            let slidePrev = false;
            const itemWidth = sliderRef.width();

            function setSlidePrev(newSlidePrev) {
                slidePrev = newSlidePrev;

                if (slidePrev) {
                    btnPrev.removeClass('hidden');
                }
            }

            function handleNextSlider() {
                const maxScrollLeft = sliderRef[0].scrollWidth - sliderRef.width();

                sliderRef.animate({
                    scrollLeft: '+=' + sliderRef.width()
                }, 100, function () {
                    setSlidePrev(true);

                    if (sliderRef.scrollLeft() >= maxScrollLeft - itemWidth) {
                        btnNext.addClass('hidden');
                    }
                });
            }

            function handlePrevSlider() {
                sliderRef.animate({
                    scrollLeft: '-=' + sliderRef.width()
                }, 100, function () {

                    btnNext.removeClass('hidden');

                    if (sliderRef.scrollLeft() <= sliderRef.width()) {
                        btnPrev.addClass('hidden');
                    }
                });
            }

            btnNext.on('click', handleNextSlider);
            btnPrev.on('click', handlePrevSlider);
        });

        function cardAccomodationHome(accomodation) {
            const hotelsAndVillaBaseURL = "hotels-and-villa/";

            return `
                    <div class="w-[45%] tablet:w-1/3 laptop:w-[24.4%] flex-shrink-0">
                        <a href="${hotelsAndVillaBaseURL}${accomodation.slug}" class="cursor-pointer bg-white w-[167px] tablet:w-[212px] laptop-l:w-[308px] desktop:w-[348px]">
                            <img src="https://www.bvrbaliholidayrentals.com/storage/images/6544c31d6db77.jpg"
                                 alt="${accomodation.name}"
                                 class="w-full h-[104px] object-cover tablet:h-[152px] laptop:h-[152px] laptop-l:h-[225px] rounded-t-[6.58px] tablet:rounded-t-[11px] laptop-l:rounded-t-2xl">

                            <div class="px-3 py-2 tablet:px-4 tablet:py-4 desktop:py-5 desktop:px-6 space-y-4 border border-b-[#BDBDBD] border-l-[#BDBDBD] border-r-[#BDBDBD] rounded-b-[6.58px] tablet:rounded-b-[11px] laptop-l:rounded-b-2xl">
                                <div class="space-y-3">
                                    <div class="space-y-3 tablet:space-y-4">
                                        <div class="space-y-2">
                                            <h4 class="text-[#292929] text-sm tablet:text-base tablet:leading-[24px] h-16 laptop:text-base laptop-l:text-lg font-semibold leading-[23.8px] laptop:leading-[24px] laptop-l:leading-[27px]">
                                                ${accomodation.name}
                                            </h4>
                                            <p class="text-[#7C7C7C] text-xs font-medium tablet:leading-[18px] laptop-l:text-sm leading-[18px] laptop-l:leading-[21px]">
                                                ${accomodation.location.name}
                                            </p>
                                        </div>
                                        <div class="flex space-x-2 items-center">
                                            <div>
                                                <x-ui.icon.umbrella-icon />
                                            </div>
                                            <div class="text-xs laptop-l:text-sm text-[#7C7C7C]">
                                                <span class="font-medium leading-[20.4px] tablet:leading-[18px] laptop:leading-[21px]">Near</span>
                                                <span class="font-semibold tablet:leading-[18px] laptop:leading-[21px]">
                                                    ${accomodation.location.name}
                                                </span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="space-y-1">
                                        <div class="flex items-center space-x-2">
                                            <div class="line-through text-xs tablet:text-xs tablet:font-medium tablet:leading-[18px] laptop:text-sm font-medium text-[#7C7C7C] leading-[18px] laptop:leading-[21px]">
                                                IDR 1.0000.000
                                            </div>
                                            <div class="bg-[#ffedd3] w-fit px-2 py-1 rounded-[10px]">
                                                <p class="text-[#ff5700] text-xs laptop:text-sm font-bold leading-[18px] laptop:leading-[21px]">
                                                    10%
                                                </p>
                                            </div>
                                        </div>
                                        <div class="font-semibold text-sm tablet:text-base laptop:text-base laptop-l:text-xl text-[#ff5700] leading-[21px] laptop:leading-[24px] laptop-l:leading-[30px] tracking-[0.298px] tablet:tracking-[0.5px] laptop:tracking-[0.5px]">
                                            IDR 1.0000.000
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                `;
        }
    </script>
</x-guest-layout>
