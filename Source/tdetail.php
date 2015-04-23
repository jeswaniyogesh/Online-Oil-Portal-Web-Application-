<?php
session_start();
?>

<!DOCTYPE html>
<html>
	<head>
	<title>Welcome to Oil Management System </title>
	<link href="profile.css" rel="stylesheet" type="text/css">
	</head>
	<body>
	<label> <b><u>TRADER DETAILS:</u></b></label><br/><br/><br/>
	

	<?php
	// Connect to database server
	$connection=mysqli_connect("localhost", "root", "India@1234");

	// Select database
	$db=mysqli_select_db($connection,"utd_oil");
	

	// SQL query
	$strSQL = "SELECT * FROM trader";
	

	// Execute the query (the recordset $rs contains the result)
	$rs = mysqli_query($connection,$strSQL);
	

	 echo "<table>
	 
			<tr>
			
				<td>Trader id:</td>
				<td>Name</td>
				<td>Email: </td>
				<td>Phone number: </td>
				<td>Commission(Oil):</td>
				<td>Commission(cash): </td>
				</tr>";
		
		
		while($row = mysqli_fetch_array($rs,MYSQL_ASSOC))
		{	
					echo "<tr><td>".$row['Trader_id']."</td>";
							echo "<td>".$row['T_name']. "</td>";
							echo "<td>".$row['T_email']. "</td>";
							echo "<td>".$row['Tphn_no']. "</td>";
							echo "<td>".$row['Comm_oil']. "</td>";
							echo "<td>".$row['Comm_cash']. "</td>";
							
							
	
		}
	echo "</table>";
	
	mysqli_close($connection);
	
?>
	
	

    
    


</body>
</html>

