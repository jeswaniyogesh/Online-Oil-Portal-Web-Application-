<?php
session_start();
echo $amt_paid=$_POST["amt_paid"];
echo $amt_left=$_SESSION["amt_left"];
echo $trader_id=$_SESSION["trader_id"];
echo $transact_id=$_SESSION["transact_id"];
echo $pre_amt=$_SESSION["pre_amt"];
$Client_id=$_SESSION["Client_id"];
$connection = mysqli_connect("localhost", "root", "India@1234"); // Establishing connection with server..
            $db = mysqli_select_db( $connection,"utd_oil");
        /*** query the database ***/
   
if($amt_left-$amt_paid<0){

echo "Sorry!!! You cant pay more amount.";
}else{

$amt_left=$amt_left-$amt_paid;
$pre_amt=$pre_amt+$amt_paid;

 $trans=rand(90001,120000);
$result=mysqli_query($connection,"update transactions set Amt_left='$amt_left' , Amt_paid='$pre_amt' where Transact_id='$transact_id' ");

 $query2=mysqli_query($connection,"insert into transact_log(Transact_id,Trader_id,Client_id,Amt_paid,T_date,Tid)
                                                               values('$transact_id','$trader_id','$Client_id','$amt_paid',sysdate(),'$trans')");
if($query2){
echo "Your payment has been done successfully!!!!";
echo " Transaction id is '$trans'";

}

}

?>
