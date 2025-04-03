function toggleDropdown(event) {
    let select = event.currentTarget.closest(".select");
    let dropdown = select.querySelector(".dropdown-list");

	// If the dropdown is already open, we just toggle it (open/close)
	if (dropdown.classList.contains("d-block")) {
		dropdown.classList.remove("d-block");
	} else {
		// Otherwise, we open this dropdown and close all other dropdowns
		document.querySelectorAll(".select .dropdown-list").forEach(dropdownItem => {
			dropdownItem.classList.remove("d-block");
		});
		dropdown.classList.add("d-block");
	}

    // Prevent event from bubbling up to the document click listener
    event.stopPropagation();
}

function updateSelection(event) {
    let select = event.currentTarget.closest(".select");
    let selected = [];
	console.log("asdfasdfasdfasdfasdfasdfasdf");

    select.querySelectorAll(".dropdown-list input:checked").forEach(checkbox => {
        selected.push(checkbox.value);
    });

    renderChips(selected, select);
}

function updateAll() {
    let allDropdowns = document.querySelectorAll(".select");
    
    allDropdowns.forEach(select => {
        let selectedValues = [];

        select.querySelectorAll(".dropdown-list input:checked").forEach(checkbox => {
            selectedValues.push(checkbox.value);
        });

        renderChips(selectedValues, select);
    });
}


function renderChips(selected, select) {
    let selectBox = select.querySelector(".select-box");
	if(selectBox != null) {

		selectBox.innerHTML = "";
		
		if (selected.length === 0) {
			selectBox.textContent = "No Selection";
		} else {
			selected.forEach(value => {
				let chip = document.createElement("div");
				chip.classList.add("chip");
				chip.innerHTML = `${value} <span class='remove' onclick='removeChip("${value}", this)'>×</span>`;
				selectBox.appendChild(chip);
			});
		}
	}
}

function removeChip(value, element) {
    let select = element.closest(".select");
    let checkbox = select.querySelector(`.dropdown-list input[value='${value}']`);
    checkbox.checked = false;
    updateSelection({ currentTarget: checkbox });
}

// Click listener to close any open dropdowns when clicked anywhere on the document
document.addEventListener("click", function (event) {
    // Close all dropdowns when clicking outside
    document.querySelectorAll(".select .dropdown-list").forEach(dropdown => {
        if (!dropdown.contains(event.target)) {
            dropdown.classList.remove("d-block");
        }
    });
});

// Prevent closing the dropdown when clicking inside the select box
document.querySelectorAll(".select").forEach(select => {
    select.addEventListener("click", function (event) {
        event.stopPropagation(); // Prevent the event from bubbling up to the document listener
    });
});



function toggleFormular() {
    var formular = document.getElementById("formular");
    var button = document.getElementById("toggleExtras");

    // Überprüfen, ob das Formular gerade sichtbar ist
    if (formular.style.display === "none" || formular.style.display === "") {
        formular.style.display = "block"; // Formular anzeigen
        button.innerHTML = 'Hide Advanced Search'; // Button-Text ändern
    } else {
        formular.style.display = "none"; // Formular ausblenden
        button.innerHTML = 'Advanced Search <i class="fa fa-search smallPaddingLeft"></i>'; // Button-Text zurücksetzen
    }
}

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
