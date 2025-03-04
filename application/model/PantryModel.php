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

		$sql = "SELECT p.id, p.name, p.type, 
					   IF(up.user_id IS NOT NULL, TRUE, FALSE) AS checked
				FROM pantry p
				LEFT JOIN user_pantry up ON p.id = up.item_id AND up.user_id = :user_id";
		
		$query = $database->prepare($sql);
		
		$query->execute(array(":user_id" => $userId));
		
		return $query->fetchAll();
		
    }

    /**
     * Add a new pantry item for the user
     * @param string $pantryItem
     */
    public static function addPantryItem($pantryItem)
    {
        $database = DatabaseFactory::getFactory()->getConnection();

        $sql = "INSERT IGNORE INTO user_pantry (user_id, item_id) VALUES (:user_id, :item_id)";
        $query = $database->prepare($sql);
        $query->execute(array(':user_id' => Session::get('user_id'), ':item_id' => $pantryItem));
    }

	public static function clearPantry()
	{
		$database = DatabaseFactory::getFactory()->getConnection();
		$query = $database->prepare("DELETE FROM user_pantry WHERE user_id = :user_id");
		$query->execute([":user_id" => Session::get('user_id')]);
	}
}
