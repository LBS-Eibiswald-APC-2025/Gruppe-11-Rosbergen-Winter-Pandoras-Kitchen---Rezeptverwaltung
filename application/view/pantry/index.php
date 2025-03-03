<div>
    <h1>Pantry</h1>

    <h2>Ingredients</h2>
    <form action="<?= Config::get('URL'); ?>pantry/update" method="post">
        <?php
        // Create an associative array mapping pantry id => name
        $ingredientOptions = [];
        $selectedItems = [];

        // Store user-selected pantry in an array
        if (!empty($this->pantry)) {
            foreach ($this->pantry as $ingredient) {
                if ($ingredient->type == 'ingredient') {
                    $ingredientOptions[$ingredient->id] = $ingredient->name;
                    // If this item is marked as checked, add its id to the selected array
                    if ($ingredient->checked == true) {
                        $selectedItems[] = $ingredient->id;
                    }
                }
            }
        }

        // Generate checkboxes using the mapping: key (id) as value, and the value (name) as the label.
        foreach ($ingredientOptions as $id => $name) {
            $checked = in_array($id, $selectedItems) ? "checked" : "";
            echo "<label><input type='checkbox' name='pantry[]' value='$id' $checked> $name</label><br>";
        }
        ?>
        <button type="submit">Save</button>
    </form>
</div>
