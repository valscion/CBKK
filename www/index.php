<?php 
    session_start(); 
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

        
        <script type="text/javascript" src="inc/form.js"></script>
    </head>
    
    <body>
        
        <div id="container">
            
            <div id="header"><a href="./" class='logo'></a></div>
            
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
                            echo "<a href='index.php?pId=register'>[Rekister&ouml;idy]</a>";
                        } else {
                            echo "<a href='inc/logout.php'>Kirjaudu ulos [" . $_SESSION['currentUser'] . "]</a>";
                        }
                    ?>
                </div>
                
                <div id="nav">
                    <h3>Navigointi</h3>
                    <ul>
                        <li><a href="./">Etusivu</a></li>
                        <li><a href="index.php?pId=haku">Haku</a></li>
                        
                        <?php
                            if(isset($_SESSION['currentUser'])) {
                                echo "<li><a href='index.php?pId=lisaa'>Lis&auml;&auml koodi</a></li>";
                            }
                        ?>
                    </ul>
                </div>
                
                <div id="cats">
                    <h3>Kategoriat</h3>
                    <ul>
                        <?php
                            $cats = count($categoryArray);
                            
                            for($i = 0; $i < $cats; $i++) {
                                if (isset($catCount[$i]))
                                    $count = $catCount[$i];
                                else
                                    $count = 0;
                                echo "<li><a href='index.php?pId=listaa&cat=" . $i . "'>" . $categoryArray[$i] . "</a> (" . $count . ")</li>";
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
