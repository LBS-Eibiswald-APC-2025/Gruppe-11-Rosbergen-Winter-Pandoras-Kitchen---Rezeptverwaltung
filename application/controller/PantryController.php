<?php

class PantryController extends Controller
{
	// !! TODO add WHIZ
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
		$ingredientInput = $_POST['ingredient_name'];
		$data = $spoonacular->ingredientSearch($ingredientInput, null, null, null, 1); // !! TODO add intolerances

		// Extract the ID from the first result in the response. Use null coalescing to avoid errors if no results are found.
		$ingredientID = $data['results'][0]['id'] ?? null; 
		$ingredientName = $data['results'][0]['name'] ?? null; 
		$image = $data['results'][0]['image'] ?? null; 

		PantryModel::addPantryItem($ingredientID, $ingredientName, $image);
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