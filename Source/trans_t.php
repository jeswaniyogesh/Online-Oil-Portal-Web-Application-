<!DOCTYPE html>
<html>
<head>
<title>Welcome to the Transactions Page</title>
<!-- Include CSS File Here -->
<link rel="stylesheet" href="profile.css" type="text/css"/>
<!-- Include JS File Here -->
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
</head>
<style>
 // body {background-color:lightgray}
  h1   {color:blue}
  p    {color:green}
</style>
<body>
<div class="transact">
<div class="main">
<form class="form" method="post" action="trans_t1.php">




<h1><b> Welcome  </b></h1>

 <p>
Please Specify the type of Transaction you want to Make 
</p>
<input type="radio" name="transact" value="Buy" checked>Buy
<br>
<input type="radio" name="transact" value="Sell">Sell
<br>
<br>
<p>Enter The Quantity of Oil in Barrels:</p><br>
<input type="text" name="oil_qty">
<br>




<dt>Please Choose The Client to Make a Transaction</dt><br>
<dd>
<select name="clients">
<?php

    try
    {

        $connection = mysqli_connect("localhost", "root", "India@1234"); // Establishing connection with server..
        $db = mysqli_select_db( $connection,"utd_oil");
        /*** query the database ***/
      

         $result=mysqli_query($connection,"SELECT Fname,Client_id from client");

        /*** loop over the results ***/
        while($row = mysqli_fetch_array($result,MYSQL_ASSOC))
        {
            /*** create the options ***/
            echo '<option value="'.$row['Client_id'].'"';
           
            echo '>'. $row['Fname'] . '</option>'."\n";
        }
    }
    catch(PDOException $e)
    {
        echo 'No Results';
    }
?>
</select>
</dd>
</dl>
<br><br>
<input type="submit" value="Continue">
</form>
</body>
</html>