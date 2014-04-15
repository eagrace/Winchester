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
        parent::displayHeader("Winchester II");
        ?>    
        <div id="main_header">Welcome to the The Winchester II</div>
        <p>Shop for beer and wine online. Browse through our high class selections.</p>

    
            <table style="border: none; width: 800px;" align="center">
             <!--   <tr>
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
                </tr> -->
                
                <div id="topCenterMain">
                        <img src="includes/winchester_bar.jpg" style="border:15px solid black; float: left; margin-left:0px" width="230px" height="330px"/>
                    <div id="myreel"></div><!-- this is the reel-->
                </div>
                    <div class="paginate"><!-- back and forth buttons...-->
                                &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;
                        <a href="javascript:firstreel.navigate('back')" style="text-decoration:none; color: white">BACK 
                                &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;
                                &nbsp; 	&nbsp;</a> <a href="javascript:firstreel.navigate('forth')" style="text-decoration:none; color: white">FORTH</a>
                    </div><!-- back and forth buttons...-->


            </table>

        <br>

        <div id="thumbnails" style="text-align: center; border: none">
            <p style="margin-left: -115px">Choose an option below. Shop through our elegant Beer or Wine selections.</p>

            <a href="<?= base_url ?>/beer/index">
                <img src="<?= base_url ?>/www/img/beers/contactBeer.png" title="Beer Library"/>
            </a>

            <a href="<?= base_url ?>/wine/index">
                <img src="<?= base_url ?>/www/img/wines.jpg" title="Wine Library"/>
            </a>
            <!-- <a href="#">
                <img src="<?= base_url ?>/www/img/games.jpg" title="Game Library" />
            </a>
            <a href="#">
                <img src="<?= base_url ?>/www/img/music.jpg" title="Music Library (Under Construction)" />
            </a> -->
        </div>
        <br>
        <?php
        //display page footer
        parent::displayFooter();
    }

}
?>