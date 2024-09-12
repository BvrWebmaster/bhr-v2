<div class="h-full w-full tablet:max-w-2xl laptop:max-w-4xl laptop-l:max-w-7xl desktop:max-w-[1440px] mx-auto flex justify-between items-center" id="container-navigation-desktop">
    <a href='/'>
        <img id="navigation-logo" src="{{ asset('images/bhr-logo-white.png') }}" alt="logo-bhr" class="w-[135px] h-[33px] laptop-l:w-[270px] laptop-l:h-[66px]"/>
    </a>

    <div class="hidden laptop-l:flex space-x-6 items-center justify-center" id="list-navigation-desktop">
        <x-ui.label.navigation-label :label="'Hotels & Villas'" :routes="'hotels-and-villa'" :active="request()->routeIs('hotels-and-villa.index')"/>
        <x-ui.label.navigation-label :label="'Activities in Bali'" :routes="'activities'" :active="request()->routeIs('activities.index')"/>
        <x-ui.label.navigation-label :label="'Bali Stories'"  :routes="'bali-stories'" :active="request()->routeIs('bali-stories.index')"/>
        <x-ui.label.navigation-label :label="'Special Offers'" :routes="'special-offers'" :active="request()->routeIs('special-offers.index')"/>
        <x-ui.label.navigation-label :label="'Contact'" :routes="'contact'" :active="request()->routeIs('contact.index')"/>
    </div>

    <div class="tablet:flex space-x-4 items-center" >
        <div class="hidden tablet:flex laptop:hidden laptop-l:flex space-x-3" id="container-auth">
            <x-ui.button.button-login />
            <x-ui.button.button-register />
        </div>

        <x-ui.icon.toggle-button />
    </div>

    <!-- search component -->
    <div class="w-9/12 rounded-xl border border-[#BDBDBD] hidden laptop:block" id="nav-search">
        <div class="flex justify-between pr-4">
            <div class="flex">
                <div class="px-2 laptop-l:px-6 col-span-3 hover:bg-gray-200 py-2 laptop-l:pl-6 cursor-pointer transform duration-300 hover:rounded-2xl">
                    <div class="laptop-l:w-[284px] space-y-2 container-location">
                        <h4 class="text-xs laptop-l:text-sm font-semibold leading-[21px] font-serif">Location</h4>
                        <p class="text-sm laptop-l:text-base font-medium leading-[24px] font-serif" id="input-location-nav">City, destination, or villa name</p>
                    </div>
                </div>

                <div class="px-2 laptop-l:px-6 hover:bg-gray-200 py-2 cursor-pointer transform duration-300 hover:rounded-2xl">
                    <div class="space-y-2 container-start-date">
                        <h4 class="text-xs laptop-l:text-sm font-semibold leading-[21px] font-serif">Check in</h4>
                        <p class="text-sm laptop-l:text-base font-semibold leading-[24px] font-serif" id="input-startDate-nav">startDate</p>
                    </div>
                </div>
                <div class="px-2 laptop-l:px-6 hover:bg-gray-200 py-2 cursor-pointer transform duration-300 hover:rounded-2xl">
                    <div class="space-y-2 container-end-date">
                        <h4 class="text-xs laptop-l:text-sm font-semibold leading-[21px] font-serif">Check out</h4>
                        <p class="text-sm laptop-l:text-base font-semibold leading-[24px] font-serif" id="input-endDate-nav">endDate</p>
                    </div>
                </div>

                <div class="px-2 laptop-l:px-6 hover:bg-gray-200 py-2 cursor-pointer transform duration-300 hover:rounded-2xl">
                    <div class="space-y-2 container-guest">
                        <h4 class="text-xs laptop-l:text-sm font-semibold leading-[21px] font-serif">Guest</h4>
                        <p class="text-sm laptop-l:text-base text-[#888] font-semibold leading-[24px] font-serif" id="input-guest-nav">Add Guests</p>
                    </div>
                </div>
            </div>
            <div class="col-span-2 flex items-center justify-center">
                <a href="{{ route('hotels-and-villa.index') }}" class="flex items-center justify-center">
                    <div class="px-4 bg-[#FF5700] rounded-xl py-2 laptop-l:px-6 transform duration-300 active:scale-95">
                        <p class="text-base laptop-l:text-xl font-semibold font-serif leading-[30px] text-white">Search</p>
                    </div>
                </a>
            </div>
        </div>
    </div>

</div>
