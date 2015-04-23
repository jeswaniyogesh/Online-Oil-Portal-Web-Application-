<?php
$Client_id = $_GET['q'];

 ?>

<form class="form" method="post" action="cancel2.php">
<dt>Please Choose the Transaction Id to cancel</dt><br>
<dd>

<select name="transacts"  >

<?php
session_start();
$_SESSION["Client_id"]=$Client_id;
    try
    {

        $connection = mysqli_connect("localhost", "root", "India@1234"); // Establishing connection with server..
        $db = mysqli_select_db( $connection,"utd_oil");
        /*** query the database ***/
      

         $result=mysqli_query($connection,"SELECT * from transactions where Client_id='$Client_id' and Status='PROCESSED';");

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
<input type="submit" value="Continue">


</dd>
</dl>
</form>
<br><br>



