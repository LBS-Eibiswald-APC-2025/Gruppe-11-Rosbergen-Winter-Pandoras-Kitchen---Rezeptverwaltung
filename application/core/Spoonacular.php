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


	public function complexSearch($query, $diet = null, $intolerances = null, $includeIngredients = null, $excludeIngredients = null, $sort = null, $number = 4, $addRecipeInformation = true, $addRecipeInstructions = true, $addRecipeNutrition = false)
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

	public function information($id, $includeNutrition=false) {
		$query = urlencode($query); // Sanitize user input
		$url = "https://api.spoonacular.com/recipes/information?id=$id";

		// Add optional parameters if they are provided
		if ($includeNutrition) {
			$url .= "&includeNutrition=true";
		}

		$url .= "&apiKey=" . self::$apiKey;

		$response = file_get_contents($url);
		$data = json_decode($response, true);

		return $data;
	}

	public function ingredientSearch($query, $intolerances=null, $sort=null, $sortDirection=null, $number=4) {
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
