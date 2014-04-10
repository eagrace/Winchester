<?php
/*
 * Author: Liz, tyler, Zizi
 * Date: 04/09/2014
 * Name: wine_index_view.class.php
 * Description: the parent class that displays a search box.
 */

class WineIndexView extends IndexView {

    protected function displayHeader($title) {
        parent::displayHeader($title)
        ?>
        <!--create the search bar -->
        <div id="searchbar">
            <form method="get" action="<?= base_url ?>/wine/search">
                Search wine by name: <input name="name" id="name" onkeyup="handleKeyUp(event)"  disabled="disabled"/>
                <input type="submit" value="Go"  disabled="disabled" />
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
