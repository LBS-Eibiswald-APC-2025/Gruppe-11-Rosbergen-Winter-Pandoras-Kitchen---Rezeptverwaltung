<?php

class PlansController extends Controller
{
    /**
     * Construct this object by extending the basic Controller class
     */
    public function __construct()
    {
        parent::__construct();
		Auth::checkAuthentication();
    }

    public function index()
    {
        $this->View->renderWithoutHeaderAndFooter('plans/index', array(
            'plans' => PlansModel::getUserPlans()
		));
    }

	public function deletePlan() {
		$planId = $_POST['plan_id'];
		PlansModel::deletePlan($planId);
		Redirect::to('user/index?active=plans');
	}
}