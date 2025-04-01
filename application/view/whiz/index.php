<?php

include_once 'application/view/whiz/index.php';

$whiz = '<div class="container">
    <div class="box">
        <div class="form-container">
            <h1>WHIZ</h1>
            <div>';

$this->renderFeedbackMessages();

$whiz .= '<section class="recipe-results">
                    <div class="recipe-result">
                        <div class="recipe-grid">
                            <div class="recipe-card">
                                <img class="recipe-image" src="https://img.spoonacular.com/recipes/658615-312x231.jpg"
                                     alt="Roasted Peppers, Spinach &amp; Feta Pizza">
                                <div class="recipePadding">
                                    <p class="recipe-title">Roasted Peppers, Spinach &amp; Feta Pizza</p>
                                    <span class="recipe-meta">Ready in 45minutes | Servings: 1</span>
                                    <a class="recipe-link"
                                       href="http://www.foodista.com/recipe/LWCPWJ2L/roasted-peppers-spinach-feta-pizza"
                                       target="_blank">View Full Recipe</a>
                                </div>
                            </div>
                            <div class="recipe-card">
                                <img class="recipe-image" src="https://img.spoonacular.com/recipes/658920-312x231.jpg"
                                     alt="Rustic Grilled Peaches Pizza">
                                <div class="recipePadding">
                                    <p class="recipe-title">Rustic Grilled Peaches Pizza</p>
                                    <span class="recipe-meta">Ready in 45minutes | Servings: 4</span>
                                    <a class="recipe-link"
                                       href="http://www.foodista.com/recipe/PRMSG6W5/rustic-grilled-peaches-pizza"
                                       target="_blank">View Full Recipe</a>
                                </div>
                            </div>
                            <div class="recipe-card">
                                <img class="recipe-image" src="https://img.spoonacular.com/recipes/656329-312x231.jpg"
                                     alt="Pizza bites with pumpkin">
                                <div class="recipePadding">
                                    <p class="recipe-title">Pizza bites with pumpkin</p>
                                    <span class="recipe-meta">Ready in 45minutes | Servings: 4</span>
                                    <a class="recipe-link"
                                       href="https://www.foodista.com/recipe/SHKG55X4/pizza-bites-with-pumpkin"
                                       target="_blank">View Full Recipe</a>
                                </div>
                            </div>
                            <div class="recipe-card">
                                <img class="recipe-image" src="https://img.spoonacular.com/recipes/680975-312x231.jpg"
                                     alt="BLT Pizza">
                                <div class="recipePadding">
                                    <p class="recipe-title">BLT Pizza</p>
                                    <span class="recipe-meta">Ready in 45minutes | Servings: 3</span>
                                    <a class="recipe-link" href="https://www.pinkwhen.com/blt-pizza/" target="_blank">View
                                        Full Recipe</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
            </div>
        </div>
    </div>
</div>';


echo $whiz;