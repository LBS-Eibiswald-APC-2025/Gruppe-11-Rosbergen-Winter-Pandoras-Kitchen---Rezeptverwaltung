<div class="container">
    <h1></h1>
    <div class="box">

        <!-- echo out the system feedback (error and success messages) -->
        <?php $this->renderFeedbackMessages(); ?>

        <section class="story">
            <h2>The Story of Pandora's Kitchen</h2>
            <p>"What should I cook today?" That simple yet frustrating question sparked the idea behind Pandora’s
                Kitchen.</p>
            <p>Too often, we stood in front of the fridge with ingredients but no inspiration. Or we wanted to eat
                healthier, but meal planning felt overwhelming. We knew there had to be a better way.</p>
            <p>Pandora's Kitchen was born to make cooking stress-free, creative, and smart. Instead of spending hours
                searching for recipes or wasting food, we built a solution that intelligently suggests recipes,
                considers
                dietary preferences, and even creates shopping lists automatically.</p>

            <h3>The Minds Behind Pandora’s Kitchen</h3>
            <p>We are a team of tech enthusiasts and food lovers with one shared vision: to make meal planning smarter,
                reduce food waste, and bring back the joy of cooking. With experience in web development and a passion
                for
                intuitive apps, we’ve created a platform that adapts to your needs – not the other way around.</p>
            <p>Whether you’re vegan, have food allergies, or just need inspiration, Pandora’s Kitchen helps you make the
                most of your ingredients.</p>

            <p>Give it a try – your next meal is just a click away! 🍽️✨</p>

            <h3>Meet the Team</h3>
            <div class="team">
                <div class="team-member">
                    <img src="<?= Config::get('URL'); ?>/images/woman-1353211_1280.png" alt="">
                    <p class="name">Alice Johnson</p>
                    <p class="role">Founder & CEO</p>
                </div>
                <div class="team-member">
                    <img src="<?= Config::get('URL'); ?>/images/man-2700445_1280.png" alt="">
                    <p class="name">Bob Smith</p>
                    <p class="role">Lead Developer</p>
                </div>
            </div>
        </section>

        <div class="spacer_img"></div>

        <section class="how-it-works">
            <h2>How It Works</h2>
            <p>Discover how Pandora's Kitchen simplifies your meal planning process with just a few easy steps:</p>
            <div class="steps">
                <div class="step" >
                    <img src="<?= Config::get('URL'); ?>/images/illustration-des-persoenlichen-einstellungskonzepts_114360-2251.jpg" alt="Step 1" class="step-icon">
                    <h3>Choose Your Preferences</h3>
                    <p>Select your dietary preferences, restrictions, and goals.</p>
                </div>
                <div class="step" >
                    <img src="<?= Config::get('URL'); ?>/images/rezeptbuchkonzeptillustration_114360-7481.jpg" alt="Step 2" class="step-icon">
                    <h3>Get Recipe Suggestions</h3>
                    <p>Receive personalized recipe suggestions based on your ingredients.</p>
                </div>
                <div class="step" >
                    <img src="<?= Config::get('URL'); ?>/images/abbildung-des-essenskonzepts-bestellen_114360-7070.png" alt="Step 3" class="step-icon">
                    <h3>Plan & Shop</h3>
                    <p>Plan your meals and generate shopping lists automatically.</p>
                </div>
            </div>
        </section>

        <section class="meal-planning">
            <h2>Important Points of Meal Planning</h2>
            <p>Meal planning is the key to a balanced diet and a healthy lifestyle. Here are the most important points
                to consider when planning your meals:</p>
            <div class="points">
                <div class="point">
                    <h3>1. Balanced Nutrient Distribution</h3>
                    <p>Ensure your diet contains all necessary nutrients, including carbohydrates, proteins, fats,
                        vitamins, and minerals.</p>
                </div>
                <div class="point">
                    <h3>2. Consider Individual Needs</h3>
                    <p>Meal planning should be tailored to your individual needs and goals, such as weight loss, muscle
                        building, or promoting health.</p>
                </div>
                <div class="point">
                    <h3>3. Regular Meals</h3>
                    <p>Regular meals and snacks help keep blood sugar levels stable and distribute energy throughout the
                        day.</p>
                </div>
                <div class="point">
                    <h3>4. Food Variety</h3>
                    <p>A diverse meal plan ensures that you get all necessary micronutrients while avoiding food
                        boredom.</p>
                </div>
                <div class="point">
                    <h3>5. Hydration</h3>
                    <p>Water is essential for many body functions, so adequate hydration should be included in daily
                        meal planning.</p>
                </div>
            </div>
        </section>

    </div>


