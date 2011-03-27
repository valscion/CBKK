<?php
	session_start();
	
	unset($_SESSION['currentUser']);
	echo "<meta HTTP-EQUIV='REFRESH' content='0; url=" . $_SESSION['back'] . "' />";
?>