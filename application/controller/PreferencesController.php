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

    public function index()
    {
        $this->View->renderWithoutHeaderAndFooter('preferences/index');
    }
}
