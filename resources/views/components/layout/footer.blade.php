<footer class="bg-[#292929]">
    <div class="w-full tablet:max-w-2xl laptop:max-w-4xl laptop-l:max-w-7xl desktop:max-w-[1440px] mx-auto pt-6 laptop:pt-8 space-y-6">
        <div class="hidden laptop:grid laptop:grid-cols-9 laptop-l:grid-cols-11 desktop:grid-cols-12">
           <div class="space-y-8 laptop:col-span-3 laptop-l:col-span-5 desktop:col-span-6">
               <img src="{{ asset('images/bhr-logo-white.png') }}" alt="bhr logo" class="w-[270px] h-[66px]" />
               <div class="hidden laptop:block space-y-4">
                   <x-ui.label.text-header-footer label="About BVR Bali Holiday Rentals" />
                   <x-ui.label.text-description-bhr />
               </div>
           </div>

            <div class="laptop:col-start-5 laptop:col-span-6  laptop-l:col-start-7 laptop-l:col-span-5 desktop:col-start-8 desktop:col-span-6 flex space-x-12  laptop-l:space-x-[128px]">
                <div class="flex flex-col space-y-3">
                    <x-ui.label.text-header-footer label="Useful Links" />
                    <div>
                        <x-ui.label.navigation-footer label="Home" routes="welcome" />
                        <x-ui.label.navigation-footer label="Hotels & Villa" routes="hotels-and-villa.index" />
                        <x-ui.label.navigation-footer label="Activities" routes="activities.index"/>
                        <x-ui.label.navigation-footer label="Stories" routes="bali-stories.index"/>
                        <x-ui.label.navigation-footer label="Package / Special Offer" routes="special-offers.index" />
                    </div>
                </div>

                <div class="flex flex-col space-y-[18px]">
                    <x-ui.label.text-header-footer label="Contact Us" />
                    <div class="space-y-6">
                        <x-ui.label.text-address />
                        <x-ui.partials.contact-destop-label label="WhatsApp" description="+62 857 3893 0043">
                            <x-ui.icon.whatsapp-icon />
                        </x-ui.partials.contact-destop-label>

                        <x-ui.partials.contact-destop-label label="Support" description="baliholidayrental@bvrgroup.com">
                            <x-ui.icon.message-destop-icon />
                        </x-ui.partials.contact-destop-label>

                       <div class="space-y-4">
                           <x-ui.label.text-header-footer label="Connect with Us" />
                           <div class="flex space-x-4">
                               <x-ui.icon.fb-destop-icon />
                               <x-ui.icon.ig-destop-icon />
                           </div>
                       </div>
                    </div>
                </div>
            </div>
        </div>


        <!-- section mobile -->
        <div class="space-y-6 px-4 laptop:hidden">
            <img src="{{ asset('images/bhr-logo-white.png') }}" alt="bhr logo" class="w-[130px] laptop:w-[270px] h-[32px] laptop:h-[66px]" />
            <div class="w-full space-y-6 laptop:hidden">
                <div class="space-y-4">
                    <p class="text-white leading-[18px] text-xs font-bold text-justify">Contact Us</p>
                    <div class="space-y-4">
                        <x-ui.partials.contact-label label="WhatsApp" description="+62 857 3893 0043">
                            <x-ui.icon.message-icon />
                        </x-ui.partials.contact-label>

                        <x-ui.partials.contact-label label="Support" description="baliholidayrental@bvrgroup.com">
                            <x-ui.icon.suppport-icon />
                        </x-ui.partials.contact-label>

                        <x-ui.partials.contact-label
                            label="Address"
                            description="Gg. Meduri No.5, Seminyak, Kec. Kuta Utara,
Kabupaten Badung, Bali 80236">
                            <x-ui.icon.location-icon />
                        </x-ui.partials.contact-label>

                    </div>
                </div>
                <div class="space-y-4">
                    <h4 class="text-white text-justify text-xs font-bold leading-[18px]">Connect with Us</h4>
                    <div class="flex space-x-4">
                        <x-ui.icon.fb-icon />
                        <x-ui.icon.ig-icon />
                    </div>
                </div>
            </div>
        </div>

        <!-- section mobile -->
        <div class="space-y-4 px-4 laptop:hidden">
            <h4 class="text-white text-justify text-xs font-bold leading-[18px]">Useful Links</h4>
            <div class="flex flex-col">
                <x-ui.label.navigation-footer label="Home" routes="welcome"/>
                <x-ui.label.navigation-footer label="Hotels & Villa" routes="hotels-and-villa.index" />
                <x-ui.label.navigation-footer label="Activities" routes="activities.index"/>
                <x-ui.label.navigation-footer label="Stories" routes="bali-stories.index"/>
                <x-ui.label.navigation-footer label="Package / Special Offer" routes="special-offers.index"/>
            </div>
        </div>
    </div>

    <x-ui.icon.footer-icon />
</footer>
