<?php
	include("User.php");	
	$usr = new User();
	
	switch($_SERVER['REQUEST_METHOD'])
	{
		case "POST": echo $usr->login($_POST["txtUserName"],$_POST["txtPassword"]); break;
		case "DELETE": echo $usr->logout(); break;
	}
?>