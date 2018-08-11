<!DOCTYPE html>
<html lang="en">
  <head><meta name="data-remix-projectId" content="531645">
<meta name="data-remix-projectTitle" content="Untitled Project">
<meta name="data-remix-projectAuthor" content="trav987">
<meta name="data-remix-dateUpdated" content="2018-08-11T17:34:52.080Z">
<meta name="data-remix-host" content="https://thimble.mozilla.org">
<meta name="data-remix-readonly" content="null">

    <title>Results - University Matcher</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>
<body>
	<div class="container">
		<br/>
		<div class="row">
			<a href="index.php" class="btn btn-danger glyphicon glyphicon-chevron-left" role="button">Back</a>
		</div>
		<br/>
<?php
function render_row($row, $category) {
	?>
    <tr>
      <th><?php echo $row['INSTNM'];?></th>
      <td><?php echo $row['CITY'].", ".$row['STABBR'];?></td>
      <td><?php echo ucwords($category);?></td>
      <td><?php 
      $url = $row['INSTURL'];
      $url = strtolower($url);
      echo "<a href='";
      if(substr($url, 0, 4) === "http") {

      } else {
      	echo 'http://';
      }
	  echo $url."'>".$url."</a>";?></td>
    </tr>
<?php
}
function render_header() {
?>
<table class="table table-striped table-bordered">
  <thead>
  	<caption>Recommended Universities</caption>
    <tr>
      <th>Name</th>
      <th>Location</th>
      <th>Category</th>
      <th>URL</th>
    </tr>
  </thead>
  <tbody>
<?php
}
function render_footer() {
?>
</tbody>
</table>
<?php
}

$math = $_POST["math"];
$reading = $_POST["reading"];
$writing = $_POST["writing"];
$income = $_POST["income"];
$location = $_POST["location"];
if(!isset($_POST["math"]) || !isset($_POST["reading"]) || !isset($_POST["writing"]) || !isset($_POST["income"]) || !isset($_POST["location"])) {
	header('Location: index.php');
}
?>
<table class="table table-striped table-bordered table-dark">
  <thead>
  	<caption>Your query</caption>
    <tr>
      <th>Math</th>
      <th>Reading</th>
      <th>Writing</th>
      <th>Location</th>
    </tr>
  </thead>
  <tbody>
  	<tr>
  		<td><?php echo $math;?></td>
  		<td><?php echo $reading;?></td>
  		<td><?php echo $writing;?></td>
  		<td><?php echo $location;?></td>
  	</tr>
  </tbody>
</table>
<?php
$username = "root";
$password = "";
$database = "nychacks";
$conn = new mysqli("localhost", $username, $password, $database);
if ($conn->connect_error) {
	die("Connection failed: ". $conn->connect_error);
}
render_header();
// Search dream schools

$sql = "SELECT * from university where SATVR25 > ? and SATMT25 > ? and SATWR25 > ?";
if($location == "ALL") {
	$sql =$sql;
} else {
	$sql = $sql." and STABBR LIKE '". $location ."'";
}
$sql = $sql." order by SATMT75, SATVR75, SATWR75 DESC;";
$dream_schools = $conn->prepare($sql);
$dream_schools->bind_param("iii",$reading, $math, $writing);
$dream_schools->execute();
$result = $dream_schools->get_result();
if($result->num_rows > 0) {
	while ($row = $result->fetch_assoc()) {
		render_row($row, "dream");
	}
}
$dream_schools->close();

// Search ambitious schools
$sql = "SELECT * from university where SATVR25 <= ? and SATMT25 <= ? and SATWR25 <= ? and SATVRMID > ? and SATMTMID > ? and SATWRMID > ?";
if($location == "ALL") {
	$sql =$sql;
} else {
	$sql = $sql." and STABBR LIKE '". $location ."'";
}
$sql = $sql." order by SATMT75, SATVR75, SATWR75 DESC;";
$ambitious_schools = $conn->prepare($sql);
$ambitious_schools->bind_param("iiiiii",$reading, $math, $writing,$reading, $math, $writing);
$ambitious_schools->execute();
$result = $ambitious_schools->get_result();
if($result->num_rows > 0) {
	while ($row = $result->fetch_assoc()) {
		render_row($row, "ambitious");
	}
}
$ambitious_schools->close();

// Search moderate schools
$sql = "SELECT * from university where SATVRMID <= ? and SATMTMID <= ? and SATWRMID <= ? and SATVR75 > ? and SATMT75 > ? and SATWR75 > ?";
if($location == "ALL") {
	$sql =$sql;
} else {
	$sql = $sql." and STABBR LIKE '". $location ."'";
}
$sql = $sql." order by SATMT75, SATVR75, SATWR75 DESC;";
$moderate_schools = $conn->prepare($sql);
$moderate_schools->bind_param("iiiiii",$reading, $math, $writing,$reading, $math, $writing);
$moderate_schools->execute();
$result = $moderate_schools->get_result();
if($result->num_rows > 0) {
	while ($row = $result->fetch_assoc()) {
		render_row($row, "moderate");
	}
}
$moderate_schools->close();

// Search safe schools
$sql = "SELECT * from university where SATVR75 <= ? and SATMT75 <= ? and SATWR75 <= ?";
if($location == "ALL") {
	$sql =$sql;
} else {
	$sql = $sql." and STABBR LIKE '". $location ."'";
}
$sql = $sql." order by SATMT75, SATVR75, SATWR75 DESC;";
$safe_schools = $conn->prepare($sql);
$safe_schools->bind_param("iii",$reading, $math, $writing);
$safe_schools->execute();
$result = $safe_schools->get_result();
if($result->num_rows > 0) {
	while ($row = $result->fetch_assoc()) {
		render_row($row, "safe");
	}
}
$safe_schools->close();
render_footer();

$conn->close();
?>
</div>
</body>
</html>