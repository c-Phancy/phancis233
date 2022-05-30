document.querySelectorAll(".dropdown-btn").forEach((button) => {
    button.addEventListener("click", () => {
        const span = button.querySelector("span");
        document.getElementById(button.dataset.id).classList.toggle("d-none");
        document.getElementById("hr-" + button.dataset.id).classList.toggle("d-none");
        span.classList.toggle("h3");
        span.classList.toggle("fw-bold");
    });
});