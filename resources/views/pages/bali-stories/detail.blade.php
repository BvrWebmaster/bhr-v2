{!! seo($seoData) !!}
<x-app-layout>
    <header class="w-full overflow-hidden h-[390px] laptop:h-[640px] laptop-l:h-[686px] pt-4 laptop:pt-8">
        <div class="pb-4 w-full">
            <x-layout.navigation-detailed />
        </div>

        <div class="h-[250px] laptop:h-[576px] w-full">
            <img src="https://www.bvrbaliholidayrentals.com/storage/images/64d9e2c193e28.jpg" alt="header view" class="w-full h-full object-cover show-hotels-and-villa-desktop image-list  cursor-pointer"/>
        </div>

        <x-ui.modal.modal-login />

        <x-ui.modal.get-started-modal />

    </header>


    <main>

        <section class="pt-10 pb-14 max-w-full tablet:max-w-2xl laptop:max-w-4xl laptop-l:max-w-7xl desktop:max-w-[1440px] mx-auto px-4 tablet:px-0 space-y-10">
            <x-ui.label.text-label-bali-stories-detail label="Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vestibulum eget sapien tempus, vulputate nunc ac, fermentum dolor. Fusce sollicitudin congue laoreet. Maecenas at ex eget metus dictum vestibulum et at velit. Ut ut neque tincidunt, pulvinar ligula et, vehicula lorem. Integer mattis ac tellus ac ultricies. Cras vulputate ullamcorper lacus ac pulvinar. Vivamus porttitor sapien nisl, vitae porta lacus semper eget." />
            <x-ui.label.text-label-bali-stories-detail-header label="So, where is the “Hidden Gem”?"/>
            <x-ui.label.text-label-bali-stories-detail label="Duis finibus convallis ultricies. Aliquam eleifend libero blandit enim viverra faucibus. Cras tristique mauris aposuere ullamcorper. Phasellus sit amet ante vestibulum, pellentesque lorem eget, porta orci. Proin eu faucibusmetus. Integer pellentesque sollicitudin lectus, id viverra turpis placerat quis. Cras pellentesque nisi a nuncsuscipit sodales. Interdum et malesuada fames ac ante ipsum primis in faucibus." />
            <img src="https://www.bvrbaliholidayrentals.com/storage/images//655dcdea31d2f.jpg" alt="image detial" class="w-full h-[250px] tablet:h-[350px] laptop:h-[540px] rounded-xl object-cover" />
            <x-ui.label.text-label-bali-stories-detail-header label="Conclusion"/>
            <x-ui.label.text-label-bali-stories-detail label="Sed ultrices porttitor enim non lacinia. In quis molestie nisi. Nam sit amet dolor sit amet velit tincidunt maximus. Ut finibus arcu enim, at efficitur urna ultricies eu. Ut vulputate purus in mi ultrices cursus. Duis eleifendeg estas vestibulum. Fusce placerat risus id arcu tincidunt, ut dapibus leo rhoncus. Nulla tempor lectus noncondimentum euismod. Mauris non tortor ac lectus ultricies maximus. Morbi a turpis bibendum, posuere leo feugiat, ornare ligula. Phasellus tincidunt, orci non volutpat commodo, sapien erat facilisis eros, a scelerisque risus pu." />
        </section>

        <!-- section list bali stories -->
        <section class="pt-14 pb-10 max-w-full tablet:max-w-2xl laptop:max-w-4xl laptop-l:max-w-7xl desktop:max-w-[1440px] mx-auto px-4 tablet:px-0 space-y-6">
            <div class="w-full flex justify-between flex-wrap">
                @foreach($baliStories as $baliStory)
                    <div class="flex-shrink-0 w-full tablet:w-[328px] laptop:w-[442px] laptop-l:w-[624px] desktop:w-[704px] h-[500px] laptop:h-[600px] laptop-l:h-[700] desktop:h-[756px] space-y-[28px]">
                        <img src="{{ $baliStory['images'] }}" alt="sea festifal" class="w-full tablet:h-[200px] laptop:h-[320px] laptop-l:h-[420px] desktop:h-[540px] rounded-xl">
                        <div class="flex flex-col space-y-4">
                            <h2 class="text-[#292929] text-lg tablet:text-xl laptop:text-2xl laptop-l:text-[32px] font-semibold">Sea Festival</h2>
                            <p class="h-[96px] tablet:overflow-y-hidden text-[#7C7C7C] text-ellipsis text-sm laptop:text-base leading-[32px] tracking-[0.3px]">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nullam eget pretium urna. Etiam a feugiat nulla. Proin tincidunt, lectus ac pharetra cursus, purus mi posuere ex, et lobortis risus quam quis magna. Nullam ex lorem, placerat ut rutrum id, cons</p>

                            <div class="flex space-x-2 items-center text-[#6D6D6D] text-sm font-medium leading-[21px]">
                                <p>April 24, 2024</p>
                                <x-ui.icon.dot-icon />
                                <p>8 min read</p>
                                <x-ui.icon.dot-icon />
                                <p>Nature</p>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </section>


        <x-layout.section-cta />

    </main>
</x-app-layout>
