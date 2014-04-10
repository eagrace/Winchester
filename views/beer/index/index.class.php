<?php
/*
 * Author: Liz Baker
 * Date: 04/09/2014
 * Name: index.class.php
 * Description: This class defines a method called "display", which displays all BEERS.
 */

class Beer_Index extends BeerIndexView {

       /*
     * the displays accepts an array of beer objects and displays
     * them in a table.
     */

    public function display($beers) {
        //display page header
		parent::displayHeader("List All Beers");
        ?>
        <div id="main_header">Beers at the Winchester II</div>

 
        <!-- display the table header -->
        <table cellspacing='0' cellpadding='3' border='0' width="100%" id="list">
            <tr>
                <th width="300" class="hilite1">Name</th>
                <th width="80" class="hilite1">ABV</th>
                <th width="80" class="hilite1">IBU</th>
                <th width="100" class="hilite1">Price per 32oz</th>
                <th width="" class="hilite1">More Information</th>
            </tr>

            <?php
            //insert one row into the table for each beer
            foreach ($beers as $count => $beer) {
                $id = $beer->getId();
                $name = $beer->getName();
                $ABV = $beer->getABV();
                $IBU = $beer->getIBU();
                $price_32 = $beer->getPrice_32();
               
                
                
                //apply the class 'alt_background' for alternate rows
                if($count%2 == 1)
                    echo "<tr class='alt_background'>";
                else
                    echo "<tr>";
                echo "<td>$name</td>";
                echo "<td>$ABV</td>";
                echo "<td>$IBU</td>";
                echo "<td>$price_32</td>";
                echo "<td><a href='" . base_url . "/beer/detail/$id'>More about<i> $name</i></a></td>";
                echo "</tr>";
            }
            ?>
            <!-- the end of the table -->
        </table>
        <?php
        //display page footer
        parent::displayFooter();

    }
//end of display method
}