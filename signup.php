<html>
<head>

<h1 style="color:maroon; text-align:center; font:70px arial;">Grnd Restaurant</h1>
</head>
<body>
<script>
</script>
<form action="test.php" method="post">
<b>Name</b> :  <input type="text" name="Name" id="namelabel" required ><br><br>
<b>Phone</b> : <input type="text" name="Phone" required><br><br>
<b>National ID</b> : <input type="text" name="ID" required><br><br>
<b>Email</b> :  <input type="text" name="email" required><br><br>
<b>Password</b> : <input type="password" name="pass" required maxlength="30" required><br><br>
<b>Confirm Password</b> : <input type ="password" name="confirm" required maxlength="30" required> <br><br>
<b>Role</b>: <select id= "num" name="role" required>
<option value = "" selected disabled>--Select--</option>
<option value = "1">Customer</option>
<option value ="2" >Cashier</option>
<option value"3">Quality Control</option>
</select><br><br>
<input type="submit" name="submit" value="Sign up";><br>
</form>
Already have an account? <a href = "signin.html" target= "_self"> Sign in </a>

</body>
</html>