<?php
session_start();
if($_SESSION["Role"]!=2){
	header("location:outofscope.php");
}
$connect = mysqli_connect("localhost", "root", "", "grnd restaurant");
?>

<style>
.row {
  display: -ms-flexbox; /* IE10 */
  display: flex;
  -ms-flex-wrap: wrap; /* IE10 */
  flex-wrap: wrap;
  margin: 0 -16px;
}

.col-25 {
  -ms-flex: 25%; /* IE10 */
  flex: 25%;
}

.col-50 {
  -ms-flex: 50%; /* IE10 */
  flex: 50%;
}

.col-75 {
  -ms-flex: 75%; /* IE10 */
  flex: 75%;
}

.col-25,
.col-50,
.col-75 {
  padding: 0 16px;
}

.container {
  background-color: #f2f2f2;
  padding: 5px 20px 15px 20px;
  border: 1px solid lightgrey;
  border-radius: 3px;
}

input[type=text] {
  width: 100%;
  margin-bottom: 20px;
  padding: 12px;
  border: 1px solid #ccc;
  border-radius: 3px;
}

label {
  margin-bottom: 10px;
  display: block;
}

.icon-container {
  margin-bottom: 20px;
  padding: 7px 0;
  font-size: 24px;
}

.btn {
  background-color: #04AA6D;
  color: white;
  padding: 12px;
  margin: 10px 0;
  border: none;
  width: 100%;
  border-radius: 3px;
  cursor: pointer;
  font-size: 17px;
}

.btn:hover {
  background-color: #45a049;
}

span.price {
  float: right;
  color: grey;
}

/* Responsive layout - when the screen is less than 800px wide, make the two columns stack on top of each other instead of next to each other (and change the direction - make the "cart" column go on top) */
@media (max-width: 800px) {
  .row {
    flex-direction: column-reverse;
  }
  .col-25 {
    margin-bottom: 20px;
  }
}</style>
<html>
<head>
  <title>Checkout</title>
</head>

<body>
<div class="row">
  <div class="col-75">
    <div class="container">
      <form action="" method="post">
          <div class="col-50">
            <h3>Payment</h3>
            <label for="fname">Accepted Cards</label>
            <div class="icon-container">
              <i class="fa fa-cc-visa" style="color:navy;"></i>
              <i class="fa fa-cc-amex" style="color:blue;"></i>
              <i class="fa fa-cc-mastercard" style="color:red;"></i>
              <i class="fa fa-cc-discover" style="color:orange;"></i>
            </div>
            <label for="cname">Name on Card</label>
            <input type="text" id="cname" name="cardname" placeholder="John More Doe" required >
            <label for="ccnum">Credit card number</label>
            <input type="text" id="ccnum" name="cardnumber" placeholder="1111-2222-3333-4444" required>
            <label for="expmonth">Exp Month</label>
            <input type="text" id="expmonth" name="expmonth" placeholder="September">

            <div class="row">
              <div class="col-50">
                <label for="expyear">Exp Year</label>
                <input type="text" id="expyear" name="expyear" placeholder="2018">
              </div>
              <div class="col-50">
                <label for="cvv">CVV</label>
                <input type="text" id="cvv" name="cvv" placeholder="352" required>
              </div>
            </div>
          </div>
        </div>
        <input type="submit" value="Place Order" name="check" class="btn">
		<input type="submit" value="Cancel order" name="cancel" class="btn">
		<input type="submit" value="Edit Order" name="edit" class="btn">
		      </form>
    </div>
  </div>
</div>
</body>
</html>
<?php
if(isset($_POST["check"])){
$sql="select * from orders group by orderid order by orderid desc limit 1";
$result=mysqli_query($connect,$sql);
if($result){
		while($row=mysqli_fetch_array($result)){
			$newest=$row["orderid"];
		}
	}//to get the newestid to change status by it
$sql2="UPDATE orders SET status= '1' where orderid= '".$newest."'";
$result2=mysqli_query($connect,$sql2);
//if($result2){
//echo '<script>alert("Order is confirmed successfully");</script>';
//}//end of updating status from 0 to 1
$cardname=$_POST['cardname'];
$cardnumber=$_POST['cardnumber'];
$cashierid=$_SESSION["ID"];
$cvv=$_POST["cvv"];
$sql3="insert into payment (cardname,cardnumber,cvv,orderid,customerid) values ('$cardname','$cardnumber','$cvv','$newest','$cashierid')";
$result3=mysqli_query($connect,$sql3);
if($result2){
echo '<script>alert("Order is confirmed successfully"); window.location.href="cashiermenutest.php";</script>';
}
}
if(isset($_POST["cancel"])){
$sql4="select * from orders group by orderid order by orderid desc limit 1";
$result4=mysqli_query($connect,$sql4);
if($result4){
		while($row=mysqli_fetch_array($result4)){
			$newest=$row["orderid"];
		}
	}//to get the newestid to change status by it
$sql5="UPDATE orders SET status= '-1' where orderid= '".$newest."'";
$result5=mysqli_query($connect,$sql5);
if($result5){
	echo '<script>alert("Order is cancelled successfully"); window.location.href="cashiermenutest.php";</script>';
}
$_SESSION['cashier_cart']=array();
}
if(isset($_POST["edit"])){
$sql6="select * from orders group by orderid order by orderid desc limit 1";
$result6=mysqli_query($connect,$sql6);
if($result6){
		while($row=mysqli_fetch_array($result6)){
			$newest=$row["orderid"];
		}
	}//to get the newestid to change status by it
$sql6="UPDATE orders SET status= '2' where orderid= '".$newest."'";
$result6=mysqli_query($connect,$sql6);
if($result6){
header("location:cashiermenutest.php");
}
}
?>