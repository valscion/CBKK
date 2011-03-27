<?php
    session_start();
    
    include_once "database.php";
    
    $comment = stripslashes(htmlspecialchars($_POST['comment']));
    $user = $_SESSION['currentUser'];
    $cId = $_POST['code'];
    
    if ($stmt = $conn->prepare("INSERT INTO comments(author,content,codeId) VALUES (?,?,?)")) {
        $stmt->bind_param("ssi",$user,$comment,$cId);
        $stmt->execute();
        
        echo "<meta HTTP-EQUIV='REFRESH' content='0; url=" . $_SESSION['back'] . "' />";
    } else {
        echo $conn->error;
    }
?>
    
    