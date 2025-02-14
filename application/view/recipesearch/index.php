<?php
function buildRecipeQuery($query, $apiKey) {
    $query = urlencode($query); // Sanitize user input
    $url = "https://api.spoonacular.com/recipes/complexSearch?query=$query";
    $url .= "&addRecipeInformation=true";
    $url .= "&addRecipeInstructions=true";
    $url .= "&addRecipeNutrition=false";
    $url .= "&number=10";
    $url .= "&apiKey=" . $apiKey;

    return $url;
}
?>

<div class="container">
    <h1>Recipe Search</h1>
    <div class="box">

        <!-- echo out the system feedback (error and success messages) -->
        <?php $this->renderFeedbackMessages(); ?>

        <h3>Search</h3>
        <p>Tell us what recipe you would like to make.</p>

        <!-- Search Form -->
        <form method="GET" action="">
            <input type="text" name="query" placeholder="Pasta Bolognese" required>
            <button type="submit">Search</button>
        </form>
        
        <hr>

        <?php
        if (isset($_GET['query']) && !empty($_GET['query'])) {
            $apiKey = 'f2120b4500e84105bd83caea896db140';
            $url = buildRecipeQuery($_GET['query'], $apiKey);

            $response = file_get_contents($url);
            $data = json_decode($response, true);

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
    </div>
</div>
