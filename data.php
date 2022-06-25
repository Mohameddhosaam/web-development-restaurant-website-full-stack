<?php
$servername="localhost";
$username="root";
$password="";
$DB="grnd restaurant";
$connect=mysqli_connect($servername,$username,$password,$DB);
if(!$connect){
	die("failed to connect");
}
else{
	echo "connected sucessfully";
}

$id=$_POST["id"];
$password=$_POST["pass"];

$check="select * from customers where ID= '.$_POST["id"].'"  //haghyar dy swa2 customer/cashier/admin
//3ayz a check el id el dakhal mwgood fel database wala la
//^^ law ah , 3ayz a check el password el dakhal hoa hoa el fel database el marboot bel id el dakhal 
//^^ law ah, ha check hoa admin wala customer wala cashier
//^^  haftah page b session le esmo w el id 3ala hasab hoa customer wala admin wala cashier
if($connect->query($check)==TRUE){
	echo "found";
}
else{
	echo "Error";
}
?>