<?php
session_start();
echo $_SESSION["Trader_id"];
echo $_SESSION["oil"];
echo $_SESSION["amount"];

$connection = mysqli_connect("localhost", "root", "India@1234"); // Establishing connection with server..
            $db = mysqli_select_db( $connection,"utd_oil");
        /*** query the database ***/
      

         $result=mysqli_query($connection,"SELECT * from account where Client_id='$_SESSION[Client_id]'");

        /*** loop over the results ***/
        while($row = mysqli_fetch_array($result,MYSQL_ASSOC))
        {
                $oil_res=$row['oil_reserves'];
                
            }

if($oil_res-$_SESSION["oil"]<0){
echo "Sorry!!!! You dont have enough Oil Reserves to sell.";
}else{

?>
<!DOCTYPE html>
<html>
<head>
<title>Welcome to the Transactions Page</title>
<!-- Include CSS File Here -->
<link rel="stylesheet" href="style1.css" type="text/css"/>
<!-- Include JS File Here -->
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>

</head>

<body>
<form class="form" method="post" action="t_sell2.php">
<p>Transaction in Progress!!!</p>


<div >
<p>
        <span class="label">Amount that will be Credited to your account:</span>
        <span class="value"> <?php echo $_SESSION["amount"] ?> $ </span>
    </p>
<p> Please Specify if you want to pay Commision Amount in Cash or Oil </p>

<input type="radio" name="comm" value="Cash" checked>Cash
<br>
<input type="radio" name="comm" value="Oil">Oil
<br>

<br>

<input type="submit" value="Continue">

</form>
</body>
</html>
<?php
}
?>