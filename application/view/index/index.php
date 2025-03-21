<div class="container">
    <div class="box">
        <!-- echo out the system feedback (error and success messages) -->
        <?php $this->renderFeedbackMessages(); ?>
        <section class="story">
            <h2>Welcome to  Pandora's Kitchen!</h2>
            <p>
                Thank you for choosing Pandora's Kitchen! 
				This Web-App will allow you to search for your favorite recipes, filtered by your preferences.
				Additionally, will be able to input the ingredients you have at home or would like to use for a specific meal, and you will receive a variety of recipes to try out!

                <br><br>
                If you choose to create an account, you can:
                <br><br>
                <span class="material-symbols-outlined">local_dining</span>
                <b>Save your favorite recipes: </b> Keep all your favorite recipes in one place and access them anytime.
                <br><br>

                <span class="material-symbols-outlined">local_dining</span>
                <b>Create shopping lists:</b> Create shopping lists based on your planned meals so you never forget anything again.
                <br><br>

                <span class="material-symbols-outlined">local_dining</span>
                <b>Personalized meal plans:</b> Get customized meal plans based on your individual goals and dietary
                needs.
                <br><br>

                <span class="material-symbols-outlined">local_dining</span>
                <b>Discover new recipes:</b> Get inspired by a variety of recipes and find new favorite dishes.

                <br><br>
                Our app is constantly being developed and equipped with new features to make your meal planning even more convenient and exciting.
				We are proud to be part of your culinary journey and to accompany you on your way to an easier and more enjoyable cooking experience.
            </p>
        </section>

        <div class="spacer_img home"></div>
        <div class="box">
            <h1>Our Highlights</h1>
            <div class="teaser-wrapper">
                <a href="<?php echo Config::get('URL'); ?>planner/index" class="teaser teaser_img1">
                    <h2 class="text_background">Recipe planner</h2>
                    <p class="text_background">Meal planning made quick and easy</p>
                </a>
                <a href="<?php echo Config::get('URL'); ?>recipesearch/index" class="teaser teaser_img3">
                    <h2 class="text_background">Recipe Search</h2>
                    <p class="text_background">Get the exact kind of dish you want to make</p>
                </a>
                <a href="<?php echo Config::get('URL'); ?>register/index" class="teaser teaser_img2">
                    <h2 class="text_background">Register</h2>
                    <p class="text_background">Register for free to get access to many more quality features</p>
                </a>
            </div>
        </div>
    </div>
</div>
