<!DOCTYPE html>
<html lang="en">
<head>
  <title>Bread</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</head>
<body>
<?php
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

?>
<div class="container">
    <div class="panel-group">
      <div class="panel panel-primary">
        <div class="panel-heading">
          <h4 class="panel-title">
            <a data-toggle="collapse" href="#collapse1">Bread</a>
          </h4>
        </div>
        <div id="collapse1" class="panel-collapse collapse in">
          <div class="panel-body">
				<div id="clone_div">
					<div class="row clone_row">
						<div class="col-xs-4">
						  <?php
						  $query = mysqli_query($conn, "SELECT recipe_recipes.id,recipe_recipes.name, recipe_recipes.yield, recipe_recipes.unit_id,recipe_units.units as unit_name FROM recipe_recipes join recipe_units on recipe_units.id=recipe_recipes.unit_id  ORDER BY name");?>
						<select class="form-control recipe">
						<?php
						while (($data = mysqli_fetch_assoc($query)))
						{
							echo '<option value="' . $data['id'] . '">' . $data['name'] . ' (' . $data['unit_name'] . ')</option>';
						}
						?>
						</select>
						</div>
						<div class="col-xs-4">
							<input type="text" class="form-control" placeholder="Recipe Yield *" >
						</div>
					</div>
				</div>
				<br><br>
				<div class="row">
				  <div class="col-xs-2">
					<button type="button" class="btn btn-primary" onclick="addRow()">Add Row</button>
				  </div>
                  <div class="col-xs-4">
					<button type="button" class="btn btn-primary" onclick="calculate()">Submit</button>
				  </div>
				</div>
				<br><br><br><br><h1 id="loading">Loading ...</h1><div id="output"></div>
			</div>
        </div>
      </div>
    </div>
</div>
<script>
	$( document ).ready(function() {
		$('#loading').hide();
	});
	function addRow() {
		$('#clone_div').append('<div class="row">' + $('.clone_row').html() + '</div>');
	}
	function calculate() {
			$('#loading').show();
			var recipes = [];
			$('.recipe').each(function(e){
				var recipe_id = $(this).val();
				var yield_val = $(this).parent().parent().find('input[type=text]').first().val();
				if (recipe_id && yield_val) {
					recipes.push({
						recipe_id: $(this).val(),
						yields: yield_val
					});
				}
			});
			if (recipes.length > 0) {
				$.ajax({
					  type: "POST",
					  url: "caculate.php",
					  contentType: "application/json",
					  dataType: "json",
					  data: JSON.stringify({recipes: recipes}),
					  success: function(resultData){
						$('#output').html(resultData);
						$('#loading').hide();
					  },
						error: function(response) {
							alert("Something went wrong");
						}
				});
			} else {
				alert("Enter All fields");
				$('#loading').hide();
			}
	}
</script>
</body>
</html>