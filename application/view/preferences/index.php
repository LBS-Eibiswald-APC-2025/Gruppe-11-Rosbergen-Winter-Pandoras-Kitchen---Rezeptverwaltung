<div>
    <h1>Preferences</h1>

    <form action="<?= Config::get('URL'); ?>preferences/update" method="post">
        <?php
        // Create an associative array mapping preference id => name
        $allergenOptions = [];
        $dietOptions = [];
        $selectedPreferences = [];

        // Store user-selected preferences in an array
        if (!empty($this->preferences)) {
            foreach ($this->preferences as $preference) {
                if ($preference->type == 'intolerances') {
                    // Map the allergen id to its name
                    $allergenOptions[$preference->id] = $preference->name;
                }
				if ($preference->type == 'diet') {
                    // Map the diet id to its name
                    $dietOptions[$preference->id] = $preference->name;
                }
				// If this preference is marked as checked, add its id to the selected array
				if ($preference->checked == true) {
					$selectedPreferences[] = $preference->id;
				}
            }
        }
        ?>
		<h2>Intolerances</h2>

        <?php
			// Generate checkboxes using the mapping: key (id) as value, and the value (name) as the label.
			foreach ($allergenOptions as $id => $name) {
				$checked = in_array($id, $selectedPreferences) ? "checked" : "";
				echo "<label><input type='checkbox' name='preferences[]' value='$id' $checked> $name</label><br>";
			}
        ?>
    	<h2>Diet</h2>
        <?php
			// Generate checkboxes using the mapping: key (id) as value, and the value (name) as the label.
			foreach ($dietOptions as $id => $name) {
				$checked = in_array($id, $selectedPreferences) ? "checked" : "";
				echo "<label><input type='checkbox' name='preferences[]' value='$id' $checked> $name</label><br>";
			}
        ?>
        
		<button type="submit">Save Preferences</button>
    </form>
</div>
