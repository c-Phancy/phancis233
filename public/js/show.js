document.querySelectorAll(".dropdown-btn").forEach((button) => {
    button.addEventListener("click", () => {
        const span = button.querySelector("span");
        document.getElementById(button.dataset.id).classList.toggle("d-none");
        document
            .getElementById("hr-" + button.dataset.id)
            .classList.toggle("d-none");
        span.classList.toggle("h3");
        span.classList.toggle("fw-bold");
        // TODO: Lazy!!!
            // Closes other profile tabs onClick => allows only one profile to be shown (group page) 
        document.querySelectorAll(".dropdown-btn").forEach((sibling) => {
            if (button != sibling) {
                const siblingSpan = sibling.querySelector("span");
                document
                    .getElementById(sibling.dataset.id)
                    .classList.add("d-none");
                document
                    .getElementById("hr-" + sibling.dataset.id)
                    .classList.add("d-none");
                siblingSpan.classList.remove("h3");
                siblingSpan.classList.remove("fw-bold");
            }
        });
    });
});
