<!DOCTYPE html>
<html>
<head>
<script src="http://ajax.googleapis.com/ajax/libs/jquery/2.0.0/jquery.min.js"></script>
<script src="jquery.table2excel.js"></script>
<style>
table {
    border-collapse: collapse;
    width: 100%;
}

td, th {
    border: 1px solid #dddddd;
    text-align: left;
    padding: 8px;
}

tr:nth-child(even) {
    background-color: #dddddd;
}
</style>
</head>
<body>

<?php
include('db.php');

$sql = "SELECT id, fname, lname, email, gender, picture, username, number FROM users";
$result = $conn->query($sql);
echo "No. of Registrations: ".$result->num_rows;
if ($result->num_rows > 0) {
     echo "<table class='table2excel' ><tr><th>ID</th><th>First Name</th><th>Last Name</th><th>Email</th><th>Gender</th><th>Photo</th><th>Username</th></tr>";
     // output data of each row
     while($row = $result->fetch_assoc()) {
         echo "<tr><td>" . $row["id"]. "</td><td>" . $row["fname"]. "</td><td> " . $row["lname"]. "</td><td>" . $row["email"]. "</td><td>" .  $row["gender"]. "</td><td>". $row["picture"]. "</td><td>" . $row["username"]. "</td></tr>";
     }
     echo "</table>";
} else {
     echo "0 results";
}

$conn->close();
?>  
<button class="btn btn-success">Export</button></div>
</body>
<script>
			$(function() {
				$("button").click(function(){
				$(".table2excel").table2excel({
					exclude: ".noExl",
    				name: "registration"
				}); 
				 });
			});
</script>
</html>