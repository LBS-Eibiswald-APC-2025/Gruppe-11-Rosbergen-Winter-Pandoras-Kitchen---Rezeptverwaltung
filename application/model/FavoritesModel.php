<?php

class FavoritesModel
{
    /**
     * Get all favorites of a user
     */
	public static function getUserFavorites()
{
    $userId = Session::get('user_id');
    $database = DatabaseFactory::getFactory()->getConnection();

    // Get all favorite recipe IDs for the user
    $sql = "SELECT recipe_id FROM user_favorites WHERE user_id = :user_id";
    $query = $database->prepare($sql);
    $query->execute(array(":user_id" => $userId));
    
    $favorites = $query->fetchAll(PDO::FETCH_ASSOC); // Fetch as associative array

    if (empty($favorites)) {
        return []; // No favorites, return empty array
    }

    $spoonacular = Spoonacular::getInstance();
    $instructions = [];

    // Loop through each favorite and get analyzed instructions
    foreach ($favorites as $favorite) {
        $recipeId = $favorite['recipe_id'];
        $instructions[$recipeId] = $spoonacular->information($recipeId);
    }

    return $instructions;
}

	

    /**
    * Add a new favorite for the user
    */
    public static function addFavorite($favorite)
    {
        $database = DatabaseFactory::getFactory()->getConnection();

        $sql = "INSERT IGNORE INTO user_favorites (user_id, favorite_id) VALUES (:user_id, :favorite_id)";
        $query = $database->prepare($sql);
        $query->execute(array(':user_id' => Session::get('user_id'), ':favorite_id' => $favorite));
    }

	/**
    * Remove a favorite from the user
    */
	public static function deleteFavorite($favorite)
	{
		$database = DatabaseFactory::getFactory()->getConnection();
		$query = $database->prepare("DELETE FROM user_favorites WHERE favorite_id = :favorite_id");
		$query->execute([":user_id" => Session::get('user_id')]);
	}
	
}
