let cookieModal = document.querySelector(".wrapper");
let acceptCookieBtn = document.querySelector(".button.btn-accept");

acceptCookieBtn.addEventListener("click",function(){
    cookieModal.classList.remove("active")
    localStorage.setItem("cookieAccepted","yes")
})


setTimeout(function(){
    let cookieAccepted = localStorage.getItem("cookieAccepted")
    if(cookieAccepted != "yes"){
        cookieModal.classList.add("active")
    }
},2000)