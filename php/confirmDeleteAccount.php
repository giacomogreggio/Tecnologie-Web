<?php
    include_once('sessionManager.php');
    include_once ("User.php");

    if(isset($_POST['dismiss_conf_delete'])) {
        header("Location: profile.php");
    }else {
        if (!isset($_POST['delete_account']) && (!isset($_POST['conf_delete']))) {
            header("Location: index.php");
        }
    }

?>  
<!DOCTYPE html>
<html lang="en">
    <head>
        <title>Delete Account &#124; DevSpace</title>
        <meta charset="UTF-8">
        <meta name="description" content="Conferma eliminazione account" />
        <meta name="keywords" content="computer, science, informatica, development, teconologia, technology" />
        <meta name="author" content="Barzon Giacomo, De Filippis Francesco, Greggio Giacomo, Roverato Michele" />
        <meta content="width=device-width, initial-scale=1" name="viewport" />
        <meta name="theme-color" content="#F5F5F5" />
        <link href="https://fonts.googleapis.com/css?family=Open+Sans" rel="stylesheet"/>	
        <?php include_once ('favicon.php'); ?>
        <link rel="stylesheet" type="text/css" href="./style/style.css" />
        <link rel="stylesheet" type="text/css" href="./style/print.css" media="print"/>
        <script src="./script/scripts.js"></script>
        
    </head>
    
    <body>
        <?php
        include_once('navbar.php');
        SimpleNavbar::printSimpleNavbar();
        ?>
        <div id="registration-form">
            <?php

                if(isset($_POST['conf_delete'])) {
                    User::deleteAccount($_SESSION['email']);
                    session_destroy();
                    echo '<div class="regform-introduction">';
                        echo '<ul class="regform-successbox">';
                            echo '<li>Your account has been successfully deleted</li>';
                            echo '<li>Go back to <a href="index.php">Home</a></li>';
                        echo '</ul>';
                    echo '</div>';
                }else{
                    echo '<div class="regform-introduction">
                        <h1><a href="index.html">You are about to delete your account</a></h1>
                        <h2>Are you sure you want to delete your account?</h2>
                    </div>
                    <div class="regform-main-section">';
                        echo '<form action="'.$_SERVER['PHP_SELF'].'" method="POST" >';
                            echo '<fieldset>';
                                echo '<p><input class="profile-input" name="conf_delete" type="submit" value="Yes, i am sure" /></p>';
                                echo '<p><input class="profile-input" name="dismiss_conf_delete" type="submit" value="Cancel" /></p>';
                            echo '</fieldset>
                        </form>
                    </div>';
                }
            echo '<noscript>';
            SimpleNavbar::printSimpleNavbar(true);
            echo '</noscript>';
            echo '</div>';
            echo '<noscript>';
            SimpleNavbar::printNoJSWarning();
            echo '</noscript>';
        ?>
    </body>
</html>