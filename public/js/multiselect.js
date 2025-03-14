function toggleDropdown(event) {
    let select = event.currentTarget.closest(".select");
    let dropdown = select.querySelector(".dropdown-list");
    dropdown.classList.toggle("d-block");
}

function updateSelection(event) {
    let select = event.currentTarget.closest(".select");
    let selected = [];

    select.querySelectorAll(".dropdown-list input:checked").forEach(checkbox => {
        selected.push(checkbox.value);
    });

    renderChips(selected, select);
}

function renderChips(selected, select) {
    let selectBox = select.querySelector(".select-box");
    selectBox.innerHTML = "";

    if (selected.length === 0) {
        selectBox.textContent = "Select allergen";
    } else {
        selected.forEach(value => {
            let chip = document.createElement("div");
            chip.classList.add("chip");
            chip.innerHTML = `${value} <span class='remove' onclick='removeChip("${value}", this)'>×</span>`;
            selectBox.appendChild(chip);
        });
    }
}

function removeChip(value, element) {
    let select = element.closest(".select");
    let checkbox = select.querySelector(`.dropdown-list input[value='${value}']`);
    checkbox.checked = false;
    updateSelection({ currentTarget: checkbox });
}

document.addEventListener("click", function (event) {
    document.querySelectorAll(".select").forEach(select => {
        if (!select.contains(event.target)) {
            select.querySelector(".dropdown-list").classList.remove("d-block");
        }
    });
});



/* Slider input
document.addEventListener("DOMContentLoaded", function () {
    let slider = document.getElementById("myRange");
    let output = document.getElementById("demo");

    function updateSliderValue() {
        output.innerHTML = slider.value;
    }

    // Initial setzen
    updateSliderValue();

    // Event-Listener für Änderungen
    slider.addEventListener("input", updateSliderValue);
});

*/