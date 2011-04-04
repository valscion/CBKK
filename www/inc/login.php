<?php
    session_start();
    
    include_once "database.php";
    
    $pass = sha1(htmlspecialchars($_POST['password']));
    $nickname = htmlspecialchars($_POST['nick']);
    
    if ($stmt = $conn->prepare("SELECT nick,password,active,id FROM " . $config['db_prefix'] . "users WHERE nick = ? LIMIT 1")) {
        $stmt->bind_param("s",$nickname);
        $stmt->execute();
        
        $stmt->bind_result($n,$p,$a,$i);
        
        $stmt->fetch();
        
        $stmt->close();
        
        if ($p == $pass && $a == 1) {
            if( $conn->query("UPDATE " . $config['db_prefix'] . "users SET lastlogin = NOW() WHERE id = " . $i) )
            {
                $_SESSION['currentUser'] = $nickname;
                echo "<meta HTTP-EQUIV='REFRESH' content='0; url=" . $_SESSION['back'] . "' />";
            } else {
                echo $conn->error;
            }
        } else {
            echo "<meta HTTP-EQUIV='REFRESH' content='0; url=" . $_SESSION['back'] . "' />";
        }
    } else {
        echo $conn->error;
    }
    
?>