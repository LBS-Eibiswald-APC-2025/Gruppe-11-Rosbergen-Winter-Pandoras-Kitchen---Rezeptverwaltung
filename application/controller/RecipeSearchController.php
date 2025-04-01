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
        $this->View->render('RecipeSearch/index', array(
            'types' => RecipeSearchModel::getSearchTerms('type', "searchterms"),
            'cuisine' => RecipeSearchModel::getSearchTerms('cuisine', "searchterms"),
            'diet' => RecipeSearchModel::getSearchTerms('diet', "preferences"),
            'intolerances' => RecipeSearchModel::getSearchTerms('intolerances', "preferences"),
            'time' => RecipeSearchModel::getSearchTerms('time', "searchterms"),
        ));
    }

    public function recipeDetail()
    {
        $this->View->render('RecipeSearch/recipeDetail', array());
    }


    public function searchResults()
    {
        $this->View->render('RecipeSearch/searchResults', array());
    }
}
