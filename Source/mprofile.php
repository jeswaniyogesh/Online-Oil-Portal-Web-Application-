<?php
session_start();
?>
<!DOCTYPE html>
<html>
<head>
<title>Your Home Page</title>
<link href="profile.css" rel="stylesheet" type="text/css">
</head>
<body>
<div class="container">
<div class="main">
<b id="welcome">Welcome :</b> <?php echo $_SESSION["m_id"];  ?>
<nav>
	<ul>
		
		<li><a href="cdetail.php">Client Details</a></li>
		<li><a href="tdetail.php">Trader Details</a></li>
		<li><a href="m_trans_his.html"> Transaction History</a>
		<li><a href="logout.php">Logout</a></li>
	</ul>
</nav>

</div>
</body>
</html>
