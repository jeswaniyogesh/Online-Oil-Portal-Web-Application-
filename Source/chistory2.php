<?php
session_start(); 
?>


<html>
	<head>
	<title> client history page </title>
	<link href="profile.css" rel="stylesheet" type="text/css">
	</head>
	<body>
	<label> <b><u>CLIENT DETAILS:</u></b></label><br/><br/><br/>
	<?php
	


	// Connect to database server
	$connection=mysqli_connect("localhost", "root", "India@1234");

	// Select database
	$db=mysqli_select_db($connection,"utd_oil");
	$Client_id=$_POST['clients'];
	echo $Client_id;
	

	// SQL query
	$rs = mysqli_query($connection,"SELECT * FROM client c,address a,account a1 where c.Client_id = '$Client_id' and c.Client_id=a.Client_id and c.Client_id=a1.Client_id and a.Client_id=a1.Client_id");
	

	// Execute the query (the recordset $rs contains the result)
	//$rs = mysqli_query($connection,$strSQL);
	

	 echo "<table>
	 
			<tr>
			
				<td>Client id:</td>
				<td>First Name: </td>
				<td>Last Name: </td>
				<td>Email: </td>
				<td>Phone Number: </td>
				<td>Cell Number: </td>
				<td>Current Status: </td>
				<td>City: </td>
				<td>State: </td>
				<td>Account ID: </td>
				<td>Cash Reserves: </td>
				<td>Oil Reserves: </td>
				<td>Barrel History: </td>
				</tr>";
		
		
				while($row = mysqli_fetch_array($rs,MYSQL_ASSOC))
		{	
					echo "<tr><td>".$row['Client_id']."</td>";
							echo "<td>".$row['Fname']. "</td>";
							echo "<td>".$row['Lname']. "</td>";
							echo "<td>".$row['email_id']. "</td>";
							echo "<td>".$row['Phn_no']. "</td>";
							echo "<td>".$row['cell_no']. "</td>";
							echo "<td>".$row['role']. "</td>";
							echo "<td>".$row['City']. "</td>";
							echo "<td>".$row['State']. "</td>";
							echo "<td>".$row['Account_id']. "</td>";
							echo "<td>".$row['cash_reserves']. "</td>";
							echo "<td>".$row['oil_reserves']. "</td>";
							echo "<td>".$row['barrel_history']. "</td>";
							
	
		}
	echo "</table>";
	
	mysqli_close($connection);
	
?>
	
	

    
    


</body>
</html>

