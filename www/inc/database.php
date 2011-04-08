<?php
    if( dirname($_SERVER['SCRIPT_FILENAME']) == dirname( __FILE__ ) ) {
        $configpath = '../config.php';
    } else {
        $configpath = 'config.php';
    }
    
    require_once( $configpath );
    
    $conn = null;
    $conn = new mysqli( $config['db_host'], $config['db_user'], $config['db_password'], $config['db_name'], $config['db_port'] );
    
    if ($result = $conn->query('SELECT category,COUNT(name) FROM ' . $config['db_prefix'] . 'codes GROUP BY category')) {
        while ($row = $result->fetch_array()) {
            $catCount[$row['category']] = $row['COUNT(name)'];
        }
    }
    
    $categoryArray[0] = "Grafiikka";
    $categoryArray[1] = "Matematiikka";
    $categoryArray[2] = "Merkkijonot";
    $categoryArray[3] = "Sekalaiset";
    $categoryArray[4] = "Käyttöliittymä";
    $categoryArray[5] = "Tiedostot";
    $categoryArray[6] = "Algoritmit";
    $categoryArray[7] = "Objektit";
    $categoryArray[8] = "Syötteet";
    $categoryArray[9] = "Ääni & musiikki";
    $categoryArray[10] = "Järjestelmä";
    $categoryArray[11] = "Kartat";
    $categoryArray[12] = "Kamera";
    $categoryArray[13] = "Muisti";
    $categoryArray[14] = "Efektit";
    
    // Tehdään aakkosjärjestyksessä oleva kategoriataulukko, jossa
    // avain on kategoria ja arvo on kategorian ID.
    $sortedCategories = array_flip( $categoryArray );
    ksort( $sortedCategories );
    
    $iconArray[0] = "style/img/icon_f.png";
    
    /*****************
        Funktio kooditaulukon tulostukseen.
        $result     query-objekti
        $showCat    tulostetaanko kategoriasarake vai ei
        
        Huom! Queryn tulee hakea tiedot seuraavassa järjestyksessä:
            type,name,(category,)description,author,added,id
    ****************/
    function listCodes($result,$showCat) {
        global $categoryArray;
        
        if ($showCat == true) {
            $result->bind_result($type,$name,$category,$desc,$author,$added,$id);
            
            echo "<table class='codeTable'>";
                echo "<tr><th class='cName'>Koodin nimi</th><th class='cCat'>Kategoria</th><th class='cAuthor'>Lis&auml;&auml;j&auml;</th><th class='cAdded'>Lis&auml;tty</th></tr>";
                
                while ($result->fetch()) {
                    $desc = strlen($desc) > 43 ? substr($desc,0,40) . '...' : $desc;
                    echo "<tr><td><a href='index.php?pId=naytakoodi&amp;cId=" . $id . "'>" . $name . "</a><p class='tableDesc'>" . $desc . "</p></td>" .
                            "<td><a href='index.php?pId=listaa&amp;cat=" . $category . "'>" . $categoryArray[$category] ."</a></td>" .
                            '<td><a href="index.php?pId=listaa&amp;cat=user&amp;q=' . $author . '">' . $author . '</a></td>' .
                            "<td>" . date('d.m.Y',strtotime($added)) . "</td></tr>";
                }
            echo "</table>";
        } else {
            $result->bind_result($type,$name,$desc,$author,$added,$id);
            
            echo "<table class='codeTable'>";
                echo "<tr><th class='cName'>Koodin nimi</th><th class='cAuthor'>Lis&auml;&auml;j&auml;</th><th class='cAdded'>Lis&auml;tty</th></tr>";
                
                while($result->fetch()) {
                    $desc = strlen($desc) > 43 ? substr($desc,0,40) . '...' : $desc;
                    echo '<tr><td><a href="index.php?pId=naytakoodi&amp;cId=' . $id . '">' . $name . '</a><p class="tableDesc">' . $desc . '</p></td>' .
                            '<td><a href="index.php?pId=listaa&amp;cat=user&amp;q=' . $author . '">' . $author . '</a></td>' .
                            '<td>' . date("d.m.Y",strtotime($added)) . '</td></tr>';
                }
            echo "</table>";
        }
    }
    
    function getPost($key) {
        if (isset($_POST[$key])) {
            return $_POST[$key];
        }
    }
    
    function generateHash() {
        $result = "";
        $charPool = '0123456789abcdefghijklmnopqrstuvwxyz';
        for($p = 0; $p<15; $p++)
            $result .= $charPool[mt_rand(0,strlen($charPool)-1)];
        return sha1($result);
    }
    
    function generateHash2() {
        $result = "";
        $charPool = '0123456789';
        for($p = 0; $p<4; $p++)
            $result .= $charPool[mt_rand(0,strlen($charPool)-1)];
        return sha1($result);
    }
    
    function notEmpty($s) {
        if ($s != "") {
            return true;
        }
        return false;
    }
    
    function isAlphanumeric($s) {
        $exp = '/^[a-zA-Z0-9]+$/';
        
        if (preg_match($exp,$s)) {
            return true;
        }
        return false;
    }
    
    function doesMatch($s1,$s2) {
        if ($s1 == $s2) {
            return true;
        }
        return false;
    }
    
    function checkLength($s,$min,$max) {
        if (strlen($s) >= $min && strlen($s) <= $max) {
            return true;
        }
        return false;
    }
    
    function emailValidator($s) {
        $emailExp = '/^[\w\-\.\+]+\@[a-zA-Z0-9+.\-]+\.[a-zA-Z0-9]{2,4}$/';
        
        if (preg_match($emailExp,$s)) {
            return true;
        }
        return false;
    }
    
    function validateForm() {
        
        $nickname = htmlspecialchars($_POST['newNick']);
        $pass = htmlspecialchars($_POST['newPassword']);
        $rePass = htmlspecialchars($_POST['rePassword']);
        $em = htmlspecialchars($_POST['email']);
        $cap = htmlspecialchars($_POST['capital']);
        
        if (!notEmpty($nickname)) {
            return false;
        }
        
        if (!checkLength($nickname,3,15)) {
            return false;
        }
        
        if (!isAlphanumeric($nickname)) {
            return false;
        }
        
        if (!notEmpty($pass)) {
            return false;
        }
        
        if (!doesMatch($pass,$rePass)) {
            return false;
        }
        
        if (!emailValidator($em)) {
            return false;
        }
        
        if ((!notEmpty($cap)) || (strtolower($cap) != "helsinki")) {
            return false;
        }
        
        return true;
    }
?>