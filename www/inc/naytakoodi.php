<?php
    include_once 'geshi.php';
    
    $codeId = $_GET['cId'];
    
    if ($stmt = $conn->prepare("SELECT name,code,description,author,added,id FROM " . TABLE_PREFIX . "codes WHERE id = ? LIMIT 1")) {
        $stmt->bind_param("i",$codeId);
        $stmt->execute();
        
        $stmt->bind_result($name,$source,$desc,$author,$added,$cId);
        
        $stmt->fetch();
        
        echo "<h2>" . $name . "</h2>";
        echo "<p class='small'>Lis&auml;&auml;j&auml;: " . $author . " Lis&auml;tty: " . date('d.m.Y',strtotime($added)) ."</p>";
        echo "<pre>" . $desc . "</pre>";
    } else {
        echo $conn->error;
    }
    
    // $language = 'cb';
    $language = 'CoolBasic';
    
    $geshi = new GeSHi(htmlspecialchars_decode($source),$language);
    
    $geshi->enable_classes();
    $geshi->set_header_type(GESHI_HEADER_PRE_TABLE);
    $geshi->enable_line_numbers(GESHI_NORMAL_LINE_NUMBERS);
    $geshi->set_tab_width(4);
    $geshi->set_link_target('_blank');
    
    echo "<a href='#' onclick='selectCode(this); return false;'>Valitse kaikki</a>";
    echo $geshi->parse_code();
    
    $query = "SELECT author,content,date FROM " . TABLE_PREFIX . "comments WHERE codeId='$cId' ORDER BY id DESC";
    
    echo "<h2>Kommentit</h2>";
    
    $stmt->fetch();
    
    if ($stmt = $conn->prepare("SELECT author,content,date FROM " . TABLE_PREFIX . "comments WHERE codeId = ? ORDER BY id ASC")) {
        $stmt->bind_param("i",$codeId);
        $stmt->execute();
        
        $stmt->bind_result($author,$content,$date);
        
        $i = 0;
        
        while($stmt->fetch()) {
            echo "<div class='comment" . $i % 2 . "'>";
                echo "<h4>" . $author . "</h4>";
                echo "<p class='small'>" . date('H:i:s d.m.Y',strtotime($date)) . "</p>";
                
                echo "<pre>" . $content . "</pre>";
            echo "</div>";
            
            $i++;
        }
    } else {
        echo $conn->error;
    }
    
    if (isset($_SESSION['currentUser'])) {
        echo "<form action='inc/addcomment.php' method='post'>";
            echo "<h4>Kirjoita kommentti</h4>";
            echo "<textarea rows='2' cols='50' name='comment'></textarea><br />";
            echo "<input type='hidden' name='code' value='" . $codeId . "' />";
            echo "<input type='submit' value='L&auml;het&auml;' />";
        echo "</form>";
    } else {
        echo "<h4>Sinun tulee kirjautua sis&auml;&auml;n kommentoidaksesi</h4>";
    }
?>