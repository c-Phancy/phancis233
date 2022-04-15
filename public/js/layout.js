const navLinks = document.querySelectorAll(".nav-link");

window.onload = () => {
    if (screen.width < 500) {
        document.getElementById("previous-link").parentNode.parentNode.classList.add("d-none");
    }
}

navLinks.forEach((link) => {
    if (link.href == window.location.href) {
        link.parentNode.parentNode.setAttribute("id", "current-nav-wrapper");
        link.href = "#";
        link.classList.add("active");
        link.disabled = true;
        link.setAttribute("id", "disabled-link");
        link.setAttribute("data-placement", "top");
        link.insertAdjacentHTML(
            "afterend",
            `<span id="tooltip">You're already here!</span>`
        );
        link.addEventListener("click", (e) => {
            e.preventDefault()
        })
    }
});

// Navigation Tooltip Visibility
const tooltip = document.getElementById("tooltip");
const disabledLinkWrapper = document.getElementById("current-nav-wrapper");
const disabledLink = document.getElementById("disabled-link");

disabledLinkWrapper?.addEventListener("click", (event) => {
    event.preventDefault();
    disabledLink.classList.remove("focus");
});

disabledLinkWrapper?.addEventListener("focusin", () => {
    disabledLink.classList.add("focus");
    tooltip.classList.add("visible");
});
disabledLinkWrapper?.addEventListener("focusout", () => {
    disabledLink.classList.remove("focus");
    if (!disabledLink.classList.contains("hover")) {
        tooltip.classList.remove("visible");
    }
});
disabledLinkWrapper?.addEventListener("mouseover", () => {
    disabledLink.classList.add("hover");
    tooltip.classList.add("visible");
});
disabledLinkWrapper?.addEventListener("mouseout", () => {
    disabledLink.classList.remove("hover");
    if (!disabledLink.classList.contains("focus")) {
        tooltip.classList.remove("visible");
    }
});
