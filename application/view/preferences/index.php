<div>
    <h3>Preferences</h3>

	<h2>Allergens</h2>
    <form action="<?= Config::get('URL'); ?>preferences/add" method="post">
        <select name="preferences">
            <?php
            $preferenceOptions = ["Dairy", "Eggs", "Gluten", "Grain", "Peanuts", "Seafood", "Sesame", "Shellfish", "Soy", "Sulfite", "Tree Nut", "Wheat"];
            foreach ($preferenceOptions as $option) {
                echo "<option value='$option'>$option</option>";
            }
            ?>
        </select>
        <button type="submit">Add</button>
    </form>

    <?php if ($this->preferences) { ?>
        <table>
            <thead>
                <tr>
                    <td>Allergens</td>
                    <td>Delete</td>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($this->preferences as $value) { ?>
                    <tr>
                        <td><?= htmlentities($value->name); ?></td>
                        <td><a href="<?= Config::get('URL') . 'preferences/delete/' . $value->id; ?>">Delete</a></td>
                    </tr>
                <?php } ?>
            </tbody>
        </table>
    <?php } else { ?>
        <div>No allergens added yet.</div>
    <?php } ?>
</div>
