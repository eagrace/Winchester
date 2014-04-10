<?php
/*
 * Author: Liz Baker, Tyler Spangler, Zizi
 * Date: 04/09/2014
 * Name: index.class.php
 * Description: This class defines a method "display" which displays the home page.
 */

class Welcome_Index extends IndexView {

    //put your code here

    public function display() {
        //display page header
        parent::displayHeader("ung Fu Panda Media Library Home");
        ?>    
        <div id="main_header">Welcome to the Winchester II</div>
        <p>Describe Winchester II here.</p>

    
            <table style="border: none; width: 700px;" align="center">
                <tr>
                    <td colspan="2"><strong>Major features include:</strong></td>
                </tr>
                <tr>
                    <td align="left">
                        <ul>
                            <li>List all media</li>
                            <li>Display details of a specific medium</li>
                            <li>Add new medium</li>
                            <li>Update or delete an existing meduum</li>
                        </ul>
                    </td>
                    <td>
                        <ul>
                            <li>Search media by words in title</li>
                            <li>Autosuggestion implemented with AJAX</li>
                            <li>Filter media</li>
                            <li>Sort media</li>
                        </ul></td>
                </tr>
            </table>

        <br>

        <div id="thumbnails" style="text-align: center; border: none">
            <p style="margin-left: -115px">Click an image below to explore a library. Click the logo in the banner to come back to this page.</p>

            <a href="<?= base_url ?>/beer/index">
                <img src="<?= base_url ?>/www/img/beers.jpg" title="Beer Library"/>
            </a>

            <a href="<?= base_url ?>/wine/index">
                <img src="<?= base_url ?>/www/img/wines.jpg" title="Wine Library"/>
            </a>
            <a href="#">
                <img src="<?= base_url ?>/www/img/games.jpg" title="Game Library" />
            </a>
            <a href="#">
                <img src="<?= base_url ?>/www/img/music.jpg" title="Music Library (Under Construction)" />
            </a>
        </div>
        <br>
        <?php
        //display page footer
        parent::displayFooter();
    }

}
?>