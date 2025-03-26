<div>
    <h1>Plans</h1>
    <div>

        <?php $this->renderFeedbackMessages(); ?>

        <h3>Your Mealplans</h3>
        <div>
            <?php if (!empty($this->plans)) : ?>
                <ul>
                    <?php foreach ($this->plans as $plan) : ?>
                        <li>
                            <?php
                                $mealPlanData = json_decode($plan->plan_data, true);
                                echo '<details class="meal-plan-container">';
                                echo '<summary><strong>' . $plan->name . '</strong></summary>';  // This will show the plan ID in the collapsed section
                                
                                foreach ($mealPlanData['week'] as $day => $dayData) {
									echo '<div class="day-container">';
									echo '<h1>' . ucfirst($day) . '</h1>';
								
									echo '<div class="meals">';
									foreach ($dayData['meals'] as $meal) {
										echo '<div class="meal">';
										echo '<h3><a class="black-link" href="' . $meal['sourceUrl'] . '" target="_blank">' . $meal["title"] . '</a></h3>';
										echo '<p>Ready in ' . $meal['readyInMinutes'] . ' minutes</p>';
										echo '</div>';
									}
									echo '</div>'; // Close meals container
									echo '</div>'; // Close day-container
								}
								
								echo '</details>';  // Close the details container								
                            ?>
							<form method="post" action="<?php echo Config::get('URL'); ?>plans/deletePlan">
								<input type="hidden" name="plan_id" value="<?php echo $plan->id; ?>" />
								<input class="delete-button" type="submit" value="Delete this Plan" autocomplete="off" />
							</form>
							

                        </li>
                    <?php endforeach; ?>
                </ul>
            <?php else : ?>
                <p>No meal plans created yet.</p>
            <?php endif; ?>
        </div>
    </div>
</div>