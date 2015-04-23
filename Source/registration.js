$(document).ready(function() {
$("#register").click(function() {
var fname = $("#fname").val();
var lname = $("#lname").val();
var phno = $("#phno").val();
var cellno = $("#cellno").val();
var street = $("#street").val();
var aptno = $("#aptno").val();
var city = $("#city").val();
var state = $("#state").val();
var zip = $("#zip").val();
var email = $("#email").val();
var password = $("#password").val();
var cpassword = $("#cpassword").val();
if (fname == '' || phno == '' || street == '' || aptno == '' || city == '' || state == '' || zip == '' || email == '' || password == '' || cpassword == '') {
alert("Please fill all fields...!!!!!!");
} else if ((zip.length)!=5) {
alert("Invalid Zip Code!"); 
} else if ((password.length) < 8) {
alert("Password should atleast 8 character in length...!!!!!!");
} else if (!(password).match(cpassword)) {
alert("Your passwords don't match. Try again?");
} else {
$.post("register.php", {
fname1: fname,
lname1: lname,
phno1: phno,
cellno1: cellno,
street1: street,
aptno1: aptno,
city1: city,
state1: state,
zip1: zip,
email1: email,
password1: password
}, function(data) {
if (data == 'You have Successfully Registered.....') {
$("form")[0].reset();
}
alert(data);
});
}
});
});