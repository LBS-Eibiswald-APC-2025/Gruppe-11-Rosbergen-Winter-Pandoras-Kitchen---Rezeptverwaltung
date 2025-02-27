<?php

class PreferencesModel
{
    /**
     * Get all preferences for a user
     * @return array List of preferences
     */
    public static function getPreferences()
    {
        $database = DatabaseFactory::getFactory()->getConnection();

        $sql = "SELECT id, name FROM preferences WHERE user_id = :user_id";
        $query = $database->prepare($sql);
        $query->execute(array(':user_id' => Session::get('user_id')));

        return $query->fetchAll();
    }

    /**
     * Add a new preference for the user
     * @param string $preference The preference name
     */
    public static function addPreference($preference)
    {
        $database = DatabaseFactory::getFactory()->getConnection();

        $sql = "INSERT IGNORE INTO preferences (user_id, name) VALUES (:user_id, :name)";
        $query = $database->prepare($sql);
        $query->execute(array(':user_id' => Session::get('user_id'), ':name' => $preference));
    }

    /**
     * Remove a preference
     * @param int $id The preference ID
     */
    public static function deletePreference($id)
    {
        $database = DatabaseFactory::getFactory()->getConnection();

        $sql = "DELETE FROM preferences WHERE id = :id AND user_id = :user_id";
        $query = $database->prepare($sql);
        $query->execute(array(':id' => $id, ':user_id' => Session::get('user_id')));
    }
}
