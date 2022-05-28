const date = new Date();
const today = new Date().toISOString().slice(0, 10);
const currentYear = date.getFullYear();
const currentMonth = date.getMonth() + 1;
const monthPickerLabel = document.querySelector('#month-picker h1');
const monthPickerButtons = document.querySelectorAll('#month-picker button');
const datePickerButtons = document.querySelectorAll('td button');
const months = ['', 'January', 'February', 'March', 'April', 'May', 'June',
    'July', 'August', 'September', 'October', 'November', 'December'
];
const tableData = document.querySelectorAll('td');


let selectedMonthIndex = currentMonth;
let selectedYear = currentYear;
let previousSelectedDate = null;

function getDaysInMonth(year, month) {
    return new Date(year, month, 0).getDate();
}

function getDay(year, month) {
    return new Date(`${month}-1-${year}`).getDay();
}

function fillCalendar(year, month) {
    const daysInCurrentMonth = getDaysInMonth(year, month);
    const firstDay = getDay(year, month);

    for (const day of tableData) {
        day.firstElementChild.textContent = '';
        day.firstElementChild.disabled = true;
        day.firstElementChild.classList.remove('current-day');
    }

    let currentDay;
    let currentMonth;
    for (let i = firstDay, j = 1; j <= daysInCurrentMonth; i++, j++) {
        tableData[i].firstElementChild.textContent = j;
        tableData[i].firstElementChild.disabled = false;
        currentDay = j;
        currentMonth = month;
        if (j < 10) currentDay = '0' + j;
        if (month < 10) currentMonth = '0' + month;
        if (today === `${year}-${currentMonth}-${currentDay}`) {
            tableData[i].firstElementChild.classList.toggle('current-day');
        }
    }
}

function changeMonth() {
    if (previousSelectedDate !== null) {
        previousSelectedDate.classList.remove('date-toggle');
        previousSelectedDate = null;
    }

    if (this === this.parentNode.children[0]) {
        selectedMonthIndex--;
        if (selectedMonthIndex < 1) {
            selectedYear--;
            selectedMonthIndex = 12;
        }
    } else {
        selectedMonthIndex++;
        if (selectedMonthIndex > 12) {
            selectedYear++;
            selectedMonthIndex = 1;
        }
    }

    monthPickerLabel.textContent = `${months[selectedMonthIndex]} - ${selectedYear}`;

    if (currentMonth !== selectedMonthIndex && currentYear === selectedYear ||
        currentYear !== selectedYear) {
        monthPickerButtons[0].disabled = false;
    } else {
        monthPickerButtons[0].disabled = true;
    }

    fillCalendar(selectedYear, selectedMonthIndex);
}

function selectDate(event) {
    if (previousSelectedDate !== null && event.target !== previousSelectedDate) {
        previousSelectedDate.classList.toggle('date-toggle');
    }
    event.target.classList.toggle('date-toggle');
    previousSelectedDate = event.target;
}

monthPickerButtons[0].addEventListener('click', changeMonth);
monthPickerButtons[1].addEventListener('click', changeMonth);

for (const btn of datePickerButtons) {
    btn.addEventListener('click', selectDate);
}

monthPickerLabel.textContent = `${months[selectedMonthIndex]} - ${selectedYear}`;
fillCalendar(selectedYear, selectedMonthIndex);
