import { toggledDate, dateFormHidden, today } from "./calendar.js";

const statusDropDown = document.getElementById('status-drop-down');
const dateForm = document.getElementById('select-date');
const appointmentTime = document.querySelectorAll('.appointment-time');
const appointmentAction = document.querySelectorAll('.appointment-action');

const uri = window.location.search;
const statusParam = new URLSearchParams(uri);
const selectedStatus = statusParam.get('status');
const selectedDate = statusParam.get('date');

if(selectedStatus === "accepted"){
    statusDropDown.selectedIndex = 0;
}
else{
    statusDropDown.selectedIndex = 1;
}

statusDropDown.addEventListener('change', event => {
    console.dir(event.target);
    dateFormHidden.value = toggledDate;
    dateForm.submit();
});

function dayDifference(d1, d2) {
    const dateToday = new Date(today);
    const dateSelected = new Date(selectedDate);

    return parseInt((dateToday-dateSelected)/(24*3600*1000));
}

function cardStatus(){
    for(const time of appointmentTime){
        if(selectedStatus === "accepted"){
            time.classList.add("accepted");
        }
        else if(selectedStatus === "cancelled"){
            time.classList.add("cancelled");
        }
    }

    for(const action of appointmentAction){
        if(selectedStatus === "accepted" && dayDifference() <= 0){
            action.classList.add("accepted");
        }
        else if(selectedStatus === "cancelled" || dayDifference() > 0){
            action.classList.add("cancelled");
        }
    }
}
cardStatus();