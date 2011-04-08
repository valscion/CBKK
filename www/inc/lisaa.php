<?php 
    include_once( 'database.php' );
?>
<h1>Lisää uusi koodi</h1>

<form action='inc/add.php' method='post' onsubmit='return validateCInput()'>
    Koodin nimi:<br />
    <input type='text' id='cName' name='cName' /><br />
    
    Koodin kuvaus:<br />
    <textarea rows='8' cols='70' id='description' name='description'></textarea><br />
    
    Koodi:<br />
    <textarea rows='8' cols='70' id='code' name='code'></textarea><br />
    
    Kategoria: 
    <select id='category' name='category'>
<?php
    foreach( $sortedCategories as $cat => $catId ) {
        echo "\n        "; // Sisennykset on mukavia.
        echo '<option value="' . $catId . '">' . $cat . '</option>';
    }
?>

    </select><br />

    <input type='submit' value='Lisää koodi' />
</form>
