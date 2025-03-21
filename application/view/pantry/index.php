<div>
    <h1>Pantry</h1>

    <h2>Ingredients</h2>

    <div>
        <?php
		$database = DatabaseFactory::getFactory()->getConnection();
        $ingredients = [];

		// Store user pantry in an array
		if (!empty($this->pantry)) {
			foreach ($this->pantry as $ingredient) {
				
				// Retrieve ingredient data from the database
				$sql = "SELECT id, ingredientName FROM pantry WHERE id = :item_id";
				$query = $database->prepare($sql);
				$query->execute([':item_id' => $ingredient->item_id]);
				$ingredientData = $query->fetch(PDO::FETCH_ASSOC);

				if ($ingredientData) {
					$ingredients[] = [
						'id' => $ingredientData['id'],
						'name' => $ingredientData['ingredientName']
					];
				}
			}
		}

		

		// Show ingredients as a list with a delete link
		if (!empty($ingredients)) {
			echo "<div class='select'>";
			foreach ($ingredients as $ingredient) {
				echo "<div class='chip chip-spacer'>";
				// Convert only the first letter to uppercase and keep the rest the same
				$ingredientName = ucfirst(strtolower(htmlspecialchars($ingredient['name'])));

				echo "<span class='remove'>" . $ingredientName . " 
					<a class='white-link' href='" . Config::get('URL') . "pantry/deleteItem?item_id=" . htmlspecialchars($ingredient['id']) . "' ><i class='fa fa-times' aria-hidden='true'></i>
</i></a></span>";
					echo "</div>";
			}
			echo "</div>";
		} else {
			echo "<p>No ingredients added yet.</p>";
		}

		

        ?>

		
    <!-- Search box -->
	<form class="container" action="<?= Config::get('URL'); ?>pantry/addItem" method="post">
		<div class="select filters flex_wrapper gap">
			<input class="" type="text" name="ingredient_name" placeholder="Add ingredients" value="<?= isset($_GET['search']) ? htmlspecialchars($_GET['search']) : ''; ?>">
			<button class="submit-button" type="submit">Add</button>
		</div>
	</form>
	<p><small>*Note that ingredients such as salt and water are always considered to be in stock in your pantry</small></p> <!-- // !! TODO Make sure this is true -->
    </div>

    <!-- <br><br><br>
    // !! <p><small>A future addition to this page would be keeping track of specific stock of these items, but this is not in the scope of this project</small></p> -->
</div>
