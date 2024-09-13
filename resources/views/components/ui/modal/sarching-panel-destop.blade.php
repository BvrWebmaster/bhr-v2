<div id="modal-searching" class="hidden">
    <div class="overflow-y-auto overflow-x-hidden fixed top-0 z-50 flex justify-center items-center w-full tablet:inset-0 bg-black/50 backdrop-blur h-[100vh]">
        <div class="relative w-full bg-white max-w-md max-h-full transform duration-200 space-y-4">
            <div class="relative rounded-lg shadow dark:bg-gray-700 py-2 px-4">
                <div class="flex items-center justify-between py-2 border-b rounded-t dark:border-gray-600">
                    <button id="btn-modal-searching" class="end-2.5 text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white"
                            data-modal-hide="authentication-modal">
                        <x-ui.icon.close-icon-black />
                    </button>
                </div>

                <div class="w-full space-y-4 overflow-y-auto py-3">

                    <!-- container load location -->
                    <div class="space-y-2">
                        <label for="container-locations-desktop" class="block text-sm font-medium text-gray-900 dark:text-white">Select Location</label>
                        <select id="container-locations-desktop" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                        </select>
                    </div>

                    <!-- input datetime -->
                    <div  class="w-full flex items-center justify-between tablet:justify-start tablet:space-x-2">
                        <div class="relative w-full">
                            <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Start date</label>
                            <input id="start-date-desktop" name="start" type="date" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full ps-10 p-2.5  dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Select date start">
                        </div>
                        <div class="relative w-full">
                            <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">End date</label>
                            <input id="end-date-desktop" name="start" type="date" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full ps-10 p-2.5  dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Select date start">
                        </div>
                    </div>

                    <!-- input guest -->
                    <div>
                        <label for="container-locations-mobile" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Select Guest</label>
                        <x-ui.partials.guest-select
                            label="Adult"
                            subLabel="Ages 17 or above"
                            idBtnDecrement="btn-decrement-adult-desktop"
                            idBtnIncrement="btn-increment-adult-desktop"
                            adultValue="adult-desktop"
                        />
                        <x-ui.partials.guest-select
                            label="Child"
                            subLabel="Ages 2 - 16"
                            idBtnDecrement="btn-decrement-child-desktop"
                            idBtnIncrement="btn-increment-child-desktop"
                            adultValue="child-desktop"
                        />

                        <x-ui.partials.guest-select
                            label="Infants"
                            subLabel="Ages under 2"
                            idBtnDecrement="btn-decrement-infants-desktop"
                            idBtnIncrement="btn-increment-infants-desktop"
                            adultValue="infants-desktop"
                        />
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        $(document).ready(function () {
            let valueAdult = 0;
            let valueChild = 0;
            let valueInfants = 0;

            let valueLocations = null;
            let startDate = getDate().day;
            let endDate = getDate().tomorrow;

            $('#adult-desktop').text(valueAdult);
            $('#child-desktop').text(valueChild);
            $('#infants-desktop').text(valueInfants);

            // destop
            $('.input-startDate').text(startDate);
            $('.input-endDate').text(endDate);

            $.ajax({
                url: "{{ route('location') }}",
                method: "GET",
                success: function (response) {
                    $('#container-locations-desktop').append(selectedLocationCard());

                    $.each(response, function (index, location) {
                        $('#container-locations-desktop').append(selectLocationCard(location));
                    });
                }
            });

            // select locations
            $('#container-locations-desktop').on('change', function () {
                valueLocations = $(this).find(':selected').text();
            });

            $('#btn-increment-adult-desktop').click(function () {
                valueAdult++;
                $('#adult-desktop').text(valueAdult);
            });

            $('#btn-decrement-adult-desktop').click(function () {
                if (valueAdult > 0) {
                    valueAdult--;
                    $('#adult-desktop').text(valueAdult);
                }
            });

            $('#btn-decrement-child-desktop').click(function () {
                if (valueChild > 0) {
                    valueChild--;
                    $('#child-desktop').text(valueChild);
                }
            });

            $('#btn-increment-child-desktop').click(function () {
                valueChild++;
                $('#child-desktop').text(valueChild);
            });

            $('#btn-decrement-infants-desktop').click(function () {
                if (valueInfants > 0) {
                    valueInfants --;
                    $('#infants-desktop').text(valueInfants);
                }
            });

            $('#btn-increment-infants-desktop').click(function () {
                valueInfants ++;
                $('#infants-desktop').text(valueInfants);
            });

            $('#btn-modal-searching').click(function () {
                selectLocationWhenNullOrNot(valueLocations);
                $('.input-startDate').text(selectStartDate());
                $('.input-endDate').text(selectEndDate());
                if(valueAdult === 0 && valueChild === 0 && valueInfants === 0) {
                    $('.input-guest')
                        .addClass('text-[#888]')
                        .text('Add Guests');
                } else {
                    $('.input-guest')
                        .removeClass('text-[#888]')
                        .text(`${valueAdult} Adult, ${valueChild} Child, ${valueInfants} Infants`)

                }
                $('#modal-searching').fadeOut('fast');
            })
        });

        function selectLocationWhenNullOrNot(valueLocations) {
            if (valueLocations === 'Choose countries' || valueLocations === null) {
                $('.input-location').text('City, destination, or villa name');
            } else {
                $('.input-location').text(valueLocations);
            }
        }

        function selectStartDate() {
            const startDate = $('#start-date-desktop').val();
            if (startDate) {
                return formatDateLocal(startDate)
            } else {
                return getDate().day;
            }
        }

        function selectEndDate() {
            const endDate = $('#end-date-desktop').val();
            if (endDate) {
                return formatDateLocal(endDate);
            } else {
                return getDate().tomorrow;
            }
        }

    </script>
</div>


