<?php
    require_once( '../config.php' );
    session_start();

    include_once "../inc/database.php";
    
    $nickname = htmlspecialchars(getPost('newNick'));
    $passNoCrypt = htmlspecialchars(getPost('newPassword'));
    $pass = sha1(htmlspecialchars(getPost('newPassword')));
    $rePass = sha1(htmlspecialchars(getPost('rePassword')));
    $em = htmlspecialchars(getPost('email'));
    $hash = generateHash();
    
    if (validateForm() == true) {
         Tarkistetaan, ettei samalla nimimerkillä ole jo käyttäjää.
        if ( $stmtchk = $conn->prepare("SELECT * FROM " . $config['db_prefix'] . "users WHERE nick = ?") ) {
            $stmtchk->bind_param("s",$nickname);
            $stmtchk->execute();
            $stmtchk->store_result();
                        
            if( $stmtchk->num_rows > 0 ) {
                // Nimimerkki oli olemassa, koska rivejä tuli takaisin querystä.
                echo "<meta HTTP-EQUIV='REFRESH' content='5; url=../' />";
                echo "Nimimerkki oli jo olemassa!";
                $stmtchk->close();
            } else {
                $stmtchk->close();
                // Nimimerkkiä ei ollut entuudestaan, jatketaan käyttäjän luontiin.
                if ($stmt = $conn->prepare("INSERT INTO " . $config['db_prefix'] . "users(nick,password,email,hash) VALUES (?,?,?,?)")) {
                    $stmt->bind_param("ssss",$nickname,$pass,$em,$hash);
                    $stmt->execute();

                    mail($em,"CBKK rekisteröityminen","Kiitos rekisteröitymisestäsi!\n\n
                        Voit aktivoida tunnuksesi vierailemalla osoitteessa:\n"
                        . $config['root_url'] . "activate.php?hash=$hash\n\n
                        Tunnuksesi: $nickname\n
                        Salasanasi: $passNoCrypt\n\n
                        Salasanat ovat kryptattu tietokantaan, joten niitä ei voi palauttaa.","From: CBKK");
                    
                    $_SESSION['back'] = "./";
                    echo "<meta HTTP-EQUIV='REFRESH' content='0; url=../index.php?pId=valmis&t=1' />";
                } else {
                    echo $conn->error;
                }
            }
        } else {
            echo $conn->error;
        }
    } else {
        echo "<meta HTTP-EQUIV='REFRESH' content='5; url=../' />";
        echo "Tiedot eivät olleet oikein!";
    }
    
?>