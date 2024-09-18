<div class="h-full pt-[82px] tablet:pt-[152px] laptop-l:pt-[184px] flex justify-center pb-[87px]">
    <div class="space-y-14">
        <div class="space-y-1 tablet:space-y-2 laptop:space-y-3 laptop-l:space-y-4">
            <h1 class="text-[#fff] text-lg tablet:text-2xl laptop:text-4xl laptop-l:text-6xl font-semibold leading-[90px] text-center">
                Discover Endless of Fun <br>
                Activities for Your Trip
            </h1>
            <h3 class="font-serif text-[#EFEFEF] text-base tablet:text-lg laptop:text-xl laptop-l:text-3xl font-normal leading-[45px] text-center">Book Now and Explore!</h3>
        </div>

        <x-layout.search-activities />

        <!-- list card category -->
        <div class="w-full hidden laptop-l:flex items-center justify-center">
            <div class="w-[709px] flex justify-center space-y-4 space-x-4 flex-wrap-reverse" id="container-categories-activities"></div>
        </div>
    </div>

    <script>
        $(document).ready(function () {
           function loadCategoryActivities() {
               $.ajax({
                   url: "{{ route('activities-categories.index') }}",
                   method: "GET",
                   success: function (response) {
                       $('#container-categories-activities').empty();

                       $.each(response, function (index, activitiesCategories) {
                           $('#container-categories-activities').append(createTagCardActivities(activitiesCategories));
                       });

                   },
                   error: function (xhr) {
                       alert(xhr);
                   }
               });
           }

           loadCategoryActivities();

            $('#container-categories-activities').on('click', '.activities-categories-filter', function () {
                let categoriesId = $(this).data('categories-activities-id');

                $.ajax({
                    url: "{{ route('activities.list') }}",
                    method: "GET",
                    data: {
                        category: [categoriesId],
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
            });

            $('.btn-search-activities').on('click', function () {
                const search = $('#search-activities').val();



                $.ajax({
                    url: "{{ route('activities.list') }}",
                    method: "GET",
                    data: {
                        search: search,
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
                })
            })
        });



        function createTagCardActivities(activities) {
            return `
            <div class="h-full bg-[#FFF7EC] flex px-6 py-4 rounded-[50px] space-x-2 cursor-pointer transform duration-150 active:scale-95 activities-categories-filter"
                data-categories-activities-id=${activities.id}>
                     ${activities.featured_image}
                <p class="text-[#FF5700] text-base font-semibold leading-[24px]">
                 ${activities.name}
                </p>
            </div>

`
        }
    </script>
</div>

