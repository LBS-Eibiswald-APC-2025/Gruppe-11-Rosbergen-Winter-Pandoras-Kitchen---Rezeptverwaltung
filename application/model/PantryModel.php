<?php

class PantryModel
{
    /**
     * @return array List of pantry items
     */
    public static function getPantry()
    {
        $userId = Session::get('user_id');
		$database = DatabaseFactory::getFactory()->getConnection();

		$sql = "SELECT item_id 
		FROM user_pantry
		WHERE user_id = :user_id";
		
		$query = $database->prepare($sql);
		
		$query->execute(array(":user_id" => $userId));
		
		return $query->fetchAll();
		
    }

    /**
     * Add a new pantry item for the user
     * @param string $pantryItem ID
     */
	public static function addPantryItem($pantryItem, $ingredientName, $image)
	{
		$database = DatabaseFactory::getFactory()->getConnection();
	
		// First, insert the item into the pantry if it does not already exist
		$sql = "INSERT INTO pantry (id, ingredientName, image)
				SELECT :id, :ingredientName, :image
				WHERE NOT EXISTS (SELECT 1 FROM pantry WHERE id = :id)";
		$query = $database->prepare($sql);
		$query->execute(array(':id' => $pantryItem, ':ingredientName' => $ingredientName, 'image' => $image));
	
		// Now insert the item into the user_pantry (this will only insert if the item is not already linked to the user)
		$sqlUserPantry = "INSERT IGNORE INTO user_pantry (user_id, item_id) 
						  VALUES (:user_id, :item_id)";
		$queryUserPantry = $database->prepare($sqlUserPantry);
		$queryUserPantry->execute(array(':user_id' => Session::get('user_id'), ':item_id' => $pantryItem));
	}

	// Delete an item from the user's pantry
	public static function deletePantryItem($pantryItem)
	{
		$database = DatabaseFactory::getFactory()->getConnection();
	
		$sql = "DELETE FROM user_pantry WHERE user_id = :user_id AND item_id = :item_id";
		$query = $database->prepare($sql);
		$query->execute(array(':user_id' => Session::get('user_id'), ':item_id' => $pantryItem));
	}
	
}
