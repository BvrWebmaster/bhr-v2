<div class="w-full transform duration-200 ease-in-out px-4 flex justify-between items-start" id="nav-navigation-detailed">
    <div class="w-full h-full tablet:max-w-2xl laptop:max-w-4xl laptop-l:max-w-7xl desktop:max-w-[1440px] mx-auto flex justify-between items-center">
        <a href='/'>
            <img id="navigation-logo" src="{{ asset('images/bhr-logo-black.png') }}" alt="logo-bhr" class="w-[135px] h-[33px] laptop-l:w-[270px] laptop-l:h-[66px]"/>
        </a>

        <div class="hidden laptop-l:flex space-x-6 items-center justify-center" id="list-navigation-desktop">
            <x-ui.label.navigation-label-detailed :label="'Hotels & Villas'" :routes="'hotels-and-villa'" :active="request()->routeIs('hotels-and-villa.detailed')"/>
            <x-ui.label.navigation-label-detailed :label="'Activities in Bali'" :routes="'activities'" :active="request()->routeIs('activities.index')"/>
            <x-ui.label.navigation-label-detailed :label="'Bali Stories'"  :routes="'bali-stories'" :active="request()->routeIs('bali-stories.index')"/>
            <x-ui.label.navigation-label-detailed :label="'Special Offers'" :routes="'special-offers'" :active="request()->routeIs('special-offers.index')"/>
            <x-ui.label.navigation-label-detailed :label="'Contact'" :routes="'contact'" :active="request()->routeIs('contact.index')"/>
        </div>

        <div class="tablet:flex space-x-4 items-center">
            <div class="hidden tablet:flex laptop:hidden laptop-l:flex space-x-3" id="container-auth">
                <x-ui.button.button-login />
                <x-ui.button.button-register />
            </div>

            <x-ui.icon.toggle-button />
        </div>
    </div>
</div>
