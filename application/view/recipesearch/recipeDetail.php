<?php

?>


<!-- -->
<div class="container">
    <h1>Recipe Detail</h1>
    <div class="box">
        <div class="form-container ">

            <section class="recipe-details">
                <div class="recipe-header">
                    <img src="<?= Config::get('URL'); ?>/images/penne-pasta-tomato-sauce-with-chicken-tomatoes-wooden-table.jpg" alt="Recipe Image" class="recipe-image">
                    <h2 class="recipe-title">Delicious Pasta</h2>
                </div>

                <div class="recipe-content">
                    <div class="recipe-info">
                        <h3>Ingredients</h3>
                        <ul>
                            <li>200g Pasta</li>
                            <li>2 Tomatoes</li>
                            <li>1 Garlic Clove</li>
                            <li>Olive Oil</li>
                            <li>Salt & Pepper</li>
                        </ul>

                        <h3>Instructions</h3>
                        <ol>
                            <li>Cook the pasta according to the package instructions.</li>
                            <li>Chop the tomatoes and garlic.</li>
                            <li>Heat olive oil in a pan and sauté garlic.</li>
                            <li>Add tomatoes and cook for 5 minutes.</li>
                            <li>Mix with pasta, season with salt & pepper, and serve.</li>
                        </ol>
                    </div>

                    <div class="nutrition-info">
                        <h3>Nutrition Facts</h3>
                        <table>
                            <tr>
                                <td>Calories</td>
                                <td>450 kcal</td>
                            </tr>
                            <tr>
                                <td>Fat</td>
                                <td>12g</td>
                            </tr>
                            <tr>
                                <td>Carbohydrates</td>
                                <td>60g</td>
                            </tr>
                            <tr>
                                <td>Protein</td>
                                <td>15g</td>
                            </tr>
                        </table>
                    </div>
                </div>
            </section>
        </div>
    </div>
</div>