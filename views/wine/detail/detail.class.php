<?php
/*
 * Author: Liz Baker
 * Date: 04/09/2014
 * Name: view_wine.class.php
 * Description: This class defines a method "display".
 *              The method accepts a Wine object and displays the details of the wine in a table.
 */

class Wine_Detail extends WineIndexView {

    public function display($wine) {
        //display page header
        parent::displayHeader("Wine Details");

        //retrieve wine details by calling get methods
        $id = $wine->getId();
        $name = $wine->getName();
        $short_description = $wine->getShort_Description();
        $price_750ml = $wine->getPrice_750ml();
        $year = $wine->getYear();
        $long_description = $wine->getLong_Description();
        $Image_file = $wine->getImage_File();
        ?>

        <div id="main_header">Wine Details</div>

        <!-- display wine details -->
        <div id="detail">
            <div class="image"><img src="<?= base_url ?>/www/img/wines/<?= $Image_file ?>" alt="<?= $name ?>" name="<?= $name ?>"></div>
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
                    <td><strong>Price per (750ml) Bottle:</strong></td>
                    <td><?= $price_750ml ?></td>
                </tr>
                <tr>
                    <td><strong>Year:</strong></td>
                    <td><?= $year ?></td>
                </tr>
                <tr>
                    <td class="description"><strong>Long Description:</strong></td>
                    <td><?= $long_description ?></td>
                </tr>                
            </table>
            <div class="buttons">
                <input type="button" value="  Edit   " onclick='window.location.href = "<?= base_url . "/wine/edit/" . $id ?>"' />&nbsp;
                <input type="button" value="Delete" onclick='window.location.href = "<?= base_url . "/wine/delete/" . $id ?>"' />
            </div>
        </div>
        <a href="<?= base_url ?>/wine/index">Back to Wine list</a>
        <?php
        //display page footer
        parent::displayFooter();
    }

//end of display method
}