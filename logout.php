<?php
session_start();
include 'include/dataClass.php';
$dc = new Dataclass();
if($dc->getTable("update user set active = 0 where id = '$_SESSION[id]'")); // Destroying All Sessions
{
	session_destroy();
	header("Location: login.php"); // Redirecting To Home Page
}
?>