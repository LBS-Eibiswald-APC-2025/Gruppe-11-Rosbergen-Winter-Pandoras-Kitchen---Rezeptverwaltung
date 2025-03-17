<div>
    <h1>Pantry</h1>

    <h2>Ingredients</h2>

    <div>
        <?php
		$spoonacular = Spoonacular::getInstance();
        $ingredients = [];

        // Store user pantry in an array
        if (!empty($this->pantry)) {
            foreach ($this->pantry as $ingredient) {
				
				// !! TODO: Instead of doing it like this, store names and image in our own DB. Do this without redundancy
				$data = $spoonacular->information($ingredient->item_id);
				$ingredients[] = [
					'id' => $data['id'],
					'name' => $data['name'],
					'originalName' => $data['originalName'],
					'image' => $data['image']
				];
            }
        }
		

		// Show ingredients as a list with a delete link
		if (!empty($ingredients)) {
			echo "<ul>";
			foreach ($ingredients as $ingredient) {
				// Convert only the first letter to uppercase and keep the rest the same
				$ingredientName = ucfirst(strtolower(htmlspecialchars($ingredient['originalName'])));

				echo "<li>" . $ingredientName . " 
					<a href='" . Config::get('URL') . "pantry/deleteItem?item_id=" . htmlspecialchars($ingredient['id']) . "' 
					style='text-decoration: underline; color: blue; cursor: pointer;'><small>Remove</small></a></li>";
			}
			echo "</ul>";
		} else {
			echo "<p>No ingredients added yet.</p>";
		}

        ?>

		
    <!-- Search box -->
	<form action="<?= Config::get('URL'); ?>pantry/addItem" method="post">
		<input type="text" name="ingredient_name" placeholder="Add ingredients" value="<?= isset($_GET['search']) ? htmlspecialchars($_GET['search']) : ''; ?>">
		<button type="submit">Add</button>
	</form>
	<p><small>*Note that ingredients such as salt and water are always considered to be in stock in your pantry</small></p> <!-- // !! TODO Make sure this is true -->
    </div>

    <!-- <br><br><br>
    // !! <p><small>A future addition to this page would be keeping track of specific stock of these items, but this is not in the scope of this project</small></p> -->
</div>
