<?php
    session_start();

    include_once "../inc/database.php";
    
    $nickname = htmlspecialchars(getPost('newNick'));
    $passNoCrypt = htmlspecialchars(getPost('newPassword'));
    $pass = sha1(htmlspecialchars(getPost('newPassword')));
    $rePass = sha1(htmlspecialchars(getPost('rePassword')));
    $em = htmlspecialchars(getPost('email'));
    $hash = generateHash();
    
    if (validateForm() == true) {
    
        if ($stmt = $conn->prepare("INSERT INTO " . TABLE_PREFIX . "users(nick,password,email,hash) VALUES (?,?,?,?)")) {
            $stmt->bind_param("ssss",$nickname,$pass,$em,$hash);
            $stmt->execute();

            mail($em,"CBKK rekisteröityminen","Kiitos rekisteröitymisestäsi!\n\n
                Voit aktivoida tunnuksesi vierailemalla osoitteessa:\n
                http://cbkk.viuhka.fi/activate.php?hash=$hash\n\n
                Tunnuksesi: $nickname\n
                Salasanasi: $passNoCrypt\n\n
                Salasanat ovat kryptattu tietokantaan, joten niitä ei voi palauttaa.","From: CBKK");
            
            $_SESSION['back'] = "./";
            echo "<meta HTTP-EQUIV='REFRESH' content='0; url=../index.php?pId=valmis&t=1' />";
        } else {
            echo $conn->error;
        }
    } else {
        echo "<meta HTTP-EQUIV='REFRESH' content='5; url=../' />";
        echo "Tiedot eivät olleet oikein!";
    }
    
?>