
<?php
session_start();
$Client_id=$_SESSION["Client_id"];
$connection = mysqli_connect("localhost", "root", "India@1234"); // Establishing connection with server..
            $db = mysqli_select_db( $connection,"utd_oil");
        /*** query the database ***/

$result=mysqli_query($connection,"Select * from transactions where Client_id='$Client_id'");

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