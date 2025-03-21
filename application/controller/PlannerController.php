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
}
