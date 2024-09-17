{!! seo($seoData) !!}


<x-app-layout>

    <x-layout.header-detail-layout :images="$accomodation->roomtypes" />

    <!-- body -->
    <main>

        <!-- for seaction -->
        <section class="bg-white w-full sticky top-0 shadow" id="section-">
            <div class="tablet:max-w-2xl laptop:max-w-4xl laptop-l:max-w-7xl mx-auto flex space-x-10">
                <div class="cursor-pointer py-6 border-b-[5px] border-[#FF5700]">
                    <p class="text-[#FF5700] text-xl font-semibold leading-[30px]">General Info</p>
                </div>

                <div class="cursor-pointer py-6">
                    <p class="text-[#989898] text-xl font-semibold leading-[30px]">Facilities</p>
                </div>

                <div class="cursor-pointer py-6">
                    <p class="text-[#989898] text-xl font-semibold leading-[30px]">Location</p>
                </div>

                <div class="cursor-pointer py-6">
                    <p class="text-[#989898] text-xl font-semibold leading-[30px]">Policy</p>
                </div>
            </div>
        </section>

        <!-- section title and price -->
        <section class="w-full tablet:max-w-2xl laptop:max-w-4xl laptop-l:max-w-7xl mx-auto flex justify-between pt-6  pb-12">
            <div class="space-y-4">
                <div class="space-y-2">
                    <h1 class="text-[#292929] text-5xl font-semibold leading-[72px]">{{ $accomodation->name }}</h1>
                    <div class="flex space-x-3 items-center">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                            <path d="M21 10C21 17 12 23 12 23C12 23 3 17 3 10C3 7.61305 3.94821 5.32387 5.63604 3.63604C7.32387 1.94821 9.61305 1 12 1C14.3869 1 16.6761 1.94821 18.364 3.63604C20.0518 5.32387 21 7.61305 21 10Z" stroke="#7C7C7C" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                            <path d="M12 13C13.6569 13 15 11.6569 15 10C15 8.34315 13.6569 7 12 7C10.3431 7 9 8.34315 9 10C9 11.6569 10.3431 13 12 13Z" stroke="#7C7C7C" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                        </svg>
                        <h3 class="text-[#7C7C7C] text-xl font-medium leading-[30px] tracking-[0.3px]">
                            {{ $accomodation->location->description }}
                        </h3>
                    </div>
                </div>
                <div class="flex space-x-8">
                    <div class="flex space-x-3 items-center">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                            <path d="M3 21V19H5V3H15V4H19V19H21V21H17V6H15V21H3ZM11 13C11.2833 13 11.521 12.904 11.713 12.712C11.905 12.52 12.0007 12.2827 12 12C11.9993 11.7173 11.9033 11.48 11.712 11.288C11.5207 11.096 11.2833 11 11 11C10.7167 11 10.4793 11.096 10.288 11.288C10.0967 11.48 10.0007 11.7173 10 12C9.99933 12.2827 10.0953 12.5203 10.288 12.713C10.4807 12.9057 10.718 13.0013 11 13Z" fill="#7C7C7C"/>
                        </svg>
                        <p class="text-[#7C7C7C] text-xl font-medium leading-[30px]">4 Rooms</p>
                    </div>
                    <div class="flex space-x-3 items-center">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                            <path d="M20 21V19C20 17.9391 19.5786 16.9217 18.8284 16.1716C18.0783 15.4214 17.0609 15 16 15H8C6.93913 15 5.92172 15.4214 5.17157 16.1716C4.42143 16.9217 4 17.9391 4 19V21" stroke="#7C7C7C" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                            <path d="M12 11C14.2091 11 16 9.20914 16 7C16 4.79086 14.2091 3 12 3C9.79086 3 8 4.79086 8 7C8 9.20914 9.79086 11 12 11Z" stroke="#7C7C7C" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                        </svg>
                        <p class="text-[#7C7C7C] text-xl font-medium leading-[30px]">Max. 8 Guests</p>
                    </div>
                </div>
            </div>
            <div class="space-y-4 flex flex-col justify-end">
                <div class="w-full space-y-1 flex flex-col items-end  justify-end">
                    <p class="text-[#7C7C7C] text-base font-bold leading-[24px] tracking-[0.3px]">Start from</p>
                    <h3 class="text-[#FF5700] font-semibold text-[32px] tracking-[0.5px]">IDR 2.345.678</h3>
                    <p class="text-[#7C7C7C] text-base leading-[24px] tracking-[0.5px]">/room/night</p>
                </div>
                <button class="bg-[#FF5700] py-[13px] px-6 rounded-xl text-[#FFF] text-xl font-semibold leading-[30px]">
                    See Rooms
                </button>
            </div>
        </section>

        <!-- section about -->
        <section class="w-full tablet:max-w-2xl laptop:max-w-4xl laptop-l:max-w-7xl mx-auto px-10 py-8 space-y-8  border border-[#BDBDBD] rounded-2xl">
            <div class="space-y-8">
                <h2 class="text-[#292929] text-3xl font-semibold leading-[45px]">About Accomodation</h2>
                <p class="text-[#7C7C7C] text-xl font-medium leading-[40px] tracking-[0.7px]">
                    The Yubi Boutique Villas is one of the premium private villas. All villas are equipped with private swim
                    ming pools and are provided with an open floor with a fully equipped lounge, dining and kitchenette area. The design and layout of the villa has created a comfortable and perfect solution for romantic, recreation for couples and families. This villa is the perfect choice for couples who are looking for a
                    romantic vacation or honeymoon vacation. Enjoy the most memorable night with your loved ones by staying at The Yubi Boutique Villas. This villa is a suitable lodging for those who want privacy and tranquility while on vacation.
                </p>

                <button class="text-[#FF5700] text-xl font-semibold leading-[30px]">See More</button>
            </div>
        </section>

        <x-layout.section-cta />
    </main>
</x-app-layout>
