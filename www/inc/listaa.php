<?php
    
    $cat = $_GET['cat'];
    
    if ($cat == 'search') { //Haun tulos
        $q = "%" . $_GET['q'] . "%";
        $query = "SELECT type,name,category,description,author,added,id FROM " . $config['db_prefix'] . "codes WHERE name LIKE ? OR description LIKE ? ORDER BY name ASC";
        echo "<h1>Haun tulokset</h1>";
    } else if ($cat == 'all') { //Listaa kaikki koodit
        echo "<h1>Kaikki koodit</h1>";
        
        $sort = $_GET['sort'];
        
        echo "<form action='index.php' method='get'>";
            echo "J‰rjest‰: ";
            echo "<input type='hidden' name='pId' value='listaa' />";
            echo "<input type='hidden' name='cat' value='all' />";
            echo "<select name='sort'>";
                echo "<option value='name'>Nimi</option>";
                echo "<option value='author'>Lis‰‰j‰</option>";
                echo "<option value='added'>P‰iv‰ys</option>";
            echo "</select>";
            echo "<input type='submit' value='Listaa' />";
        echo "</form>";
        
        $query = "SELECT type,name,category,description,author,added,id FROM " . $config['db_prefix'] . "codes ORDER BY " . $sort . " ASC";
    } else { //Normaali kategorialistaus
        $query = "SELECT type,name,description,author,added,id FROM " . $config['db_prefix'] . "codes WHERE category = ? ORDER BY name ASC";
        echo "<h1>" . $categoryArray[$cat] . "</h1>";
    }
    
    
    if ($cat == 'search' || $cat == 'all') {
        if ($stmt = $conn->prepare($query)) {
            if ($cat == 'search') {
                $stmt->bind_param("ss",$q,$q);
            }
            $stmt->execute();
            
            $stmt->bind_result($type,$name,$category,$desc,$author,$added,$id);
            
            echo "<table class='codeTable'>";
                echo "<tr><th class='cName'>Koodin nimi</th><th class='cCat'>Kategoria</th><th class='cAuthor'>Lis&auml;&auml;j&auml;</th><th class='cAdded'>Lis&auml;tty</th></tr>";
                
                while($stmt->fetch()) {
                    echo "<tr><td><a href='index.php?pId=naytakoodi&amp;cId=" . $id . "'>" . $name . "</a><p class='tableDesc'>" . substr($desc,0,40) . "...</p></td>
                            <td><a href='index.php?pId=listaa&amp;cat=" . $category . "'>" . $categoryArray[$category] ."</a></td><td>" . $author . "</td><td>" . date('d.m.Y',strtotime($added)) . "</td></tr>";
                }
            echo "</table>";
            
        } else {
            echo $conn->error;
        }
    } else {
        if ($stmt = $conn->prepare($query)) {
            $stmt->bind_param("i",$cat);
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
    }
?>