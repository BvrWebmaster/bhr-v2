<div class="px-4 h-[100vh] backdrop-blur fixed w-full bg-black/30 z-30 hidden" id="navigation-mobile">
    <div class="backdrop-blur-2xl bg-black/50 mt-20">
        <x-ui.label.navigation-text-mobile label="Hotels & Villas" :routes="'hotels-and-villa'" :active="request()->routeIs('hotels-and-villa.index')" />
        <x-ui.label.navigation-text-mobile label="Activities in Bali" :routes="'activities'" :active="request()->routeIs('activities.index')"/>
        <x-ui.label.navigation-text-mobile label="Bali Stories" :routes="'bali-stories'" :active="request()->routeIs('bali-stories.index')"/>
        <x-ui.label.navigation-text-mobile label="Special Offers" :routes="'special-offers'" :active="request()->routeIs('special-offers.index')" />
        <x-ui.label.navigation-text-mobile label="Contact" :routes="'contact'" :active="request()->routeIs('contact.index')"/>
    </div>
</div>
