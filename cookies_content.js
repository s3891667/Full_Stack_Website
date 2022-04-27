const cookieContainer = document.querySelector(".cookie-container");
const acceptButton = document.querySelector(".accept-button");

acceptButton.addEventListener("click",() => {
    cookieContainer.classList.remove("active");
    localStorage.setItem("cookieAccepted", "true");
});

setTimeout(() => {
    if(!localStorage.getItem("cookieAccepted")){
        cookieContainer.classList.add("active");
    }
}, 2000);