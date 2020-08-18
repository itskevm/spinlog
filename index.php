<?php
  date_default_timezone_set("America/Denver");
  $fecha_val = date("Y-m-d");
  $assetPointer = "./assets";
  require "$assetPointer/dbConnect.php";
	$db = get_db($assetPointer);
  //$_POST['first_name']
?>

<!DOCTYPE html>
<html>
<head>
  <link rel="icon" href="./assets/favicon.ico">
	<meta charset="utf-8">
  <title>SpinLog | Entry</title>
  <link href="/index.css" rel="stylesheet" type="text/css"/>
	<meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="description" content="">
  <meta name="author" content="Kevin Matos">
  <script src="/index.js">
  </script>
</head>

<body>
	<div class="logo">
    <img id="top" src="./assets/logo.png" alt="SpinLog" width="200" height="200">
		<h3>Mind your Miles</h3>
	</div>
  <hr>
	<div class="entry">
		<h2>Enter a trip</h2>
		<form action="./record/" method="POST">
      <div class="cancha">
        <label for="fecha">Date:</label>
        <input type="date" name="fecha" id="fecha" value="<?= $fecha_val ?>">
      </div>
      <div class="cancha">
        <label for="distancia">Distance driven:</label>
        <input type="number" name="distancia" id="distancia" placeholder="ex. 55.9" max="10000" min="0" step="0.1" required>
      </div>
      <div class="cancha">
        <label for="unito">Units:</label>
        <select name="unito" id="unito">
          <option value="mi">Imperial (mi)</option>
          <option value="km" disabled>Metric (km) - coming soon</option>
        </select>
      </div>
      <input type="submit" value="Add to record">
		</form>
	</div>
	<div class="view">
    <h2>View trips</h2>

		<button type="button" onclick="viewHistory()">See full History</button>
	</div>
  <footer>
  </footer>
</body>
</html>