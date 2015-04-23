<?php
session_start();
//$Client_id=$_SESSION["Client_id"];
?>

<!DOCTYPE html>
<html>
	<head>
	<title>Welcome to Oil Management System </title>
	</head>
	<body>

	<?php
	// Connect to database server
	$connection=mysqli_connect("localhost", "root", "India@1234");

	// Select database
	$db=mysqli_select_db($connection,"utd_oil");

	// SQL query
	$strSQL = "SELECT * FROM client where Client_id= $_SESSION[Client_id]";

	// Execute the query (the recordset $rs contains the result)
	$rs = mysqli_query($connection,$strSQL);
	
	// Loop the recordset $rs
	// Each row will be made into an array ($row) using mysql_fetch_array
	while($row = mysqli_fetch_array($rs,MYSQL_ASSOC)){ 

	   // Write the value of the column FirstName (which is now in the array $row)
	 // echo $row["Fname"] . "<br />";
            
            $fname= $row["Fname"] ; 
            $lname=$row["Lname"];
            $phn=$row["Phn_no"];
            $email=$row["email_id"];
            $cell=$row["cell_no"];
            $role=$row["role"];

	}  

         $st= "SELECT * FROM address where Client_id=$_SESSION[Client_id]";

         $resul=mysqli_query($connection,$st);

        while( $res=mysqli_fetch_array($resul,MYSQL_ASSOC) ){

         $state=$res["State"];
         $city=$res["City"];
          
}
        
          $acc="SELECT * FROM account where Client_id=$_SESSION[Client_id]";

          $result=mysqli_query($connection,$acc);

          while( $res=mysqli_fetch_array($result,MYSQL_ASSOC) ){

              $account_id= $res["Account_id"];
              $oil_reserves=$res["oil_reserves"];
              $cash_reserves=$res["cash_reserves"];
              $barrel_history=$res["barrel_history"];
              
}


	// Close the database connection
	mysqli_close($connection);
	
?>
        <div >
<p>
        <span class="label">Client Id:</span>
        <span class="value"> <?php echo $_SESSION["Client_id"]?></span>
    </p>
    <p>
        <span class="label">First Name:</span>
        <span class="value"> <?php echo $fname ?></span>
    </p>
    <p>
        <span class="label">Last: </span>
        <span class="value"> <?php echo $lname ?> </span>
    </p>
    <p>
        <span class="label">Email:</span>
        <span class="value"> <?php echo $email ?></span>
    </p>
      <p>
        <span class="label">Phone Number:</span>
        <span class="value"> <?php echo $phn ?></span>
    </p>
    <p>
        <span class="label">Cell Number :</span>
        <span class="value"> <?php echo $cell ?> </span>
    </p>
    <p>
        <span class="label">Current Status:</span>
        <span class="value"> <?php echo $role ?></span>
    </p>
     <p>
        <span class="label">State:</span>
        <span class="value"> <?php echo $state ?></span>
    </p>
    <p>
        <span class="label">City: </span>
        <span class="value"> <?php echo $city ?> </span>
    </p>
   <p>
        <span class="label">Account Id:</span>
        <span class="value"> <?php echo $account_id ?></span>
    </p>
    <p>
        <span class="label">Cash Reserves: </span>
        <span class="value"> <?php echo $cash_reserves ?> </span>
    </p>
    <p>
        <span class="label">Oil Reserves:</span>
        <span class="value"> <?php echo $oil_reserves ?></span>
    </p>
     <p>
        <span class="label">Barrel_History:</span>
        <span class="value"> <?php echo $barrel_history ?></span>
    </p>
    
</div>




	</body>
	</html>
