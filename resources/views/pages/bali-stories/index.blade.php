{!! seo($seoData) !!}
<x-guest-layout>

    <main>

        <!-- section header featured -->
        <section class="pt-14 pb-10 max-w-full tablet:max-w-2xl laptop:max-w-4xl laptop-l:max-w-7xl desktop:max-w-[1440px] mx-auto px-4 tablet:px-0 space-y-10">
            <div class="space-y-6">
                <x-ui.label.thrid-heading :label="'Featured Stories'"/>
                <div class="w-full flex flex-col laptop-l:flex-row gap-10">
                    <img src="https://www.bvrbaliholidayrentals.com/storage/images/655488fecbf53.jpg" alt="featured stories" class="w-full laptop-l:w-[936px] h-[240px] tablet:h-[500px] laptop-l:h-[447px] rounded-xl">
                    <div class="w-full laptop-l:w-[464px] h-auto laptop-l:h-[447px] flex flex-col gap-y-6">
                        <div class="flex flex-col space-y-4">
                            <h2 class="text-[#292929] text-2xl tablet:text-3xl laptop:text-4xl laptop-l:text-[48px] font-semibold leading-[133px]">Hidden Retreat for Summer</h2>
                            <p class="text-[#7C7C7C] text-sm laptop:text-base font-medium leading-[32px] tracking-[0.3px]">Lorem ipsum dolor sit amet consectetur. Varius in frin
                                gilla non suspendisse sem viverra habitant congue. Vulputate consequat turpis erat aliquam et hendrerit et. Feugiat phasellus arcu tristique quisque risus solli
                                citudin ut nibh. Varius tincidunt cursus praesent quis
                                que ipsum tempor. Feugiat maecenas quisque risus.</p>
                            <div class="flex space-x-2 items-center text-[#6D6D6D] text-xs tablet:text-sm font-medium leading-[21px]">
                                <p>April 24, 2024</p>
                                <x-ui.icon.dot-icon />
                                <p>8 min read</p>
                                <x-ui.icon.dot-icon />
                                <p>Nature</p>
                            </div>
                        </div>
                        <div class="h-full w-full flex items-start">
                            <a href="{{ route('bali-stories.detail', 'bali-stories-detail') }}" class="transform duration-150 active:scale-95 py-[13px] px-6 bg-[#FF5700] rounded-xl text-[#FFF] text-base font-semibold leading-[24px]">Read More</a>
                        </div>
                    </div>
                </div>
            </div>

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
</x-guest-layout>
