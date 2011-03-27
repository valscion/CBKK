<h1>Rekister&ouml;idy</h1>

<p>T&auml;ll&auml; lomakkeella voit rekister&ouml;ity&auml; CBKK:n k&auml;ytt&auml;j&auml;ksi. <span class='bold'>Kaikki kohdat ovat pakollisia!</span></p>

<form action='inc/processRegister.php'  method='post' onsubmit='return validateForm()'>
	<h4>Nimimerkki: (3-15 merkki&auml;)</h4>
	<input type='text' name='newNick' id='newNick' /><br />
	<p class='error'></p>
	
	<h4>Salasana:</h4>
	<input type='password' name='newPassword' id='newPassword' /><br />
	<p class='error'></p>
	
	<h4>Salasana uudelleen:</h4>
	<input type='password' name='rePassword' id='rePassword' /><br />
	<p class='error'></p>
	
	<h4>S&auml;hk&ouml;posti:</h4>
	<input type='text' name='email' id='email' /><br />
	<p class='error'></p>
	
	<h4>Mik&auml; on Suomen p&auml;&auml;kaupunki?</h4>
	<input type='text' name='capital' id='capital' /><br />
	<p class='error'></p>
	
	<input type='submit' value='Rekister&ouml;idy' />
</form>