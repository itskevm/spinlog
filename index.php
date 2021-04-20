<?php
  // Force Mountain Time Zone
  date_default_timezone_set("America/Denver");
  $fecha_val = date("Y-m-d");

  // Retrieve database connection code
  $assetPointer = "./assets";
  require "$assetPointer/dbConnect.php";
  
  // Establish database connection
  $db = get_db($assetPointer);
  //$_POST['first_name']

  // Load the last 3 entries
  $statement = $db->prepare("SELECT * FROM trip WHERE driver_id=1 ORDER BY trip_id DESC LIMIT 3");
	$statement->execute();
?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
  <title>SpinLog | Entry</title>
  <link href="/index.css" rel="stylesheet" type="text/css" media="screen and (max-width: 480px)"/>
  <link href="/index.css" rel="stylesheet" type="text/css" media="screen and (min-width: 481px) and (max-width: 768px)"/>
  <link href="/tablet.css" rel="stylesheet" type="text/css" media="screen and (min-width: 769px)"/>
  <link href="/footer.css" rel="stylesheet" type="text/css"/>
  <link rel="icon" type="image/x-icon"/>
	<meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="description" content="">
  <meta name="author" content="Kevin Matos">
  <script src="/index.js">
  </script>
</head>

<body>
	<div class="logo">
    <a href="./" id="logolink"><img id="top" src="<?=$assetPointer?>/2logo.png" alt="SpinLog"></a>
		<h4>Mind your Miles</h4>
	</div>
  <hr>
  <!--
  <div>
    <h2>Login (coming soon)</h2>
    <form action="POST">
      <div>
        <label for="uname">Username:</label>
        <input type="text" name="uname" id="uname">
      </div>
      <div>
        <label for="ukey">Key:</label>
        <input type="password" name="ukey" id="ukey">
      </div>
    </form>
  </div>
  -->
	<div class="entry">
		<h2>Enter a trip</h2>
		<form action="./record/" class="recordform" method="POST">
      <div class="cancha">
        <label for="fecha">Date:</label>
        <input type="date" name="fecha" id="fecha" value="<?= $fecha_val ?>">
      </div>
      <div class="cancha">
        <label for="distancia">Distance driven:</label>
        <input type="number" name="distancia" id="distancia" placeholder="ex. 55.9" max="10000" min="0" step="0.1" required>
      </div>
      <div class="cancha">
        <label for="metrico">Units:</label>
        <select name="metrico" id="metrico">
          <option value="FALSE">Imperial (mi)</option>
          <option value="TRUE" disabled>Metric (km) - coming soon</option>
        </select>
      </div>
      <input type="submit" value="Add to record">
		</form>
  </div>
  <br>
	<div class="entry">
    <h2>Past trips</h2>
    <table>
      <tr>
        <th>Date</th>
        <th>Distance driven</th>
      </tr>
  <?php
    $empty = true;
    while ($row = $statement->fetch(PDO::FETCH_ASSOC)) {
      $empty = false;
      echo "<tr><td>";
      echo $row['trip_date'];
      echo "</td>";
      echo "<td>";
      echo $row['distance'];
      echo "</td></tr>";
    }
    
    if ($empty)
    {
      echo "</table><p>No recent trips to display</p>";
    } else {
      echo "</table>";
    }
    
  ?>
		<button type="button" onclick="viewHistory()">See full History</button>
	</div>
  <footer>
    <hr>
    <p>KevMGaming© 2021</p>
    <p>All Rights Reserved</p>
  </footer>
</body>
</html>