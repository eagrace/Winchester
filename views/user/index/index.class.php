<?php
/*
 * Author: Liz, Tyler, Zizi
 * Date: 04/09/2014
 * Name: beer_index_view.class.php
 * Description: the parent class that displays a newuser form box.
 * The javascript varaiable suggest_url specifies where to send an AJAX request.
 * You may need to modify it for your system.
 */

class UserIndexView extends IndexView {

    protected function displayHeader($title) {
        parent::displayHeader($title);
        ?>

        <!--create the newuser form  -->
        <h2>Create an account</h2>
                <h3> Please complete the form. All fields are required.</h3>
                <form method="get" action="index.php">
                    <input type="hidden" name="action" value="sign" />
                    <table cellspacing='0'>
                        <tr>
                            <th>First Name</th>
                            <td><input type="text" name="first_name" size="30" /></td>
                        </tr>
                        <tr>
                            <th>Last Name</th>
                            <td><input type="text" name="last_name" size="30" /></td>
                        </tr>
                        <tr>
                            <th>User Name</th>
                            <td><input type="text" name="user_name" size="30" /></td>
                        </tr>
                        <tr>
                            <th>Password</th>
                            <td><input type="text" name="password" size="30" /></td>
                        </tr>
                        <tr>
                            <td colspan="2" align="center"><input type="submit" value="Submit" /></td>
                        </tr>
                    </table>
                </form>

                <p><a href="<?= base_url ?>/show/index.php?action=show">Create Account</a></p>

        <?php
    }

    protected function displayFooter() {
        parent::displayFooter();
    }

}
?>