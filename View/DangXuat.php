<?php
	session_destroy();
	echo header("refresh:0; url='admin.php'");
?>