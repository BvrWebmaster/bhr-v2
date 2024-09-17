{!! seo($seoData) !!}


<x-app-layout>

    <x-layout.header-detail-layout :images="$accomodation->roomtypes" />

    <!-- body -->
    <main>

        <!-- for seaction -->
        <section class="bg-white w-full sticky top-0 shadow px-4 laptop:px-0" id="section-">
            <div class="tablet:max-w-2xl laptop:max-w-4xl laptop-l:max-w-7xl desktop:max-w-[1440px] mx-auto flex space-x-6 laptop:space-x-10">
                <div class="cursor-pointer py-4 laptop:py-6 section-link" data-target="#general-info">
                    <p class="text-[#989898] laptop:text-xl font-semibold leading-[30px]">General Info</p>
                </div>

                <div class="cursor-pointer py-4 laptop:py-6 section-link" data-target="#facilities">
                    <p class="text-[#989898] laptop:text-xl font-semibold leading-[30px]">Facilities</p>
                </div>

                <div class="cursor-pointer py-4 laptop:py-6 section-link" data-target="#location">
                    <p class="text-[#989898] laptop:text-xl font-semibold leading-[30px]">Location</p>
                </div>

                <div class="cursor-pointer py-4 laptop:py-6 section-link" data-target="#policy">
                    <p class="text-[#989898] laptop:text-xl font-semibold leading-[30px]">Policy</p>
                </div>
            </div>
        </section>

        <!-- section title and price -->
        <x-layout.section-detail id="general-info">
            <!-- description -->
            <div class="space-y-4 pt-6">
                <div class="space-y-2">
                    <h1 class="text-[#292929] text-lg laptop-l:text-5xl font-semibold leading-[72px]">{{ $accomodation->name }}</h1>
                    <div class="flex space-x-3 items-center">
                        <x-ui.icon.icon-location-detail />
                        <h3 class="text-[#7C7C7C] text-sm laptop:text-xl font-medium leading-[30px] tracking-[0.3px]">
                            {{ $accomodation->location->description }}
                        </h3>
                    </div>
                </div>
                <div class="flex space-x-8">
                    <div class="flex space-x-3 items-center">
                        <x-ui.icon.room-icon />
                        <p class="text-[#7C7C7C] text-sm laptop:text-xl font-medium leading-[30px]">4 Rooms</p>
                    </div>
                    <div class="flex space-x-3 items-center">
                        <x-ui.icon.guest-icon />
                        <p class="text-[#7C7C7C] text-sm laptop:text-xl font-medium leading-[30px]">Max. 8 Guests</p>
                    </div>
                </div>
            </div>

            <!-- price -->
            <div class="hidden space-y-4 laptop:flex flex-col justify-end laptop:pb-12">
                <div class="w-full space-y-1 flex flex-col items-end  justify-end">
                    <p class="text-[#7C7C7C] text-base font-bold leading-[24px] tracking-[0.3px]">Start from</p>
                    <h3 class="text-[#FF5700] font-semibold text-[32px] tracking-[0.5px]">IDR {{ $accomodation->price }}</h3>
                    <p class="text-[#7C7C7C] text-base leading-[24px] tracking-[0.5px]">/room/night</p>
                </div>
                <button class="bg-[#FF5700] py-[13px] px-6 rounded-xl text-[#FFF] text-xl font-semibold leading-[30px]">
                    See Rooms
                </button>
            </div>
        </x-layout.section-detail>


        <!-- section popular facilities -->
        <x-layout.section-detail id="facilities">
            <div class="w-full grid laptop-l:grid-cols-3 gap-x-6 py-6 gap-y-3">
                <div class="w-full laptop-l:col-span-2 px-4 py-2 laptop:py-8 laptop:px-10 space-y-4 border rounded-2xl border-[#BDBDBD]">
                    <h2 class="text-[#292929] text-lg laptop:text-3xl font-semibold leading-[45px]">Popular Facilities</h2>
                    <div class="grid tablet:grid-cols-2 desktop:grid-cols-3 gap-y-3">
                       @foreach($accomodation->facilities as $facility)
                            <div class="flex space-x-2 items-center">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="22" viewBox="0 0 24 22" fill="none">
                                    <path d="M12.8952 7.81719L18.6619 12.6857C18.5952 12.7227 18.5285 12.7678 18.4619 12.8088C17.7119 13.3174 16.791 13.6414 15.9952 13.6414C15.1785 13.6414 14.2952 13.3256 13.5285 12.8088C12.6077 12.173 11.3785 12.173 10.4577 12.8088C9.74521 13.2928 8.87438 13.6414 7.99105 13.6414C7.57021 13.6414 7.11188 13.5512 6.66188 13.3871C6.79521 8.42422 10.9244 4.4375 15.9994 4.4375H18.666C19.4035 4.4375 19.9994 5.02402 19.9994 5.75C19.9994 6.47598 19.4035 7.0625 18.666 7.0625H15.9994C14.8785 7.0625 13.8202 7.3332 12.8952 7.81719ZM6.66605 7.0625C6.66605 7.75869 6.3851 8.42637 5.885 8.91865C5.3849 9.41094 4.70662 9.6875 3.99938 9.6875C3.29214 9.6875 2.61386 9.41094 2.11376 8.91865C1.61367 8.42637 1.33271 7.75869 1.33271 7.0625C1.33271 6.36631 1.61367 5.69863 2.11376 5.20634C2.61386 4.71406 3.29214 4.4375 3.99938 4.4375C4.70662 4.4375 5.3849 4.71406 5.885 5.20634C6.3851 5.69863 6.66605 6.36631 6.66605 7.0625ZM12.7702 13.867C13.7077 14.5027 14.8535 14.9375 15.9994 14.9375C17.1202 14.9375 18.3077 14.4945 19.2244 13.867C19.7202 13.5184 20.3952 13.5471 20.8577 13.9367C21.4577 14.4248 22.2119 14.798 22.966 14.9703C23.6827 15.1344 24.1285 15.8398 23.9619 16.5453C23.7952 17.2508 23.0786 17.6896 22.3619 17.5256C21.341 17.2918 20.4911 16.8488 19.9369 16.5002C18.7285 17.14 17.3744 17.5625 15.9994 17.5625C14.6702 17.5625 13.4744 17.1564 12.6494 16.7873C12.4077 16.6766 12.1869 16.5699 11.9994 16.4715C11.8119 16.5699 11.5952 16.6807 11.3494 16.7873C10.5244 17.1564 9.32855 17.5625 7.99938 17.5625C6.62438 17.5625 5.27021 17.14 4.06188 16.5043C3.50355 16.8488 2.65771 17.2959 1.63688 17.5297C0.920214 17.6937 0.203547 17.2549 0.0368803 16.5494C-0.129786 15.8439 0.316047 15.1385 1.03271 14.9744C1.78688 14.8021 2.54105 14.4289 3.14105 13.9408C3.60355 13.5553 4.27855 13.5266 4.77438 13.8711C5.69521 14.4945 6.87855 14.9375 7.99938 14.9375C9.14521 14.9375 10.291 14.5027 11.2285 13.867C11.691 13.543 12.3077 13.543 12.7702 13.867Z" fill="#7C7C7C"/>
                                </svg>
                                <p class="text-[#7C7C7C] text-sm laptop:text-xl font-medium leading-[30px]">
                                    {{ $facility->name }}
                                </p>
                            </div>
                        @endforeach
                    </div>
                </div>

                <div class="w-full px-4 py-2 laptop:py-8 laptop:px-10 space-y-4 border rounded-2xl border-[#BDBDBD]">
                    <h2 class="text-[#292929] text-lg laptop:text-3xl font-semibold leading-[45px]">Popular in the Area</h2>
                    <div class="flex flex-col space-y-4 laptop:space-y-6">

                        <!-- seminyak beach -->
                        <div class="flex justify-between items-center">
                            <div class="flex space-x-2 items-center laptop:space-x-4">
                                <div class="rounded-full p-1 bg-[#FF9132]">
                                    <div class="hidden laptop:block">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                                            <path d="M13.1277 14.5602L14.5577 13.1302L20.9977 19.5732L19.5707 21.0002L13.1277 14.5602ZM17.4207 8.83023L20.2807 5.97023C16.3307 2.02023 9.93071 2.01023 5.98071 5.95023C9.91071 4.65023 14.2907 5.70023 17.4207 8.83023ZM5.95071 5.98023C2.01071 9.93023 2.02071 16.3302 5.97071 20.2802L8.83071 17.4202C5.70071 14.2902 4.65071 9.91023 5.95071 5.98023ZM5.97071 5.96023L5.96071 5.97023C5.58071 8.98023 7.13071 12.8502 10.2607 15.9902L15.9907 10.2602C12.8607 7.13023 8.98071 5.58023 5.97071 5.96023Z" fill="white"/>
                                        </svg>
                                    </div>

                                    <div class="laptop:hidden">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="10" height="8" viewBox="0 0 10 8" fill="none">
                                            <path d="M8.33366 5.66713C8.33366 5.73028 8.31025 5.79084 8.26857 5.83549C8.22689 5.88015 8.17037 5.90523 8.11143 5.90523C8.05249 5.90523 7.99597 5.88015 7.95429 5.83549C7.91262 5.79084 7.8892 5.73028 7.8892 5.66713V2.33371C7.8892 1.41463 6.96918 0.666992 6.11137 0.666992H2.33349C1.86198 0.666992 1.40979 0.867677 1.07638 1.2249C0.74297 1.58212 0.555664 2.06662 0.555664 2.57181V7.33384H2.33349V5.42903H4.55578V7.33384H6.3336V5.19093C6.3336 5.12778 6.35702 5.06722 6.39869 5.02256C6.44037 4.97791 6.49689 4.95283 6.55583 4.95283C6.61477 4.95283 6.6713 4.97791 6.71297 5.02256C6.75465 5.06722 6.77806 5.12778 6.77806 5.19093V5.90523C6.77806 6.28412 6.91854 6.6475 7.1686 6.91541C7.41865 7.18333 7.7578 7.33384 8.11143 7.33384C8.46506 7.33384 8.80421 7.18333 9.05427 6.91541C9.30432 6.6475 9.4448 6.28412 9.4448 5.90523V4.95283H8.33366V5.66713Z" fill="white"/>
                                        </svg>
                                    </div>
                                </div>
                                <p class="text-[#7C7C7C] text-sm laptop:text-xl font-semibold leading-[30px]">Seminyak Beach</p>
                            </div>
                            <div>
                                <p class="text-[#7C7C7C] text-sm laptop:text-xl font-medium leading-[30px]">1,72 km</p>
                            </div>
                        </div>

                        <!-- mrs sippy -->
                        <div class="flex justify-between items-center">
                            <div class="flex space-x-2 items-center laptop:space-x-4">
                                <div class="rounded-full p-1 bg-[#FF9132]">
                                    <div class="hidden laptop:block">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                                            <g clip-path="url(#clip0_648_2258)">
                                                <path d="M5.53831 0C5.53831 0 4.61523 6.46154 4.61523 7.38462C4.61523 8.30769 6.69216 10.1538 6.69216 10.1538L6.46139 22.4714C6.46139 23.4905 7.28847 24 8.30754 24C9.32662 24 10.1537 23.4905 10.1537 22.4714L9.92293 10.1538C9.92293 10.1538 11.9998 8.26892 11.9998 7.38462C11.9998 6.50031 11.0768 0 11.0768 0H10.1537V6C10.1537 6.12241 10.1051 6.2398 10.0185 6.32636C9.93196 6.41291 9.81457 6.46154 9.69216 6.46154C9.56975 6.46154 9.45236 6.41291 9.3658 6.32636C9.27924 6.2398 9.23062 6.12241 9.23062 6C9.23062 5.91415 8.91308 0 8.91308 0H7.702C7.702 0 7.38447 5.91415 7.38447 6C7.38447 6.12241 7.33584 6.2398 7.24928 6.32636C7.16273 6.41291 7.04533 6.46154 6.92293 6.46154C6.80052 6.46154 6.68313 6.41291 6.59657 6.32636C6.51001 6.2398 6.46139 6.12241 6.46139 6V0H5.53831ZM15.4328 0.0581538C14.8891 0.188308 14.7691 0.770769 14.7691 1.41231V22.4705C14.7691 23.4895 15.5962 23.9991 16.6152 23.9991C17.6343 23.9991 18.4328 23.4886 18.4328 22.4705C18.4328 17.7748 17.5097 15.2714 17.5097 12.9222C17.5097 11.8625 19.3845 10.4982 19.3845 5.56615C19.3845 2.54954 16.7112 0.0572308 15.6922 0.0572308C15.5962 0.0572308 15.5103 0.0387692 15.4328 0.0572308V0.0581538Z" fill="white"/>
                                            </g>
                                            <defs>
                                                <clipPath id="clip0_648_2258">
                                                    <rect width="24" height="24" fill="white"/>
                                                </clipPath>
                                            </defs>
                                        </svg>
                                    </div>

                                    <div class="laptop:hidden">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="12" height="12" viewBox="0 0 12 12" fill="none">
                                            <g clip-path="url(#clip0_1232_2717)">
                                                <path d="M3.12804 0.666504C3.12804 0.666504 2.71777 3.53838 2.71777 3.94865C2.71777 4.35891 3.64088 5.17945 3.64088 5.17945L3.53831 10.6541C3.53831 11.107 3.90591 11.3335 4.35884 11.3335C4.81178 11.3335 5.17938 11.107 5.17938 10.6541L5.07681 5.17945C5.07681 5.17945 5.99992 4.34168 5.99992 3.94865C5.99992 3.55561 5.58965 0.666504 5.58965 0.666504H5.17938V3.33324C5.17938 3.38765 5.15777 3.43983 5.1193 3.4783C5.08083 3.51677 5.02865 3.53838 4.97425 3.53838C4.91984 3.53838 4.86766 3.51677 4.82919 3.4783C4.79072 3.43983 4.76911 3.38765 4.76911 3.33324C4.76911 3.29509 4.62798 0.666504 4.62798 0.666504H4.08971C4.08971 0.666504 3.94858 3.29509 3.94858 3.33324C3.94858 3.38765 3.92696 3.43983 3.88849 3.4783C3.85002 3.51677 3.79785 3.53838 3.74344 3.53838C3.68904 3.53838 3.63686 3.51677 3.59839 3.4783C3.55992 3.43983 3.53831 3.38765 3.53831 3.33324V0.666504H3.12804ZM7.5257 0.692351C7.28405 0.750199 7.23072 1.00908 7.23072 1.29421V10.6537C7.23072 11.1066 7.59832 11.3331 8.05125 11.3331C8.50419 11.3331 8.85907 11.1062 8.85907 10.6537C8.85907 8.56662 8.4488 7.45397 8.4488 6.40984C8.4488 5.93886 9.28206 5.33248 9.28206 3.14042C9.28206 1.79966 8.09392 0.691941 7.64099 0.691941C7.59832 0.691941 7.56016 0.683735 7.5257 0.691941V0.692351Z" fill="white"/>
                                            </g>
                                            <defs>
                                                <clipPath id="clip0_1232_2717">
                                                    <rect width="10.667" height="10.667" fill="white" transform="translate(0.666992 0.666504)"/>
                                                </clipPath>
                                            </defs>
                                        </svg>
                                    </div>
                                </div>
                                <p class="text-[#7C7C7C] text-sm laptop:text-xl font-semibold leading-[30px]">Mrs. Sippy Bali</p>
                            </div>
                            <div>
                                <p class="text-[#7C7C7C] text-sm laptop:text-xl font-medium leading-[30px]">311 m</p>
                            </div>
                        </div>

                        <!-- pura pettitenget -->
                        <div class="flex justify-between items-center">
                            <div class="flex space-x-2 items-center laptop:space-x-4">
                                <div class="rounded-full p-1 bg-[#FF9132]">
                                    <div class="hidden laptop:block">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="22" height="22" viewBox="0 0 22 22" fill="none">
                                            <path d="M7.325 6.625L8.35313 3.23438V2.25C8.35313 2.00209 8.43712 1.79442 8.60512 1.627C8.77312 1.45959 8.9805 1.37559 9.22725 1.375C9.474 1.37442 9.68196 1.45842 9.85113 1.627C10.0203 1.79559 10.104 2.00325 10.1023 2.25V3.125H11.875V2.25C11.875 2.00209 11.959 1.79442 12.127 1.627C12.295 1.45959 12.5027 1.37559 12.75 1.375C12.9973 1.37442 13.2053 1.45842 13.3739 1.627C13.5425 1.79559 13.6262 2.00325 13.625 2.25V3.125L14.675 6.625H7.325ZM2.25 18V11C2.25 10.7521 2.334 10.5444 2.502 10.377C2.67 10.2096 2.87767 10.1256 3.125 10.125C3.37233 10.1244 3.58029 10.2084 3.74888 10.377C3.91746 10.5456 4.00117 10.7533 4 11V11.875H18V11C18 10.7521 18.084 10.5444 18.252 10.377C18.42 10.2096 18.6277 10.1256 18.875 10.125C19.1223 10.1244 19.3303 10.2084 19.4989 10.377C19.6675 10.5456 19.7512 10.7533 19.75 11V18C19.75 18.4813 19.5788 18.8934 19.2364 19.2364C18.894 19.5794 18.4818 19.7506 18 19.75H12.75C12.5021 19.75 12.2944 19.666 12.127 19.498C11.9596 19.33 11.8756 19.1223 11.875 18.875V16.25C11.875 16.0021 11.791 15.7944 11.623 15.627C11.455 15.4596 11.2473 15.3756 11 15.375C10.7527 15.3744 10.545 15.4584 10.377 15.627C10.209 15.7956 10.125 16.0033 10.125 16.25V18.875C10.125 19.1229 10.041 19.3309 9.873 19.4989C9.705 19.6669 9.49733 19.7506 9.25 19.75H4C3.51875 19.75 3.10692 19.5788 2.7645 19.2364C2.42208 18.894 2.25058 18.4818 2.25 18ZM6.275 10.125L6.8 8.375H15.2L15.725 10.125H6.275Z" fill="white"/>
                                        </svg>
                                    </div>

                                    <div class="laptop:hidden">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="12" height="12" viewBox="0 0 12 12" fill="none">
                                            <path d="M4.13254 3.77807L4.65477 2.0558V1.55579C4.65477 1.42986 4.69744 1.32437 4.78278 1.23933C4.86811 1.15429 4.97345 1.11163 5.09879 1.11133C5.22412 1.11103 5.32976 1.1537 5.41568 1.23933C5.50161 1.32497 5.54413 1.43045 5.54324 1.55579V2.00024H6.44371V1.55579C6.44371 1.42986 6.48638 1.32437 6.57172 1.23933C6.65705 1.15429 6.76254 1.11163 6.88817 1.11133C7.0138 1.11103 7.11943 1.1537 7.20507 1.23933C7.2907 1.32497 7.33322 1.43045 7.33263 1.55579V2.00024L7.86597 3.77807H4.13254ZM1.55469 9.55601V6.00035C1.55469 5.87443 1.59736 5.76894 1.68269 5.6839C1.76803 5.59886 1.87351 5.55619 1.99914 5.5559C2.12478 5.5556 2.23041 5.59827 2.31604 5.6839C2.40167 5.76953 2.44419 5.87502 2.4436 6.00035V6.44481H9.55491V6.00035C9.55491 5.87443 9.59758 5.76894 9.68291 5.6839C9.76825 5.59886 9.87373 5.55619 9.99937 5.5559C10.125 5.5556 10.2306 5.59827 10.3163 5.6839C10.4019 5.76953 10.4444 5.87502 10.4438 6.00035V9.55601C10.4438 9.80046 10.3569 10.0098 10.1829 10.184C10.009 10.3583 9.79966 10.4452 9.55491 10.4449H6.88817C6.76224 10.4449 6.65675 10.4023 6.57172 10.3169C6.48668 10.2316 6.44401 10.1261 6.44371 10.0005V8.6671C6.44371 8.54117 6.40104 8.43568 6.31571 8.35064C6.23037 8.2656 6.12489 8.22294 5.99926 8.22264C5.87362 8.22234 5.76814 8.26501 5.6828 8.35064C5.59747 8.43627 5.5548 8.54176 5.5548 8.6671V10.0005C5.5548 10.1264 5.51213 10.232 5.42679 10.3174C5.34146 10.4027 5.23597 10.4452 5.11034 10.4449H2.4436C2.19915 10.4449 1.98996 10.358 1.81603 10.184C1.6421 10.0101 1.55498 9.80076 1.55469 9.55601ZM3.59919 5.5559L3.86586 4.66698H8.13265L8.39932 5.5559H3.59919Z" fill="white"/>
                                        </svg>
                                    </div>
                                </div>
                                <p class="text-[#7C7C7C] text-sm laptop:text-xl font-semibold leading-[30px]">Pura Petitenget</p>
                            </div>
                            <div>
                                <p class="text-[#7C7C7C] text-sm laptop:text-xl font-medium leading-[30px]">474 m</p>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </x-layout.section-detail>

        <!-- section about -->
        <x-layout.section-detail id="about">
            <div class="py-6">
                <div class="w-full px-4 py-2 laptop:py-8 laptop:px-10 space-y-4 border rounded-2xl border-[#BDBDBD]">
                    <h2 class="text-[#292929] text-lg laptop:text-3xl font-semibold leading-[45px]">About Accomodation</h2>
                    <div>
                        <p class="text-[#7C7C7C] text-sm laptop-l:text-xl font-medium leading-[40px] tracking-[0.7px]">
                            The Yubi Boutique Villas is one of the premium private villas. All villas are equipped with private swim
                            ming pools and are provided with an open floor with a fully equipped lounge, dining and kitchenette area. The design and layout of the villa has created a comfortable and perfect solution for romantic, recreation for couples and families. This villa is the perfect choice for couples who are looking for a
                            romantic vacation or honeymoon vacation. Enjoy the most memorable night with your loved ones by staying at The Yubi Boutique Villas. This villa is a suitable lodging for those who want privacy and tranquility while on vacation.
                        </p>

                    </div>
                </div>
            </div>
        </x-layout.section-detail>

        <!-- section location -->
        <x-layout.section-detail id="location">
            <div class="w-full py-6">
                <div class="w-full px-4 py-2 laptop:py-8 laptop:px-10 space-y-8 border rounded-2xl border-[#BDBDBD]">
                    <h2 class="text-[#292929] text-lg laptop:text-3xl font-semibold leading-[45px]">Location</h2>

                </div>
            </div>
        </x-layout.section-detail>

        <!-- section all facilities -->
        <x-layout.section-detail id="all-facilities">
            <div class="w-full py-6">
                <div class="px-4 py-2 laptop:py-8 laptop:px-10 space-y-8 border rounded-2xl border-[#BDBDBD]">
                    <h2 class="text-[#292929] text-lg laptop:text-3xl font-semibold leading-[45px]">All Facilities</h2>
                    <div class="w-full flex space-x-[72px]">
                        <x-layout.layout-all-facilities>
                            <x-ui.label.text-header-all-facilities label="General">
                                <x-ui.icon.general-icon />
                            </x-ui.label.text-header-all-facilities>

                            <div class="flex flex-col space-y-4">
                                <x-ui.label.text-all-facilities label="Restaurant" />
                                <x-ui.label.text-all-facilities label="Smoking Area" />
                                <x-ui.label.text-all-facilities label="Non-smoking Area" />
                                <x-ui.label.text-all-facilities label="Room Service" />
                                <x-ui.label.text-all-facilities label="Safety Deposit Box" />
                                <x-ui.label.text-all-facilities label="Free Wifi" />
                            </div>
                        </x-layout.layout-all-facilities>

                        <x-layout.layout-all-facilities>
                            <x-ui.label.text-header-all-facilities label="Accomodation Services">
                                <x-ui.icon.home-icon />
                            </x-ui.label.text-header-all-facilities>

                            <div class="flex flex-col space-y-4">
                                <x-ui.label.text-all-facilities label="Concierge" />
                                <x-ui.label.text-all-facilities label="Laundry Service" />
                                <x-ui.label.text-all-facilities label="Luggage Storage" />
                                <x-ui.label.text-all-facilities label="Daily Housekeeping" />
                                <x-ui.label.text-all-facilities label="24-hour Receptionist" />
                            </div>
                        </x-layout.layout-all-facilities>

                        <x-layout.layout-all-facilities>
                            <x-ui.label.text-header-all-facilities label="Transportation">
                                <x-ui.icon.transport-icon />
                            </x-ui.label.text-header-all-facilities>

                            <div class="flex flex-col space-y-4">
                                <x-ui.label.text-all-facilities label="Airport Shuttle" />
                                <x-ui.label.text-all-facilities label="Car Rental" />
                                <x-ui.label.text-all-facilities label="Free Parking" />
                                <x-ui.label.text-all-facilities label="Parking Area" />
                            </div>
                        </x-layout.layout-all-facilities>
                    </div>
                </div>
            </div>
        </x-layout.section-detail>


        <div class="w-full h-[100vh] bg-green-400 section"  id="policy"></div>

        <x-layout.section-cta />

        <!-- section price mobile -->
        <div class="laptop:hidden fixed z-30 bottom-0 w-full py-4 bg-white rounded-t-2xl">
            <div class="w-full flex justify-between px-4">
                <div class="space-y-1 flex flex-col items-start">
                    <p class="text-[#7C7C7C] text-sm font-bold leading-[24px] tracking-[0.3px]">Start from</p>
                    <h3 class="text-[#FF5700] font-semibold text-lg tracking-[0.5px]">IDR {{ $accomodation->price }}</h3>
                    <p class="text-[#7C7C7C] text-sm leading-[24px] tracking-[0.5px]">/room/night</p>
                </div>
                <div class="flex items-center">
                    <button class="bg-[#FF5700] py-3 px-3  rounded-xl text-[#FFF] text-base font-semibold leading-[30px]">
                        See Rooms
                    </button>
                </div>
            </div>
        </div>
    </main>

    <script>

        $(document).ready(function () {
            $('.section-link').on('click', function () {
               let target = $(this).data('target');
               $('html, body').animate({
                   scrollTop: $(target).offset().top - 100
               }, 100);
            });

            // logic deteksi scroll aktif
            $(window).on('scroll', function () {
                let scrollPosition = $(window).scrollTop();

                $('.section').each(function () {
                    let sectionTop = $(this).offset().top - 120; // Sesuaikan dengan tinggi offset
                    let sectionBottom = sectionTop + $(this).outerHeight();
                    let sectionId = $(this).attr('id');

                    if (scrollPosition >= sectionTop && scrollPosition < sectionBottom) {
                        $('.section-link').removeClass('active').find('p').removeClass('text-[#FF5700]').addClass('text-[#989898]');
                        $('.section-link').removeClass('border-b-[5px] border-[#FF5700]');
                        $('.section-link[data-target="#' + sectionId + '"]').addClass('active').find('p').removeClass('text-[#989898]').addClass('text-[#FF5700]');
                        $('.section-link[data-target="#' + sectionId +'"]').addClass('border-b-[5px] border-[#FF5700]');
                    }
                });
            })
        })
    </script>
</x-app-layout>
