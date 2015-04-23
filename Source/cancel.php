<!DOCTYPE html>
<html>
<head>
<title>Welcome to the Transactions Page</title>
<!-- Include CSS File Here -->
<link rel="stylesheet" href="style1.css" type="text/css"/>
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

<h1><b> Welcome  </b></h1>
 <script src="cancel.js"></script>
<dt>Please Choose The Client for which you want to Cancel a Transaction</dt><br>
<dd>
<select id="clients">
<?php
 session_start();

    try
    {

        $connection = mysqli_connect("localhost", "root", "India@1234"); // Establishing connection with server..
        $db = mysqli_select_db( $connection,"utd_oil");
        /*** query the database ***/
      

         $result=mysqli_query($connection,"SELECT distinct(Client_id) from transactions where Trader_id='$_SESSION[Trader_id]'");

        /*** loop over the results ***/
        while($row = mysqli_fetch_array($result,MYSQL_ASSOC))
        {
            /*** create the options ***/
            echo '<option value="'.$row['Client_id'].'"';
           
            echo '>'. $row['Client_id'] . '</option>'."\n";
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

<input id="btn1" onclick="trans()" type="submit" value="Get Transactions">




</body>
</html>
<div id="1">
</div>
