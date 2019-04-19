<?php
session_start();

$segments = explode('/', trim(parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH), '/'));
$_module = $segments[count($segments) - 2];
$_param = $segments[count($segments) - 1];

switch($_module)
{
	case "user": include("DCBusUser.php"); break;
	case "item": include("DCBusItem.php"); break;
}

?>