<table class="table table-bordered table-striped">
    <thead>
      <tr>
        <th>Name</th>
        <th>Sum Of Ingredients Used</th>
		<th>Unit</th>
      </tr>
    </thead>
    <tbody>
<?php
error_reporting(E_ALL);
$servername = "localhost";
$username = "id17831575_bread";
$password = "i2da]~ca_/mSu>gk";
$db = "id17831575_hotbread";
// Create connection
$conn = mysqli_connect($servername, $username, $password,$db);
// Check connection
if (!$conn) {
   die("Connection failed: " . mysqli_connect_error());
}
$sql = "SELECT recipe_recipes.yield as recipe_recipes_yield, 
recipe_units_1.units as recipe_ingredient_unit_name,
recipe_units_2.units as recipe_unit_name,
recipe_recipe_ingredients.recipe_ingredient_id,
recipe_recipe_ingredients.quantity as recipe_ingredient_quantity,
recipe_recipes.unit_id as recipe_unit,
recipe_ingredients.name,
recipe_recipe_ingredients.unit_id as ing_unit_id
FROM recipe_recipe_ingredients
join recipe_ingredients on recipe_recipe_ingredients.recipe_ingredient_id=recipe_ingredients.id
join recipe_recipes on recipe_recipes.id=recipe_recipe_ingredients.recipe_id
join recipe_units recipe_units_1 on recipe_units_1.id=recipe_recipe_ingredients.unit_id
join recipe_units recipe_units_2 on recipe_units_2.id=recipe_recipes.unit_id
where recipe_recipe_ingredients.recipe_id in (".$_GET['recipe_id'].")
ORDER BY recipe_ingredients.name";
$query = mysqli_query($conn, $sql);
$items = [];
while (($data = mysqli_fetch_assoc($query)))
{
    $items[$data['recipe_ingredient_id']] = array(
		'name' => $data['name'],
		'quantity' => round(($data['recipe_ingredient_quantity'] * $_GET['quantity']/$data['recipe_recipes_yield']),6)
		'unit_name' => $data['recipe_ingredient_unit_name']
	);
}
foreach($items as $item) {
	echo '<td>' . $item['name'] .'</td><td>'.$item['quantity'].'</td><td>' . $item['unit_name'].'</td></tr>';
}
?>
</tbody>
  </table>