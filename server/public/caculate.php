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
$username = "root";
$password = "";
$db = "hotbread";
// Create connection
$conn = mysqli_connect($servername, $username, $password,$db);
// Check connection
if (!$conn) {
   die("Connection failed: " . mysqli_connect_error());
}
$recipes = json_decode(file_get_contents('php://input'), true);
$recipes = $recipes['recipes'];
$recipe_ids = array_unique(array_column($recipes, 'recipe_id'));
$items = getData($conn, $recipes, $recipe_ids, [], null);
$keys = array_column($items, 'name');
array_multisort($keys, SORT_ASC, $items);
foreach($items as $item) {
	echo '<tr><td>' . $item['name'] .'</td><td>'.$item['quantity'].'</td><td>' . $item['unit_name'].'</td></tr>';
}
function getData($conn, $recipes , $recipe_ids, $items, $subQuantity) {
	$sql = "SELECT recipe_recipes.yield as recipe_recipes_yield, 
		recipe_recipe_ingredients.recipe_id as recipe_id,
		recipe_recipe_ingredients.parent_recipe_id as parent_recipe_id,
		recipe_units_1.units as recipe_ingredient_unit_name,
		recipe_units_2.units as recipe_unit_name,
		recipe_recipe_ingredients.recipe_ingredient_id,
		recipe_recipe_ingredients.quantity as recipe_ingredient_quantity,
		recipe_recipes.unit_id as recipe_unit,
		recipe_ingredients.name,
		recipe_recipe_ingredients.unit_id as ing_unit_id
		FROM recipe_recipe_ingredients
		left join recipe_ingredients on recipe_recipe_ingredients.recipe_ingredient_id=recipe_ingredients.id
		join recipe_recipes on recipe_recipes.id=recipe_recipe_ingredients.recipe_id
		join recipe_units recipe_units_1 on recipe_units_1.id=recipe_recipe_ingredients.unit_id
		join recipe_units recipe_units_2 on recipe_units_2.id=recipe_recipes.unit_id
		where recipe_recipe_ingredients.recipe_id in (".implode(', ', $recipe_ids).")
		ORDER BY recipe_ingredients.name";
		$query = mysqli_query($conn, $sql);
		while ($data = mysqli_fetch_assoc($query))
		{
			$quantity = 0;
			foreach ($recipes as $recipe) {
				$recipeId = $recipe['recipe_id'];
				if(!empty($ids) && in_array($recipeId, $ids)) {
					$recipe_ids = array_merge($recipe_ids,$ids);
				}
				if ($recipe['recipe_id'] == $data['recipe_id']) {
					$quantity = $recipe['yields'];
					break;
				}
			}
			if (!empty($subQuantity)) {
				$quantity = $subQuantity;
			}
			if(isset($data['parent_recipe_id']) && $data['parent_recipe_id'] != 0) {
				$items = getData($conn, array(array('recipe_id' => $data['parent_recipe_id'], 'yields' => $data['ing_unit_id'])), array($data['parent_recipe_id']), $items, ($quantity*$data['recipe_ingredient_quantity']));
				//echo $data['recipe_ingredient_quantity'];exit;
			} else {
				if(isset($items[$data['recipe_ingredient_id']])) {
					$items[$data['recipe_ingredient_id']] = array(
						'name' => $data['name'],
						'quantity' => ($items[$data['recipe_ingredient_id']]['quantity'] + round(($data['recipe_ingredient_quantity'] * $quantity/$data['recipe_recipes_yield']),6)),
						'unit_name' => $data['recipe_ingredient_unit_name']
					);
				} else {
					$items[$data['recipe_ingredient_id']] = array(
						'name' => $data['name'],
						'quantity' => round(($data['recipe_ingredient_quantity'] * $quantity/$data['recipe_recipes_yield']),6),
						'unit_name' => $data['recipe_ingredient_unit_name']
					);
				}
			}
		}
		return $items;
		
}
?>
</tbody>
  </table>