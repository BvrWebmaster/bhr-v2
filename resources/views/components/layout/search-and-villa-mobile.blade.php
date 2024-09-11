<div class="space-y-3 p-4">

    <!-- location -->
    <x-layout.input-search-mobile id="input-location-mobile">
        <label for="search">
            <x-ui.icon.search-icon />
        </label>
        <p class="w-full text-[#989898] font-medium text-base  leading-[24px]" id="input-location"></p>
    </x-layout.input-search-mobile>

    <!-- date search -->
    <x-layout.input-search-mobile id="input-datetime-mobile">
        <label for="datetime">
            <x-ui.icon.date-search-icon />
        </label>
        <p class="w-full text-black text-base font-semibold leading-[24px]" id="input-date"></p>
    </x-layout.input-search-mobile>

    <!-- user guest -->
    <x-layout.input-search-mobile id="input-guest-mobile">
        <label for="datetime">
            <x-ui.icon.user-icon />
        </label>
        <p class="w-full text-black text-base font-semibold leading-[24px]" id="input-guest"></p>
    </x-layout.input-search-mobile>

    <x-ui.button.button-search-mobile />

    <script>
        $(document).ready(function () {
            $('#input-location-mobile').click(function () {
                $('#panel-searching-mobile').removeClass('translate-y-full').addClass('translate-y-0');
                $('#container-searching-mobile').removeClass('translate-y-full').addClass('translate-y-0 transform duration-300');
            });

            $('#input-datetime-mobile').click(function () {
                $('#panel-searching-mobile').removeClass('translate-y-full').addClass('translate-y-0');
                $('#container-searching-mobile').removeClass('translate-y-full').addClass('translate-y-0 transform duration-300');
            });

            $('#input-guest-mobile').click(function () {
                $('#panel-searching-mobile').removeClass('translate-y-full').addClass('translate-y-0');
                $('#container-searching-mobile').removeClass('translate-y-full').addClass('translate-y-0 transform duration-300');
            });

            $('#btn-explore-mobile').click(function () {

            });
        });
    </script>
</div>
