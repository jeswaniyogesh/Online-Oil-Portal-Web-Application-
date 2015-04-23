<?php
session_start();
$Client_id=$_SESSION["Client_id"];
$transact_id = $_POST["transacts"];
echo $transact_id;

$connection = mysqli_connect("localhost", "root", "India@1234"); // Establishing connection with server..
            $db = mysqli_select_db( $connection,"utd_oil");
        /*** query the database ***/

$result=mysqli_query($connection,"Select * from transactions where Transact_id='$transact_id'");

echo "<table><tr><td>Transact_id</td>
<td>Trader_id</td>
<td>Oil_Qty</td>
<td>Total Amount</td>
<td>Status</td></td>
<td>Comm_type</td>
<td>Comm_paid</td>
<td>Transaction Date</td>
<td>Amount Paid</td></td>
<td>Amount Left</td>
<td>Transaction Type</td></tr>";



while($row = mysqli_fetch_array($result)){
	
     $transact_type=$row['Transact_type'];
     $oil_qty=$row['oil_qty'];
     $amount=$row['Amount'];
     $amt_paid=$row['Amt_Paid'];
  echo "<tr><td>". $row['Transact_id'] ."</td>";
  echo "<td>". $row['Trader_id'] ."</td>";
  echo "<td>". $row['oil_qty'] ."</td>";
  echo "<td>". $row['Amount'] ."</td>";
  echo "<td>". $row['Status'] ."</td>";
  echo "<td>". $row['Comm_type'] ."</td>";
  echo "<td>". $row['Comm_paid'] ."</td>";
  echo "<td>". $row['Trans_date'] ."</td>";
   echo "<td>". $row['Amt_Paid'] ."</td>";  
 echo "<td>". $row['Amt_left'] ."</td>";
   echo "<td>". $row['Transact_type'] ."</td></tr>";  

 }
echo "</table>";


if($transact_type='BUY'){


  $result=mysqli_query($connection,"Select * from account  where Client_id='$Client_id'");      

    $row = mysqli_fetch_array($result);

    $oil_reserves=$row['oil_reserves'];
    $cash_reserves=$row['cash_reserves'];

    $oil_reserves=$oil_reserves-$oil_qty;
    $cash_reserves=$cash_reserves+$amt_paid;

$result1=mysqli_query($connection,"update account set oil_reserves='$oil_reserves', cash_reserves='$cash_reserves' where Client_id='$Client_id'");

$result2=mysqli_query($connection,"update transactions set Status='CANCELLED' where Transact_id='$transact_id'");

if($result2){
echo "Your transaction has been cancelled";
}else{
echo "Some error!!!!!";
}




} else if($transact_type='SELL'){

$result=mysqli_query($connection,"Select * from account  where Client_id='$Client_id'");      

    $row = mysqli_fetch_array($result);

    $oil_reserves=$row['oil_reserves'];
    $cash_reserves=$row['cash_reserves'];

    $oil_reserves=$oil_reserves+$oil_qty;
    $cash_reserves=$cash_reserves-$amount;

$result1=mysqli_query($connection,"update account set oil_reserves='$oil_reserves', cash_reserves='$cash_reserves' where Client_id='$Client_id'");

$result2=mysqli_query($connection,"update transactions set Status='CANCELLED' where Transact_id='$transact_id'");

if($result2){
echo "Your transaction has been cancelled";
}else{
echo "Some error!!!!!";
}

}else {

echo "noone";

}



$result=mysqli_query($connection,"Select * from transactions where Transact_id='$transact_id'");

echo "<table><tr><td>Transact_id</td>
<td>Trader_id</td>
<td>Oil_Qty</td>
<td>Total Amount</td>
<td>Status</td></td>
<td>Comm_type</td>
<td>Comm_paid</td>
<td>Transaction Date</td>
<td>Amount Paid</td></td>
<td>Amount Left</td>
<td>Transaction Type</td></tr>";



while($row = mysqli_fetch_array($result)){
	
     $transact_type=$row['Transact_type'];
     $oil_qty=$row['oil_qty'];
     $amount=$row['Amount'];
     $amt_paid=$row['Amt_Paid'];
  echo "<tr><td>". $row['Transact_id'] ."</td>";
  echo "<td>". $row['Trader_id'] ."</td>";
  echo "<td>". $row['oil_qty'] ."</td>";
  echo "<td>". $row['Amount'] ."</td>";
  echo "<td>". $row['Status'] ."</td>";
  echo "<td>". $row['Comm_type'] ."</td>";
  echo "<td>". $row['Comm_paid'] ."</td>";
  echo "<td>". $row['Trans_date'] ."</td>";
   echo "<td>". $row['Amt_Paid'] ."</td>";  
 echo "<td>". $row['Amt_left'] ."</td>";
   echo "<td>". $row['Transact_type'] ."</td></tr>";  

 }
echo "</table>";

?>
   
 

