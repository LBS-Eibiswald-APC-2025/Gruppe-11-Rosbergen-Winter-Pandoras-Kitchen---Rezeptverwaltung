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
        $sql = "SELECT id, name, type FROM :tableName WHERE type = :term ";

        $query = $database->prepare($sql);
        $query->execute(array(":tableName" => $tableName, ":term" => $term));

        return $query->fetchAll();

    }
<<<<<<< Updated upstream
<<<<<<< Updated upstream

}
=======
}
>>>>>>> Stashed changes
=======
}
>>>>>>> Stashed changes
