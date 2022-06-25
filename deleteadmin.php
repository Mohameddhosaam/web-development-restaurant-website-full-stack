<style>
table, th, td {
  border: 1px solid black;
}

<?php
session_start();
if($_SESSION["Role"]!=3){
	header("location:outofscope.php");
}
include "style1.css"; 
include "navtest.php";
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "grnd restaurant";
$conn = new mysqli($servername, $username, $password, $dbname);
$query = "SELECT * FROM customers";
$result = mysqli_query($conn,$query);
if(isset($_POST['save'])){
	$checkbox = $_POST['check'];
	for($i=0;$i<count($checkbox);$i++){
    $del_id = $checkbox[$i]; 
    $sql="DELETE FROM customers WHERE Id='".$del_id."'";
	mysqli_query($conn,$sql);
    $message = "Data deleted successfully !";
    echo ($message);
}
}
?>
<html>
<form method="post" action="">
<table class="table table-bordered">
<thead>
<tr>

	<th>ID</th>
	<th>First Name</th>
	<th>Email</th>
	<th>Phone</th>
	<th>Password</th>
    <th>Delete </th>
	 
</tr>
</thead>
<?php
 
while($row = mysqli_fetch_array($result)) 
{
    
?>
<tr>
  
	<td><?= $row['ID']; ?></td>
	<td><?= $row['Name']; ?></td>
	<td><?=  $row['Email']; ?></td>
	<td><?= $row['Phone']; ?></td>
	<td><?= $row['Password']; ?></td>
    <td><input type="checkbox" id="checkItem" name="check[]" value="<?php echo $row["ID"]; ?>"></td>
	 
</tr>
<?php
 
}
?>
</table>
<p><button type="submit" class="btn btn-success" name="save">DELETE</button></p>
</form>

</body>
</html>
</html>