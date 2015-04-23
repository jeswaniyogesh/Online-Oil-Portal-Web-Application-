

<html>
<head>
<title>Welcome to the client history page</title>
<!-- Include CSS File Here -->
<link rel="stylesheet" href="profile.css" type="text/css"/>
<dt>Please Choose The Client to get his history</dt><br>
<dd>
<body>
<form class="form" method="post" action="chistory2.php">
<select name="clients">
<?php

    try
    {

        $connection = mysqli_connect("localhost", "root", "India@1234"); // Establishing connection with server..
        $db = mysqli_select_db( $connection,"utd_oil");
        /*** query the database ***/
      

         $result=mysqli_query($connection,"SELECT Fname,Client_id from client");

        /*** loop over the results ***/
        while($row = mysqli_fetch_array($result,MYSQL_ASSOC))
        {
            /*** create the options ***/
            echo '<option value="'.$row['Client_id'].'"';
           
            echo '>'. $row['Fname'] . '</option>'."\n";
        }
    }
    catch(PDOException $e)
    {
        echo 'No Results';
    }
?>

</select>
</dd>
<input type="submit" name="Search" value="continue" id="register">
</form>
</body>
</html>
