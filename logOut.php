<?php
	session_start();
	unset($_SESSION['user_name']);
	echo "<meta http-equiv='Refresh' content='0;url=login.php' />"; 

?>