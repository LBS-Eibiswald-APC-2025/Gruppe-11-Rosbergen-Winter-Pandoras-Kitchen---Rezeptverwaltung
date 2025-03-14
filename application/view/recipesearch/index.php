<!-- echo out the system feedback (error and success messages) -->
<?php $this->renderFeedbackMessages();
include "advancedSearch.php";

$status = '';


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
            <h3>Search</h3>
            <p>Tell us what recipe you would like to make.</p>

            <!-- Normal Search Form -->
            <form method="GET" action="">
                <label>
                    <input type="text" name="query" placeholder="Pasta Bolognese" <?php echo $status; ?>>
                </label>
                <button class="submit-button" type="submit"><i class="fa fa-search"></i></button>
            </form>


                <!-- Form to activate the advanced Search -->
                <form style="padding-top: 50px;" method="GET" action="">
                    <button class="submit-button" type="submit" name="advanced_search_trigger" value="Advanced Search">
                        Advanced Search <i class="fa fa-search  smallPaddingLeft"></i>
                    </button>
                </form>
            <?php


            /* Additional Html from advancedSearch.php */
            echo '<br><br>' . $additionalHtml; ?>
            <br>
            <br>
            <br>
        </div>
    </div>
</div>


