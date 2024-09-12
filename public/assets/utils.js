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


