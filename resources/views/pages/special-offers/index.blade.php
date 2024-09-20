{!! seo($seoData) !!}

<x-guest-layout>

    <main>

       <div class="-mt-4 w-full bg-white tablet:hidden rounded-t-[20px]">
           <x-layout.search-special-offers-mobile />
       </div>

        <section class="py-6 lg:py-7" id="section-promo">
            <div class="max-w-full tablet:max-w-2xl laptop:max-w-4xl laptop-l:max-w-7xl desktop:max-w-[1440px] mx-auto px-4 tablet:px-0 space-y-10">
                <div class="space-y-2">
                    <div class="flex items-center space-x-3">
                        <x-ui.icon.percent-icon />
                        <x-ui.label.thrid-heading :label="'Don`t miss our special promo'"/>
                    </div>
                    <x-ui.label.sub-heading :label="'Here are some promo that we have made special for you. Pick before it expires!'" />
                </div>
                <div class="grid laptop:grid-cols-2 gap-x-4 gap-y-4 laptop:gap-y-8" id="container-special-offers"></div>
            </div>
        </section>


        <section class="py-6 lg:py-7" id="section-promo">
            <div class="max-w-full tablet:max-w-2xl laptop:max-w-4xl laptop-l:max-w-7xl desktop:max-w-[1440px] mx-auto px-4 tablet:px-0 space-y-10">
                <div class="space-y-2">
                    <div class="flex items-center space-x-3">
                        <x-ui.icon.package-icon />
                        <x-ui.label.thrid-heading :label="'Enjoy Our Custom Package'"/>
                    </div>
                    <x-ui.label.sub-heading :label="'We already make customized package that suit your trip and preferences'" />
                </div>
                <div class="grid laptop:grid-cols-2 gap-x-4 gap-y-4 laptop:gap-y-8" id="container-package-promo"></div>
            </div>
        </section>


        <x-layout.section-cta />

    </main>

    <script>
        $(document).ready(function () {
            $.ajax({
                url: "{{ route('special-offers.load') }}",
                method: "GET",
                success: function (response) {
                    $('#container-special-offers').empty();

                    $.each(response, function (index, specialOffers) {
                       $('#container-special-offers').append(cardSpecialOffers(specialOffers));
                    });
                },
                error: function (xhr) {
                    console.log(xhr);
                }
            })

            $.ajax({
                url: "{{ route('special-offers.load') }}",
                method:"GET",
                success: function (response) {
                    $('#container-package-promo').empty();

                    $.each(response, function (index, specialOffers) {
                        $('#container-package-promo').append(cardSpecialOffers(specialOffers));
                    });
                }
            })
        });


        function cardSpecialOffers(specialOffers) {
            const baseUrl = 'special-offers';

            return `
                <a href="${baseUrl}/${specialOffers.slug}" class="rounded-2xl overflow-hidden h-40 tablet:h-[240px] desktop::h-[280px] w-full md:h-52">
                    <img src="${specialOffers.cover_image}" class="h-full w-full object-cover" alt="${specialOffers.title}" />
                </a>
            `;
        }
    </script>
</x-guest-layout>
