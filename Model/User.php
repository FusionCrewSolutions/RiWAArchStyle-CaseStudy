<?php
class User
{
	//LOGIN-----------------------------------------------
	public function login($uname, $pword)
	{
		if($uname=="admin" && $pword=="1234")
		{
			$_SESSION["userName"] = $uname;
			return "true";
		}
		else
		{
			return "Invalid user";
		}
	}
	

	//VALIDATE LOGGED USER--------------------------------
	public function isLoggedUser()
	{
		if(!isset($_SESSION["userName"]))
		{
			$_SESSION["userName"]="";
		}
		
		if($_SESSION["userName"]=="")
		{
			header('Location: index.php');
		}
	}
	

	//LOGOUT---------------------------------------------
	public function logout()
	{
		session_destroy();
	}
}
?>