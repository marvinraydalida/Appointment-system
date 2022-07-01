const inputDate = document.getElementById('inputDate');
const actionSelector = document.getElementById('action-selector');
const form = document.querySelector('form');

const uri = window.location.search;
const statusParam = new URLSearchParams(uri);
const selectedAction = statusParam.get('action');
const selectedDate = statusParam.get('date');

inputDate.value = selectedDate;

if(selectedAction === "All"){
    actionSelector.selectedIndex = 0;
}
else if(selectedAction === "Log-out"){
    actionSelector.selectedIndex = 1;
}
else if(selectedAction === "Log-in"){
    actionSelector.selectedIndex = 2;
}
else if(selectedAction === "Accepted"){
    actionSelector.selectedIndex = 3;
}
else if(selectedAction === "Rescheduled"){
    actionSelector.selectedIndex = 4;
}
else if(selectedAction === "Cancelled"){
    actionSelector.selectedIndex = 5;
}
else if(selectedAction === "Declined"){
    actionSelector.selectedIndex = 6;
}

inputDate.addEventListener('change', ()=>{
    form.submit();
});

actionSelector.addEventListener('change', () => {
    form.submit();
});
