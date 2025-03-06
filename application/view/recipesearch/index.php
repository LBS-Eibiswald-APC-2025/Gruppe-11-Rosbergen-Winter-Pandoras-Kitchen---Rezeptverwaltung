<div class="container">
    <h1>Recipe Search</h1>
    <div class="box">

        <!-- echo out the system feedback (error and success messages) -->
        <?php $this->renderFeedbackMessages(); ?>
        <?php
        $status = "";
        $additionalHtml = '<input type="submit" name="advanced_search" value="Advanced Search">';
        ?>


        <h3>Search</h3>
        <p>Tell us what recipe you would like to make.</p>

        <!-- Search Form -->
        <form method="GET" action="">
            <input type="text" name="query" placeholder="Pasta Bolognese" <?php echo $status; ?>>
            <button type="submit">Search</button>
        </form>


        <form style="padding-top: 50px;" method="GET" action="">
            <?php echo $additionalHtml; ?>

        </form>




        <?php
        if (isset($_GET["advanced_search"])) {
            $additionalHtml = '<h1>Advanced Search</h1>' .
                            '<div class="multi-select">
                                <div class="select-box" onclick="toggleDropdown()">Wähle Optionen</div>
                                <div class="dropdown-list">
                                    <label><input type="checkbox" value="Angular" onchange="updateSelection()"> Angular</label>
                                    <label><input type="checkbox" value="Bootstrap" onchange="updateSelection()"> Bootstrap</label>
                                    <label><input type="checkbox" value="React.js" onchange="updateSelection()"> React.js</label>
                                    <label><input type="checkbox" value="Vue.js" onchange="updateSelection()"> Vue.js</label>
                                    <label><input type="checkbox" value="Django" onchange="updateSelection()"> Django</label>
                                    <label><input type="checkbox" value="Laravel" onchange="updateSelection()"> Laravel</label>
                                    <label><input type="checkbox" value="Node.js" onchange="updateSelection()"> Node.js</label>
                                </div>
                            </div> <br> <br>'.
                '<p><label><input type="text" name="" ></label></p>'.
                '<p><label><input type="text" name="" ></label></p>'.
                '<p><label><input type="text" name="" ></label></p>'.
                '<p><label><input type="text" name="" ></label></p>'.
                '<p><label><input type="text" name="" ></label></p>'.
                '<p><label><input type="text" name="" ></label></p>'.
                '<p><label><input type="text" name="" ></label></p>'.
                '<p><label><input type="text" name="" ></label></p>';

            echo $additionalHtml;
        } else {
            $status = "required";
        }
        ?>


        <?php
        if (isset($_GET['query']) && !empty($_GET['query'])) {
            $spoonacular = Spoonacular::getInstance();
            $data = $spoonacular->complexSearch($_GET['query']);

            if (!empty($data['results'])) {
                echo "<h3>Search Results for: " . htmlspecialchars($_GET['query']) . "</h3>";
                echo "<ul>";
                foreach ($data['results'] as $recipe) {
                    echo "<li>";
                    echo "<strong>" . htmlspecialchars($recipe['title']) . "</strong><br>";
                    echo "<img src='" . htmlspecialchars($recipe['image']) . "' alt='" . htmlspecialchars($recipe['title']) . "' width='200'><br>";
                    echo ($recipe['summary']) . "<br>";
                    echo "</li>";
                }
                echo "</ul>";
            } else {
                echo "<p>No recipes found.</p>";
            }
        }
        ?>
    </div>


    <!--
    Erweiterte Suche:
        Menüart (z.B. Dessert)
        Rezepte nach Zutat (includeIngridiens) (z.B. Reis)
        Speiseart (typ) (z.B. Suppe)
        Regionale Rezepte (cuisine) (z.B. Italienisch)
        Unverträglichkeiten / Allergie (intoleracens)
        Ernährungsform (diet) (z.B. vegan)

        Kalorien (calories)
        Zucker (sugar)
        Cholesterin (cholesterol)
        Fettgehalt (total-fat)


    Sortierung:
        Bewertung/Beliebtheit (popularity) meta score
        Kosten (price)
        Zeitfaktor (time)
    -->



</div>


