<x-guest-layout>
    <main>
        <!-- special promo -->
        <section class="py-6 lg:py-7">
            <div class="max-w-full tablet:max-w-2xl laptop:max-w-4xl laptop-l:max-w-7xl mx-auto px-4 tablet:px-0 space-y-10">
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
            <div class="max-w-full tablet:max-w-2xl laptop:max-w-4xl laptop-l:max-w-7xl mx-auto px-4 tablet:px-0 space-y-6 laptop-l:space-y-10">
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
                                <x-ui.button.button-tab-accomodation index="{{ $location->id }}" title="{{ $location->name }}" active="true" />
                            @endforeach
                        </div>
                    </div>

                    <!-- accomodation list -->
                    <div class="w-full relative">
                        <div class="overflow-hidden" id="slider-container-accomodations">
                            <div class="flex gap-2 overflow-x-scroll no-scrollbar">
                                <div class=" overflow-x-scroll no-scrollbar flex items-stretch tablet:flex-row gap-x-2 static transition duration-700" id="slider-accomodations">
                                    @foreach($accomodations as $accomodation)
                                        <x-ui.card.accomodation-card-slider
                                            :name="$accomodation->name"
                                            :location="$accomodation->location->name"
                                            :oldPrice="'12 000000'"
                                            :images="$accomodation->image"
                                            :newPrice="'15 0000'"
                                            :slug="$accomodation->slug" />
                                    @endforeach
                                </div>
                            </div>
                        </div>

                        <x-ui.icon.icon-slider />
                    </div>
                </div>
            </div>
        </section>
    </main>
</x-guest-layout>
