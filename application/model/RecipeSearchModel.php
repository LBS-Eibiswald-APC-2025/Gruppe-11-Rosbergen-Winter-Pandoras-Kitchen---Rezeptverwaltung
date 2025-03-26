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

    public static function searchFormValidation($get): array
    {
        // Defines the properties of the fields for validation
        $fieldDefinitionsForValidation = [
            'query' => [
                'name' => 'query',
                'label' => 'Text Search',
                'type' => 'text',
                'maxLength' => 30,
            ],
            'advancedQuery' => [
                'name' => 'advancedQuery',
                'label' => 'Text Search',
                'type' => 'text',
                'maxLength' => 30,
            ],
            'types' => [
                'name' => 'type',
                'label' => 'Menu Type',
                'type' => 'checkbox',
            ],
            'cuisine' => [
                'name' => 'cuisine',
                'label' => 'Cuisine',
                'type' => 'checkbox',
            ],
            'diet' => [
                'name' => 'diet',
                'label' => 'Diet',
                'type' => 'checkbox',
            ],
            'intolerances' => [
                'name' => 'intolerances',
                'label' => 'Intolerances',
                'type' => 'checkbox'
            ],
            'time' => [
                'name' => 'time',
                'label' => 'Time',
                'type' => 'number',
                'max' => 500,
            ],
            'calories' => [
                'name' => 'calories',
                'label' => 'Calories',
                'type' => 'number',
            ],
            'sugar' => [
                'name' => 'sugar',
                'label' => 'Sugar',
                'type' => 'number',
            ],
            'cholesterol' => [
                'name' => 'cholesterol',
                'label' => 'Cholesterol',
                'type' => 'number',
            ],
            'fat' => [
                'name' => 'fat',
                'label' => 'Fat',
                'type' => 'number',
            ],
        ];

        // Initialize variables for storing validation errors and valid data
        $errors = [];
        $validatedData = [];

        // Loop through each field definition to validate input data
        foreach ($fieldDefinitionsForValidation as $key => $definition) {

            // Check if the field is not empty and is of type "text"
            if (!empty($get[$key]) && isset($definition['type']) && $definition['type'] == "text") {

                // Validate the maximum length of the text input
                if (mb_strlen($get[$key]) > $definition['maxLength']) {
                    $errors[$key][] = "The search term must not exceed 70 characters.";
                }

                // Ensure the input contains only valid letters, spaces, and special characters like umlauts
                if (!preg_match('/^[a-zA-ZäöüÄÖÜß\s]+$/u', $get[$key])) {
                    $errors[$key][] = "The search term may only contain letters.";
                }
            }

            // Check if the field is not empty and is of type "checkbox"
            if (!empty($get[$key]) && isset($definition['type']) && $definition['type'] == "checkbox") {
                // Convert array values into a comma-separated string
                $validatedData[$key] = implode(',', $get[$key]);
            }

            // Check if the field is not empty and is of type "number"
            if (!empty($get[$key]) && isset($definition['type']) && $definition['type'] == "number") {

                // Validate the maximum allowable value for the number input
                if (isset($definition['max']) && $get[$key] > $definition['max']) {
                    $errors[$key][] = "The number must not be greater than " . $definition['max'] . ".";
                }

                // Ensure the input is a valid number (including decimals)
                if (!preg_match('/^\d+([.,]\d+)?$/', $get[$key])) {
                    $errors[$key][] = "The value must be a valid number.";
                }
            }
        }

        // Return the errors and validated data as an associative array
        return ['errors' => $errors, 'validatedData' => $validatedData];
    }

}
