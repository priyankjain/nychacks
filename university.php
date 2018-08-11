<?php
if(!isset($_GET['id'])) {
header('Location: index.php');	
}
$id = $_GET['id'];
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <title>College matcher</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <link href="https://unpkg.com/ionicons@4.2.2/dist/css/ionicons.min.css" rel="stylesheet">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
     <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script> 
  </head>
 <body>
 	<div class="container">
 		<div class="row">
			<div id="piechart" class="col-xs-12"></div>
		</div>
 	</div>
 	 <script type="text/javascript">
		// Load google charts
		google.charts.load('current', {'packages':['corechart']});
		google.charts.setOnLoadCallback(drawChart);
		// Draw the chart and set the chart values
		function drawChart() {
		  var data = google.visualization.arrayToDataTable([
		  ['Demographic', 'Percentage'],
		  <?php
		  	$username = "root";
			$password = "";
			$database = "nychacks";
			$conn = new mysqli("localhost", $username, $password, $database);
			if ($conn->connect_error) {
				die("Connection failed: ". $conn->connect_error);
			}
			$sql = "select * from university where UNITID = ? limit 1;";
			$dream_schools = $conn->prepare($sql);
			$dream_schools->bind_param("i",$id);
			$dream_schools->execute();
			$name = "";
			$result = $dream_schools->get_result();
				if($result->num_rows > 0) {
					while ($row = $result->fetch_assoc()) {
						$name = $row['INSTNM'];
						?>['White', <?php echo $row['UGDS_WHITE']*100;?> ],
						['Black', <?php echo $row['UGDS_BLACK']*100;?> ],
						['Hispanic', <?php echo $row['UGDS_HISP']*100;?> ],
						['Asian', <?php echo $row['UGDS_ASIAN']*100;?> ],
						['Others', <?php echo (1-$row['UGDS_BLACK']-$row['UGDS_ASIAN']-$row['UGDS_HISP']-$row['UGDS_WHITE'])*100;?> ]<?php
						break;
					}
				}
			$dream_schools->close();
	  	?>
		]);

		  // Optional; add a title and set the width and height of the chart
		  var options = {'title':'Undergraduate student demographic for <?php echo $name;?>', 'width':550, 'height':400};

		  // Display the chart inside the <div> element with id="piechart"
		  var chart = new google.visualization.PieChart(document.getElementById('piechart'));
		  chart.draw(data, options);
		}
		</script> 


 </body>
</html>
