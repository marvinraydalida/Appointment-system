const modalCloseBtn = document.querySelectorAll('.modal-close');
const modalBackDrop = document.getElementById('modal-container');
const addAccountBtn = document.querySelectorAll('.addAdminBtn');
const editAccountBtn = document.querySelectorAll('.editAdminBtn');
const confirmPass = document.getElementById("ConfirmPassword");
const confirmEditPass = document.getElementById("ConfirmEditPassword");
const pass = document.getElementById("Password");
const oldpass = document.getElementById("OldPassword");
const newpass = document.getElementById("NewPassword");
const submit = document.getElementById("submit");
const submitEdit = document.getElementById("submitEdit");
const create = document.getElementById("create");
const edit = document.getElementById("edit");

for (const btn of addAccountBtn) {
    btn.addEventListener('click', showModal);
}

for (const editbtn of editAccountBtn) {
    editbtn.addEventListener('click', showModal);
}

confirmPass.addEventListener('keyup',function(){
    console.log(confirmPass.value);
    console.log(pass.value);
    if(confirmPass.value !== pass.value){
        confirmPass.setCustomValidity('Passwords do not match');
        
    }
    else{
        confirmPass.setCustomValidity('');
    }
    confirmPass.reportValidity();

    submit.addEventListener("click", function(event){
        if(confirmPass.value !== pass.value){
            event.preventDefault()
        }
        else{
            create.submit();
        }
      });
});

confirmEditPass.addEventListener('keyup',function(){
    console.log(confirmEditPass.value);
    console.log(newpass.value);
    if(confirmEditPass.value !== newpass.value){
        confirmEditPass.setCustomValidity('Passwords do not match');
    }
    else{
        confirmEditPass.setCustomValidity('');
    }
    confirmEditPass.reportValidity();

    submit.addEventListener("click", function(event){
        if(confirmEditPass.value !== newpass.value){
            event.preventDefault();
        }
        else{
            edit.submit();
        }
      });
});


modalBackDrop.addEventListener('click', closeModal);

function closeModal(event) {
    if (event.target.tagName === 'BUTTON') {
        event.target.closest('section').style.display = "none";
        document.getElementById('addAccount-modal').style.display = "none";
        document.getElementById('editAccount-modal').style.display = "none";
        $("input[type=text], textarea"). val("");
        $("input[type=password], textarea"). val("");
    }
    else if (event.target.tagName === 'SECTION') {
        event.target.style.display = "none";
        document.getElementById('addAccount-modal').style.display = "none";
        document.getElementById('editAccount-modal').style.display = "none";
        $("input[type=text], textarea"). val("");
        $("input[type=password], textarea"). val("");
    }
}


function showModal(event) {
    modalBackDrop.style.display = "flex";
    if (event.target.className === 'addAdminBtn') {
        document.getElementById('addAccount-modal').style.display = "flex";
        
    }
    else if (event.target.className === 'editAdminBtn') {
        document.getElementById('editAccount-modal').style.display = "flex";
        document.getElementById('userHiddenID').value = document.getElementById('userID').value;
        console.log( document.getElementById('userHiddenID').value);
    }
}
