<?php

class Spoonacular
{
	private static $apiKey = 'f2120b4500e84105bd83caea896db140';
	private static $spoonacular; // Missing static property

	public static function getInstance()
    {
        if (!self::$spoonacular) {
            self::$spoonacular = new Spoonacular();
        }
        return self::$spoonacular;
    }


    /**
     * @param $query
     * @param $type
     * @param $cuisine
     * @param $diet
     * @param $intolerances
     * @param $calories
     * @param $sugar
     * @param $cholesterol
     * @param $fat
     * @param $intolerances
     * @param $includeIngredients
     * @param $excludeIngredients
     * @param $sort
     * @param $number
     * @param $addRecipeInformation
     * @param $addRecipeInstructions
     * @param $addRecipeNutrition
     * @return mixed
     */

    public function complexSearch(
        $query,
        $type = [],
        $cuisine = [],
        $diet = [],
        $intolerances = [],
        $calories = null,
        $sugar = null,
        $cholesterol = null,
        $fat = null,
        $includeIngredients = [],
        $excludeIngredients = null,
        $sort = null,
        $number = 4,
        $addRecipeInformation = true,
        $addRecipeInstructions = true,
        $addRecipeNutrition = false)
    {
        $query = urlencode($query); // Sanitize user input
        $url = "https://api.spoonacular.com/recipes/complexSearch?query=$query";

		// Add optional parameters if they are provided
		if ($addRecipeInformation) {
			$url .= "&addRecipeInformation=true";
		}
		if ($addRecipeInstructions) {
			$url .= "&addRecipeInstructions=true";
		}
		if ($addRecipeNutrition) {
			$url .= "&addRecipeNutrition=true";
		}
		if (!empty($diet)) {
			$url .= "&diet=" . urlencode($diet);
		}
		if (!empty($intolerances)) {
			$url .= "&intolerances=" . urlencode($intolerances);
		}
		if (!empty($includeIngredients)) {
			$url .= "&includeIngredients=" . urlencode($includeIngredients);
		}
		if (!empty($excludeIngredients)) {
			$url .= "&excludeIngredients=" . urlencode($excludeIngredients);
		}
		if (!empty($sort)) {
			$url .= "&sort=" . urlencode($sort);
		}

		$url .= "&number=" . intval($number);
		$url .= "&apiKey=" . self::$apiKey;

		$response = file_get_contents($url);
		$data = json_decode($response, true);

		return $data;
	}

	// Return information of an ingredient based on its ID
	public function information($id, $includeNutrition=false) {
		$id = urlencode($id); // Sanitize user input
		$url = "https://api.spoonacular.com/food/ingredients/" . $id ."/information?amount=1";

		// Add optional parameters if they are provided
		if ($includeNutrition) {
			$url .= "&includeNutrition=true";
		}

		$url .= "&apiKey=" . self::$apiKey;

		$response = file_get_contents($url);
		$data = json_decode($response, true);

		return $data;
	}

	// Search for ingredients - Amount of returned ingredients (number) is 1 per default. Query required.
	public function ingredientSearch($query, $intolerances=null, $sort=null, $sortDirection=null, $number=1) {
		// !! TODO Get intolerances standardmäßig
		$query = urlencode($query); // Sanitize user input
		$url = "https://api.spoonacular.com/food/ingredients/search?query=$query";

		// Add optional parameters if they are provided
		if (!empty($intolerances)) {
			$url .= "&intolerances=" . urlencode($intolerances);
		}
		if (!empty($sort)) {
			$url .= "&sort=" . urlencode($sort);
		}
		if (!empty($sortDirection)) {
			$url .= "&sortDirection=" . urlencode($sortDirection);
		}

		$url .= "&number=" . intval($number);
		$url .= "&apiKey=" . self::$apiKey;

		$response = file_get_contents($url);
		$data = json_decode($response, true);

		return $data;
	}
}
