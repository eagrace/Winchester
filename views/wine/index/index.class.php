<?php
/*
 * Author: Liz Baker
 * Date: 04/09/2014
 * Name: index.class.php
 * Description: This class defines a method called "display", which displays all wines.
 */

class Wine_Index extends WineIndexView {

       /*
     * the displays accepts an array of wine objects and displays
     * them in a table.
     */

    public function display($wines) {
        //display page header
		parent::displayHeader("List All Wines");
        ?>
        <div id="main_header">Wines at the Winchester II</div>

 
        <!-- display the table header -->
        <table cellspacing='0' cellpadding='3' border='0' width="100%" id="list">
            <tr>
                <th width="300" class="hilite1">Name</th>
                <th width="80" class="hilite1">Year</th>
                <th width="100" class="hilite1">Price per (750ml) Bottle</th>
                <th width="" class="hilite1">More Information</th>
            </tr>

            <?php
            //insert one row into the table for each wine
            foreach ($wines as $count => $wine) {
                $id = $wine->getId();
                $name = $wine->getName();
                $year = $wine->getYear();
                $price_750ml = $wine->getPrice_750ml();
               
                
                
                //apply the class 'alt_background' for alternate rows
                if($count%2 == 1)
                    echo "<tr class='alt_background'>";
                else
                    echo "<tr>";
                echo "<td>$name</td>";
                echo "<td>$year</td>";
                echo "<td>$price_750ml</td>";
                echo "<td><a href='" . base_url . "/wine/detail/$id'>More about<i> $name</i></a></td>";
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