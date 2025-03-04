<?php

class PantryController extends Controller
{
    /**
     * Construct this object by extending the basic Controller class
     */
    public function __construct()
    {
        parent::__construct();
		Auth::checkAuthentication();
    }

	/**
     * Display pantry list
     */
    public function index()
    {
        $this->View->renderWithoutHeaderAndFooter('pantry/index', array(
            'pantry' => PantryModel::getPantry()
        ));
    }

	/**
     * Update pantry
     */
	public function update()
	{
		PantryModel::clearPantry(); 
	
		if (!empty($_POST['pantry'])) {
			foreach ($_POST['pantry'] as $pantryItem) {
				PantryModel::addPantryItem($pantryItem);
			}
		}
	
		Redirect::to('user/index?active=pantry');

	}

}