<?php

class WhizController extends Controller
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
        $this->View->render('whiz/index');
    }
}
