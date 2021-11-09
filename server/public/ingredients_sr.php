<?php
error_reporting(E_ALL);
$servername = "localhost";
$username = "root";
$password = "";
$db = "hotbread";
// Create connection
$conn = mysqli_connect($servername, $username, $password,$db);
// Check connection
if (!$conn) {
   die("Connection failed: " . mysqli_connect_error());
}
$data = json_decode(file_get_contents('php://input'), true);
if (!empty($data['name'])) {
	$sql = "INSERT INTO recipe_ingredients (name)
	VALUES ('".$data['name']."')";
	$conn->query($sql);
}

$items = getData($conn);
foreach($items as $item) {
	echo '<tr><td>' . $item['name'] .'</td><td><button type="button" class="btn btn-primary">Edit</button><button type="button" class="btn btn-danger" >Delete</button></td></tr>';
}
function getData($conn) {
	$sql = "SELECT name from recipe_ingredients
		ORDER BY recipe_ingredients.name";
		$query = mysqli_query($conn, $sql);
		while ($data = mysqli_fetch_assoc($query))
		{
			$items[] = $data;
		}
		return $items;
		
}
?>