<div>
    <h1>Planner</h1>
    <div>

        <?php $this->renderFeedbackMessages(); ?>

        <h3>Generate a Meal Plan</h3>

		<form class="container" action="<?= Config::get('URL'); ?>planner/addItem" method="post">
			<div class="select filters flex_wrapper gap">
				<input class="" type="text" name="name" placeholder="Name your mealplan" value="<?= isset($_GET['search']) ? htmlspecialchars($_GET['search']) : ''; ?>">
				<button class="submit-button" type="submit">Submit</button>
			</div>
		</form>
    </div>
</div>
