<?php
/*
 * Author: Liz, Tyler, Zizi
 * Date: 04/09/2014
 * Name: beer_index_view.class.php
 * Description: the parent class that displays a search box.
 * The javascript varaiable suggest_url specifies where to send an AJAX request.
 * You may need to modify it for your system.
 */

class BeerIndexView extends IndexView {

    protected function displayHeader($name) {
        parent::displayHeader($name);
        ?>
        <script>
            var suggest_url = "<?= base_url ?>/beer/suggest/"; 
        </script>
        <!--create the search bar -->
        <div id="searchbar">
            <form method="get" action="<?= base_url ?>/beer/search">
                Search beer by name: <input name="name" id="name" onkeyup="handleKeyUp(event)" />
                <input type="submit" value="Go" />
            </form>
            <div id="suggestionDiv"></div>
        </div>
        <?php
    }

    protected function displayFooter() {
        parent::displayFooter();
    }

}
?>