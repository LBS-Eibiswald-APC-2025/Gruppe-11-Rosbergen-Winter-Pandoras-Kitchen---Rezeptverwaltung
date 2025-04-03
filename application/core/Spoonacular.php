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
     * @param array $type
     * @param array $cuisine
     * @param array $diet
     * @param array $intolerances
     * @param $calories
     * @param $sugar
     * @param $cholesterol
     * @param $fat
     * @param array $includeIngredients
     * @param $excludeIngredients
     * @param $sort
     * @param int $number
     * @param bool $addRecipeInformation
     * @param bool $addRecipeInstructions
     * @param bool $addRecipeNutrition
     * @return mixed
     */

    public function complexSearch(
        $query = null,
        string $type = null,
        string $cuisine = null,
        string $diet = null,
        string $intolerances = null,
        $time = null,
        $calories = null,
        $sugar = null,
        $cholesterol = null,
        $fat = null,
        string $includeIngredients = null,
        $excludeIngredients = null,
        $sort = null,
        int $number = 4,
        bool $addRecipeInformation = true,
        bool $addRecipeInstructions = true,
        bool $addRecipeNutrition = false)
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
        if (!empty($type)) {
            $url .= "&type=" . urlencode($type);
        }
        if (!empty($cuisine)) {
            $url .= "&cuisine=" . urlencode($cuisine);
        }
        if (!empty($time)) {
            $url .= "&maxReadyTime=" . urlencode($time);
        }
        if (!empty($calories)) {
            $url .= "&calories=" . urlencode($calories);
        }
        if (!empty($sugar)) {
            $url .= "&sugar=" . urlencode($sugar);
        }
        if (!empty($cholesterol)) {
            $url .= "&cholesterol=" . urlencode($cholesterol);
        }
        if (!empty($fat)) {
            $url .= "&fat=" . urlencode($fat);
        }
        if (!empty($diet)) {
            // implode Convert array to string
            $url .= "&diet=" . urlencode($diet);
        }
        if (!empty($intolerances)) {
            // implode Convert array to string
            $url .= "&intolerances=" . urlencode($intolerances);
        }
        if (!empty($includeIngredients)) {
            // implode Convert array to string
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
    public function information($id, $includeNutrition = false)
    {
        $id = urlencode($id); // Sanitize user input
        $url = "https://api.spoonacular.com/food/ingredients/" . $id . "/information?amount=1";

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
    public function ingredientSearch($query, $intolerances = null, $sort = null, $sortDirection = null, $number = 1)
    {
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


	// Connect a user, if they are not already connected to spoonacular, giving them a username
	public function connectUserToSpoonacular() {
		$url = "https://api.spoonacular.com/users/connect?apiKey=" . self::$apiKey;
		
		$postData = [
			"email" => Session::get('user_email')
		];
		
		$ch = curl_init($url);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
		curl_setopt($ch, CURLOPT_POST, true);
		curl_setopt($ch, CURLOPT_HTTPHEADER, ["Content-Type: application/json"]);
		curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($postData));
		
		$response = curl_exec($ch);
		curl_close($ch);
		
		return json_decode($response, true);
	}

	// Get a week's Meal Plan for a user using Spoonacular
	public function getMealPlanWeek() {
		$database = DatabaseFactory::getFactory()->getConnection();
        $userId = Session::get('user_id');

		$sql = "SELECT spoonacular_username FROM users WHERE user_id = :user_id LIMIT 1";

		$query = $database->prepare($sql);
		$query->execute(array(":user_id" => $userId));

		$result = $query->fetch();

		$spoonacular_username = $result['spoonacular_username'];
		if(empty($spoonacular_username)) {
			$response = $spoonacular->connectUserToSpoonacular();
			$spoonacular_username = $response['username'];

			$updateSql = "UPDATE users SET spoonacular_username = :spoonacular_username WHERE user_id = :user_id";
            $updateQuery = $database->prepare($updateSql);
            $updateQuery->execute(array(
                ":spoonacular_username" => $spoonacular_username,
                ":user_id" => $userId
            ));
		}

		$url = "https://api.spoonacular.com/users/connect?apiKey=" . self::$apiKey;
	}

	public function generateMealPlan() {
		$url = "https://api.spoonacular.com/mealplanner/generate?apiKey=" . self::$apiKey;
		
		$targetCalories = 2000;

		// Add optional parameters if they are provided
		$url .= "&timeframe=" . urlencode("weeks");
		if (!false) {
			$url .= "&targetCalories=" . urlencode($targetCalories);
		}
		if (false) {
			$url .= "&diet=" . urlencode($diet);
		}
		if (false) {
			$url .= "&exclude=" . urlencode($exclude);
		}

		$response = file_get_contents($url);
		$data = json_decode($response, true);
	
		return $data;
	}
	
}
