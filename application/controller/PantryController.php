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
     * Add new item to pantry, based on POSTed name
     */
    public function addItem()
    {
		$spoonacular = Spoonacular::getInstance();

		$ingredientName = $_POST['ingredient_name'];
		$data = $spoonacular->ingredientSearch($ingredientName, null, null, null, 1); // !! TODO add intolerances

		// Extract the ID from the first result in the response, Use null coalescing to avoid errors if no results are found
		$ingredientID = $data['results'][0]['id'] ?? null; 
		$ingredientID = $data['results'][0]['name'] ?? null; 
		$ingredientID = $data['results'][0]['original'] ?? null; 
		$ingredientID = $data['results'][0]['originalName'] ?? null; 

		PantryModel::addPantryItem($ingredientID);
		Redirect::to('user/index?active=pantry');
    }

    /**
     * Delete item from the pantry based on ID
     */
    public function deleteItem()
    {
		// !! TODO Replace GETs with POSTs
		$itemId = $_GET['item_id'];
		PantryModel::deletePantryItem($itemId); // Pass the item ID to the model
		Redirect::to('user/index?active=pantry');
	}
}