<!-- echo out the system feedback (error and success messages) -->
<?php $this->renderFeedbackMessages();
include "advancedSearch.php";

$status = '';

// ToDo

// Mit JS die erweiterungen von Formular anzeigen und ausblenden
// Validierung !!!! und XSS Filter aus der Filter.php

// Searchresultate anzeigen
// Kühlschranksuche
// Rezeptansicht
// Printfunktion für rezepte



// Plan & Shop Einkaufsliste  ???


/**
 * This code performs a recipe search using the Spoonacular API and displays the results
 */
if (isset($_GET['query']) && !empty($_GET['query'])) {
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

?>

<!-- Normal Search Container-->
<div class="container">
    <h1>Recipe Search</h1>
    <div class="box">
        <div class="form-container ">
            <?php

            if (isset($_GET['advanced_search_trigger'])) {
                /* Additional Html from advancedSearch.php */
                echo $additionalHtml . '<br><br>';
            } else {
                ?>
                <h3>Search</h3>
                <p>Tell us what recipe you would like to make.</p>
                <!-- Normal Search Form -->
                <form name="normalSearch" method="GET" action="">
                    <div class="">Normal Search</div>
                    <div class="select filters flex_wrapper">
                        <label><input type="text" name="query" placeholder="Pasta Bolognese"></label>
                        <button class="submit-button" type="submit">
                            <i style="padding: 0 20px;" class="fa fa-search"></i>
                        </button>
                    </div>

                </form>
                <?php
            }

            /**
             * If the user has clicked the button for the Advanced search then the Advanced form is displayed
             */
            if (!isset($_GET['advanced_search_trigger'])) {
                ?>
                <!-- Form to activate the advanced Search -->
                <form style="padding-top: 50px;" method="GET" action="">
                    <button class="submit-button" type="submit" name="advanced_search_trigger" value="Advanced Search">
                        Advanced Search <i class="fa fa-search  smallPaddingLeft"></i>
                    </button>
                </form>
                <br>
                <br>
                <br>

                <h3>Search Results</h3>
                <section class="recipe-results">
                    <div class="recipe-grid">
                        <div class="recipe-card">
                            <a href="#">
                                <img src="recipe-image.jpg" alt="Recipe Image" class="recipe-image">
                                <h3 class="recipe-title">Delicious Pasta</h3>
                                <p class="recipe-description">A tasty and easy-to-make pasta recipe.</p>
                            </a>
                        </div>
                        <div class="recipe-card">
                            <a href="#">
                                <img src="recipe-image.jpg" alt="Recipe Image" class="recipe-image">
                                <h3 class="recipe-title">Healthy Salad</h3>
                                <p class="recipe-description">A fresh and nutritious salad with a great taste.</p>
                            </a>
                        </div>
                        <div class="recipe-card">
                            <a href="#">
                                <img src="recipe-image.jpg" alt="Recipe Image" class="recipe-image">
                                <h3 class="recipe-title">Hearty Soup</h3>
                                <p class="recipe-description">A warm and comforting soup for cold days.</p>
                            </a>
                        </div>
                        <div class="recipe-card">
                            <a href="#">
                                <img src="recipe-image.jpg" alt="Recipe Image" class="recipe-image">
                                <h3 class="recipe-title">Tasty Dessert</h3>
                                <p class="recipe-description">A sweet treat to end your meal perfectly.</p>
                            </a>
                        </div>
                    </div>
                </section>

                <?php
            }
            ?>
        </div>
    </div>
</div>