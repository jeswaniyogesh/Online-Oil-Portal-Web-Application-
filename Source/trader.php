<?php
include('tlogin.php'); // Includes Login Script
?>
<!DOCTYPE html>
<html>
<head>
<title>OIL MANAGEMENT SYSTEM</title>
<link href="style1.css" rel="stylesheet" type="text/css">
</head>
<body>
<div class="container">
<div class="main">
<h2>OIL MANAGEMENT SYSTEM</h2>
<h3>Trader/Manager Login</h3>
<form action="" method="post">
<label>User name :</label>
<input id="email" name="email" type="text">
<label>Password :</label>
<input id="password" name="password" type="password"><br/><br/>
<input name="submit" type="submit" id="register" value=" Login ">
<span><?php echo $error; ?></span>
</form>
</div>
</body>
</html>