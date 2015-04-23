<?php
$q = $_GET['q'];
$g = $_GET['g'];

$connection = mysqli_connect("localhost", "root", "India@1234"); // Establishing connection with server..
$db = mysqli_select_db( $connection,"utd_oil"); // Selecting Database.


$sql = "SELECT Tid,Transact_id,Trader_id,Client_id,Amt_paid, T_date from transact_log where T_date between '$q' and '$g'";
$result = mysqli_query($connection,$sql);
$data = mysqli_num_rows($result);

if($data>0){
	echo "<table><tr><td>Tid</td>
	<td>Transact_id</td>
<td>Trader_id</td>
<td>Client_id</td>
<td>Amt_paid</td>
<td>T_date</td></tr>";

while($row = mysqli_fetch_array($result)){
	
	

  echo "<tr><td>". $row['Tid'] ."</td>";
  echo "<td>". $row['Transact_id'] ."</td>";
  echo "<td>". $row['Trader_id'] ."</td>";
  echo "<td>". $row['Client_id'] ."</td>";
  echo "<td>". $row['Amt_paid'] ."</td>";
  echo "<td>". $row['T_date'] ."</td></tr>";
  
  }
echo "</table>";
}
else{
	echo "invalid date format";
}

mysqli_close($connection);

?>

