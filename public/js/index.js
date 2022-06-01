const profileNames = document.getElementsByClassName("profile-name");
const profileOptions = document.querySelectorAll(".profile-link-group");
const profileOptionsA = document.querySelectorAll(".profile-link-group-a");
const wrapper = document.querySelectorAll(".profile-wrapper");
const initialNameSize = window.getComputedStyle(profileNames[0]).fontSize;
const profileSelect = document.getElementById("profile-select");
let canvas;
let ctx;

function profileClick(element, index) {
    const canvasDiv = document.querySelectorAll(".canvas-div")[index];
    canvasDiv.classList.toggle("d-none");
    canvas = canvasDiv.firstElementChild;
    if (canvasDiv.classList.contains("d-none")) {
        canvas.removeAttribute("width");
    } else {
        canvas.setAttribute("width", document.documentElement.clientWidth);
        ctx = canvas.getContext("2d");
        ctx.lineWidth = 2;
    }
    profileOptions[index].classList.toggle("d-none");
    element.classList.toggle("clicked");
    if (element.classList.contains("clicked")) {
        element.style.fontSize = "3vw";
    } else {
        element.style.fontSize = "8vw";
    }
}

const drawLine = (ctx, object) => {
    ctx.strokeStyle = object.color;
    ctx.beginPath();
    ctx.moveTo(object.x1, object.y1);
    ctx.lineTo(object.x2, object.y2);
    ctx.stroke();
};

const canvasCoordinates = (el1, el2, color) => {
    const firstBounds = el1.getBoundingClientRect();
    const secondBounds = el2.getBoundingClientRect();
    const x1 = (firstBounds.left + firstBounds.right) / 2;
    const x2 = (secondBounds.left + secondBounds.right) / 2;
    const y1 = ctx.canvas.clientHeight;
    const y2 = 0;
    return { x1: x1, x2: x2, y1: y1, y2: y2, color: color };
};

document.querySelector(".profile-name").removeAttribute("tabIndex");
document.querySelector(".profile-name").scrollIntoView({ block: "center" });

const addProfileEventListener = () => {
    Array.prototype.forEach.call(profileNames, function (profile, index) {
        // Profile Click
        profile.addEventListener("click", (e) => {
            if (document.getElementById("simple-stylesheet") === null) {
                if (e.detail.transition == undefined) {
                    profile.style.transition = "2s";
                } else {
                    profile.style.removeProperty("transition");
                }
                profileClick(profile, index);
            }
        });
        // Next Profile
        profile.addEventListener("focus", () => {
            if (document.getElementById("simple-stylesheet") === null) {
                document.querySelectorAll(".clicked").forEach((clicked) => {
                    if (clicked != document.activeElement) {
                        clicked.dispatchEvent(
                            new CustomEvent("click", {
                                detail: { transition: "0" },
                            })
                        );
                    }
                });
                if (!profile.classList.contains("clicked")) {
                    profile.scrollIntoView({ block: "center" });
                }
            }
        });
    });
    profileOptionsA.forEach((group) => {
        let storedLines = {};
        [].slice.call(group.querySelectorAll(".link-a")).forEach((button, index) => {
            button.addEventListener("focus", () => {
                button.classList.add("focusedButton");
                if (!button.classList.contains("hoveredButton") && document.getElementById("simple-stylesheet") === null) {
                    storedLines[index.toString()] = canvasCoordinates(
                        button,
                        document.querySelectorAll(".profile-name")[index],
                        getComputedStyle(button).borderColor
                    );
                    drawLine(ctx, storedLines[index]);
                }
                if (button.parentNode.tagName == "FORM") {
                    button.parentNode.classList.add("colored-parent");
                    button.classList.add("colored-child");
                } else {
                button.classList.add("colored-profile-link");}
            });
            button.addEventListener("mouseover", () => {
                button.classList.add("hoveredButton");
                if (
                    !button.classList.contains("focusedButton") &&
                    document.getElementById("simple-stylesheet") === null
                ) {
                    storedLines[index.toString()] = canvasCoordinates(
                        button,
                        document.querySelectorAll(".profile-name")[index],
                        getComputedStyle(button).borderColor
                    );
                    drawLine(ctx, storedLines[index.toString()]);
                }
                if (button.parentNode.tagName == "FORM") {
                    button.parentNode.classList.add("colored-parent");
                    button.classList.add("colored-child");
                } else {
                    button.classList.add("colored-profile-link");
                }
            });
            button.addEventListener("focusout", () => {
                button.classList.remove("focusedButton");
                if (
                    !button.classList.contains("hoveredButton") &&
                    document.getElementById("simple-stylesheet") === null
                ) {
                    delete storedLines[index.toString()];
                    ctx.clearRect(0, 0, ctx.canvas.width, ctx.canvas.height);
                    if (Object.keys(storedLines).length != 0) {
                        for (key in storedLines) {
                            drawLine(ctx, storedLines[key]);
                        }
                    }
                }
                if (!button.classList.contains("hoveredButton")) {
                    if (button.parentNode.tagName == "FORM") {
                        button.parentNode.classList.remove("colored-parent");
                        button.classList.remove("colored-child");
                    } else {
                        button.classList.remove("colored-profile-link");
                    }
                }
            });
            button.addEventListener("mouseout", () => {
                button.classList.remove("hoveredButton");
                if (
                    !button.classList.contains("focusedButton") &&
                    document.getElementById("simple-stylesheet") === null
                ) {
                    delete storedLines[index.toString()];
                    ctx.clearRect(0, 0, ctx.canvas.width, ctx.canvas.height);
                    if (Object.keys(storedLines).length != 0) {
                        for (key in storedLines) {
                            drawLine(ctx, storedLines[key]);
                        }
                    }
                }
                if (!button.classList.contains("focusedButton")) {
                if (button.parentNode.tagName == "FORM") {
                    button.parentNode.classList.remove("colored-parent");
                    button.classList.remove("colored-child");
                } else {
                    button.classList.remove("colored-profile-link");
                }
            }
            });
        });
    });
};

addProfileEventListener();

// Switch Display Mode
    // consider saving scroll position and applying it on switch
        // instead of starting the list oosition over

const ecoButton = document.getElementById("switch-list-view");
const performanceButton = document.getElementById("switch-normal-view");

// There is a slight lag on click for .profile-link-group reveal
ecoButton.addEventListener("click", () => {
    // Link could create problems if the directory is moved
    document
        .getElementById("custom-stylesheet")
        .insertAdjacentHTML(
            "afterend",
            '<link id="simple-stylesheet" rel="stylesheet" href="/css/index-simple.css">'
        );
    document.querySelectorAll(".clicked").forEach((profile) => {
        profile.classList.remove("clicked");
        profile.dispatchEvent(
            new CustomEvent("click", { detail: { transition: "0" } })
        );
    });
    document.getElementById("navigation-button-group").classList.add("d-none");
    ecoButton.classList.toggle("d-none");
    performanceButton.classList.toggle("d-none");
    Array.prototype.forEach.call(profileNames, function (profile, index) {
        const nameTag = document.createElement("p");
        nameTag.textContent = profile.textContent;
        nameTag.classList = profile.classList;
        profileOptions[index].classList.remove("d-none");
        profileOptionsA[index].classList.remove(
            "d-flex",
            "justify-content-evenly"
        );
        profile.parentNode.replaceChild(nameTag, profile);
    });
    profileOptionsA.forEach((group, index) => {
        [].slice.call(group.querySelectorAll(".profile-link")).forEach((button) => {
            button.addEventListener("focus", () => {
                wrapper[index].classList.add("profile-wrapper-active");
            });
            button.addEventListener("focusout", () => {
                wrapper[index].classList.remove("profile-wrapper-active");
            });
        });
    });
    document.querySelectorAll(".canvas-div").forEach((div) => {
        div.classList.add("d-none");
    });
    window.scrollTo(0, 0);
});

performanceButton.addEventListener("click", () => {
    document.getElementById("simple-stylesheet").remove();
    ecoButton.classList.remove("d-none");
    performanceButton.classList.add("d-none");
    document
        .getElementById("navigation-button-group")
        .classList.remove("d-none");
    Array.prototype.forEach.call(profileNames, function (profile, index) {
        const nameButton = document.createElement("button");
        nameButton.textContent = profile.textContent;
        nameButton.classList = profile.classList;
        if (index !== 0) {
            nameButton.setAttribute("tabIndex", "-1");
        }
        profileOptions[index].classList.add("d-none");
        profileOptionsA[index].classList.add(
            "d-flex",
            "justify-content-evenly"
        );
        profile.parentNode.replaceChild(nameButton, profile);
    });
    addProfileEventListener();
    profileNames[0].scrollIntoView({ block: "center" });
    profileSelect.value = profileNames[0].parentNode.getAttribute("id");
});

// Next Profile Button

const nextButton = document.getElementById("next-button");
const lastButton = document.getElementById("last-button");
const previousButton = document.getElementById("previous-button");
const firstButton = document.getElementById("first-button");

// -1 is previous
// 1 is next
const goToProfile = (profile, direction) => {
    const currentIndex = [
        ...document.querySelectorAll(".profile-name"),
    ].indexOf(profile);
    const toProfile =
        document.querySelectorAll(".profile-name")[currentIndex + direction];
    toProfile.removeAttribute("tabIndex");
    profile.setAttribute("tabIndex", "-1");
    toProfile.dispatchEvent(new Event("focus"));
    profileSelect.value = toProfile.parentNode.getAttribute("id");
};

const loopNextProfile = (loopCount, firstOrLast, direction) => {
    let currentProfile;
    for (let i = 0; i < loopCount; i++) {
        currentProfile = document.querySelector(
            '.profile-name:not([tabIndex="-1"])'
        );
        if (currentProfile != profileNames[firstOrLast]) {
            goToProfile(currentProfile, direction);
        }
    }
};

// The following (4) events create a "violation"
nextButton.addEventListener("click", () => {
    if (
        document.querySelector('.profile-name:not([tabIndex="-1"])') !=
        profileNames[profileNames.length - 1]
    ) {
        loopNextProfile(1, profileNames.length - 1, 1);
    } else {
        alert("There are no more profiles on the page after this!");
                if (
                    !document
                        .querySelector(".page-item.active")
                        .nextElementSibling.classList.contains("disabled")
                ) {
                    let userResponse = window.confirm("Go to following page?");
                    if (userResponse) {
                        window.location =
                            document.querySelector(
                                ".page-item.active"
                            ).nextElementSibling.firstChild.href;
                    }
                }
    }
});

lastButton.addEventListener("click", () => {
    const currentProfile = document.querySelector(
        '.profile-name:not([tabIndex="-1"])'
    );
    const indexDifference =
        profileNames.length - 1 - [...profileNames].indexOf(currentProfile);
    let i = 0;
    do {
        nextButton.dispatchEvent(new Event("click"));
        i++;
    } while (i < indexDifference);
});

previousButton.addEventListener("click", () => {
    if (
        document.querySelector('.profile-name:not([tabIndex="-1"])') !=
        profileNames[0]
    ) {
        loopNextProfile(1, 0, -1);
    } else {
        alert("There are no more profiles on the page before this!");
        if (!document.querySelector(".page-item.active").previousElementSibling.classList.contains("disabled")) {
            let userResponse = window.confirm("Go to previous page?");
            if (userResponse) {
                window.location = document.querySelector(".page-item.active")
                    .previousElementSibling.firstChild.href;
            }
        }
    }
});

firstButton.addEventListener("click", () => {
    const currentProfile = document.querySelector(
        '.profile-name:not([tabIndex="-1"])'
    );
    const indexDifference = [...profileNames].indexOf(currentProfile);
    let i = 0;
    do {
        previousButton.dispatchEvent(new Event("click"));
        i++;
    } while (i < indexDifference);
});

// Go To Profile Select

profileSelect.addEventListener("change", () => {
    const targetIndex = Number(profileSelect.value);
    const currentIndex = Number(
        document
            .querySelector('.profile-name:not([tabIndex="-1"])')
            .parentNode.getAttribute("id")
    );
    const indexDifference = currentIndex - targetIndex;
    if (indexDifference !== 0) {
        const targetButton =
            targetIndex > currentIndex ? nextButton : previousButton;
        for (let i = 0; i < Math.abs(indexDifference); i++) {
            targetButton.dispatchEvent(new Event("click"));
        }
    }
});

// Lazy!!! way to configure Profile index for dashboard
window.onload(
    ecoButton.dispatchEvent(new Event("click"))
)