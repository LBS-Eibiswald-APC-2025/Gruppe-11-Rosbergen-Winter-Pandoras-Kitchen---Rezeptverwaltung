<?php

function pre($msg)
{
    echo "<pre>" . print_r($msg, true) . "</pre>";
}
$result = "";
if (isset($_GET["advancedSearchBtn"]) || !empty($_GET['query'])) {
    $spoonacular = Spoonacular::getInstance();

    // Validation
    $validationResult = RecipeSearchModel::searchFormValidation($_GET);

    $errors = [];
    foreach ($validationResult as $key => $values) {
        if ($key == "validatedData") {
            foreach ($values as $item => $value) {
                $_GET[$item] = $value;
            }
        } elseif ($key == "errors") {
            foreach ($values as $item => $value) {
                $errors[$item] = $value;
            }
        }
    }

    /**
     * normales if: if (isset($_GET["fat"])) { $fat = $_GET["fat"] } else { $fat = ""; }
     * short short hand if: $_GET["fat"] ?? "";
     */
    $advancedQuery = $_GET["advancedQuery"] ?? "";
    $types = $_GET["types"] ?? "";
    $cuisine = $_GET["cuisine"] ?? "";
    $diet = $_GET["diet"] ?? "";
    $intolerances = $_GET["intolerances"] ?? "";
    $calories = $_GET["calories"] ?? "";
    $sugar = $_GET["sugar"] ?? "";
    $cholesterol = $_GET["cholesterol"] ?? "";
    $fat = $_GET["fat"] ?? "";

    $searchReturn = [];
    if (count($errors) === 0) {
        if (!empty($_GET["advancedSearchBtn"])) {
            $searchReturn = $spoonacular->complexSearch(
                $advancedQuery,
                $types,
                $cuisine,
                $diet,
                $intolerances,
                $calories,
                $sugar,
                $cholesterol,
                $fat,
                null,
                null,
                null,
                10);
        }elseif (!empty($_GET['query'])) {  /* NORMAL SEARCH*/
            $searchReturn = $spoonacular->complexSearch($_GET['query']);
        }
    }

    if (!empty($searchReturn['results'])) { 
        $result = '
        <div class="container">
            <h3>Search Results</h3>
            <div class="recipe-results-box">
                <section class="recipe-results">
                    <div class="recipe-result">
                        <div class="recipe-grid">';
        foreach ($searchReturn["results"] as $recipe) {
            $result .= '<div class="recipe-card">
                            <img class="recipe-image" src="' . htmlspecialchars($recipe["image"]) . '"alt="' . htmlspecialchars($recipe["title"]) . '">
                            <div class="recipePadding">
                                <p class="recipe-title">' . htmlspecialchars($recipe["title"]) . '</p>
                                <span class="recipe-meta">Ready in ' . htmlspecialchars($recipe["readyInMinutes"]) . ' minutes | Servings: ' . htmlspecialchars($recipe["servings"]) . '</span>
                                <a class="recipe-link" href="' . htmlspecialchars($recipe["sourceUrl"]) . '"target="_blank">View Full Recipe</a>
                            </div>
                        </div>';
        }
        $result .= '</div>
                    </div>
                </section>
            </div>
        </div>';
    }
	else {
		$result = "<p class='search-error-msg'>Sorry, we couldn't find any recipes matching your specifications.</p>";
		foreach ($errors as $errorArray) {
			foreach ($errorArray as $error) {
				$result .= "<p class='search-error-msg'>" . htmlspecialchars($error) . "</p>"; // Append each error to $result
			}
		}
	}
	
	
}

?>


