function toggleDropdown() {
    document.querySelector(".dropdown-list").classList.toggle("d-block");
}

function updateSelection() {
    let selected = [];
    document.querySelectorAll(".dropdown-list input:checked").forEach(checkbox => {
        selected.push(checkbox.value);
    });
    renderChips(selected);
}

function renderChips(selected) {
    let selectBox = document.querySelector(".select-box");
    selectBox.innerHTML = "";
    if (selected.length === 0) {
        selectBox.textContent = "Wähle Optionen";
    } else {
        selected.forEach(value => {
            let chip = document.createElement("div");
            chip.classList.add("chip");
            chip.innerHTML = `${value} <span class='remove' onclick='removeChip("${value}")'>&times;</span>`;
            selectBox.appendChild(chip);
        });
    }
}

function removeChip(value) {
    document.querySelector(`.dropdown-list input[value='${value}']`).checked = false;
    updateSelection();
}

document.addEventListener("click", function (event) {
    if (!event.target.closest(".multi-select")) {
        document.querySelector(".dropdown-list").classList.remove("d-block");
    }
});
