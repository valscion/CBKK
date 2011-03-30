<?php
    session_start();
    
    include_once "../inc/database.php";

    if (notEmpty($_POST['cName'])) {
        if( get_magic_quotes_gpc() )
            $name = stripslashes(htmlspecialchars($_POST['cName']));
        else
            $name = htmlspecialchars($_POST['cName']);
    } else {
        die("Anna koodille nimi!");
    }
    
    if (notEmpty($_POST['description'])) {
        if( get_magic_quotes_gpc() )
            $desc = stripslashes(htmlspecialchars($_POST['description']));
        else
            $desc = htmlspecialchars($_POST['description']);
    } else {
        die("Anna koodille kuvaus!");
    }
    
    if (notEmpty($_POST['code'])) {
        if( get_magic_quotes_gpc() )
            $c = stripslashes(htmlspecialchars($_POST['code'],ENT_NOQUOTES));
        else
            $c = htmlspecialchars($_POST['code'],ENT_NOQUOTES);
    } else {
        die("Syötä koodi!");
    }
    
    if (notEmpty($_POST['category'])) {
        $cat = $_POST['category'];
    }
    
    $adder = $_SESSION['currentUser'];
    
    $query = "INSERT INTO " . $config['db_prefix'] . "codes(name,code,description,author,category) VALUES('$name','$c','$desc','$adder','$cat')";
    
    if($stmt = $conn->prepare("INSERT INTO " . $config['db_prefix'] . "codes(name,code,description,author,category) VALUES(?,?,?,?,?)")) {
        $stmt->bind_param("ssssi",$name,$c,$desc,$adder,$cat);
        $stmt->execute();
        
        echo "Koodi lisätty onnistuneesti!";
        
        echo "<meta HTTP-EQUIV='REFRESH' content='2; url=../' />";
    } else {
        echo $conn->error;
        echo "<meta HTTP-EQUIV='REFRESH' content='0; url=../' />";
    }

?>

    