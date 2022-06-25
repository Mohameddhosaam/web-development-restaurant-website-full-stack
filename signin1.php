<?php
session_start();
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "grnd restaurant";
$conn = new mysqli($servername, $username, $password, $dbname);
if(isset($_POST['Submit'])){ 
       $sql="Select * from quality where Email ='".$_POST["Email"]."' and Password='".$_POST["Password"]."'";
       $result = mysqli_query($conn,$sql);	
if($result){	   
	     if($row=mysqli_fetch_array($result)){
		$_SESSION["ID"]=$row["ID"];
		$_SESSION["Name"]=$row["Name"];
		$_SESSION["Email"]=$row["Email"];
		$_SESSION["Password"]=$row["Password"];
		$_SESSION["Phone"]=$row["Phone"];
		$_SESSION["Role"]=3;
		header("Location:homeadmin.php");	
	}//end of if row
}
     $sql2="Select * from customers where Email ='".$_POST["Email"]."' and Password='".$_POST["Password"]."'";
     $result2 = mysqli_query($conn,$sql2);
if($result2){	 
	   if($row=mysqli_fetch_array($result2)){
		$_SESSION["ID"]=$row["ID"];
		$_SESSION["Name"]=$row["Name"];
		$_SESSION["Email"]=$row["Email"];
		$_SESSION["Password"]=$row["Password"];
		$_SESSION["Phone"]=$row["Phone"];
		$_SESSION["Status"]=$row["Status"];
		$_SESSION["Role"]=1;
		if($_SESSION["Status"]==0){
			die("Your account is now deactivated by the admin, check again later.");
		}
		header("Location:hometest.php");	
	}//end of if row
}	
	$sql3="Select * from cashier where Email ='".$_POST["Email"]."' and Password='".$_POST["Password"]."'";
	$result3 = mysqli_query($conn,$sql3);	
if($result3){	
	if($row=mysqli_fetch_array($result3))	
	{
		$_SESSION["ID"]=$row["ID"];
		$_SESSION["Name"]=$row["Name"];
		$_SESSION["Email"]=$row["Email"];
		$_SESSION["Password"]=$row["Password"];
		$_SESSION["Phone"]=$row["Phone"];
		$_SESSION["Status"]=$row["Status"];
		$_SESSION["Role"]=2;
		if($_SESSION["Status"]==0){
			die("Your account is now deactivated by the admin, check again later.");
		}
	    header("Location:cashiermenutest.php");
	
	} //end of if $row
}
echo "Invalid Email or Password";
}//end of post submit
?>

<html>
<head>
<style>
.email-ok{
	color:#2fC332
}
.email-wrong{
	color:#D60202
}
</style>
<script>src= "https://code.jquery.com/jquery-2.2.1.min.js" type="text/javascript"></script>
<script>
/*function validate(){
	
	jQuery.ajax(
	{
		
		url: "validation.php",
		data: 'Email='+$("#Email").val(),
		type: "POST",
		success: function (data){
			$("#message").html(data);
		}
});
}*/
</script>
</head>
<body>
<?php
include "style1.css"; 
include "navtest.php"; 
?>
<div class="imgcontainer">
	<img src="lastlogo4.png" alt="img">
	</div>
<div class="container">
<form action="" method="post">
<fieldset>
<input type="email" placeholder="Enter Email" name="Email" id="Email" onkeyup()="validate()" required><br><br>
<div id ="message"></div><br><br>

<input type="password" placeholder="Enter Password" name="Password" required>
<button type="submit" name="Submit">Login</button>

<br>Don't have an account? <br><button type="submit" class="button" onclick="window.location.href='/signup1.php'">Register</button>

 </fieldset>
</form>
</body>
</html>









