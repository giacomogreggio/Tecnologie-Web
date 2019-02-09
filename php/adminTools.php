<?php
    include_once ('sessionManager.php');
    include_once ('User.php');

    if(!isset($_SESSION['email'])) {
        header("Location: errore.php?errorCode=paginaNonDisponibile");
    }

    if(!User::isAdmin($_SESSION['email'])){
        header("Location: errore.php?errorCode=nonAdmin");
    }

    if(User::isBanned($_SESSION['email'])){
        header("Location: errore.php?errorCode=bannanto");
    }
?>  
<!DOCTYPE html>
<html lang="it">
    <head>
    <title>Strumenti Admin &#124; DevSpace</title>
        <meta charset="UTF-8">
        <meta name="description" content="Pagina strumenti amministratore" />
        <meta name="keywords" content="computer, science, informatica, development, teconologia, technology" />
        <meta name="language" content="italian it" />
        <meta name="author" content="Barzon Giacomo, De Filippis Francesco, Greggio Giacomo, Roverato Michele" />
        <meta content="width=device-width, initial-scale=1" name="viewport" />
        <meta name="theme-color" content="#F5F5F5" />
        <link href="https://fonts.googleapis.com/css?family=Open+Sans" rel="stylesheet"/>	
        <?php include_once ('favicon.php'); ?>
        <link rel="stylesheet" type="text/css" href="https://frncscdf.github.io/Tecnologie-Web/style.css" />
        <link rel="stylesheet" type="text/css" href="https://frncscdf.github.io/Tecnologie-Web/print.css" media="print"/>
        <script src="https://frncscdf.github.io/Tecnologie-Web/scripts.js"></script>
        
    </head>
    
    <body>
        <?php include_once ('navbar.php'); 
        
        $nickname = unserialize($_SESSION['userInfo'])->nickname;
        if(User::isBanned($nickname)) {
            echo '<div id="registration-form">
            <div id="login-error-box-zone"></div>
            <div class="regform-main-section">
            <ul class="regform-errorbox">
                            <li>Your account has been suspended, you can\'t use admin tools anymore. In order to get back your admin role
                            another user have to remove your suspension.</li>
                            </ul>
                        </div>
                    </div>';
        } else {
            echo "<div id='registration-form'>
            <div class='regform-introduction'>
                
                <h2>Admin tools</h2>
            </div>
            <div class='regform-main-section'>
                <ul class='simple-list'>
                    <li><a href='manageArguments.php'>Create or delete topics</a></li>
                    <li><a href='addAdmin.php'>Add new administrator</a></li>
                    <li><a href='manageUsers.php'>User suspension</a></li>
                </ul>
            </div>
        </div>	";
        }
        
        ?>
        
    </body>
</html>