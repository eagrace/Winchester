<?php
/*
 * Author: Liz, Tyler, Zizi
 * Date: 04/09/2014
 * File: edit.class.php
 * Description: updates beer
 *
 */

class Beer_Update extends BeerIndexView {

    public function display($id) {
        //display page header
        parent::displayHeader("Edit Beer");
        ?>

        <div id="main_header">Edit Beer Details</div>

       <table border="0px" style="width: 100%;">
            <tr>
                <td style="vertical-align: middle; text-align: center; width:100px">
                    <img src="<?= base_url ?>/www/img/check_mark.jpg" style="width: 90px; border: none" />
                </td>
                <td style="text-align: left; vertical-align: top;">
                    <h3>Congratulations!</h3>
                    The beer has been successfully updated.
                </td>
            </tr>
        </table>

        <br><br><br><br><br><br>
        <a href="<?= base_url ?>/beer/detail/<?= $id ?>">Back to beer details page</a>

        <?php
        //display page footer
        parent::displayFooter();
    }

//end of display method
}