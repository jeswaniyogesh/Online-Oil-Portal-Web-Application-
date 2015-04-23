<?php




error_reporting(E_ALL ^ E_DEPRECATED);
$connection = mysql_connect("localhost", "root", "India@1234"); // Establishing connection with server..
$db = mysql_select_db("utd_oil", $connection); // Selecting Database.
$fname=$_POST['fname1']; // Fetching Values from URL.
$lname=$_POST['lname1'];
$phno=$_POST['phno1'];
$cellno=$_POST['cellno1'];
$street=$_POST['street1'];
$aptno=$_POST['aptno1'];
$city=$_POST['city1'];
$state=$_POST['state1'];
$zip=$_POST['zip1'];
$email=$_POST['email1'];
$password= ($_POST['password1']); // Password Encryption, If you like you can also leave sha1.
// Check if e-mail address syntax is valid or not
$email = filter_var($email, FILTER_SANITIZE_EMAIL); // Sanitizing email(Remove unexpected symbol like <,>,?,#,!, etc.)
if (!filter_var($email, FILTER_VALIDATE_EMAIL)){
echo "Invalid Email.......";
}else{
$result = mysql_query("SELECT * from client_login where email_id='$email'");
$data = mysql_num_rows($result);
if(($data)==0){
$unique=rand(1000,19999);
$account=rand(20000,50000);
$query = mysql_query("insert into client(Client_id, Fname, Lname, Phn_no, cell_no, email_id, role) values ('$unique', '$fname', '$lname', '$phno', '$cellno',  '$email', 'Silver')"); // Insert query
$query2=mysql_query("insert into client_login(email_id,password,Client_id) values('$email','$password','$unique')");
$query1=mysql_query("insert into address(Street,City,State,Zip,Apt_no,Client_id) values('$street', '$city', '$state', '$zip','$aptno','$unique')");
$query3=mysql_query("insert into account(Account_id,oil_reserves,cash_reserves,barrel_history,Client_id) values('$account',75,5000,0,'$unique')");
if($query1){
echo "You have Successfully Registered.....";
echo "your client id is";
echo "$unique";
echo "Your Account id is";
echo "$account";



}else
{
echo "Error....!!";
}
}else{
echo "This email is already registered, Please try another email...";
}
}
mysql_close ($connection);
?>