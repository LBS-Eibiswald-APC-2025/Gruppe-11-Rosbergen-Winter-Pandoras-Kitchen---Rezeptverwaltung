<!-- echo out the system feedback (error and success messages) -->
<?php $this->renderFeedbackMessages();
include "advancedSearch.php";
include "searchResults.php";

$status = '';

// ToDo

// Mit JS die erweiterungen von Formular anzeigen und ausblenden
// Validierung !!!! und XSS Filter aus der Filter.php

// Searchresultate anzeigen
// Kühlschranksuche
// Rezeptansicht
// Printfunktion für rezepte ???
// Plan & Shop Einkaufsliste  ???


/**
 * This code performs a recipe search using the Spoonacular API and displays the results
 */
/*if (isset($_GET['query']) && !empty($_GET['query'])) {
    $spoonacular = Spoonacular::getInstance();
    $data = $spoonacular->complexSearch($_GET['query']);

    if (!empty($data['results'])) {
        echo "<h3>Search Results for: " . htmlspecialchars($_GET['query']) . "</h3>";
        echo "<ul>";
        foreach ($data['results'] as $recipe) {
            echo "<li>";
            echo "<strong>" . htmlspecialchars($recipe['title']) . "</strong><br>";
            echo "<img src='" . htmlspecialchars($recipe['image']) . "' alt='" . htmlspecialchars($recipe['title']) . "' width='200'><br>";
            echo ($recipe['summary']) . "<br>";
            echo "</li>";
        }
        echo "</ul>";
    } else {
        echo "<p>No recipes found.</p>";
    }
}
*/



?>
<!-- Normal Search Container-->
<div class="container">
    <h1>Recipe Search</h1>
    <div class="box">
        <div class="form-container ">
            <h3>Search</h3>
            <p>Tell us what recipe you would like to make.</p>
            <!-- Normal Search Form -->
            <form name="normalSearch" method="GET" action="">
                <div class="">Normal Search</div>
                <div class="select filters flex_wrapper gap">
                    <label><input type="text" name="query" placeholder="Pasta Bolognese"></label>
                    <button class="submit-button" type="submit">
                        <i style="padding: 0 20px;" class="fa fa-search"></i>
                    </button>
                </div>
            </form>
            <br>
            <button class="submit-button" id="toggleExtras" type="button" name="advanced_search_trigger"
                    value="Advanced Search" onclick="toggleFormular(); updateAll();">Advanced Search
                <i class="fa fa-search smallPaddingLeft"></i>
            </button>
            <br>
            <br>


            <div id="formular" style="display: none;">
                <?php
                /* Additional Html from advancedSearch.php */
                echo $additionalHtml . '<br><br>';
                ?>
            </div>


        </div>
			<?php
			echo $result;
			?>
    </div>
</div>
