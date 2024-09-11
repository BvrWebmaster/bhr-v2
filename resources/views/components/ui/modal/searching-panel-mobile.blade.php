<div class="h-full bottom-0 mt-5 pt-4 w-full bg-black/50 fixed z-30 space-y-2 translate-y-full" id="panel-searching-mobile">
    <div class="h-[86vh] bg-white fixed bottom-0 w-full  rounded-t-2xl overflow-scroll no-scrollbar space-y-4 p-4 translate-y-full" id="container-searching-mobile">
        <div id="btn-close-searching-mobile">
            <x-ui.icon.close-icon-black />
        </div>

        <div class="w-full space-y-4">

            <!-- container load location -->
            <label for="container-locations-mobile" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Select Location</label>
            <select id="container-locations-mobile" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"></select>

            <!-- input datetime -->
            <div  class="w-full flex items-center justify-between tablet:justify-start space-x-2">
                <div class="relative w-full">
                    <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Start date</label>
                    <input id="start-date-mobile" name="start" type="date" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full ps-10 p-2.5  dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Select date start">
                </div>
                <div class="relative w-full">
                    <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">End date</label>
                    <input id="end-date-mobile" name="start" type="date" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full ps-10 p-2.5  dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Select date start">
                </div>
            </div>

            <!-- guest options -->
            <div>
                <label for="container-locations-mobile" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Select Guest</label>
               <x-ui.partials.guest-select
                   label="Adult"
                   subLabel="Ages 17 or above"
                   idBtnDecrement="btn-decrement-adult-mobile"
                   idBtnIncrement="btn-increment-adult-mobile"
                   adultValue="adult-mobile"
                   />
                <x-ui.partials.guest-select
                    label="Child"
                    subLabel="Ages 2 - 16"
                    idBtnDecrement="btn-decrement-child-mobile"
                    idBtnIncrement="btn-increment-child-mobile"
                    adultValue="child-mobile"
                />

                <x-ui.partials.guest-select
                    label="Infants"
                    subLabel="Ages under 2"
                    idBtnDecrement="btn-decrement-infants-mobile"
                    idBtnIncrement="btn-increment-infants-mobile"
                    adultValue="infants-mobile"
                />
            </div>
        </div>
    </div>

    <script>
        $(document).ready(function () {
            let valueAdult = 0;
            let valueChild = 0;
            let valueInfants = 0;
            let valueLocations = null;

            // state in panel searching
            $('#adult-mobile').text(valueAdult);
            $('#child-mobile').text(valueChild);
            $('#infants-mobile').text(valueInfants);

            // state in component searching
            $('#input-date').text(`${getDate().day} - ${getDate().tomorrow}`);
            $('#input-location').text( 'Where do you want to stay?');
            $('#input-guest').text('0 Adult, 0 Child, 0 Infants');

            // select locations
            $('#container-locations-mobile').on('change', function () {
                valueLocations = $(this).find(':selected').text();
            });

            $('#btn-increment-adult-mobile').click(function () {
                valueAdult++;
                $('#adult-mobile').text(valueAdult);
            });

            $('#btn-decrement-adult-mobile').click(function () {
                if (valueAdult > 0) {
                    valueAdult--;
                    $('#adult-mobile').text(valueAdult);
                }
            });

            $('#btn-decrement-child-mobile').click(function () {
                if (valueChild > 0) {
                    valueChild--;
                    $('#child-mobile').text(valueChild);
                }
            });

            $('#btn-increment-child-mobile').click(function () {
                valueChild++;
                $('#child-mobile').text(valueChild);
            });

            $('#btn-decrement-infants-mobile').click(function () {
                if (valueInfants > 0) {
                    valueInfants --;
                    $('#infants-mobile').text(valueInfants);
                }
            });

            $('#btn-increment-infants-mobile').click(function () {
                valueInfants ++;
                $('#infants-mobile').text(valueInfants);
            });

            // close panel
            $('#btn-close-searching-mobile').click(function () {
                $('#input-date').text(selectStartDateAndEndDate());
                selectLocationWhenNullNotRemoveClass(valueLocations);
                $('#input-guest').text(`${valueAdult} Adult, ${valueChild} Child, ${valueInfants} Infants`);
                $('#panel-searching-mobile').removeClass('translate-y-0').addClass('translate-y-full');
            });

            loadLocation();
        });

        function selectStartDateAndEndDate() {
            const startDate = $('#start-date-mobile').val();
            const endDate = $('#end-date-mobile').val();
            let startEndDate = '';

            if (startDate && endDate) {
                startEndDate = `${formatDateLocal(startDate)} to ${formatDateLocal(endDate)}`;
            } else if(startDate) {
                startEndDate = `${formatDateLocal(startDate)} to ${formatDateLocal(startDate)}`;
            } else if (endDate) {
                startEndDate = `${formatDateLocal(endDate)}`
            } else {
                startEndDate = `${getDate().day} - ${getDate().tomorrow}`;
            }

            return startEndDate;
        }

        function selectLocationWhenNullNotRemoveClass(valueLocations) {
            if (valueLocations === null || valueLocations === 'Choose countries') {
                $('#input-location').text('Where do you want to stay?')
                    .removeClass('text-black font-semibold')
                    .addClass('text-[#989898] font-medium');
            } else {
                $('#input-location').text(valueLocations).removeClass('text-[#989898] font-medium').addClass('text-black font-semibold')
            }
        }

        function loadLocation() {
            $.ajax({
                url: "{{ route('location') }}",
                method: "GET",
                success: function (response) {
                    $('#container-locations-mobile').append(selectedLocationCard());

                    $.each(response, function (index, location) {
                        $('#container-locations-mobile').append(selectLocationCard(location));
                    })
                },
                error: function (xhr) {
                    console.log(xhr);
                }
            });
        }

    </script>
</div>
