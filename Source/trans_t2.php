<?php

session_start();
$amt= $_SESSION["amount"];
$Client_id= $_SESSION["Client_id"];
 $comm=$_POST['comm'];
echo $pymt=$_POST['pymt'];
echo" ";
echo  $comm_amt=$_SESSION["comm_amt"];
echo " ";
echo $oil= $_SESSION["oil"];
echo " ";
echo $trader_id=$_SESSION["Trader_id"];
echo $amt_paid=$_POST["amt_paid"];

if($amt_paid-$amt>0){
echo "Sorry, You cant pay more amount than the purchase!!!!";
}else{

if($pymt=='no'){

          if($comm=='Cash'){
             
            $connection = mysqli_connect("localhost", "root", "India@1234"); // Establishing connection with server..
            $db = mysqli_select_db( $connection,"utd_oil");
        /*** query the database ***/
      

         $result=mysqli_query($connection,"SELECT * from account where Client_id='$_SESSION[Client_id]'");

        /*** loop over the results ***/
        while($row = mysqli_fetch_array($result,MYSQL_ASSOC))
        {
                $cash=$row['cash_reserves'];
                $oil_res=$row['oil_reserves'];
            }

           if($cash-$_SESSION["comm_amt"]>0){
             $transaction=rand(50001,90000);
             $cash=$cash-$_SESSION["comm_amt"];
              $trans=rand(90001,120000);
             $oil_res=$oil_res+$oil;


 $result1=mysqli_query($connection,"SELECT * from trader where Trader_id='$_SESSION[trader_id]'");

           while($row = mysqli_fetch_array($result1,MYSQL_ASSOC))
        {
                $t_comm=$row['Comm_oil'];
                $t_cash=$row['Comm_cash'];
            }

             $t_cash=$t_cash+$comm_amt;

             $query=mysqli_query($connection,"Update account set cash_reserves='$cash' , oil_reserves='$oil_res' where Client_id='$_SESSION[Client_id]'");
			  $query3=mysqli_query($connection,"Update trader set Comm_cash='$t_cash' where Trader_id='$_SESSION[Trader_id]'");
       
            $query1=mysqli_query($connection,"insert into transactions(Client_id,Transact_id,Trader_id,oil_qty,Amount,Status,Comm_type,Comm_paid,Trans_date,Amt_paid,Amt_left,Transact_type)
          values ( '$Client_id','$transaction','$trader_id','$oil','$amt','PROCESSED','CASH','$comm_amt',sysdate(),0,'$amt','BUY')");
            $query2=mysqli_query($connection,"insert into transact_log(Transact_id,Trader_id,Client_id,Amt_paid,T_date,Tid)
                                                               values('$transaction','$trader_id','$Client_id',0,sysdate(),'$trans')");
         if($query1){   
 echo "Thanks for Making Transactions with us!!!!!!!";
             echo "     Transaction Id is '$transaction'";
}
}else{

echo "  Sorry you dont have enough balance to make this transaction!!!!!!!! ";
}
             
          }else if ($comm=='Oil'){
         $comm_oil= $comm_amt/80;
$connection = mysqli_connect("localhost", "root", "India@1234"); // Establishing connection with server..
            $db = mysqli_select_db( $connection,"utd_oil");
        /*** query the database ***/
      

         $result=mysqli_query($connection,"SELECT * from account where Client_id='$_SESSION[Client_id]'");

        /*** loop over the results ***/
        while($row = mysqli_fetch_array($result,MYSQL_ASSOC))
        {
                $oil_res=$row['oil_reserves'];
                $cash=$row['cash_reserves'];
            }
                if($oil_res-$comm_oil>0){
                   $transaction=rand(50001,90000);
                  $oil_res=$oil_res-$comm_oil;
                   $trans=rand(90001,120000);

  
 $result1=mysqli_query($connection,"SELECT * from trader where Trader_id='$_SESSION[trader_id]'");

           while($row = mysqli_fetch_array($result1,MYSQL_ASSOC))
        {
                $t_comm=$row['Comm_oil'];
                $t_cash=$row['Comm_cash'];
            }


               $t_comm=$t_comm+$comm_oil;
                  
 $query=mysqli_query($connection,"Update account set oil_reserves='$oil_res' where Client_id='$_SESSION[Client_id]'");
      $query3=mysqli_query($connection,"Update trader set Comm_oil='$t_comm' where Trader_id='$_SESSION[Trader_id]'");
           
            $query1=mysqli_query($connection,"insert into transactions(Client_id,Transact_id,Trader_id,oil_qty,Amount,Status,Comm_type,Comm_paid,Trans_date,Amt_paid,Amt_left,Transact_type)
          values ( '$Client_id','$transaction','$trader_id','$oil','$amt','PROCESSED','OIL','$comm_oil',sysdate(),0,'$amt','BUY')");

            $query2=mysqli_query($connection,"insert into transact_log(Transact_id,Trader_id,Client_id,Amt_paid,T_date,Tid)
                                                               values('$transaction','$trader_id','$Client_id',0,sysdate(),'$trans')");
         if($query1){   
 echo "Thanks for Making Transactions with us!!!!!!!";
             echo "     Transaction Id is '$transaction'";
}else{
echo "some error with the transaction";
}


}
}
}else if($pymt=='yes' && $comm=='Cash'){

 $connection = mysqli_connect("localhost", "root", "India@1234"); // Establishing connection with server..
            $db = mysqli_select_db( $connection,"utd_oil");

$result=mysqli_query($connection,"SELECT * from account where Client_id='$_SESSION[Client_id]'");

 while($row = mysqli_fetch_array($result,MYSQL_ASSOC))
        {
                $cash=$row['cash_reserves'];
                $oil_res=$row['oil_reserves'];
            }

            $total= $comm_amt+$amt_paid;

              if($cash-$total>0){
               $transaction=rand(50001,90000);
               $trans=rand(90001,120000);
               $cash=$cash-$total;
               $amt_left=$amt-$amt_paid;
                 $oil_res=$oil_res+$oil;


          
 $result1=mysqli_query($connection,"SELECT * from trader where Trader_id='$_SESSION[trader_id]'");

           while($row = mysqli_fetch_array($result1,MYSQL_ASSOC))
        {
                $t_comm=$row['Comm_oil'];
                $t_cash=$row['Comm_cash'];
            }

            $t_cash=$t_cash+$comm_amt;

             $query=mysqli_query($connection,"Update account set cash_reserves='$cash',oil_reserves='$oil_res' where Client_id='$_SESSION[Client_id]'");
			 $query3=mysqli_query($connection,"Update trader set Comm_cash='$t_cash' where Trader_id='$_SESSION[Trader_id]'");
            $query1=mysqli_query($connection,"insert into transactions(Client_id,Transact_id,Trader_id,oil_qty,Amount,Status,Comm_type,Comm_paid,Trans_date,Amt_paid,Amt_left,Transact_type)
          values ( '$Client_id','$transaction','$trader_id','$oil','$amt','PROCESSED','CASH','$comm_amt',sysdate(),'$amt_paid','$amt_left','BUY')");

             $query2=mysqli_query($connection,"insert into transact_log(Transact_id,Trader_id,Client_id,Amt_paid,T_date,Tid)
                                                               values('$transaction','$trader_id','$Client_id','$amt_paid',sysdate(),'$trans')");

         if($query1){   
 echo "Thanks for Making Transactions with us!!!!!!!";
             echo "     Transaction Id is '$transaction'";
}


}else{
echo "You dont have Enough Balance in your account to make a transaction!!!!!!!";
}
}else if($pymt=='yes' && $comm=='Oil'){

$comm_oil= $comm_amt/80;
$connection = mysqli_connect("localhost", "root", "India@1234"); // Establishing connection with server..
            $db = mysqli_select_db( $connection,"utd_oil");
        /*** query the database ***/
      

         $result=mysqli_query($connection,"SELECT * from account where Client_id='$_SESSION[Client_id]'");

        /*** loop over the results ***/
        while($row = mysqli_fetch_array($result,MYSQL_ASSOC))
        {
                $oil_res=$row['oil_reserves'];
                
            }

          $result=mysqli_query($connection,"SELECT * from account where Client_id='$_SESSION[Client_id]'");

             while($row = mysqli_fetch_array($result,MYSQL_ASSOC))
             {
                $cash=$row['cash_reserves'];
                
             }

         if( $cash-$amt_paid>0 && $oil_res-$comm_oil>0){
         $transaction=rand(50001,90000);
         $trans=rand(90001,120000);
         $cash=$cash-$amt_paid;
         $oil_res=$oil_res-$comm_oil;
          $amt_left=$amt-$amt_paid;


 $result1=mysqli_query($connection,"SELECT * from trader where Trader_id='$_SESSION[trader_id]'");

           while($row = mysqli_fetch_array($result1,MYSQL_ASSOC))
        {
                $t_comm=$row['Comm_oil'];
                $t_cash=$row['Comm_cash'];
            }

                 $t_comm=$t_comm+$comm_oil;


         $query=mysqli_query($connection,"Update account set cash_reserves='$cash' where Client_id='$_SESSION[Client_id]'");
         $query1=mysqli_query($connection,"Update account set oil_reserves='$oil_res' where Client_id='$_SESSION[Client_id]'");
         $query3=mysqli_query($connection,"Update trader set Comm_oil='$t_comm' where Trader_id='$_SESSION[Trader_id]'");
          $query2=mysqli_query($connection,"insert into transactions(Client_id,Transact_id,Trader_id,oil_qty,Amount,Status,Comm_type,Comm_paid,Trans_date,Amt_paid,Amt_left,Transact_type)
          values ( '$Client_id','$transaction','$trader_id','$oil','$amt','PROCESSED','OIL','$comm_oil',sysdate(),'$amt_paid','$amt_left','BUY')");

            $query3=mysqli_query($connection,"insert into transact_log(Transact_id,Trader_id,Client_id,Amt_paid,T_date,Tid)
                                                               values('$transaction','$trader_id','$Client_id','$amt_paid',sysdate(),'$trans')");


         if($query2){   
              echo "Thanks for Making Transactions with us!!!!!!!";
             echo "     Transaction Id is '$transaction'";
}else{
echo "some error with the transaction";
}






}else{
echo " Sorry!!!! You Dont have enough funds to Make a Transaction!!!";
}



}
}
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


