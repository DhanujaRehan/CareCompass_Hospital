document.addEventListener("DOMContentLoaded", () => {
    const billingButton = document.getElementById("billing-button");

    billingButton.addEventListener("click", () => {
        window.location.href = "bill.html";
    });

});
document.addEventListener("DOMContentLoaded", () => {
    const userButton = document.getElementById("user-button");


    userButton.addEventListener("click", () => {
        window.location.href = "user.html";
    });
});

