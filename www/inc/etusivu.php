<?php
    if ($result = $conn->query("SELECT id FROM " . $config['db_prefix'] . "codes")) {
        $rows = $result->num_rows;
    }
    
    echo "<h1>Etusivu</h1>";
    echo "<p>CoolBasic koodikirjasto on sivusto, johon CB:n k&auml;ytt&auml;j&auml;t voivat lis&auml;t&auml; koodip&auml;tki&auml;&auml;n.
            T&auml;ll&auml; hetkell&auml; tietokannasta l&ouml;ytyy yhteens&auml; " . $rows . " koodia.</p>";
    
    
    echo "<h2>Viisi uusinta koodia</h2>";
    
    if ($stmt = $conn->prepare("SELECT type,name,category,description,author,added,id FROM " . $config['db_prefix'] . "codes ORDER BY id DESC LIMIT 5")) {
        $stmt->execute();
        
        listCodes($stmt,true);
    } else {
        echo $conn->error;
    }
    
    echo "<h2>Viisi uusinta kommenttia</h2>";
    
    $prfx = $config['db_prefix'];
    if ($stmt = $conn->prepare("SELECT {$prfx}comments.author,{$prfx}comments.content,{$prfx}comments.date,{$prfx}comments.codeId,{$prfx}codes.name FROM {$prfx}comments,{$prfx}codes WHERE {$prfx}comments.codeId = {$prfx}codes.id ORDER BY {$prfx}comments.id DESC LIMIT 5")) {
        $stmt->execute();
        
        $stmt->bind_result($author,$content,$date,$cId,$cName);
        
        echo "<table class='codeTable'>";
            echo "<tr><th class='cName'>Koodi ja kommentti</th><th class='cAuthor'>Lis&auml;&auml;j&auml;</th><th class='cAdded'>Lis&auml;tty</th></tr>";
            
            while ($stmt->fetch()) {
                $content = strlen($content) > 43 ? substr($content,0,40) . '...' : $content;
                echo "<tr><td><a href='index.php?pId=naytakoodi&amp;cId=" . $cId . "'>" . $cName . "</a><p class='tableDesc'>&quot;" . $content . "&quot;</p></td>
                    <td class='cAuthor'>" . $author . "</td><td class='cAdded'>" . date('d.m.Y',strtotime($date)) . "<br />" . date('H:i:s',strtotime($date)) . "</td></tr>";
            }
        echo "</table>";
    } else {
        echo $conn->error;
    }
?>