{!! seo($seoData) !!}
<x-app-layout>

    <main>

        <!-- for seaction -->
        <section class="bg-white w-full sticky top-0 z-30 shadow px-4 laptop:px-0">
            <div class="overflow-x-scroll no-scrollbar tablet:max-w-2xl laptop:max-w-4xl laptop-l:max-w-7xl desktop:max-w-[1440px] mx-auto flex space-x-6 laptop:space-x-10">
                <div class="cursor-pointer py-4 laptop:py-6 section-link-activities text-nowrap" data-target="#general-info">
                    <p class="text-[#989898] laptop:text-xl font-semibold leading-[30px]">General Info</p>
                </div>

                <div class="cursor-pointer py-4 laptop:py-6 section-link-activities text-nowrap" data-target="#ticket-booking">
                    <p class="text-[#989898] laptop:text-xl font-semibold leading-[30px]">Ticket Booking</p>
                </div>

                <div class="cursor-pointer py-4 laptop:py-6 section-link-activities text-nowrap" data-target="#tearms-and-condition">
                    <p class="text-[#989898] laptop:text-xl font-semibold leading-[30px]">Terms and Conditions</p>
                </div>

                <div class="cursor-pointer py-4 laptop:py-6 section-link-activities text-nowrap" data-target="#location">
                    <p class="text-[#989898] laptop:text-xl font-semibold leading-[30px]">Location</p>
                </div>

                <div class="cursor-pointer py-4 laptop:py-6 section-link-activities text-nowrap" data-target="#description">
                    <p class="text-[#989898] laptop:text-xl font-semibold leading-[30px]">Description</p>
                </div>
            </div>
        </section>

        <!-- section title and price -->
        <x-layout.section-detail id="general-info">
            <!-- description -->
            <div class="space-y-4 py-4">
                <div class="space-y-2">
                    <x-ui.label.text-header-detail :label="$activity->name" />
                    <div class="flex space-x-3 items-center">
                        <x-ui.icon.icon-location-detail />
                        <x-ui.label.text-detail-location :label="$activity->location->description" />
                    </div>
                </div>
                <div class="flex space-x-3">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                        <path d="M12 22C17.5228 22 22 17.5228 22 12C22 6.47715 17.5228 2 12 2C6.47715 2 2 6.47715 2 12C2 17.5228 6.47715 22 12 22Z" stroke="#7C7C7C" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                        <path d="M12 6V12L16 14" stroke="#7C7C7C" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                    </svg>
                    <div>
                        <p class="text-[#7C7C7C] text-sm tablet:text-base laptop:text-lg laptop-l:text-xl font-medium leading-[30px]">Everyday 09:00 - 17:00</p>
                    </div>
                </div>
            </div>

            <!-- price -->
            <div class="hidden space-y-4 laptop:flex flex-col justify-end laptop:pb-12">
                <div class="w-full space-y-1 flex flex-col items-end  justify-end">
                    <p class="text-[#7C7C7C] text-base font-bold leading-[24px] tracking-[0.3px]">Start from</p>
                    <h3 class="text-[#FF5700] font-semibold text-[32px] tracking-[0.5px]">
                        IDR {{ $activity->price_idr }}
                        <span class="text-[#7C7C7C] text-base leading-[24px] tracking-[0.5px]">/pax</span>
                    </h3>
                    <p class="text-[#7C7C7C] text-base leading-[24px] tracking-[0.5px]">International Price</p>
                </div>
                <button class="bg-[#FF5700] py-[13px] px-6 rounded-xl text-[#FFF] text-xl font-semibold leading-[30px]">
                    See Packages
                </button>
            </div>
        </x-layout.section-detail>

        <!-- section ticket booking -->
        <x-layout.section-detail id="ticket-booking">
          <div class="w-full py-2 tablet:py-4 laptop:py-6">
              <x-layout.layout-border-detail>
                  <x-ui.label.text-detail-header-section label="What You Will Experience" />
                  <div class="flex flex-col space-y-4">
                      <x-ui.partials.text-more-policy label="See, observe, and interact with a collection of animals in their habitat." />
                      <x-ui.partials.text-more-policy label="Enjoy free pass to Jungle Splash Waterplay" />
                      <x-ui.partials.text-more-policy label="Bring your family and friends to enjoy the Exotic Bird Show at Kampung Sumatra Stage" />
                      <x-ui.partials.text-more-policy label="Go paperless by presenting your E-ticket at the registration desk" />
                  </div>
              </x-layout.layout-border-detail>
          </div>
        </x-layout.section-detail>

        <x-layout.section-detail id="ticket-booking">
           <div class="w-full py-2 tablet:py-4 laptop:py-6">
               <x-layout.layout-border-detail>
                   <x-ui.label.text-detail-header-section label="Ticket Booking" />

                   <div class="w-full grid laptop-l:grid-cols-2 gap-x-8 gap-y-2 laptop:gap-y-3">
                       <x-layout.layout-border-booking-tiket>
                           <div class="w-full flex justify-between">
                               <div class="flex space-x-4 items-center">
                                   <x-ui.icon.date-time-icon />
                                   <x-ui.label.text-detail-border label="Visit Date" />
                               </div>
                               <x-ui.button.button-see-more id="btn-other-date" label="Check Other Available Dates" />
                           </div>

                           <div class="w-full grid grid-cols-4 gap-x-1 tablet:gap-x-2 laptop:gap-x-3 desktop:gap-x-4" id="container-date-booking"></div>

                           <div class="flex space-x-4">
                               <p class="text-[#7C7C7C] text-sm tablet:text-base laptop:text-lg laptop-l:text-xl font-medium leading-[30px]">Validity Period:</p>
                               <p class="text-[#7C7C7C] text-sm tablet:text-base laptop:text-lg laptop-l:text-xl font-semibold leading-[30px]">11 Jun - 18 Jun 2024</p>
                           </div>
                       </x-layout.layout-border-booking-tiket>

                       <x-layout.layout-border-ticket-quantity>
                           <div class="w-full flex justify-between">
                               <div class="flex space-x-4 items-center">
                                   <x-ui.icon.ticket-icon />
                                   <x-ui.label.text-detail-border label="Tickets Quantity" />
                               </div>
                           </div>

                         <div>
                             <x-ui.partials.container-ticket-booking-quantity
                                 label="Adult"
                                 subLabel="Above 12 years old"
                                 btnDecrement="btn-decrement-ticket-adult"
                                 btnIncrement="btn-increment-ticket-adult"
                                 quantity="quantity-ticket-adult" />

                             <div class="w-full py-5">
                                 <div class="w-full bg-[#EFEFEF] rounded-[50px] h-[2px]"></div>
                             </div>

                             <x-ui.partials.container-ticket-booking-quantity
                                 label="Child"
                                 subLabel="2 - 12 years old"
                                 btnDecrement="btn-decrement-ticket-child"
                                 btnIncrement="btn-increment-ticket-child"
                                 quantity="quantity-ticket-child" />
                         </div>

                       </x-layout.layout-border-ticket-quantity>
                   </div>

                   <div class="w-full flex  laptop:justify-end">
                       <div class="w-full flex justify-between laptop:gap-x-10">
                           <div class="flex flex-col space-y-1  justify-start laptop:items-end">
                               <p class="text-[#7C7C7C] text-base tablet:text-lg laptop:text-xl font-semibold leading-[30px]">Total Price</p>
                               <h3 class="text-[#FF5700] text-lg tablet:text-xl laptop:text-2xl laptop-l:text-[32px] font-semibold leading-[48px]">IDR 2.345.678</h3>
                           </div>
                           <div class="flex items-center">
                               <button class="w-[154px] laptop:w-[227px] bg-[#FF5700] px-2 laptop:px-6 py-2 laptop:py-[13px] rounded-xl text-[#FFF] text-base laptop:text-xl font-semibold leading-[30px]">
                                   Book Now
                               </button>
                           </div>
                       </div>
                   </div>

               </x-layout.layout-border-detail>
           </div>
        </x-layout.section-detail>

        <!-- section tearms and conditions -->
        <x-layout.section-detail id="tearms-and-condition">
            <div class="w-full py-2 tablet:py-4 laptop:py-6">
                <x-layout.layout-border-detail>
                    <x-ui.label.text-detail-header-section label="Terms and Conditions" />

                    <div class="flex flex-col space-y-6">
                       <div class="flex space-x-4 items-center">
                           <x-ui.icon.general-icon />
                           <x-ui.label.text-header-policy-detail label="Check-in Procedure" />
                       </div>
                        <x-ui.partials.text-tearms-and-condition-cheklist label="Prices include taxes." />
                        <x-ui.partials.text-tearms-and-condition-cheklist label="Bali Zoo entrance ticket(s) that has been purchased is non-refundable." />
                        <x-ui.partials.text-tearms-and-condition-cheklist label="Ticket(s) that have been purchased cannot be re-scheduled." />
                        <x-ui.partials.text-tearms-and-condition-cheklist label="Customers are required to fill in personal data when ordering." />
                    </div>

                    <div class="flex flex-col space-y-6">
                        <div class="flex space-x-4 items-center">
                            <x-ui.icon.more-policy-icon />
                            <x-ui.label.text-header-policy-detail label="Bali Zoo Terms and Conditions" />
                        </div>
                        <x-ui.partials.text-tearms-and-condition-cheklist label="Visitors under the age of 2 can enter for free." />
                        <x-ui.partials.text-tearms-and-condition-cheklist label="Visitors in the category of children are those aged 2-12 years." />
                        <x-ui.partials.text-tearms-and-condition-cheklist label="Shows and schedules are subject to change without prior notice due to weather conditions." />
                    </div>
                </x-layout.layout-border-detail>
            </div>
        </x-layout.section-detail>

        <!-- section location -->
        <x-layout.section-detail id="location">
            <div class="w-full py-2 tablet:py-4 laptop:py-6">
                <x-layout.layout-border-detail>
                    <x-ui.label.text-detail-header-section label="Location" />
                    <div id="map-activities" class="h-[364px] w-full -z-30 rounded-xl"></div>
                    <div class="w-full flex flex-col space-y-2 laptop:space-y-0 laptop:flex-row justify-between items-center">
                        <p class="text-[#7C7C7C] text-sm tablet:text-base laptop:text-lg laptop-l:text-xl font-medium leading-[30px]">Jl. Raya Singapadu, Singapadu, Kec. Sukawati, Kabupaten Gianyar, Bali 80582</p>
                        <div class="bg-[#FFF7EC] py-3 w-full laptop:w-[425px] flex items-center justify-center rounded-xl">
                            <p class="text-[#FF5700] text-sm tablet:text-base laptop:text-lg laptop-l:text-xl font-semibold leading-[30px]">Directions on Maps</p>
                        </div>
                    </div>
                </x-layout.layout-border-detail>
            </div>
        </x-layout.section-detail>

        <!-- section price mobile -->
        <div class="laptop:hidden fixed z-30 bottom-0 w-full py-4 bg-white rounded-t-2xl shadow">
            <div class="w-full flex justify-between px-4">
                <div class="space-y-1 flex flex-col items-start">
                    <p class="text-[#7C7C7C] text-sm font-bold leading-[24px] tracking-[0.3px]">Start from</p>
                    <h3 class="text-[#FF5700] font-semibold text-lg tracking-[0.5px]">
                        IDR {{ $activity->price_idr }}
                        <span class="text-[#7C7C7C] text-base leading-[24px] tracking-[0.5px]">/pax</span>
                    </h3>
                    <p class="text-[#7C7C7C] text-sm leading-[24px] tracking-[0.5px]">International Price</p>
                </div>
                <div class="flex items-center">
                    <button class="bg-[#FF5700] py-3 px-3  rounded-xl text-[#FFF] text-base font-semibold leading-[30px]">
                        See Packages
                    </button>
                </div>
            </div>
        </div>

        <x-layout.section-cta />
    </main>

    <script>
        window.onload = function () {
            const latitude = -8.469656;
            const longitude = 115.159928;

            const map = L.map('map-activities', {
                center: [latitude, longitude],
                zoom: 13
            });

            L.tileLayer('https://tile.openstreetmap.org/{z}/{x}/{y}.png', {
                maxZoom: 19,
                attribution: '&copy; <a href="http://www.openstreetmap.org/copyright">OpenStreetMap</a>'
            }).addTo(map);

            const circle = L.circle([latitude, longitude], {
                color: 'red',
                fillColor: '#f03',
                fillOpacity: 0.2,
                radius: 800
            }).addTo(map);

            $('#open-map').on('click', function (event) {
                event.preventDefault();
                const maps = `https://www.google.com/maps?q=${latitude},${longitude}`;
                window.open(maps, '_blank');
            });
        };


        $(document).ready(function () {

           $('.section-link-activities').on('click', function () {
               let target = $(this).data('target');

               $('html, body').animate({
                   scrollTop: $(target).offset().top - 56
               }, 100);

               let container = $(this).parent();
               let position = $(this).offset().left - container.offset().left + container.scrollLeft();

               container.animate({
                   scrollLeft: position
               }, 300);
           });

           $(window).on('scroll', function () {
               let scrollPosition = $(window).scrollTop();

               $('.section').each(function () {
                   let sectionTop = $(this).offset().top - 120;
                   let sectionBottom = sectionTop + $(this).outerHeight();
                   let sectionId = $(this).attr('id');

                   if (scrollPosition >= sectionTop && scrollPosition < sectionBottom) {
                       $('.section-link-activities').removeClass('active').find('p').removeClass('text-[#FF5700]').addClass('text-[#989898]');
                       $('.section-link-activities').removeClass('border-b-[5px] border-[#FF5700]');
                       $('.section-link-activities[data-target="#' + sectionId + '"]').addClass('active').find('p').removeClass('text-[#989898]').addClass('text-[#FF5700]');
                       $('.section-link-activities[data-target="#' + sectionId +'"]').addClass('border-b-[5px] border-[#FF5700]');
                   }
               });
           });

           const dates = getNextDays(4);
           dates.forEach(function (date) {
               $('#container-date-booking').append(containerDateBooking(date));
           });

           $('#container-date-booking').on('click', '.date-booking', function () {

               $('.date-booking').removeClass('bg-[#FFF7EC] border-[#FF5700]').addClass('border-[#BDBDBD]');
               $('.date-booking').find('p').removeClass('text-[#FF5700]').addClass('text-[#7C7C7C]');
               $('.date-booking').find('h4').removeClass('text-[#FF5700]').addClass('text-[#292929]');

               $(this).removeClass('border-[#BDBDBD]').addClass('bg-[#FFF7EC] border-[#FF5700]');
               $(this).find('p').removeClass('text-[#7C7C7C]').addClass('text-[#FF5700]');
               $(this).find('h4').removeClass('text-[#292929]').addClass('text-[#FF5700]');
           });


           // logic of increment dan decrement
            let ticketQuantity = 0;
            let childQuantity = 0;

            $('.btn-increment-ticket-adult').on('click', function () {
                ticketQuantity ++;
                $('.quantity-ticket-adult').text(ticketQuantity);
            });

            $('.btn-decrement-ticket-adult').on('click', function () {
                if (ticketQuantity > 0) {
                    ticketQuantity --;
                    $('.quantity-ticket-adult').text(ticketQuantity);
                }
            });

            $('.btn-increment-ticket-child').on('click', function () {
                childQuantity ++;
                $('.quantity-ticket-child').text(childQuantity);
            });

            $('.btn-decrement-ticket-child').on('click', function () {
                if (childQuantity > 0) {
                    childQuantity --;
                    $('.quantity-ticket-child').text(childQuantity);
                }
            })


        });

        function containerDateBooking(date) {
           return `
             <div class="transform duration-300 date-booking w-full flex-shrink-0 py-2 desktop:py-4 px-3 desktop:px-6 flex flex-col space-y-1 border border-[#BDBDBD] rounded-xl laptop:rounded-2xl items-center">
                <p class="text-[#7C7C7C] text-sm tablet:text-base laptop:text-lg desktop:text-xl font-medium leading-[30px]">Today</p>
                <h4 class="text-[#292929] text-sm tablet:text-base laptop:text-lg laptop-l:text-xl desktop:text-2xl font-semibold leading-[36px]">${date}</h4>
            </div>
           `
        }
    </script>

</x-app-layout>
