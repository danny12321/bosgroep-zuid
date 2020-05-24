const form = document.querySelector('#question-form');

form.onsubmit = () => {
    const selects = [...form.querySelectorAll('input[type=radio]')];
    let filters = [];

    selects.forEach(select => {
        if (select.checked) {
            try {
                const f = JSON.parse(select.value)

                f.forEach(filter => {
                    const index = filters.findIndex(f => f === filter.id)

                    if (index === -1) {
                        filters.push(filter.id);
                    }
                })
            } catch (e) {
                console.error('Invalid json')
            }
        }
    })

    filters.sort()
    window.location.href = `${form.action}?filters=${filters.join('-')}`;
    return false;
}