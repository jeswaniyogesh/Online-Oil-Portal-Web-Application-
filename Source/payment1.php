<?php
session_start();
echo $transact_id=$_POST["transacts"];
echo $trader_id=$_POST["traders"];

$_SESSION["transact_id"]=$transact_id;
$_SESSION["trader_id"]=$trader_id;

$connection = mysqli_connect("localhost", "root", "India@1234"); // Establishing connection with server..
            $db = mysqli_select_db( $connection,"utd_oil");
        /*** query the database ***/
      

         $result=mysqli_query($connection,"SELECT * from transactions where Transact_id='$transact_id'");

while($row = mysqli_fetch_array($result,MYSQL_ASSOC))
        {
                $amt_left=$row['Amt_left'];
                $pre_amt=$row['Amt_Paid'];
                
            }
$_SESSION["amt_left"]=$amt_left;
$_SESSION["pre_amt"]=$pre_amt;
?>

<form class="form" method="post" action="payment2.php">
<div >
<p>
        <span class="label">Amount Left to be paid for this Transaction:</span>
        <span class="value"> <?php echo $amt_left?>$</span>
    </p>

<p>Please specify the Amount you want to pay for this transaction:</p>
<input type="text" name="amt_paid">
<br>

<input type="submit" value="Continue">
<br>
<br>
</form>