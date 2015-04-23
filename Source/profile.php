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
<b id="welcome">Welcome :</b> <?php echo $_SESSION["Client_id"];  ?>
<nav>
	<ul>
		<li><a href="test2.php"><label>Profile</label></a>
		<li><a href="transaction.php">Transaction</a></li>
                         
		<li><a href="history.php"><label>Txn History</label></a>
		</li>
		<li><a href="payment.php">Make a Payment</a></li>
		<li><a href="logout.php">Logout</a></li>
	</ul>
</nav>

</div>
</body>
</html>
