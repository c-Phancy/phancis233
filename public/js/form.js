const formGroup = document.querySelectorAll(".form-group");
const helperText = document.querySelectorAll(".form-text");
let siblingFirst = '';
let siblingSecond = '';

window.onload = () => {
    siblingFirst = document.getElementById("email").value;
    siblingSecond = document.getElementById("domain").value;
}

formGroup.forEach((group, index) => {
    [].slice
        .call(group.querySelectorAll("input"))
        .forEach((input, innerIndex) => {
            // Covers old filled values
            input.addEventListener("focus", () => {
                if (group.querySelectorAll("input")) {
                    if (siblingFirst || siblingSecond) {
                        input.dispatchEvent(new Event("keyup"))
                    } else {
                        if (input.value) {
                            input.dispatchEvent(new Event("keyup"));
                        }
                    }
                }
            })
            input.addEventListener("keyup", () => {
                if (group.querySelectorAll("input").length > 1) {
                    if (innerIndex == 0) {
                        siblingFirst = input.value;
                    } else {
                        siblingSecond = input.value;
                    }
                } 
                if (group.querySelectorAll("input").length > 1) {
                    if (siblingFirst || siblingSecond) {
                                            helperText[index].classList.remove(
                                                "d-none"
                                            );
                    } else {
                                            helperText[index].classList.add(
                                                "d-none"
                                            );
                    }
                } else {
                    if (input.value) {
                        helperText[index].classList.remove("d-none");
                    } else {
                        helperText[index].classList.add("d-none");
                    }
                }
                if (group.querySelectorAll("input").length > 1) {
                    helperText[index].innerHTML = siblingFirst
                } else {
                    helperText[index].innerHTML = input.value;
                }
                if (group.querySelectorAll("input").length > 1) {
                    helperText[index].innerHTML += "@";
                        helperText[index].innerHTML += siblingSecond;

                }
            });
            // Should helper text divs be invisible when the input is not in focus? Permanently visible if there is a value?
            input.addEventListener("focusout", () => {
                helperText[index].classList.add("d-none");
            });
            input.addEventListener("focus", () => {
                if (input.value) {
                    helperText[index].classList.remove("d-none")
                }
            })
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
    mutationObserver.observe(element, { attributes: true });
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