<?php

class PlansModel
{
    /**
     * Get all meal plans of a user
     */
	public static function getUserPlans()
	{
		$userId = Session::get('user_id');
		$database = DatabaseFactory::getFactory()->getConnection();
	
		// Retrieve all meal plans for the user in a single query
		$sql = "SELECT plans.* 
				FROM user_plans 
				INNER JOIN plans ON user_plans.plan_id = plans.id 
				WHERE user_plans.user_id = :user_id";
		
		$query = $database->prepare($sql);
		$query->execute(array(":user_id" => $userId));
	
		return $query->fetchAll(); // Fetch all meal plans
	}
	

    /**
    * Add a new plan for the user
    */
    public static function addPlan($plan_id)
    {
        $database = DatabaseFactory::getFactory()->getConnection();

        $sql = "INSERT IGNORE INTO plans (user_id, plan_id) VALUES (:user_id, :plan_id)";
        $query = $database->prepare($sql);
        $query->execute(array(':user_id' => Session::get('user_id'), ':plan_id' => $plan_id));
    }

	/**
    * Delete a meal plan
    */
	public static function deletePlan($planId)
	{
		$database = DatabaseFactory::getFactory()->getConnection();
		$query = $database->prepare("DELETE FROM plans WHERE id = :plan_id");
		$query->execute([":plan_id" => $planId]);
	}
}
