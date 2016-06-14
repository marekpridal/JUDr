<?php
session_start(); // Starting Session
$error=''; // Variable To Store Error Message
if (isset($_POST['submit'])) {
if (empty($_POST['username']) || empty($_POST['password'])) 
{
$error = "Prázdné uživatelské jméno nebo heslo";
}
else
{
// Define $username and $password
$username=$_POST['username'];
$password=$_POST['password'];
// Establishing Connection with Server by passing server_name, user_id and password as a parameter
$connection = mysql_connect  ("localhost", "root",  "") or die ('I cannot connect to the database  because: ' . mysql_error());
// To protect MySQL injection for Security purpose
$username = stripslashes($username);
$password = stripslashes($password);
$username = mysql_real_escape_string($username);
$password = mysql_real_escape_string($password);
// Selecting Database
$db=mysql_select_db("spisy", $connection);
mysql_query("SET NAMES utf8");
// SQL query to fetch information of registerd users and finds user match.
$query = mysql_query("select * from zamestnanci where password='".MD5($password)."' AND username='$username'", $connection);
$rows = mysql_num_rows($query);
if ($rows == 1) {
$_SESSION['login_user']=$username; // Initializing Session
header("location: index.php"); // Redirecting To Other Page
} else {
$error = "Špatné uživatelské jméno nebo heslo";
}
mysql_close($connection); // Closing Connection
}
}
?>