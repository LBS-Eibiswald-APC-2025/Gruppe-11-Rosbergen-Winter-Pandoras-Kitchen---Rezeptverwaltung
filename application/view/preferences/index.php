<div>
    <h1>Preferences</h1>

    <form action="<?= Config::get('URL'); ?>preferences/update" method="post">
        <?php
        $allergenOptions = [];
        $dietOptions = [];
        $selectedPreferences = [];

        if (!empty($this->preferences)) {
            foreach ($this->preferences as $preference) {
                if ($preference->type == 'intolerances') {
                    $allergenOptions[$preference->id] = $preference->name;
                }
                if ($preference->type == 'diet') {
                    $dietOptions[$preference->id] = $preference->name;
                }
                if ($preference->checked == true) {
                    $selectedPreferences[] = $preference->id;
                }
            }
        }
        ?>

        <div class="preferences-container">
            <!-- Intolerances Section -->
            <div class="preferences-column">
                <h2>Intolerances</h2>
                <?php
                foreach ($allergenOptions as $id => $name) {
                    $checked = in_array($id, $selectedPreferences) ? "checked" : "";
                    echo "<label><input type='checkbox' name='preferences[]' value='$id' $checked> $name</label><br>";
                }
                ?>
            </div>

            <!-- Diet Section -->
            <div class="preferences-column">
                <h2>Diet</h2>
                <?php
                foreach ($dietOptions as $id => $name) {
                    $checked = in_array($id, $selectedPreferences) ? "checked" : "";
                    echo "<label><input type='checkbox' name='preferences[]' value='$id' $checked> $name</label><br>";
                }
                ?>
            </div>
        </div>

        <button class="roundbutton" type="submit">Save Preferences</button>
    </form>
</div>