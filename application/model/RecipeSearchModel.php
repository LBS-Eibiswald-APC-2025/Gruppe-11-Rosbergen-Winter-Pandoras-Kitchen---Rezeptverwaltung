<?php

class RecipeSearchModel
{
    /**
     * Retrieves search terms from the database.
     *
     * This method connects to the database and executes a query to fetch
     * search terms of type 'type'. The results are returned as an array.
     *
     * @return array
     */
    public static function getSearchTerms(string $term, string $tableName): array
    {
        $database = DatabaseFactory::getFactory()->getConnection();
        $userId = Session::get('user_id');

        if (Session::userIsLoggedIn() && $tableName == "preferences") {
            $sql = "SELECT p.id, p.name, p.type, 
					   IF(up.user_id IS NOT NULL, TRUE, FALSE) AS checked
				FROM preferences p
				LEFT JOIN user_preferences up ON p.id = up.preference_id AND up.user_id = :user_id WHERE type ='" . $term . "'";

            $query = $database->prepare($sql);
            $query->execute(array(":user_id" => $userId));
        } else {

            $sql = "SELECT id, name, type FROM " . $tableName . " WHERE type ='" . $term . "'";

            $query = $database->prepare($sql);
            $query->execute(array());
        }
        return $query->fetchAll();
    }
}
