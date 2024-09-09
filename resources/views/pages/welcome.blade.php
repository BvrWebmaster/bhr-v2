<x-guest-layout>
    <main>
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
    </main>
</x-guest-layout>
