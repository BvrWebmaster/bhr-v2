{!! seo($seoData) !!}

<x-app-layout>

    <header class="w-full overflow-hidden h-[390px] laptop:h-[640px] laptop-l:h-[686px] pt-4 laptop:pt-8">
        <div class="pb-4 w-full">
            <x-layout.navigation-detailed />
        </div>

        <div class="h-[232px] laptop:h-[546px] laptop-l:h-[566px] w-full laptop:grid laptop:grid-cols-2 laptop:gap-2 laptop-l:gap-x-4">
            <img src="https://www.bvrbaliholidayrentals.com/storage/offerImages/6544beb7dccf7.jpg" alt="Special offers" class="w-full h-full object-cover show-hotels-and-villa-desktop image-list  cursor-pointer"/>
            <div class="h-[70px] laptop:h-full w-full laptop:grid laptop:grid-cols-2 laptop:gap-2 laptop-l:gap-4 flex">
                <img src="https://www.bvrbaliholidayrentals.com/storage/offerImages/6544beb7dccf7.jpg" alt="special offers" class="w-full h-full object-cover cursor-pointer show-hotels-and-villa-desktop image-list"/>
                <img src="https://www.bvrbaliholidayrentals.com/storage/offerImages/658a8b7bd7197.jpg" alt="special offers" class="w-full h-full object-cover cursor-pointer show-hotels-and-villa-desktop image-list"/>
                <img src="https://www.bvrbaliholidayrentals.com/storage/offerImages/658a8b7bd7197.jpg" alt="special offers" class="w-full h-full object-cover cursor-pointer show-hotels-and-villa-desktop image-list"/>
                <div class="brightness-50 laptop:brightness-100 relative w-full h-full cursor-pointer show-hotels-and-villa-mobile">
                    <img src="https://www.bvrbaliholidayrentals.com/storage/offerImages/6544beb7dccf7.jpg" alt="special offers" class="w-full h-full object-cover cursor-pointer show-hotels-and-villa-desktop image-list"/>
                    <p class="text-white text-xs laptop:text-2xl laptop:hidden left-5 top-1/2 absolute t">Show All</p>
                    <div class="hidden absolute bottom-5 py-2 right-4 px-4 rounded bg-black/60 laptop:flex items-center justify-center">
                        <p class="text-white text-base">Show All Images</p>
                    </div>
                </div>
            </div>
        </div>

    </header>

    <main>

        <!-- section title and price -->
        <x-layout.section-detail id="general-info">
            <!-- description -->
            <div class="space-y-4 pt-6 pb-6 tablet:pb-8 laptop:pb-10 laptop-l:pb-12">
                <div class="space-y-2">
                    <x-ui.label.text-header-detail :label="$specialOffer->title" />
                    <div class="flex space-x-3 items-center">
                        <x-ui.icon.checklist-icon />
                        <x-ui.label.text-detail-location label="Available 15 April - 20 April 2024" />
                    </div>
                </div>
                <div class="flex items-center space-x-8">
                    <div class="flex space-x-3 items-center">
                        <x-ui.icon.clock-gray-icon />
                        <x-ui.label.text-detail-location label="3 Days, 1 Night" />
                    </div>

                    <div class="flex space-x-3 items-center">
                        <x-ui.icon.guest-icon />
                        <x-ui.label.text-detail-location label="Max. 8 Guests" />
                    </div>
                </div>
            </div>

            <!-- price -->
            <div class="hidden space-y-4 laptop:flex flex-col justify-end laptop:pb-12">
                <button class="bg-[#FF5700] py-[13px] px-6 rounded-xl text-[#FFF] text-xl font-semibold leading-[30px]">
                    Book Now
                </button>
            </div>
        </x-layout.section-detail>

        <!-- section about -->
        <x-layout.section-detail id="about">
            <div class="py-2 tablet:py-4 laptop:py-6">
                <x-layout.layout-border-detail>
                    <x-ui.label.text-detail-header-section label="About Package" />
                    <div>
                        <p class="text-[#7C7C7C] text-sm tablet:text-base laptop:text-lg laptop-l:text-xl font-medium leading-[40px] tracking-[0.7px]">
                            Infinity8 3D2N package provides a new experience of enjoying Balinese life, just for you - right in the heart of city. Positioned strategically, it takes only 8 minutes to reach 8 different destinations. Enjoy our airport pickup service for the best trip experience. Relax in our comfortable Superior Room, designed for the modern traveler seeking tranquility. Finally, relish a floating breakfast beneath the sky, surrounded by the stunning tropical landscape. Draw your best holiday experience in paradise with the Infinity8 3 Days 2 Nights Hotel Package!
                        </p>

                    </div>
                    <x-ui.button.button-see-more id="btn-see-more-about-special-offers" label="See More" />
                </x-layout.layout-border-detail>
            </div>
        </x-layout.section-detail>

        <!-- section tearms and conditions -->
        <x-layout.section-detail id="tearms-and-condition">
            <div class="w-full py-2 tablet:py-4 laptop:py-6">
                <x-layout.layout-border-detail>
                    <x-ui.label.text-detail-header-section label="What You Get in This Package" />

                    <div class="flex flex-col space-y-4">
                        <x-ui.partials.text-tearms-and-condition-cheklist label="Room" />
                        <x-ui.partials.text-tearms-and-condition-cheklist label="Afternoon Tea" />
                        <x-ui.partials.text-tearms-and-condition-cheklist label="Floating Breakfast" />
                        <x-ui.partials.text-tearms-and-condition-cheklist label="Airport Pickup" />
                    </div>

                </x-layout.layout-border-detail>
            </div>
        </x-layout.section-detail>

        <!-- section policy -->
        <x-layout.section-detail  id="policy">
            <div class="w-full py-2 tablet:py-4 laptop:py-6">
                <x-layout.layout-border-detail>
                    <x-ui.label.text-detail-header-section label="More Info About This Package" />

                    <x-layout.layut-border-sub-detail>

                        <div class="flex space-x-4 items-center">
                            <x-ui.icon.clock-icon />
                            <x-ui.label.text-header-policy-detail label="Promo Period" />
                        </div>

                        <div class="flex space-x-[52px]">
                            <div class="flex flex-col space-y-1">
                                <x-ui.label.text-sub-header-policy label="Starts" />
                                <x-ui.label.text-header-start label="13 Apr 2024" />
                            </div>

                            <div class="flex flex-col space-y-1">
                                <x-ui.label.text-sub-header-policy label="Ends" />
                                <x-ui.label.text-header-start label="20 Apr 2024" />
                            </div>
                        </div>

                        <div>
                            <p class="overflow-hidden text-[#7C7C7C] text-ellipsis font-montserrat text-base tablet:text-lg laptop:text-xl laptop-l:text-2xl font-medium leading-[44px] tracking-[0.7px]">
                                You may be required to present valid government-issued identification at check-in, along with credit card or cash to cover deposits and incidentals. Special request may depend on hotel's availability at check-in and may cost extra fee. Special request availability is not guaranteed. Hotel may charge you additional fee for each extra person after reserved room's maximum capacity.
                            </p>
                        </div>

                    </x-layout.layut-border-sub-detail>

                    <x-layout.layut-border-sub-detail>
                        <div class="flex space-x-4 items-center">
                            <x-ui.icon.more-policy-icon />
                            <x-ui.label.text-header-policy-detail label="Terms and Conditions" />
                        </div>

                        <div class="flex flex-col space-y-4">
                            <x-ui.label.text-more-policy-special-offers label="If a customer cancels and submits a request for a refund for a transaction made using a Cashback Points coupon and the Points from the Cashback Points coupon have been given to the user, then the refund for the transaction is subject to the following terms and conditions:" />
                            <x-ui.label.text-more-policy-special-offers label="the user will get a full refund if the user has not used any of the Points granted from the Cashback Points coupon and BHR shall withdraw all BHR Points given to the user from the Cashback Points coupon; and" />
                            <x-ui.label.text-more-policy-special-offers label="if the user has used Points granted from the Cashback Points coupon, the user will receive a refund amount deducted by the amount of Points that have been used by the user as the final value of the refund that will be received by the user." />
                        </div>
                    </x-layout.layut-border-sub-detail>

                </x-layout.layout-border-detail>
            </div>
        </x-layout.section-detail>


        <x-layout.section-cta />

        <!-- section price mobile -->
        <div class="laptop:hidden fixed z-30 bottom-0 w-full py-4 bg-white rounded-t-2xl shadow">
            <div class="w-full flex justify-end px-4">
                <button class="bg-[#FF5700] py-3 px-3  rounded-xl text-[#FFF] text-base font-semibold leading-[30px]">
                    Book Now
                </button>
            </div>
        </div>
    </main>
</x-app-layout>
