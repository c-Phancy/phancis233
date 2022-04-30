const formGroup = document.querySelectorAll(".form-group");
const helperText = document.querySelectorAll(".form-text");

formGroup.forEach((group, index) => {
    [].slice
        .call(group.querySelectorAll("input"))
        .forEach((input, innerIndex) => {
            // Covers old filled values
            input.addEventListener("focus", () => {
                if (group.querySelectorAll("input")) {
                        if (input.value) {
                            input.dispatchEvent(new Event("keyup"));
                        }
                    }
            });
            input.addEventListener("keyup", () => {
                    if (input.value) {
                        helperText[index].classList.remove("d-none");
                    } else {
                        helperText[index].classList.add("d-none");
                    }
                    helperText[index].innerHTML = input.value;
            });
            // Should helper text divs be invisible when the input is not in focus? Permanently visible if there is a value?
            input.addEventListener("focusout", () => {
                helperText[index].classList.add("d-none");
            });
            input.addEventListener("focus", () => {
                if (input.value) {
                    helperText[index].classList.remove("d-none");
                }
            });
        });
});

const watchDisplayChange = (element, callback) => {
    const mutationObserver = new MutationObserver((mutations) => {
        mutations.forEach((mutation) => {
            if (
                mutation.type === "attributes" &&
                mutation.attributeName === "class"
            ) {
                callback(mutation.target);
            }
        });
    });
    mutationObserver.observe(element, {
        attributes: true,
    });
    return mutationObserver.disconnect;
};

helperText.forEach((helperBlock, index) => {
    watchDisplayChange(helperBlock, () => {
        if (helperBlock.classList.contains("d-none")) {
            formGroup[index].querySelectorAll("input").forEach((input) => {
                input.classList.remove("expanded-helper");
            });
        } else {
            formGroup[index].querySelectorAll("input").forEach((input) => {
                input.classList.add("expanded-helper");
            });
        }
    });
});

// Social Accounts

const fieldset = document.getElementById("social-media-fields");

fieldset.querySelectorAll(".field-container").forEach(container => {
    container.querySelector("button").addEventListener("click", () => {
        container.remove();
    })
})

document.getElementById("account-add").addEventListener("click", () => {
    const id = fieldset.querySelectorAll(".field-container").length + 1;
    const fieldsetChild =
        `<div class="d-flex justify-content-evenly flex-column align-items-center align-items-md-start field-container field-container-` +
        id +
        `">
                                <div class="form-group input-group">
                    <button type="button" class="bg-danger input-group-text text-white">X</button>
                    <input type="text" class="form-control input-group-single" name="social[` +
        id +
        `]" placeholder="Platform Name"
                        aria-label="Platform">
                <div class="bg-light form-text text-start small m-0 d-none"></div>
                                </div>
                <div class="input-group form-group mt-1 mb-3">
                    <span class="input-group-text">@</span>
                    <input type="text" class="form-control input-group-single" name="handle[` +
        id +
        `]"
                        placeholder="Handle / Username" aria-label="Handle">
                    <div class="bg-light form-text text-start small m-0 d-none"></div>
                </div>`;
    fieldset.insertAdjacentHTML("beforeend", fieldsetChild);

    // Add event listeners
    fieldset.lastChild.querySelectorAll(".form-group").forEach((group) => {
        const input = group.querySelector("input");
        const inputHelper = group.querySelector(".form-text");
        input.addEventListener("keyup", () => {
            if (input.value) {
                inputHelper.classList.remove("d-none");
                                input.classList.remove("input-group-single");
                                input.style.borderTopRightRadius = "0.25rem";
                                group.querySelector(
                                    ".input-group-text"
                                ).style.borderBottomLeftRadius = "0";
            } else {
                inputHelper.classList.add("d-none");
                input.classList.add("input-group-single");
                group.querySelector(".input-group-text").style.borderBottomLeftRadius = "0.25rem";
            }
            inputHelper.innerHTML = input.value;
        });
        input.addEventListener("focus", () => {
            if (input.value) {
                input.dispatchEvent(new Event("keyup"));
            }
        });
        input.addEventListener("focusout", () => {
            inputHelper.classList.add("d-none");
                            input.classList.add("input-group-single");
                            group.querySelector(
                                ".input-group-text"
                            ).style.borderBottomLeftRadius = "0.25rem";
        });
        input.addEventListener("focus", () => {
            if (input.value) {
                inputHelper.classList.remove("d-none");
            }
        });
    });
    const parent = fieldset.lastChild;
    fieldset.lastChild.querySelector(".form-group").querySelector("button").addEventListener("click", () => {
        parent.remove();
    })
});

document.getElementById("submit-button").addEventListener("click", () => {
    fieldset.querySelectorAll(".field-container").forEach((container) => {
        let value1;
        let value2;
        container.querySelectorAll(".form-group").forEach((group, index) => {
            if (index == 0) {
                value1 = group.querySelector("input").value;
            } else {
                value2 = group.querySelector("input").value;
            }
        });
        if (!value1 && !value2) {
            container.remove();
        }
    });
    fieldset.querySelectorAll(".field-container").forEach
});