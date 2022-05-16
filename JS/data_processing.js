var check = 1;
var firstname = document.getElementById('firstname');
var lastname = document.getElementById('lastname');
var email = document.getElementById('email');
var password = document.getElementById('inputPassword1');
var re_password = document.getElementById('inputPassword2');
var checker = document.getElementById("avatar_confirm_input");
var avatar = document.getElementById("avatar");

//this function will check if the retype pass is wrong to display announcement
function form_check(temp) {
    if (temp.value.length > 0) {
        if (temp.value != password.value  && (password != re_password ) ) {
            document.getElementById('alert').innerText = "Your password does not match";
            check = 0;
        }
        else {
            document.getElementById('alert').innerText = "";
            check = 1;
        }
    }
    else if (temp.value.length == 0 && (password != re_password )  ) {
        document.getElementById('alert').innerText = "Please confirm your password";
        check = 0;
    }
}
//this function will let the user decide to upload the avatar later
function avatar_confirm() {
    let label = document.getElementById("avatar_confirm_label");
    let avatar_label = document.getElementById("avatar_label");
    label.style.display = "none";
    checker.style.display = "none";
    avatar.style.display = "none";
    avatar_label.style.display = "none";
}

//avoid users from Signup account with blanks or incorrect rules.
const submitbutton = document.getElementById("submitbutton");
submitbutton.addEventListener('click', function (e) {
    if (check == 0 || firstname.value.length == 0 || lastname.value.length == 0 || lastname.value.length == 0 ||
        (!checker.checked && avatar.getAttribute('src') == "")) {
        e.preventDefault();
        alert("Please check your infomation !");
    }

})













