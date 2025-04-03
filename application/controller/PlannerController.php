<?php

class PlannerController extends Controller
{
    /**
     * Construct this object by extending the basic Controller class
     */
    public function __construct()
    {
        parent::__construct();
		Auth::checkAuthentication();
    }

    public function index($test = false)
    {
		$this->View->renderWithoutHeaderAndFooter('planner/index');
    }


    public function addItem()
    {
		$name = $_POST['name'];
		$userId = Session::get('user_id');
		$database = DatabaseFactory::getFactory()->getConnection();
		$spoonacular = new Spoonacular();
		$mealPlanData = $spoonacular->generateMealPlan();

		// Convert the meal plan data to JSON
		$mealPlanDataJson = json_encode($mealPlanData);

		$sql = "INSERT INTO plans (plan_data, name) VALUES (:mealPlanData, :name)";
		$updateQuery = $database->prepare($sql);
		$updateQuery->execute(array(
			":mealPlanData" => $mealPlanDataJson,
			":name" => $name
		));

		// Get the last inserted plan ID
		$plan_Id = $database->lastInsertId();

		$insertSql = "INSERT INTO user_plans (user_id, plan_id) VALUES (:user_id, :plan_Id)";
		$insertQuery = $database->prepare($insertSql);
		$insertQuery->execute(array(
			":user_id" => $userId,
			":plan_Id" => $plan_Id
		));

		Redirect::to('user/index?active=plans');
    }

    public function deleteItem($planId)
    {
		PlansModel::deletePlan($planId);
		Redirect::to('user/index?active=plans');
	}
}
