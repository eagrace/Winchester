<?php
/*
 * Author: Liz Baker
 * Date:04/04/2014
 * File: error.class.php
 * Description:
 *
 */

class Wine_Error extends WineIndexView {

    public function display($message) {

        //display page header
        parent::displayHeader("Error");
        ?>

        <div id="main_header">Error</div>

        <table style="width: 100%; border: none">
            <tr>
                <td style="vertical-align: middle; text-align: center; width:100px">
                    <img src='<?= base_url ?>/www/img/error.jpg' style="width: 80px; border: none"/>
                </td>
                <td style="text-align: left; vertical-align: top;">
                    <h3> We're sorry, but an error has occurred.</h3>
                    <div style="color: red">
                        <!-- <?= str_replace('%20', ' ', $message) ?> -->
                        <?= urldecode($message) ?>
                    </div>
                    <p>Please go back to the previous page and fix the error.</p>
                </td>
            </tr>
        </table>
        <hr>
        <a href="<?= base_url ?>/wine/index">Back to Wine list</a>
        <?php
        //display page footer
        parent::displayFooter();
    }

}