<?php

class PreferencesModel
{
    /**
     * Get all preferences for a user
     * @return array List of preferences
     */
    public static function getPreferences()
    {
        $userId     = Session::get('user_id');
		$database = DatabaseFactory::getFactory()->getConnection();

		$sql = "SELECT p.id, p.name, p.type, 
					   IF(up.user_id IS NOT NULL, TRUE, FALSE) AS checked
				FROM preferences p
				LEFT JOIN user_preferences up ON p.id = up.preference_id AND up.user_id = :user_id";
		
		$query = $database->prepare($sql);
		
		$query->execute(array(":user_id" => $userId));
		
		return $query->fetchAll();
		
    }

    /**
     * Add a new preference for the user
     * @param string $preference The preference name
     */
    public static function addPreference($preference)
    {
        $database = DatabaseFactory::getFactory()->getConnection();

        $sql = "INSERT IGNORE INTO user_preferences (user_id, preference_id) VALUES (:user_id, :preference_id)";
        $query = $database->prepare($sql);
        $query->execute(array(':user_id' => Session::get('user_id'), ':preference_id' => $preference));
    }

	/**
     * Clear preferences of the user
     */
	public static function clearPreferences()
	{
		$database = DatabaseFactory::getFactory()->getConnection();
		$query = $database->prepare("DELETE FROM user_preferences WHERE user_id = :user_id");
		$query->execute([":user_id" => Session::get('user_id')]);
	}
}
