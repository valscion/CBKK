<?php
    if ($result = $conn->query("SELECT id FROM " . $config['db_prefix'] . "codes")) {
        $rows = $result->num_rows;
    }
    
    echo "<h1>Etusivu</h1>";
    echo "<p>CoolBasic koodikirjasto on sivusto, johon CB:n k&auml;ytt&auml;j&auml;t voivat lis&auml;t&auml; koodip&auml;tki&auml;&auml;n.
            T&auml;ll&auml; hetkell&auml; tietokannasta l&ouml;ytyy yhteens&auml; " . $rows . " koodia.</p>";
    
    
    echo "<h2>Viisi uusinta koodia</h2>";
    
    if ($stmt = $conn->prepare("SELECT type,name,description,category,author,added,id FROM " . $config['db_prefix'] . "codes ORDER BY id DESC LIMIT 5")) {
        $stmt->execute();
        
        $stmt->bind_result($type,$name,$desc,$cat,$author,$added,$id);
        
        echo "<table class='codeTable'>";
            echo "<tr><th class='cName'>Koodin nimi</th><th class='cCat'>Kategoria</th><th class='cAuthor'>Lis&auml;&auml;j&auml;</th><th class='cAddded'>Lis&auml;tty</th></tr>";
        
            while ($stmt->fetch()) {
                echo "<tr><td><a href='index.php?pId=naytakoodi&amp;cId=" . $id . "'>" . $name . "</a><p class='tableDesc'>&quot;" . substr($desc,0,40) . "...&quot;</p></td>
                    <td class='cCat'><a href='index.php?pId=listaa&amp;cat=" . $cat . "'>" . $categoryArray[$cat] . "</a></td><td class='cAuthor'>" . $author . "</td>
                    <td class='cAdded'>" . date('d.m.Y',strtotime($added)) . "<br />" . date('H:i:s',strtotime($added)) .  "</td></tr>";
            }
        echo "</table>";
    } else {
        echo $conn->error;
    }
    
    echo "<h2>Viisi uusinta kommenttia</h2>";
    
    if ($stmt = $conn->prepare("SELECT comments.author,comments.content,comments.date,comments.codeId,codes.name FROM " . $config['db_prefix'] . "comments,codes WHERE comments.codeId = codes.id ORDER BY comments.id DESC LIMIT 5")) {
        $stmt->execute();
        
        $stmt->bind_result($author,$content,$date,$cId,$cName);
        
        echo "<table class='codeTable'>";
            echo "<tr><th class='cName'>Koodi ja kommentti</th><th class='cAuthor'>Lis&auml;&auml;j&auml;</th><th class='cAdded'>Lis&auml;tty</th></tr>";
            
            while ($stmt->fetch()) {
                echo "<tr><td><a href='index.php?pId=naytakoodi&amp;cId=" . $cId . "'>" . $cName . "</a><p class='tableDesc'>&quot;" . substr($content,0,40) . "...&quot;</p></td>
                    <td class='cAuthor'>" . $author . "</td><td class='cAdded'>" . date('d.m.Y',strtotime($date)) . "<br />" . date('H:i:s',strtotime($date)) . "</td></tr>";
            }
        echo "</table>";
    } else {
        echo $conn->error;
    }
?>