<?php

class YourProfileController extends Controller
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
        $this->View->renderWithoutHeaderAndFooter('YourProfile/index', array(
			'user_name' => Session::get('user_name'),
			'user_email' => Session::get('user_email'),
			'user_gravatar_image_url' => Session::get('user_gravatar_image_url'),
			'user_avatar_file' => Session::get('user_avatar_file'),
			'user_account_type' => Session::get('user_account_type')
		));
    }
}
