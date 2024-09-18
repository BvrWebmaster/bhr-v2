<div class="hidden tablet:flex justify-center items-center w-full ">
    <div class="w-[502px] laptop:w-[602px] laptop-l:w-[902px] h-16 laptop:h-20 py-2 px-4 laptop:py-3 laptop:px-6 bg-white tablet:flex justify-between rounded-xl">
        <input type="text" class="w-[205px] text-lg laptop:text-xl font-normal leading-[30px] focus:outline-none" name="search" id="search-activities" placeholder="Search fun activities">
        <button class="btn-search-activities rounded-xl py-3 px-6 bg-[#FF5700] text-white text-xl font-semibold leading-[20px] transform duration-150 active:scale-95">
           Search
        </button>
    </div>

    <script>
        $(document).ready(function () {
            $('#search-activities').on('input', function (event) {
                $('#search-activities-header').val(event.target.value);
            });

            $('#search-activities-header').on('input', function (event) {
                $('#search-activities').val(event.target.value);
            });
        })
    </script>
</div>
