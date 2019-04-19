<?php
session_start();
?>
<!doctype html>
<html>

<head>
<title>Login</title>
<script src="Controllers/jQuery.js" type="text/javascript"></script>
<script src="Controllers/controllerMain.js" type="text/javascript"></script>

<style>
html
{
   font-family: tahoma;
   font-size:12px;
}
label
{
   width:80px;
   display:inline-block;
   margin:2px;
}

input[type="text"], input[type="password"]
{
   width:150px;
   margin:2px;
}

#formLogin
{
   border:solid 1px #000000;
   padding:10px;
   width:500px;
   margin: 0 auto;
}
</style>
</head>

<body>

<form id="formLogin">
<h1>Login</h1>
   <label>UserName</label><input id="txtUserName" name="txtUserName" type="text"> <br>
   <label>Password</label><input id="txtPassword" name="txtPassword" type="password"> <br>
   <input id="btnLogin" name="btnLogin" type="button" value="Login">
   <a href="requestPassword.php">Forgot password </a><br>
   <div id="divStsMsgLogin">
   </div>
</form>

</body>

</html>
