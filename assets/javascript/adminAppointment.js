import { toggledDate, dateFormHidden } from "./calendar.js";

const statusDropDown = document.getElementById('status-drop-down');
const dateForm = document.getElementById('select-date');

const uri = window.location.search;
const statusParam = new URLSearchParams(uri);
const selectedStatus = statusParam.get('status');

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