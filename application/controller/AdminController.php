<?php

class AdminController extends Controller
{
    /**
     * Construct this object by extending the basic Controller class
     */
    public function __construct()
    {
        parent::__construct();

        // special authentication check for the entire controller: Note the check-ADMIN-authentication!
        // All methods inside this controller are only accessible for admins (= users that have role type 7)
        Auth::checkAdminAuthentication();
    }

    /**
     * This method controls what happens when you move to /admin or /admin/index in your app.
     */
    public function index()
    {
        $this->View->render('admin/index', array(
			'users' => UserModel::getPublicProfilesOfAllUsers(),
			'accountTypes' => UserModel::getAllAccountTypes()
		));
    }

    public function actionAccountSettings()
	{
		// Get POST data
		$userId = Request::post('user_id');
		$suspension = Request::post('suspension');
		$softDelete = Request::post('softDelete');
		$accountType = Request::post('user_account_type');

		AdminModel::setAccountSuspensionAndDeletionStatus($suspension, $softDelete, $userId);
		AdminModel::updateAccountType($userId, $accountType);
		Redirect::to("admin");
	}

}
