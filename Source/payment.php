
<form class="form" method="post" action="payment1.php">
<dt>Please Chose The Transaction id  to make a Payment</dt><br>
<dd>



<select name="transacts">

<?php
session_start();
    try
    {

        $connection = mysqli_connect("localhost", "root", "India@1234"); // Establishing connection with server..
        $db = mysqli_select_db( $connection,"utd_oil");
        /*** query the database ***/
      

         $result=mysqli_query($connection,"SELECT * from transactions where Client_id='$_SESSION[Client_id]' and transact_type='BUY' and Amount-Amt_paid>0 and Status='PROCESSED';");

        /*** loop over the results ***/
        while($row = mysqli_fetch_array($result,MYSQL_ASSOC))
        {
            /*** create the options ***/
            echo '<option value="'.$row['Transact_id'].'"';
           
            echo '>'. $row['Transact_id'] . '</option>'."\n";
        }
    }
    catch(PDOException $e)
    {
        echo 'No Results';
    }





?>


</select>

</dd>
</dl>
<br><br>

<dt>Please Chose The Trader to Make a Transaction</dt><br>
<dd>
<select name="traders">
<?php

    try
    {

        $connection = mysqli_connect("localhost", "root", "India@1234"); // Establishing connection with server..
        $db = mysqli_select_db( $connection,"utd_oil");
        /*** query the database ***/
      

         $result=mysqli_query($connection,"SELECT T_name,Trader_id from trader");

        /*** loop over the results ***/
        while($row = mysqli_fetch_array($result,MYSQL_ASSOC))
        {
            /*** create the options ***/
            echo '<option value="'.$row['Trader_id'].'"';
           
            echo '>'. $row['T_name'] . '</option>'."\n";
        }
    }
    catch(PDOException $e)
    {
        echo 'No Results';
    }
?>
</select>
</dd>
</dl>
<br><br>

<input type="submit" value="Continue">

</form>