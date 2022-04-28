const cookieContainer = document.querySelector(".cookie-container");
const acceptButton = document.querySelector(".accept-button");
const cookieBackground = document.querySelector(".wrapper");

acceptButton.addEventListener("click",() => {
    cookieContainer.classList.remove("active");
    cookieBackground.classList.remove("active");
    localStorage.setItem("cookieAccepted", "true");
});

setTimeout(() => {
    if(!localStorage.getItem("cookieAccepted")){
        cookieContainer.classList.add("active");
        cookieBackground.classList.add("active");
    }
}, 2000);