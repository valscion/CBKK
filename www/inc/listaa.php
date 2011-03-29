<?php
    
    $cat = $_GET['cat'];
    
    if ($cat == 'search') {
        $q = "%" . $_GET['q'] . "%";
        $query = "SELECT type,name,description,author,added,id FROM " . $config['db_prefix'] . "codes WHERE name LIKE ? OR description LIKE ? ORDER BY name ASC";
        echo "<h1>Haun tulokset</h1>";
    } else {
        $query = "SELECT type,name,description,author,added,id FROM " . $config['db_prefix'] . "codes WHERE category = ? ORDER BY name ASC";
        echo "<h1>" . $categoryArray[$cat] . "</h1>";
    }

    if ($stmt = $conn->prepare($query)) {
        if ($cat == 'search') {
            $stmt->bind_param("ss",$q,$q);
        } else {
            $stmt->bind_param("i",$cat);
        }
        $stmt->execute();
        
        $stmt->bind_result($type,$name,$desc,$author,$added,$id);
        
        echo "<table class='codeTable'>";
            echo "<tr><th class='cName'>Koodin nimi</th><th class='cAuthor'>Lis&auml;&auml;j&auml;</th><th class='cAdded'>Lis&auml;tty</th></tr>";
            
            while($stmt->fetch()) {
                echo "<tr><td><a href='index.php?pId=naytakoodi&amp;cId=" . $id . "'>" . $name . "</a><p class='tableDesc'>" . substr($desc,0,40) . "...</p></td>
                        <td>" . $author . "</td><td>" . date('d.m.Y',strtotime($added)) . "</td></tr>";
            }
        echo "</table>";
        
    } else {
        echo $conn->error;
    }
            
?>