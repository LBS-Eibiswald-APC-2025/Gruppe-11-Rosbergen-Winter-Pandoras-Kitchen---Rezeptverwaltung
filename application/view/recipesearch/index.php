





<!-- echo out the system feedback (error and success messages) -->
<?php $this->renderFeedbackMessages();
include "advancedSearch.php";
include "searchResults.php";

?>
<!-- Normal Search Container-->
<div class="container">
    <h1>Recipe Search</h1>
    <div class="box">
        <div class="form-container ">
            <h3>Search</h3>
            <p>Tell us what recipe you would like to make.</p>
            <!-- Normal Search Form -->
            <form name="normalSearch" method="GET" action="">
                <div class="">Normal Search</div>
                <div class="select filters flex_wrapper gap">
                    <label><input type="text" name="query" placeholder="Pasta Bolognese"></label>
                    <button class="submit-button" type="submit">
                        <i style="padding: 0 20px;" class="fa fa-search"></i>
                    </button>
                </div>
            </form>
            <br>
            <button class="submit-button" id="toggleExtras" type="button" name="advanced_search_trigger"
                    value="Advanced Search" onclick="toggleFormular(); updateAll();">Advanced Search
                <i class="fa fa-search smallPaddingLeft"></i>
            </button>
            <br>
            <br>
            <div id="formular" style="display: none;">
                <?php
                /* Additional Html from advancedSearch.php */
                echo $additionalHtml . '<br><br>';
                ?>
            </div>
        </div>
			<?php
			echo $result;
			?>
    </div>
</div>














