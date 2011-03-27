<?php
    session_start();
    
    include_once "database.php";
    
    $pass = sha1(htmlspecialchars($_POST['password']));
    $nickname = htmlspecialchars($_POST['nick']);
    
    if ($stmt = $conn->prepare("SELECT nick,password,active FROM " . TABLE_PREFIX . "users WHERE nick = ? LIMIT 1")) {
        $stmt->bind_param("s",$nickname);
        $stmt->execute();
        
        $stmt->bind_result($n,$p,$a);
        
        $stmt->fetch();
        
        if ($p == $pass && $a == 1) {
            $_SESSION['currentUser'] = $nickname;
            echo "<meta HTTP-EQUIV='REFRESH' content='0; url=" . $_SESSION['back'] . "' />";
        } else {
            echo "<meta HTTP-EQUIV='REFRESH' content='0; url=" . $_SESSION['back'] . "' />";
        }
    } else {
        echo $conn->error;
    }
    
?>