document.getElementById("btn-reset").addEventListener("click", function () {
    document
        .querySelectorAll("input")
        .forEach((input) => input.removeAttribute("value")); // Clears manually
});
