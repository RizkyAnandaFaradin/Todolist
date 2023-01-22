const alertPlaceholder = document.getElementById('liveAlertPlaceholder');

const alert = (message, type) => {
    const wrapper = document.createElement('div');
    wrapper.innerHTML = [`<div class="alert alert-${type} alert-dismissible" role="alert">`, `   <div>${message}</div>`, '   <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>', '</div>'].join('');

    alertPlaceholder.append(wrapper);
};

const alertTrigger = document.getElementById('liveAlertBtn');
if (alertTrigger) {
    alertTrigger.addEventListener('click', () => {
        alert('Add Task Successfully', 'success');
    });
}

// select input element
const search = document.getElementById('search');

// add event listener for input
search.addEventListener('input', function () {
    // get input value
    const value = search.value.toLowerCase();

    // select all table rows
    const rows = document.querySelectorAll('table tr');

    // loop through rows
    rows.forEach(function (row) {
        if (row.classList.contains('table-primary')) {
            row.style.display = '';
            return;
        }
        // select all cells in row
        const cells = row.querySelectorAll('td');

        // check if cells contain input value
        let match = false;
        cells.forEach(function (cell, index) {
            if (index === 0 || index === 1) {
                if (cell.textContent.toLowerCase().indexOf(value) > -1) {
                    match = true;
                }
            } else if (index === 2) {
                if (cell.textContent.toLowerCase().indexOf(value) > -1) {
                    match = true;
                }
            }
        });

        // show or hide row based on match
        if (match) {
            row.style.display = '';
        } else {
            row.style.display = 'none';
        }
    });
});
