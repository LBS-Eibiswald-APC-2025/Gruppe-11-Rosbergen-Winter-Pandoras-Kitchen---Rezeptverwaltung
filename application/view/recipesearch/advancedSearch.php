<?php


function pre($msg)
{
    echo "<pre>" . print_r($msg, true) . "</pre>";
}

/** Advanced Search From */
if (isset($_GET["advanced_search_trigger"])) {
    $additionalHtml = '<h3>Advanced Search</h3><br>
                       <div class="">
                       <form name="advancedSearchForm" action="" method="get">';

    /* Menu Type Field*/
    $additionalHtml .= '
    <div class="">Select Menu Type</div>
    <div class="select">
        <div class="select-box" onclick="toggleDropdown(event)">No selection</div>
        <div class="dropdown-list">';

    foreach ($this->types as $typeItems) {
        $additionalHtml .= '<label><input name="types[]" class="checkbox-hidden" type="checkbox" value="' . $typeItems->name
            . '" onchange="updateSelection(event)">' . $typeItems->name . '</label>';
    }
    $additionalHtml .= '</div>' . '</div>';

    /* Cuisine Field */
    $additionalHtml .= '
    <div class="">Select Cuisine</div>
    <div class="select">
        <div class="select-box" onclick="toggleDropdown(event)">No selection</div>
        <div class="dropdown-list">';

    foreach ($this->cuisine as $cuisineItems) {
        $additionalHtml .= '<label><input name="cuisine[]" class="checkbox-hidden" type="checkbox" value="' . $cuisineItems->name
            . '" onchange="updateSelection(event)">' . $cuisineItems->name . '</label>';
    }
    $additionalHtml .= '</div>' . '</div>';

    /* Diäten Field*/
    $additionalHtml .= '
    <div class="">Select Diet</div>
    <div class="select">
        <div class="select-box" onclick="toggleDropdown(event)">No selection</div>
        <div class="dropdown-list">';

    foreach ($this->diet as $dietItems) {
        $additionalHtml .= '<label><input name="diet[]" class="checkbox-hidden" type="checkbox" value="' . $dietItems->name
            . '" onchange="updateSelection(event)">' . $dietItems->name . '</label>';
    }
    $additionalHtml .= '</div>' . '</div>';


    /* Cooking Time Field*/
    $additionalHtml .= '
    <div class="">Select Time (Minutes)</div>
        <div class="select">
            <div class="select filters"><input type="number" name="cholesterol" placeholder="Time (max)"></div>
    </div>';

    /* Intolerances */
    $additionalHtml .= '
    <div class="">Select Intolerances</div>
    <div class="select">
        <div class="select-box" onclick="toggleDropdown(event)">No selection</div>
        <div class="dropdown-list">';

    foreach ($this->intolerances as $intolerancesItems) {
        $additionalHtml .= '<label><input name="intolerances[]" class="checkbox-hidden" type="checkbox" value="' . $intolerancesItems->name
            . '" onchange="updateSelection(event)">' . $intolerancesItems->name . '</label>';
    }
    $additionalHtml .= '</div>' . '</div>';

    $additionalHtml .= '  
    <!-- Calories (max) -->
    <div class="">Select Calories (g)</div>
    <div class="select filters"><input type="number" name="calories" placeholder="Calories (max)"></div>    
    
     <!-- Sugar (max) -->
    <div class="">Select Sugar (g)</div>
    <div class="select filters"><input type="number" name="sugar" placeholder="Sugar (max)"></div>
    
     <!-- Cholesterol (max) -->
    <div class="">Select Cholesterol (mg)</div>
    <div class="select filters"><input type="number" name="cholesterol" placeholder="Cholesterol (max)"></div>
    
     <!-- Fat content (max) -->
    <div class="">Select Fat content (g)</div>
    <div class="select filters"><input type="number" name="fat" placeholder="Fat content (max)"></div>
    <button class="submit-button" type="submit" name="advancedSearchBtn">Search
        <i class="fa fa-search  smallPaddingLeft"></i>
    </button>';
    $additionalHtml .= '</form>';
} else {
    $status = "required";
    $additionalHtml = '';
}


if (isset($_GET["advancedSearchBtn"])) {

    $spoonacular = Spoonacular::getInstance();

    /**
     * normales if: if (isset($_GET["fat"])) { $fat = $_GET["fat"] } else { $fat = ""; }
     * Short hand if: isset($_GET["fat"]) ? $_GET["fat"] : "";
     * short short hand if: $_GET["fat"] ?? "";
     */
    $types = $_GET["types"] ?? "";
    $cuisine = $_GET["cuisine"] ?? "";
    $diet = $_GET["diet"] ?? "";
    $intolerances = $_GET["intolerances"] ?? "";
    $calories = $_GET["calories"] ?? "";
    $sugar = $_GET["sugar"] ?? "";
    $cholesterol = $_GET["cholesterol"] ?? "";
    $fat = $_GET["fat"] ?? "";


    // Validation ??


    $test = $spoonacular->complexSearch("", $types, $cuisine, $diet, $intolerances, $calories, $sugar, $cholesterol, $fat);
    //pre($test);


    // Result
    $searchResults = "";

}


?>


<!--



    /* Speiseart */
    $additionalHtml .= '<div class="">Select menu type</div>
                            <div class="filters">
                            <select name="types">
                            <option value="">No selection</option>';
    foreach ($this->types as $type) {
        $additionalHtml .= '<option value="' . $type->name . '">' . $type->name . '</option>';
    }
    $additionalHtml .= '</select>' . '</div>';
<div class="select">
    <div class="select-box" onclick="toggleDropdown()">Wähle Optionen</div>
    <div class="dropdown-list">
        <label><input type="checkbox" value="Angular" onchange="updateSelection()"> Angular</label>
        <label><input type="checkbox" value="Bootstrap" onchange="updateSelection()">
            Bootstrap</label>
        <label><input type="checkbox" value="React.js" onchange="updateSelection()">
            React.js</label>
        <label><input type="checkbox" value="Vue.js" onchange="updateSelection()"> Vue.js</label>
        <label><input type="checkbox" value="Django" onchange="updateSelection()"> Django</label>
        <label><input type="checkbox" value="Laravel" onchange="updateSelection()"> Laravel</label>
        <label><input type="checkbox" value="Node.js" onchange="updateSelection()"> Node.js</label>
    </div>
</div>



            <div class="filters">
                <h3>Filter</h3>
                <div class="search-bar">
                    <input type="text" name="query" placeholder="Suche nach Rezepten...">
                </div>
                <select name="zutat">
                    <option value="">Rezepte nach Zutat</option>
                    <option value="reis">Reis</option>
                    <option value="kartoffeln">Kartoffeln</option>
                    <option value="gemuese">Gemüse</option>
                </select>
                <select name="typ">
                    <option value="">Speiseart</option>
                    <option value="suppe">Suppe</option>
                    <option value="salat">Salat</option>
                    <option value="backen">Backen</option>
                </select>
                <select name="cuisine">
                    <option value="">Regionale Rezepte</option>
                    <option value="italienisch">Italienisch</option>
                    <option value="franzoesisch">Französisch</option>
                    <option value="asiatisch">Asiatisch</option>
                </select>
                <select name="intoleranzen">
                    <option value="">Unverträglichkeiten / Allergie</option>
                    <option value="glutenfrei">Glutenfrei</option>
                    <option value="laktosefrei">Laktosefrei</option>
                    <option value="nussallergie">Nussallergie</option>
                </select>
                <select name="diet">
                    <option value="">Ernährungsform</option>
                    <option value="vegan">Vegan</option>
                    <option value="vegetarisch">Vegetarisch</option>
                    <option value="paleo">Paleo</option>
                </select>
                <input type="number" name="calories" placeholder="Kalorien (max)">
                <input type="number" name="sugar" placeholder="Zucker (max)">
                <input type="number" name="cholesterol" placeholder="Cholesterin (max)">
                <input type="number" name="fat" placeholder="Fettgehalt (max)">
            </div>
            <div class="sort-options">
                <h3>Sortierung</h3>
                <select name="sort">
                    <option value="popularity">Bewertung/Beliebtheit</option>
                    <option value="price">Kosten</option>
                    <option value="time">Zeitfaktor</option>
                </select>
            </div>
            <button type="submit" class="submit-button">Suchen</button>
        </form>
    </div>



ToDo//
Erweiterte Suche:

    Speiseart (typ) (z.B. Suppe)
    Regionale Rezepte (cuisine) (z.B. Italienisch)

    Ernährungsform (diet) (z.B. vegan) CHIPS
    Unverträglichkeiten / Allergie (intoleracens) CHIPS
    Rezepte nach Zutat (includeIngridiens) (z.B. Reis) Recipes by Ingredient CHIPS

    Kalorien (calories)
    Zucker (sugar)
    Cholesterin (cholesterol)
    Fettgehalt (total-fat)
    Zubereitungszeit


Sortierung:
    Bewertung/Beliebtheit (popularity) meta score
    Kosten (price)
    Zeitfaktor (time)
-->

