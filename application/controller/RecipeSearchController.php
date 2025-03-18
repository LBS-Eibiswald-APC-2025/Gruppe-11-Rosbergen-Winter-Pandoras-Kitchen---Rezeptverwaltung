<?php

class RecipeSearchController extends Controller
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
        $this->View->render('recipesearch/index', array(
            'types' => RecipeSearchModel::getSearchTerms('type', "searchterms"),
            'cuisine' => RecipeSearchModel::getSearchTerms('cuisine', "searchterms"),
            'diet' => RecipeSearchModel::getSearchTerms('diet', "preferences"),
            'intolerances' => RecipeSearchModel::getSearchTerms('intolerances', "preferences"),
<<<<<<< Updated upstream
<<<<<<< Updated upstream
            'time' => RecipeSearchModel::getSearchTerms('time', "preferences"),
=======
>>>>>>> Stashed changes
=======
>>>>>>> Stashed changes
        ));
    }

    public function recipedetail()
    {
        $this->View->render('recipesearch/recipedetail', array());
    }
}
