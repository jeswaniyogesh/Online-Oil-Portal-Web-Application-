<?php
session_start();
error_reporting(E_ALL ^ E_DEPRECATED);
$error=''; // Variable To Store Error Message
if (isset($_POST['submit'])) {
if (empty($_POST['email']) || empty($_POST['password'])) {
$error = "Username or Password is invalid";
}
else
{
// Define $username and $password
$email=$_POST['email'];
$password=$_POST['password'];
// Establishing Connection with Server by passing server_name, user_id and password as a parameter
$connection = mysql_connect("localhost", "root", "India@1234");
// To protect MySQL injection for Security purpose
$email = stripslashes($email);
$password = stripslashes($password);
$email = mysql_real_escape_string($email);
$password = mysql_real_escape_string($password);
// Selecting Database
$db = mysql_select_db("utd_oil", $connection);
// SQL query to fetch information of registerd users and finds user match.
$query = mysql_query("select Client_id from client_login where password='$password' AND email_id='$email'", $connection);
$rows = mysql_num_rows($query);
if ($rows == 1) {
$row=mysql_fetch_Array( $query);
$_SESSION["Client_id"]= $row['Client_id'];

header("location: profile.php"); // Redirecting To Other Page
} else {
$error = "Username or Password is invalid";
}
mysql_close($connection); // Closing Connection
}
}
?>