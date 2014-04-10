<?php
/*
 * Author: Liz Baker
 * Date: 04/09/2014
 * Name: view_beer.class.php
 * Description: This class defines a method "display".
 *              The method accepts a Beer object and displays the details of the beer in a table.
 */

class Beer_Detail extends BeerIndexView {

    public function display($beer) {
        //display page header
        parent::displayHeader("Beer Details");

        //retrieve beer details by calling get methods
        $id = $beer->getId();
        $name = $beer->getName();
        $short_description = $beer->getShort_Description();
        $price_32 = $beer->getPrice_32();
        $ABV = $beer->getABV();
        $IBU = $beer->getIBU();
        $long_description = $beer->getLong_Description();
        //$Image_file = $beer->getImage_File();
        ?>

        <div id="main_header">Beer Details</div>

        <!-- display beer details -->
        <div id="detail">
            <div class="image"><img src="<?= base_url ?>/www/img/beers/<?= $Image_file ?>" alt="<?= $name ?>" name="<?= $name ?>"></div>
            <table>
                <tr>
                    <td class="heading"><strong>Name:</strong></td>
                    <td><?= $name ?></td>
                </tr>
                <tr>
                    <td><strong>Short Description:</strong></td>
                    <td><?= $short_description ?></td>
                </tr>
                <tr>
                    <td><strong>Price per (32oz):</strong></td>
                    <td><?= $price_32 ?></td>
                </tr>
                <tr>
                    <td><strong>ABV:</strong></td>
                    <td><?= $ABV ?></td>
                </tr>
                <tr>
                    <td><strong>IBU:</strong></td>
                    <td><?= $IBU ?></td>
                </tr>                
                <tr>
                    <td class="description"><strong>Long Description:</strong></td>
                    <td><?= $long_description ?></td>
                </tr>                
            </table>
            <div class="buttons">
                <input type="button" value="  Edit   " onclick='window.location.href = "<?= base_url . "/beer/edit/" . $id ?>"' />&nbsp;
                <input type="button" value="Delete" onclick='window.location.href = "<?= base_url . "/beer/delete/" . $id ?>"' />
            </div>
        </div>
        <a href="<?= base_url ?>/beer/index">Back to Beer list</a>
        <?php
        //display page footer
        parent::displayFooter();
    }

//end of display method
}