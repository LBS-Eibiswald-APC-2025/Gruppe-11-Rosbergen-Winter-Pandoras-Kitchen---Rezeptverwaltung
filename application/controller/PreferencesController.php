<?php

class PreferencesController extends Controller
{
    /**
     * Construct this object by extending the basic Controller class
     */
    public function __construct()
    {
        parent::__construct();
    }

	/**
     * Display preference list
     */
    public function index()
    {
        $this->View->renderWithoutHeaderAndFooter('preferences/index', array(
            'preferences' => PreferencesModel::getPreferences()
        ));
    }

	/**
     * Update preferences
     */
	public function update()
	{
		// Clear existing preferences
		PreferencesModel::clearPreferences(); 
	
		if (!empty($_POST['preferences'])) {
			foreach ($_POST['preferences'] as $preference) {
				PreferencesModel::addPreference($preference);
			}
		}
	
		Redirect::to('user/index?active=preferences');

	}
	

    /**
     * Delete a preference
     * @param int $id The preference ID
     */
    public function delete($id)
    {
        PreferencesModel::deletePreference($id);
        Redirect::to('user/index');
    }

}