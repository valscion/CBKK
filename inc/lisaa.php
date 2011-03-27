<h1>Lis&auml;&auml; uusi koodi</h1>

<form action='inc/add.php' method='post' onsubmit='return validateCInput()'>
    Koodin nimi:<br />
    <input type='text' id='cName' name='cName' /><br />
    
    Koodin kuvaus:<br />
    <textarea rows='8' cols='70' id='description' name='description'></textarea><br />
    
    Koodi:<br />
    <textarea rows='8' cols='70' id='code' name='code'></textarea><br />
    
    Kategoria: 
    <select id='category' name='category'>
        <option value='6'>Algoritmit</option>
        <option value='14'>Efektit</option>
        <option value='0'>Grafiikka</option>
        <option value='10'>J&auml;restelm&auml;</option>
        <option value='12'>Kamera</option>
        <option value='11'>Kartat</option>
        <option value='4'>K&auml;ytt&ouml;liittym&auml;</option>
        <option value='1'>Matematiikka</option>
        <option value='2'>Merkkijonot</option>
        <option value='13'>Muisti</option>
        <option value='7'>Objektit</option>
        <option value='3'>Sekalaiset</option>
        <option value='8'>Sy&ouml;tteet</option>
        <option value='5'>Tiedostot</option>
        <option value='9'>&Auml;&auml;ni & musiikki</option>
    </select><br />

    <input type='submit' value='Lis&auml;&auml; koodi' />
</form>
