<div class="container">
    <div class="box">
        <!-- echo out the system feedback (error and success messages) -->
        <?php $this->renderFeedbackMessages(); ?>
        <section class="story">
            <h3>Willkommen bei Pandoras Kitchen</h3>
            <p>
                Welcome to Pandoras Kitchen
                The app that revolutionizes your meal planning! We are a passionate team of nutritionists, tech
                enthusiasts
                and foodies who are dedicated to the mission of making daily meal planning easier, healthier and more
                exciting. Our vision is to help you effortlessly plan balanced and delicious meals that fit your
                lifestyle
                and preferences. With FoodPlanner, you can save your favorite recipes, create shopping lists and receive
                personalized meal plans based on your goals and dietary needs.

                <br><br>
                With FoodPlanner you can:
                <br><br>
                <span class="material-symbols-outlined">local_dining</span>
                <b>Save your favorite recipes: </b> Keep all your favorite recipes in one place and access them anytime.
                <br><br>

                <span class="material-symbols-outlined">local_dining</span>
                <b>Create shopping lists:</b> Create shopping lists based on your planned meals so you never forget
                anything
                again.
                <br><br>

                <span class="material-symbols-outlined">local_dining</span>
                <b>Personalized meal plans:</b> Get customized meal plans based on your individual goals and dietary
                needs.
                <br><br>

                <span class="material-symbols-outlined">local_dining</span>
                <b>Discover new recipes:</b> Get inspired by a variety of recipes and find new favorite dishes.

                <br><br>
                Our app is constantly being developed and equipped with new features to make your meal planning even
                more
                convenient and exciting. We are proud to be part of your culinary journey and to accompany you on your
                way
                to a healthier and more enjoyable life.
            </p>

        </section>


        <div class="spacer_img home"></div>

        <div class="box">
            <h1>Our Highlights</h1>
            <div class="teaser-wrapper">
                <a href="<?php echo Config::get('URL'); ?>recipesearch/index" class="teaser teaser_img1">
                    <h2 class="text_background">Rezeptplaner</h2>
                    <p class="text_background">Dies ist eine kurze Beschreibung.</p>
                </a>
                <a href="#" class="teaser teaser_img2">
                    <h2 class="text_background">Recipes</h2>
                    <p class="text_background">Dies ist eine kurze Beschreibung.</p>
                </a>
                <a href="#" class="teaser teaser_img3">
                    <h2 class="text_background">Register</h2>
                    <p class="text_background">Dies ist eine kurze Beschreibung.</p>
                </a>
            </div>
        </div>
    </div>
</div>
