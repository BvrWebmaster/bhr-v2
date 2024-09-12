function getDate() {
    const date = new Date();
    const dateTomorrow = new Date(date);
    dateTomorrow.setDate(date.getDate() + 1);

    const dateMonthOptions = { day: 'numeric', month: 'long' };
    const day = date.toLocaleDateString('id-ID', dateMonthOptions);
    const tomorrow = dateTomorrow.toLocaleDateString('id-ID', dateMonthOptions);

    return {
        day, tomorrow
    }
}

function formatDateLocal(dateString) {
    let date = new Date(dateString);
    let options = { day: '2-digit', month: 'long' };
    return date.toLocaleDateString('id-Id', options);
}

function selectLocationCard(location) {
    return `
                <option value="${location.id}">${location.name}</option>
            `;
}

function selectedLocationCard() {
    return `<option selected>Choose countries</option>`;
}

function cardAccomodationHome(accomodation) {
    const hotelsAndVillaBaseURL = "hotels-and-villa/";

    return `
                    <div class="w-[45%] tablet:w-1/3 laptop:w-[24.4%] flex-shrink-0">
                        <a href="${hotelsAndVillaBaseURL}${accomodation.slug}" class="cursor-pointer bg-white w-[167px] tablet:w-[212px] laptop-l:w-[308px] desktop:w-[348px]">
                            <img src="https://www.bvrbaliholidayrentals.com/storage/images/6544c31d6db77.jpg"
                                 alt="${accomodation.name}"
                                 class="w-full h-[104px] object-cover tablet:h-[152px] laptop:h-[152px] laptop-l:h-[225px] rounded-t-[6.58px] tablet:rounded-t-[11px] laptop-l:rounded-t-2xl">

                            <div class="px-3 py-2 tablet:px-4 tablet:py-4 desktop:py-5 desktop:px-6 space-y-4 border border-b-[#BDBDBD] border-l-[#BDBDBD] border-r-[#BDBDBD] rounded-b-[6.58px] tablet:rounded-b-[11px] laptop-l:rounded-b-2xl">
                                <div class="space-y-3">
                                    <div class="space-y-3 tablet:space-y-4">
                                        <div class="space-y-2">
                                            <h4 class="text-[#292929] text-sm tablet:text-base tablet:leading-[24px] h-16 laptop:text-base laptop-l:text-lg font-semibold leading-[23.8px] laptop:leading-[24px] laptop-l:leading-[27px]">
                                                ${accomodation.name}
                                            </h4>
                                            <p class="text-[#7C7C7C] text-xs font-medium tablet:leading-[18px] laptop-l:text-sm leading-[18px] laptop-l:leading-[21px]">
                                                ${accomodation.location.name}
                                            </p>
                                        </div>
                                        <div class="flex space-x-2 items-center">
                                            <div>
                                                <x-ui.icon.umbrella-icon />
                                            </div>
                                            <div class="text-xs laptop-l:text-sm text-[#7C7C7C]">
                                                <span class="font-medium leading-[20.4px] tablet:leading-[18px] laptop:leading-[21px]">Near</span>
                                                <span class="font-semibold tablet:leading-[18px] laptop:leading-[21px]">
                                                    ${accomodation.location.name}
                                                </span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="space-y-1">
                                        <div class="flex items-center space-x-2">
                                            <div class="line-through text-xs tablet:text-xs tablet:font-medium tablet:leading-[18px] laptop:text-sm font-medium text-[#7C7C7C] leading-[18px] laptop:leading-[21px]">
                                                IDR 1.0000.000
                                            </div>
                                            <div class="bg-[#ffedd3] w-fit px-2 py-1 rounded-[10px]">
                                                <p class="text-[#ff5700] text-xs laptop:text-sm font-bold leading-[18px] laptop:leading-[21px]">
                                                    10%
                                                </p>
                                            </div>
                                        </div>
                                        <div class="font-semibold text-sm tablet:text-base laptop:text-base laptop-l:text-xl text-[#ff5700] leading-[21px] laptop:leading-[24px] laptop-l:leading-[30px] tracking-[0.298px] tablet:tracking-[0.5px] laptop:tracking-[0.5px]">
                                            IDR 1.0000.000
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                `;
}

function accomodationCardHotelsAndVilla(accomodation) {
    const hotelsAndVillaBaseURL = "hotels-and-villa/";

    return `
            <a href="${hotelsAndVillaBaseURL}${accomodation.slug}" class="cursor-pointer grid grid-cols-9 ">
                <div class="col-span-9 tablet:col-span-3 relative">
                    <img class="h-[200px] tablet:h-full w-full object-cover rounded-t-2xl tablet:rounded-l-2xl laptop:rounded-l-[28px] tablet:rounded-t-none tablet:rounded-tl-2xl laptop:rounded-tl-[28px]" src="${accomodation.images}" alt="${accomodation.title}" />

                </div>
                <div class="col-span-9 laptop:max-h-[286px] laptop-l:max-h-[386px] tablet:col-span-6 border border-t-[#BDBDBD] border-b-[#BDBDBD] border-r-[#BDBDBD] rounded-b-2xl tablet:rounded-r-2xl laptop-l:rounded-r-[28px] tablet:rounded-bl-none no-scrollbar">
                    <div class="px-5 laptop:px-5 laptop-l:px-10 py-3 laptop-l:py-8 space-y-6">
                        <div class="flex flex-col space-y-2">
                            <h2 class="font-sans text-[#292929] text-base tablet:text-xl laptop:text-2xl font-semibold leading-[36px]">${accomodation.name}</h2>
                            <div class="flex space-x-2 items-center">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                                  <path d="M21 10C21 17 12 23 12 23C12 23 3 17 3 10C3 7.61305 3.94821 5.32387 5.63604 3.63604C7.32387 1.94821 9.61305 1 12 1C14.3869 1 16.6761 1.94821 18.364 3.63604C20.0518 5.32387 21 7.61305 21 10Z" stroke="#7C7C7C" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                                  <path d="M12 13C13.6569 13 15 11.6569 15 10C15 8.34315 13.6569 7 12 7C10.3431 7 9 8.34315 9 10C9 11.6569 10.3431 13 12 13Z" stroke="#7C7C7C" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                                </svg>
                                <p class="font-sans text-[#7C7C7C] text-xs tablet:text-base font-medium leading-[12px] tablet:leading-[26px] tracking-[0.3px]">${accomodation.location.name}</p>
                            </div>
                        </div>
                        <div class="font-sans text-[#7C7C7C] text-xs laptop:text-base font-medium leading-[26px] tracking-[0.3px] w-full space-y-4">
                            <div class="flex space-x-2 w-full items-center">
                                <div>
                                   <div class="rounded-full py-[4.25px] px-[3px] flex items-center justify-center bg-[#FF9132]">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="10" height="8" viewBox="0 0 10 8" fill="none" class="tablet:hidden">
                                            <path d="M8.74805 5.875C8.74805 5.94604 8.72171 6.01417 8.67482 6.0644C8.62794 6.11464 8.56435 6.14286 8.49805 6.14286C8.43174 6.14286 8.36815 6.11464 8.32127 6.0644C8.27439 6.01417 8.24805 5.94604 8.24805 5.875V2.125C8.24805 1.09107 7.21305 0.25 6.24805 0.25H1.99805C1.46761 0.25 0.958906 0.475765 0.583833 0.877628C0.208761 1.27949 -0.00195312 1.82454 -0.00195312 2.39286V7.75H1.99805V5.60714H4.49805V7.75H6.49805V5.33929C6.49805 5.26825 6.52439 5.20011 6.57127 5.14988C6.61815 5.09965 6.68174 5.07143 6.74805 5.07143C6.81435 5.07143 6.87794 5.09965 6.92482 5.14988C6.97171 5.20011 6.99805 5.26825 6.99805 5.33929V6.14286C6.99805 6.5691 7.15608 6.97788 7.43739 7.27928C7.71869 7.58068 8.10022 7.75 8.49805 7.75C8.89587 7.75 9.2774 7.58068 9.55871 7.27928C9.84001 6.97788 9.99805 6.5691 9.99805 6.14286V5.07143H8.74805V5.875Z" fill="white"/>
                                        </svg>

                                        <svg xmlns="http://www.w3.org/2000/svg" width="14" height="10" viewBox="0 0 14 10" fill="none" class="hidden tablet:block">
                                            <path
                                                d="M11.9987 7.5C11.9987 7.59472 11.9636 7.68556 11.9011 7.75254C11.8386 7.81952 11.7538 7.85714 11.6654 7.85714C11.577 7.85714 11.4922 7.81952 11.4297 7.75254C11.3672 7.68556 11.332 7.59472 11.332 7.5V2.5C11.332 1.12143 9.95203 0 8.66537 0H2.9987C2.29145 0 1.61318 0.301019 1.11308 0.836838C0.612983 1.37266 0.332031 2.09938 0.332031 2.85714V10H2.9987V7.14286H6.33203V10H8.9987V6.78571C8.9987 6.69099 9.03382 6.60015 9.09633 6.53318C9.15884 6.4662 9.24363 6.42857 9.33203 6.42857C9.42044 6.42857 9.50522 6.4662 9.56773 6.53318C9.63025 6.60015 9.66537 6.69099 9.66537 6.78571V7.85714C9.66537 8.42546 9.87608 8.97051 10.2512 9.37237C10.6262 9.77424 11.1349 10 11.6654 10C12.1958 10 12.7045 9.77424 13.0796 9.37237C13.4547 8.97051 13.6654 8.42546 13.6654 7.85714V6.42857H11.9987V7.5Z"
                                                fill="white"/>
                                        </svg>
                                    </div>
                                </div>
                                <div class="flex space-x-1">
                                    <p class="font-medium">Near</p>
                                    <p class="font-semibold">Bali Zoo</p>
                                </div>
                            </div>
                        </div>

                        <div class="w-full flex space-x-1 overflow-scroll tablet:hidden">
                            ${accomodation.facilities.map(facility =>
        `<div class="rounded-full py-1 bg-[#FFEDD3] px-2 flex justify-center items-center">
                                        <p class="font-sans text-[#FF5700] text-xs tablet:text-sm font-semibold leading-[18px]">${facility.name}</p>
                                    </div>`
    ).join('')}
                        </div>

                        <div class="flex justify-between">
                            <div>
                                <div class="hidden tablet:flex flex-wrap space-y-4 space-x-2">
                                    ${accomodation.facilities.map(facility =>`
                                      <div class="rounded-full py-1 bg-[#FFEDD3] px-4 laptop:px-4 flex justify-center items-center">
                                        <p class="text-[#FF5700] text-xs laptop:text-sm font-bold leading-[21px]">${facility.name}</p>
                                      </div>
                                    `).join('')}
                                </div>
                            </div>
                            <div class="flex flex-col space-y-1 items-start">
                                <h3 class="font-sans text-[#7C7C7C] text-xs tablet:text-base font-medium leading-[24px]">Starts from</h3>
                                <div class="flex space-x-2 items-center">
                                    <p class="font-sans line-through text-[#7C7C7C] text-xs tablet:text-base font-medium">IDR 3.456.789</p>
                                    <button class="rounded-[10px] px-1 py-[2px] bg-[#FFEDD3] text-[#FF5700] text-xs tablet:text-base font-bold leading-[18px]">
                                        -10%
                                    </button>
                                </div>
                                <p class="font-sans text-[#FF5700] text-base laptop:text-2xl font-semibold leading-[24px] tracking-[0.5px]">IDR 2.345.678</p>
                            </div>
                        </div>
                    </div>
                </div>
            </a>
        `;
}

