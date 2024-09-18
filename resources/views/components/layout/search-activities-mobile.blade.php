<div class="space-y-3 p-4">
    <x-layout.input-search-mobile id="search-activities-mobile">
        <label for="search-activities">
            <x-ui.icon.search-icon />
        </label>
        <input type="text" id="input-activities-mobile" placeholder="Search Activities"  class="w-full text-[#989898] font-medium text-base  leading-[24px] focus:outline-none"/>
    </x-layout.input-search-mobile>

    <button  id="btn-search-mobile" class="transform duration-300 active:scale-95 border bg-[#FF5700] rounded-xl w-full py-3 text-white text-base font-semibold leading-[24px]">
        Search
    </button>

    <script>
        $(document).ready(function () {
            $('#btn-search-mobile').on('click', function () {
                const inputSearch = $('#input-activities-mobile').val();

                $.ajax({
                    url: "{{ route('activities.list') }}",
                    method: "GET",
                    data: {
                        search: inputSearch,
                        page: 1
                    },
                    success: function (response) {
                        $('#activities-page-main').empty();

                        $.each(response.data, function (index, activities) {

                            $('#activities-page-main').append(cardActivitiesMain(activities));
                        });
                    },
                    error: function (xhr) {
                        console.log(xhr);
                    }
                });
            })
        });
    </script>
</div>
