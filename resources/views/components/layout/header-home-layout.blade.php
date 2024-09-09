<header class="h-[290px] tablet:h-[632px] desktop:h-[832px] w-full bg-cover bg-center overflow-hidden"
        style="background: linear-gradient(90deg, rgba(0,0,0,0.5243347338935574) 100%, rgba(255,255,255,1) 100%), url('{{ asset('images/header-home.png') }}');
            background-size: cover;
            background-position: top;
            background-repeat: no-repeat;">

    <!-- navigation destop -->
   <div class="w-full py-4 laptop:py-8 laptop:px-[64px] transform duration-200 ease-in-out px-4 flex justify-between items-start fixed z-40" id="nav-navigation-destop">
       <x-layout.navigation-destop />
   </div>


   <x-layout.navigation-mobile />

    <div class="h-full flex flex-col justify-center items-center">
        <div class="px-7">
            <h2 class="text-center text-white text-lg laptop:text-5xl font-semibold leading-[27px] laptop:leading-[72px]">
                Discover Your Next Adventure,
                <br class="hidden tablet:block">
                Unveiling Unforgettable Journeys!
            </h2>
        </div>
        <h3 class="text-xs laptop:text-[30px] font-medium text-[#BDBDBD] leading-[18px] laptop:leading-[36px]">
            Book Now and Explore!
        </h3>
    </div>

    <div>
        <x-layout.search-hotels-and-villa />
    </div>

    <x-ui.modal.modal-login />
    <x-ui.modal.get-started-modal/>

    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const header = document.querySelector('header');
            const navigation = document.getElementById('nav-navigation-destop');
            const navigationLogo = document.getElementById('navigation-logo');

            const scrollHandler = () => {
                const rect = header.getBoundingClientRect();
                const isOpen = rect.top >= 0 && rect.top <= window.innerHeight;

                if (isOpen) {
                    navigation.classList.add('bg-transparent', 'shadow-none');
                    navigation.classList.remove('bg-white', 'shadow-lg');
                    navigationLogo.src = '/images/bhr-logo-white.png';
                } else {
                    navigation.classList.add('bg-white', 'shadow-lg');
                    navigation.classList.remove('bg-transparent', 'shadow-none');
                    navigationLogo.src = '/images/bhr-logo-black.png';
                }
            };

            window.addEventListener('scroll', scrollHandler);
            scrollHandler();
        });
    </script>
</header>
