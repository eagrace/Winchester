<?php
/*
 * Author: Liz, Tyler, Zizi
 * Date: 04/09/2014
 * File: edit.class.php
 * Description: this file edits the beer
 *
 */

class Beer_Edit extends BeerIndexView {

    public function display($beer) {
        //display page header
        parent::displayHeader("Edit Beer");

        //retrieve beer details by calling get methods
        $id = $beer->getId();
        $name = $beer->getName();
        $short_description = $beer->getShort_Description();
        $price_32 = $beer->getPrice_32();
        $ABV = $beer->getABV();
        $IBU = $beer->IBU();
        $long_description = $beer->getLong_Description();
        $Image_file = $beer->getImage_File();
        ?>

        <div id="main_header">Edit Beer Details</div>

        <!-- display beer details in a form -->
        <form action='<?= base_url . "/beer/update/" . $id ?>' method="post">
            <table cellspacing='0' cellpadding='3' id="detail">
                <tr>
                    <td rowspan="7" style="vertical-align: top; text-align: left" width="235">
                        <img src="<?= base_url ?>/www/img/beers/<?= $image ?>" alt="<?= $name ?>" name="<?= $name ?>" width="220" />

                    </td>
                    <td  width="110"><strong>Name:</strong></td>
                    <td width=""><input name="name" size="40" value="<?= $name ?>"</td>
                </tr>
                <tr>
                    <td><strong>Short description:</strong></td>
                    <td><input name="short_description" value="<?= $short_description ?>"</td>
                   <!-- <td><input type="radio" name="rating" value="G" <?php if ($rating == "G") echo "checked" ?> />G
                        <input type="radio" name="rating" value="PG" <?php if ($rating == "PG") echo "checked" ?>/>PG
                        <input type="radio" name="rating" value="PG-13" <?php if ($rating == "PG-13") echo "checked" ?> />PG-13
                        <input type="radio" name="rating" value="R" <?php if ($rating == "R") echo "checked" ?> />R
                    </td> -->
                    
                </tr>
                <tr>
                    <td><strong>Pricer per 32oz:</strong></td>
                    <td><input name="price_32" value="<?= $price_32 ?>"</td>
                </tr>
                <tr>
                    <td><strong>ABV:</strong></td>
                    <td><input name="ABV" value="<?= $ABV ?>"</td>
                </tr>
                <tr>
                    <td><strong>IBU:</strong></td>
                    <td><input name="IBU" value="<?= $IBU ?>"</td>
                </tr>                
                <tr>
                    <td><strong>Image:</strong></td>
                    <td><input name="Image_file" value="<?= $Image_file ?>"</td>
                </tr>
                <tr style="vertical-align: top">
                    <td><strong>Description: </strong></td>
                    <td><textarea name="long_description" rows="6" cols="60"><?= $long_description ?></textarea></td>
                </tr>
                <tr style="vertical-align: bottom">
                    <td colspan="2">
                        <input type="submit" value="Submit" />
                        <input type="button" value="Cancel"
                               onclick='window.location.href="<?= base_url . "/beer/detail/" . $id ?>"' />
                    </td>
                </tr>
            </table>
            <a href="<?= base_url ?>/beer/index">Back to Beer list</a>
        </form>
        <?php
        //display page footer
        parent::displayFooter();
    }

//end of display method
}