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
    public static function addPantryItem($pantryItem)
    {
        $database = DatabaseFactory::getFactory()->getConnection();

        $sql = "INSERT IGNORE INTO user_pantry (user_id, item_id) VALUES (:user_id, :item_id)";
        $query = $database->prepare($sql);
        $query->execute(array(':user_id' => Session::get('user_id'), ':item_id' => $pantryItem));
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
