<?php

session_start();
echo $amt= $_SESSION["amount"];
echo $Client_id= $_SESSION["Client_id"];
 echo $comm=$_POST['comm'];

echo  $comm_amt=$_SESSION["comm_amt"];
echo $oil= $_SESSION["oil"];
echo $trader_id=$_SESSION["trader_id"];



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
             $cash=$cash+$amt;
             $oil_res=$oil_res-$oil;

$result1=mysqli_query($connection,"SELECT * from trader where Trader_id='$_SESSION[trader_id]'");

           while($row = mysqli_fetch_array($result1,MYSQL_ASSOC))
        {
                $t_comm=$row['Comm_oil'];
                $t_cash=$row['Comm_cash'];
            }


                  $t_cash=$t_cash+$comm_amt;

             $query=mysqli_query($connection,"Update account set cash_reserves='$cash', oil_reserves='$oil_res' where Client_id='$_SESSION[Client_id]'");
             $query3=mysqli_query($connection,"Update trader set Comm_cash='$t_cash' where Trader_id='$trader_id'");
            $query1=mysqli_query($connection,"insert into transactions(Client_id,Transact_id,Trader_id,oil_qty,Amount,Status,Comm_type,Comm_paid,Trans_date,Amt_paid,Amt_left,Transact_type)
          values ( '$Client_id','$transaction','$trader_id','$oil','$amt','PROCESSED','CASH','$comm_amt',sysdate(),'NA','NA','SELL')");
           
         if($query1){   
 echo "Thanks for Making Transactions with us!!!!!!!";
             echo "     Transaction Id is '$transaction'";
}
}else{

echo "Sorry you dont have enought balance to make this transaction!!!!!!!! ";
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
                
            }
                if($oil_res-$comm_oil-$oil>0){
                   $transaction=rand(50001,90000);
                  $oil_res=$oil_res-$comm_oil;
                  $oil_res=$oil_res-$oil;

$result1=mysqli_query($connection,"SELECT * from trader where Trader_id='$_SESSION[trader_id]'");

           while($row = mysqli_fetch_array($result1,MYSQL_ASSOC))
        {
                $t_comm=$row['Comm_oil'];
                $t_cash=$row['Comm_cash'];
            }

                   $t_comm=$t_comm+$comm_oil;

 $query=mysqli_query($connection,"Update account set oil_reserves='$oil_res' where Client_id='$_SESSION[Client_id]'");
             $query3=mysqli_query($connection,"Update trader set Comm_oil='$t_comm' where Trader_id='$trader_id'");       
            $query1=mysqli_query($connection,"insert into transactions(Client_id,Transact_id,Trader_id,oil_qty,Amount,Status,Comm_type,Comm_paid,Trans_date,Amt_paid,Amt_left,Transact_type)
          values ( '$Client_id','$transaction','$trader_id','$oil','$amt','PROCESSED','OIL','$comm_oil',sysdate(),'NA','NA','SELL')");

         
         if($query1){   
 echo "Thanks for Making Transactions with us!!!!!!!";
             echo "     Transaction Id is '$transaction'";
}else{
echo "some error with the transaction";
}

}
}
?>

