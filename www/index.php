<?php
    require_once('config.php');

    session_start();
    if( $_GET['pId'] == 'logout' ) {
        unset($_SESSION['currentUser']);
        header( "Location: index.php" );
    }
    include_once "inc/database.php";
    
    $_SESSION['back'] = $_SERVER['REQUEST_URI'];
?>
<!DOCTYPE html>
    
<html lang="fi">
    <head>
        <meta charset="utf-8" />
        
        <title>CoolBasic koodikirjasto</title>
        
        <link rel="stylesheet" type="text/css" href="style/reset.css" />
        <link rel="stylesheet" type="text/css" href="style/main.css" />
        <link rel="stylesheet" type="text/css" href="style/cb.css" />
        <?php if (isset($_GET['pId']) && $_GET['pId'] === 'naytakoodi' ) echo '<link rel="stylesheet" type="text/css" href="style/colorbox.css" />'; ?>
        
        <script type="text/javascript" src="js/form.js"></script>
        <script type="text/javascript" src="js/jquery-1.5.1.min.js"></script>
        <?php if (isset($_GET['pId']) && $_GET['pId'] === 'naytakoodi' ) echo '<script type="text/javascript" src="js/jquery.colorbox-min.js"></script>'; ?>

    </head>
    
    <body>
        
        <div id="container">
            
            <div id="header"><a href="./" class='logo' alt='CBKK' title='Coolbasic koodikirjasto'></a></div>
            
            <div id="sidebar">
                <div id="login">
                    <?php
                        if (!isset($_SESSION['currentUser'])) {
                            echo "<h3>Kirjaudu sis&auml;&auml;n</h3>";
                            echo "<form action='inc/login.php' method='post' onsubmit='return checkLogin()'>";
                                echo "Nimimerkki:<br />";
                                echo "<input type='text' name='nick' id='nick' class='text' /><br />";
                                echo "Salasana:<br />";
                                echo "<input type='password' name='password' id='password' class='text' /><br />";
                                echo "<input type='submit' value='Kirjaudu' />";
                            echo "</form>";
                            echo "<a href='index.php?pId=register'>[Rekisteröidy]</a>";
                        } else {
                            echo "<a href='index.php?pId=logout'>Kirjaudu ulos [" . $_SESSION['currentUser'] . "]</a>";
                        }
                    ?>
                </div>
                
                <div id="nav">
                    <h3>Navigointi</h3>
                    <ul>
                        <li><a href="./">Etusivu</a></li>
                        <?php
                            if(isset($_SESSION['currentUser'])) {
                                echo "<li><a href='index.php?pId=lisaa'>Lis&auml;&auml koodi</a></li>" . 
                                     '<li><a href="index.php?pId=listaa&amp;cat=user&amp;q=' . $_SESSION['currentUser'] . '">Omat koodit</a></li>';
                            }
                        ?>
                    </ul>
                </div>
                
                <div id="search">
                    <h3>Haku</h3>
                    <ul>
                        <li>
                            <form action='index.php?pId=listaa' method='get'>
                                <input type='hidden' name='pId' value='listaa' />
                                <input type='hidden' name='cat' value='search' />
                                <input type='text' name='q' id='q' class='text' />
                                <input type='submit' value='Hae' />
                            </form>
                        </li>
                    </ul>
                </div>
                
                <div id="cats">
                    <h3>Kategoriat</h3>
                    <ul>
                        <li><a href="index.php?pId=listaa&amp;cat=all&amp;sort=name">Kaikki</a></li>
                    </ul>
                    <ul>
                        <?php
                            foreach( $sortedCategories as $cat => $catId ) {
                                if (isset($catCount[$catId]))
                                    $count = $catCount[$catId];
                                else
                                    $count = 0;
                                echo '<li><a href="index.php?pId=listaa&amp;cat=' . $catId . '">' . $cat . '</a> (' . $count . ')</li>';
                            }
                        ?>
                    </ul>
                </div>
            </div>
            
            <div id="content">
                <?php
                    if (isset($_GET['pId'])) {
                        if (file_exists("inc/" . $_GET['pId'] . ".php")) {
                            include "inc/" . $_GET['pId'] . ".php";
                        } else {
                            include "inc/error.html";
                        }
                    } else {
                        include "inc/etusivu.php";
                    }
                ?>
            </div>
            
            <div id="clear"></div>
            
        </div>
        
    </body>
</html>
