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
    $categoryArray[4] = "K&auml;ytt&ouml;liittym&auml;";
    $categoryArray[5] = "Tiedostot";
    $categoryArray[6] = "Algoritmit";
    $categoryArray[7] = "Objektit";
    $categoryArray[8] = "Sy&ouml;tteet";
    $categoryArray[9] = "&Auml;&auml;ni & musiikki";
    $categoryArray[10] = "J&auml;restelm&auml;";
    $categoryArray[11] = "Kartat";
    $categoryArray[12] = "Kamera";
    $categoryArray[13] = "Muisti";
    $categoryArray[14] = "Efektit";
    
    $iconArray[0] = "style/img/icon_f.png";
    
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