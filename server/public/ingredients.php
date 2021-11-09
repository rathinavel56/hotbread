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
$username = "root";
$password = "";
$db = "hotbread";
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
            <a data-toggle="collapse" href="#collapse1">Ingredients</a>
          </h4>
        </div>
        <div id="collapse1" class="panel-collapse collapse in">
          <div class="panel-body">
				<div id="clone_div">
					<div class="row clone_row">
						<div class="col-xs-2">
						  <label>Name</label>
						</div>
						<div class="col-xs-4">
							<input type="text" class="form-control" id="name" placeholder="Add Ingredient *" >
						</div>
					</div>
				</div>
				<br><br>
				<div class="row">
                  <div class="col-xs-4">
					<button type="button" class="btn btn-primary" onclick="calculate()">Submit</button>
				  </div>
				</div>
				<br><br><br><br><h1 id="loading">Loading ...</h1>
				<table class="table table-bordered table-striped">
					<thead>
					  <tr>
						<th>Name</th>
						<th>Actions</th>
					  </tr>
					</thead>
					<tbody id="output">
						<tr><td colspan="2">No Records</td></tr>
					</tbody>
				</table>
			</div>
        </div>
      </div>
    </div>
</div>
<script>
	$( document ).ready(function() {
		$('#loading').hide();
		$.ajax({
					  type: "POST",
					  url: "ingredients_sr.php",
					  contentType: "application/json",
					  dataType: "text",
					  data: JSON.stringify({name: $('#name').val()}),
					  success: function(resultData){
						$('#output').html(resultData);
						$('#loading').hide();
					  }
				});
	});
	function calculate() {
			$('#loading').show();
			if ($('#name').val().length > 0) {
				$.ajax({
					  type: "POST",
					  url: "ingredients_sr.php",
					  contentType: "application/json",
					  dataType: "text",
					  data: JSON.stringify({name: $('#name').val()}),
					  success: function(resultData){
						$('#output').html(resultData);
						$('#loading').hide();
						$('#name').val('');
						alert('Success');
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