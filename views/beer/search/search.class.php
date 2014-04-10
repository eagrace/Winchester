<?php
/*
 * Author: Liz, Tyler, Zizi
 * Date: 04/09/2014
 * Name: search.class.php
 * Description: This class defines a method "display" which displays the home page.
 */

class Beer_Search extends BeerIndexView {
    /*
     * the displays accepts an array of beer objects and displays
     * them in a table.
     */

    public function display($query) {
        //display page header
        parent::displayHeader("List All Beers");
        ?>
        <div id="main_header">Beers at the Winchester II</div>

        <!-- display the table header -->
        <table cellspacing='0' cellpadding='3' border='0' width="100%" id="list">
            <tr>
                <th width="300" class="hilite1">Name</th>
                <th width="80" class="hilite1">| ABV</th>
                <th width="80" class="hilite1">| IBU</th>
                <th width="100" class="hilite1">| Price per 32oz</th>
                <th width="" class="hilite1">| More Information</th>
            </tr>
            <?php
            if ($query == 0) {
                echo "<tr><td colspan='4' style='height: 200px; vertical-align: top'>No beer was found.</td></tr>";
            } else {
                //insert one row into the table for each beer
                foreach ($query as $beer) {
                    $id = $beer->getId();
                    $name = $beer->getName();
                    $ABV = $beer->getABV();
                    $IBU = $beer->getIBU();
                    $price_32 = $beer->getPrice_32();

                    echo "<tr>";
                    echo "<td>$name</td>";
                    echo "<td>$ABV</td>";
                    echo "<td>$IBU</td>";
                    echo "<td>$price_32</td>";
                    echo "<td><a href='" . base_url . "/beer/detail/$id'>More about<i> $name</i></a></td>";
                    echo "</tr>";
                }
            }
            ?> 
        </table> <!-- the end of the table -->

        <a href="<?= base_url ?>/beer/index">Back to Beer list</a>
        <?php
        //display page footer
        parent::displayFooter();
    }

//end of display method
}