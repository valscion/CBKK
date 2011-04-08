<?php
/*************************************************************************************
 * muokkaa.php
 * --------------
 * Jo lähetetyn koodin päivittäminen.
 ************************************************************************************/
 

if (!isset($_SESSION['currentUser'])) {
    echo '<h1>Virhe</h1><h2>Et ole kirjautunut sisään</h2>';
} elseif ( !isset( $_POST['cName'],$_POST['category'],$_POST['code'],$_POST['description'],$_POST['cId'])
           || empty($_POST['cName']) || empty($_POST['code']) || empty($_POST['description']) ) {
        
    $userIsAuthor = false;
    if( $stmt = $conn->prepare('SELECT author,id FROM ' . $config['db_prefix'] . 'codes WHERE id = ?') )
    {
        $stmt->bind_param("i",$_GET['cId']);
        $stmt->execute();
        
        $stmt->bind_result( $author, $cId );
        $stmt->fetch();
        
        if( $author === $_SESSION['currentUser'] ) {
            $userIsAuthor = true;
        }
        
        $stmt->close();
    } else {
        echo $conn->error;
    }
    
    if( $userIsAuthor )
    {
        $query = 'SELECT name,category,code,description FROM ' . $config['db_prefix'] . 'codes WHERE id = ? LIMIT 1';
        
        if( $stmt = $conn->prepare($query) ) {
            $stmt->bind_param("i",$cId);
            $stmt->execute();
            
            $stmt->bind_result( $name, $category, $code, $description );
            $stmt->fetch();
?>

<h1>Muokkaa koodia</h1>

<form method='post' onsubmit='return validateCInput()'>
    <input type='hidden' id='cId' name='cId' value='<?=$cId?>' />
    
    <p>Poista koodi (<strong>Huom! Tämä toiminto ei ole peruutettavissa!</strong>): 
    <input type='checkbox' id='deleteCode' name='deleteCode' value='yesplease' /></p>
    
    <p>Koodin nimi:<br />
    <input type='text' id='cName' name='cName' value='<?=$name?>' /></p>
    
    <p>Koodin kuvaus:<br />
    <textarea rows='8' cols='70' id='description' name='description'><?=$description?></textarea></p>
    
    <p>Koodi:<br />
    <textarea rows='8' cols='70' id='code' name='code'><?=$code?></textarea></p>
    
    <p>Kategoria: 
    <select id='category' name='category'>
<?php
    foreach( $sortedCategories as $cat => $catId ) {
        echo "\n        "; // Sisennykset on mukavia.
        echo '<option value="' . $catId . '"' .
             ( $catId == $category ? ' selected="selected"' : '' ) .
             '>' . $cat . '</option>';
    }
?>

    </select></p>

    <input type='submit' value='Päivitä koodi' />
</form>

<?php
            $stmt->close();
        } else {
            echo $conn->error;
        }
    } else {
        echo '<h1>Virhe</h1><h2>Sinulla ei ole oikeuksia muokata tätä koodia.</h2>';
    }
} else {
    // Muokataan jo annettujen arvojen perusteella.
    $code = htmlentities($_POST['code'], ENT_COMPAT, "UTF-8");
    $name = $_POST['cName'];
    $category = $_POST['category'];
    $description = $_POST['description'];
    $delete = ( $_POST['deleteCode'] === 'yesplease' ? true : false );
    
    $userIsAuthor = false;
    if( $stmt = $conn->prepare('SELECT author,id FROM ' . $config['db_prefix'] . 'codes WHERE id = ?') )
    {
        $stmt->bind_param("i",$_GET['cId']);
        $stmt->execute();
        
        $stmt->bind_result( $author, $cId );
        $stmt->fetch();
        
        if( $author === $_SESSION['currentUser'] ) {
            $userIsAuthor = true;
        }
        
        $stmt->close();
    } else {
        echo $conn->error;
    }
    
    if( $userIsAuthor ) {
        if( $delete ) {
            $query = 'DELETE FROM ' . $config['db_prefix'] . 'codes WHERE id = ? LIMIT 1';
            $query2 = 'DELETE FROM ' . $config['db_prefix'] . 'comments WHERE codeId = ?';
            if( $stmt = $conn->prepare($query) ) {
                if( $stmt2 = $conn->prepare($query2) ) {
                    $stmt->bind_param("i",$cId);
                    $stmt2->bind_param("i",$cId);
                    
                    $stmt->execute();
                    $stmt2->execute();
                    
                    if( $stmt->affected_rows == 1 ) {
                        echo '<h1>Poisto onnistui!</h1><p><a href="index.php">Palaa etusivulle</a></p>';
                    } else {
                        echo '<h1>Virhe</h1><h2>Poisto epäonnistui!</h2>';
                    }
                    
                    $stmt->close();
                    $stmt2->close();
                } else {
                    $conn->error;
                }
            } else {
                echo $conn->error;
            }
        } else {
            $query = 'UPDATE ' . $config['db_prefix'] . 'codes SET name=?,category=?,code=?,description=? WHERE id = ?';
            if( $stmt = $conn->prepare($query) ) {
                $stmt->bind_param("sissi",$name,$category,$code,$description,$cId); // sissi, lol :D tulipas vahingossa :D
                $stmt->execute();
                
                if( $stmt->affected_rows == 1 ) {
                    echo '<h1>Muokkaus onnistui!</h1><p>Käy katsomassa päivitetty koodisi <a href="index.php?pId=naytakoodi&amp;cId=' . $cId . '">täältä</a>.';
                } else {
                    echo '<h1>Mitään ei muokattu</h1><p>Et mahdollisesti päivittänyt mitään tietoja tai tapahtui todella omituinen virhe. ' . 
                         'Haluatko <a href="index.php?pId=muokkaa&amp;cId=' . $cId . '">yrittää uudelleen</a>?</p>';
                }
                
                $stmt->close();
            } else {
                echo $conn->error;
            }
        }
    } else {
        echo '<h1>Virhe</h1><h2>Sinulla ei ole oikeuksia muokata tätä koodia.</h2>';
    }
}

 ?>