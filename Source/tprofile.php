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
<b id="welcome">Welcome :</b> <?php echo $_SESSION["Trader_id"];  ?>
<nav>
	<ul>
		
		<li><a href="trans_t.php">Make a Transaction</a></li>
		<li><a href="chistory.php">Client history</a>
		
                <li><a href="cancel.php">Cancel Transaction</a></li>
                 <li><a href="logout.php">Logout</a></li>
	</ul>
</nav>

</div>
</body>
</html>
