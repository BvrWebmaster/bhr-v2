@php
    $header = request()->routeIs('bali-stories.index') ? 'tablet:h-[576px]' : 'tablet:h-[632px]';
    $cekRoute = request()->routeIs('bali-stories.index');
    $background = request()->routeIs('bali-stories.index') ? 'https://www.bvrbaliholidayrentals.com/storage/images/64d9e2c193e28.jpg' : 'images/header-home.png';
@endphp

<header class="h-[290px] {{ $header }} w-full bg-cover bg-center overflow-hidden" id="header-desktop"
        style="background: linear-gradient(90deg, rgba(0,0,0,0.5243347338935574) 100%, rgba(255,255,255,1) 100%), url('{{ asset($background) }}');
            background-size: cover;
            background-position: top;
            background-repeat: no-repeat;">

    <x-layout.navigation-mobile />

    <!-- navigation destop -->
   <div class="w-full py-4 laptop:py-8 laptop:px-[64px] transform duration-200 ease-in-out px-4 flex justify-between items-start fixed z-40" id="nav-navigation-destop">
       <x-layout.navigation-destop />
   </div>

    <div class="h-full flex flex-col justify-center items-center">
        <div class="px-7">
            <h2 class="text-center text-white text-lg laptop:text-5xl font-semibold leading-[27px] laptop:leading-[72px]">
               @if(!$cekRoute)
                    Discover Your Next Adventure,
                    <br class="hidden tablet:block">
                    Unveiling Unforgettable Journeys!
                @else
                    Hidden Retreat for Summer
               @endif
            </h2>
        </div>
        <h3 class="text-xs laptop:text-[30px] font-medium text-[#BDBDBD] leading-[18px] laptop:leading-[36px]">
            Book Now and Explore!
        </h3>
    </div>

    @if(!$cekRoute)
        <div>
            <x-layout.search-hotels-and-villa />
        </div>
    @endif

    <x-ui.modal.modal-login />
    <x-ui.modal.get-started-modal/>

    <script>
        const navigation = document.getElementById('nav-navigation-destop');
        const navigationLogo = document.getElementById('navigation-logo');
        const listNavigation = document.getElementById('list-navigation-desktop');
        const containerAuth = document.getElementById('container-auth');
        const navigationSearch = document.getElementById('nav-search');
        const btnMenus = document.getElementById('btn-menus');

        window.addEventListener('scroll', function() {
            const header = document.getElementById('header-desktop');
            const headerPosition = header.getBoundingClientRect().bottom;

            if (headerPosition < 0) {
                navigationLogo.src = '/images/bhr-logo-black.png';
                listNavigation.classList.remove('laptop-l:flex');
                containerAuth.classList.add('laptop:hidden');
                containerAuth.classList.remove('laptop-l:flex');
                navigationSearch.classList.add('laptop:block');
                btnMenus.classList.add('laptop:hidden');
            } else {
                navigationLogo.src = '/images/bhr-logo-white.png';
                listNavigation.classList.add('laptop-l:flex');
                containerAuth.classList.add('tablet:flex');
                containerAuth.classList.remove('laptop:hidden');
                navigationSearch.classList.remove('laptop:block');
                btnMenus.classList.remove('laptop:hidden');
            }
        });

        document.addEventListener('DOMContentLoaded', function () {
            const headerView = document.querySelector('header');

            const scrollHandler = () => {
                const rect = headerView.getBoundingClientRect();
                const isOpen = rect.top >= 0 && rect.top <= window.innerHeight;

                if (isOpen) {
                    navigationSearch.classList.remove('laptop:block');
                    navigation.classList.add('bg-transparent', 'shadow-none');
                    navigation.classList.remove('bg-white', 'shadow-lg');
                } else {
                    // remove flex when scroll
                    listNavigation.classList.remove('laptop-l:flex');
                    navigation.classList.add('bg-white', 'shadow-lg');
                    navigation.classList.remove('bg-transparent', 'shadow-none');
                }
            };

            window.addEventListener('scroll', scrollHandler);
            scrollHandler();
        });

        $(document).ready(function () {
            $('#btn-menus').click(function () {
                $('#navigation-mobile').slideToggle('slow');
            });
        });
    </script>
</header>
