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
     * Add a new preference
     */
    public function add()
    {
        if (isset($_POST['preferences'])) {
            PreferencesModel::addPreference($_POST['preferences']);
        }
        Redirect::to('user/index');
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