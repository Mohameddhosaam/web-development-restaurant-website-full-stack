<?php
session_start();
if($_SESSION["Role"]!=3){
	header("location:outofscope.php");
}
include "style1.css"; include "navtest.php";
?>
<div class="container">
<form action="test.php" method="post">
<fieldset>
<legend>ADD USER</legend> 
<input type="text" name="Name" placeholder="Full name" id="namelabel" required ><br><br>
<input type="text" name="Phone" placeholder="Phone number" required><br><br>
<input type="text" name="ID" placeholder="National ID" required><br><br>
<input type="text" name="email" placeholder="Email address" required><br><br>
<input type="password" name="pass" placeholder="Password" required maxlength="30" required><br><br>
<input type ="password" name="confirm" placeholder="Confirm Password" required maxlength="30" required> <br><br>
<button type="submit" id="1">Add</button> 
</fieldset>
</form>
</div>
<div class="container">
<form action="additem.php" method="post">
<fieldset>
<legend>ADD A MENU ITEM</legend>
<input type="text" name="foodname" placeholder="Food Name" required ><br><br>
<input type="text" name="foodprice" placeholder="Price" required><br><br>
<input type="text" name="foodingredients" placeholder="Ingredients (seperate with a space)" required><br><br>
<input type="text" name="foodid" placeholder="Food id" required><br><br>
<label for="foodtype">Choose food type:</label>
<select name="foodtype" id="foodtype">
<option value="Drinks">Drinks</option>
<option value="Breakfast">Breakfast</option>
<option value="Dinner">Dinner</option>
<option value="Lunch">Lunch</option>
<option value="Custom">Custom</option>
</select><br><br>
<button type="submit">Add</button>
</fieldset>
</form>
</div>
<div class="container">
<form action="addcashier.php" method="post">
<fieldset>
<legend>ADD CASHIER </legend> 
<input type="text" name="Name" placeholder="Full name" id="namelabel" required ><br><br>
<input type="text" name="Phone" placeholder="Phone number" required><br><br>
<input type="text" name="ID" placeholder="National ID" required><br><br>
<input type="text" name="email" placeholder="Email address" required><br><br>
<input type="password" name="pass" placeholder="Password" required maxlength="30" required><br><br>
<input type ="password" name="confirm" placeholder="Confirm Password" required maxlength="30" required> <br><br>
<button type="submit">Add</button> 
</fieldset>
</form>
</div>