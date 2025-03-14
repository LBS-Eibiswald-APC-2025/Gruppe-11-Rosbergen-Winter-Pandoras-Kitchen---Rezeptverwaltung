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
            'allergen' => RecipeSearchModel::getSearchTerms('allergen', "preferences"),
        ));
    }

    public function advancedSearch()
    {
        $this->View->render('recipesearch/advancedSearch');
    }

}
