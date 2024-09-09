<div class="hidden h-full w-full tablet:max-w-2xl laptop:max-w-4xl laptop-l:max-w-7xl mx-auto laptop-l:flex justify-between">
    <a href='/'>
        <img id="navigation-logo" src="{{ asset('images/bhr-logo-white.png') }}" alt="logo-bhr" class="w-[270px]"/>
    </a>

    <div class="flex space-x-6 items-center justify-center">
        <x-ui.label.navigation-label :label="'Hotels & Villas'" :routes="'hotels-and-villa'" :active="request()->routeIs('hotels-and-villa')"/>
        <x-ui.label.navigation-label :label="'Activities in Bali'" :routes="'#'" :active="request()->routeIs('#')"/>
        <x-ui.label.navigation-label :label="'Bali Stories'"  :routes="'bali-stories'" :active="request()->route('bali-stories')"/>
        <x-ui.label.navigation-label :label="'Special Offers'" :routes="'#'" :active="request()->routeIs('#')"/>
        <x-ui.label.navigation-label :label="'Contact'" :routes="'#'" :active="request()->routeIs('#')"/>
    </div>

    <div class="hidden laptop:flex space-x-4 items-center">
        <x-ui.button.button-login />
        <x-ui.button.button-register />
    </div>
</div>
