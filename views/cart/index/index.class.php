<?php
/*
 * Author: Liz, Tyler, Zizi
 * Date: 04/09/2014
 * Name:index.class.php
 * Description: the parent class that displays a shopping cart 
 * The javascript varaiable suggest_url specifies where to send an AJAX request.
 * You may need to modify it for your system.
 */

class CartIndexView extends IndexView {

    protected function displayHeader($title) {
        parent::displayHeader($title);
       
        ?>

        <!--create the shopping cart here  -->
                <h2>Shopping Cart</h2>
                <h3>Following item(s) have been added to your shopping cart:</h3>
                <table cellspacing='0'>
                    <tr>
                        <th style="width:100px">Name</th>
                        <th style="width:100px">Quantity</th>
                        <th style="width:200px">Price</th>
                    </tr>
                    
                    <?php
                    foreach($items as $item) {
                        echo "<tr><td>" . $item->getBeer() || $item->getWine() . "</td>";
                        echo "<td>" . $item->getQuantity() . "</td>";
                        echo "<td>" . $item->getPrice() . "</td></tr>"; 
                    }
                    ?>
                </table>
                <p><a href="#">Order Item(s)</a></p>       
        
        
        <?php
    }

    protected function displayFooter() {
        parent::displayFooter();
    }

}
?>