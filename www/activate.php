<?php
    require "inc/database.php";
    
    $h = htmlspecialchars($_GET['hash']);
    
    if ($stmt = $conn->prepare("UPDATE " . $config['db_prefix'] . "users SET active = 1 WHERE hash = ?")) {
        $stmt->bind_param("s",$h);
        $stmt->execute();
        
        $_SESSION['back'] = "./";
        echo "<meta HTTP-EQUIV='REFRESH' content='0; url=../index.php?pId=valmis&t=2' />";
    } else {
        echo $conn->error;
    }
?>