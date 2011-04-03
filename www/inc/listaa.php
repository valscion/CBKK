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
            echo "Järjestä: ";
            echo "<input type='hidden' name='pId' value='listaa' />";
            echo "<input type='hidden' name='cat' value='all' />";
            echo "<select name='sort'>";
                echo "<option value='name'>Nimi</option>";
                echo "<option value='author'>Lisääjä</option>";
                echo "<option value='added'>Päiväys</option>";
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

            listCodes($stmt,true);
        } else {
            echo $conn->error;
        }
    } else {
        if ($stmt = $conn->prepare($query)) {
            $stmt->bind_param("i",$cat);
            $stmt->execute();

            listCodes($stmt,false);
        } else {
            echo $conn->error;
        }
    }
?>