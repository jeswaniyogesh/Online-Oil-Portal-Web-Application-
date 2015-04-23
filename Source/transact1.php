
<?php
 session_start();
 $transact=$_POST['transact']; // Fetching Values from URL.
echo $oil_qty=$_POST['oil_qty'];
 $traders= $_POST['traders'];
 $amount= $oil_qty*80;
$comm_amt=$amount*0.05;
$_SESSION["comm_amt"]=$comm_amt;
$_SESSION["amount"]=$amount;
$_SESSION["trader_id"]=$traders;
$_SESSION["oil"]=$oil_qty; 
$connection = mysqli_connect("localhost", "root", "India@1234"); // Establishing connection with server..
            $db = mysqli_select_db( $connection,"utd_oil");
        /*** query the database ***/
      

         $result=mysqli_query($connection,"SELECT * from client where Client_id='$_SESSION[Client_id]'");

         

        /*** loop over the results ***/
        while($row = mysqli_fetch_array($result,MYSQL_ASSOC)){
     
         $role=$row['role'];
         }

     if($role=='Gold'){

     $comm_amt=$amount*0.035;
     $_SESSION["comm_amt"]=$comm_amt;

}else{

  $result1=mysqli_query($connection,"Select extract(month from Trans_date) as month, sum(oil_qty)  from transactions where Client_id='$_SESSION[Client_id]' and 
                         Status='PROCESSED' group by month");
              
                    while($row = mysqli_fetch_array($result1,MYSQL_ASSOC)){

                           if($row['sum(oil_qty)']>=30){

                         $query=mysqli_query($connection,"Update client set role='Gold' where Client_id='$_SESSION[Client_id]'");
                            $comm_amt=$amount*0.035;
                           $_SESSION["comm_amt"]=$comm_amt;



           } 
             
     }


}




if($transact=='Sell'){
   
header('Location: sell1.php');    
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
<form class="form" method="post" action="transact2.php">
<p>Transaction in Progress!!!</p>


<div >
<p>
        <span class="label">Amount for Oil:</span>
        <span class="value"> <?php echo $amount?> $</span>
    </p>



<p> Do you want to make a payment for your current transaction?</p>

<input type="radio" name="pymt" value="yes" checked>YES
<br>
<input type="radio" name="pymt" value="no">NO
<br>
<br>
<dt>
<p>If Yes, Please specify the Amount you want to pay, or keep it blank:</p><br>
<input type="text" name="amt_paid">
<br>
</dt>



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





