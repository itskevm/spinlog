<?php
  // Proceed only if form data has been received
  if (!isset($_POST['fecha-from']) && !isset($_POST['fecha-to'])) {
  // unset($_SESSION['form_name']);
  header('Location: ./../');
  exit();
}

  // Force Mountain Time Zone
  date_default_timezone_set("America/Denver");
  $fecha_val = date("Y-m-d");

  // Retrieve database connection code
  $assetPointer = "./../assets";
  require "$assetPointer/dbConnect.php";
  
  // Establish database connection
  $db = get_db($assetPointer);
  $date_from = $_POST['fecha-from'];
  $date_to = $_POST['fecha-to'];
  
  // Calculate the distance driven between dates (Note: type is string)
  $sumQuery = "SELECT SUM(distance) FROM trip WHERE trip_date BETWEEN '$date_from'::DATE AND '$date_to'::DATE";
  $sumStatement = $db->prepare($sumQuery);
  $sumStatement->execute();
  $bounce = $sumStatement->fetch(PDO::FETCH_ASSOC);
  $sum = array_shift($bounce);
  // echo $sum;

  // Calculate the amount of days counted between dates
  $countDaysQuery = "SELECT SUM('$date_to'::DATE - '$date_from'::DATE)";
  $countDaysStatement = $db->prepare($countDaysQuery);
  $countDaysStatement->execute();
  $bounce = $countDaysStatement->fetch(PDO::FETCH_ASSOC);
  $days = abs(array_shift($bounce)) + 1;
  // echo $days;

  // Calculate the amount of trips recorded between dates
  $countTripsQuery = "SELECT COUNT(trip_id) FROM trip WHERE trip_date BETWEEN '$date_from'::DATE AND '$date_to'::DATE";
  $countTripsStatement = $db->prepare($countTripsQuery);
  $countTripsStatement->execute();
  $bounce = $countTripsStatement->fetch(PDO::FETCH_ASSOC);
  $trips = array_shift($bounce);
  // echo $trips;

  // Calculate the average distance driven between dates
  $avgQuery = "SELECT AVG(distance) FROM trip WHERE trip_date BETWEEN '$date_from'::DATE AND '$date_to'::DATE";
  $avgStatement = $db->prepare($avgQuery);
  $avgStatement->execute();
  $bounce = $avgStatement->fetch(PDO::FETCH_ASSOC);
  $avg = floor(array_shift($bounce) * 10) / 10;
  // $avg = (float)array_shift($bounce);
  // $avg = number_format((float)array_shift($bounce), 1);
  // $avg = round((float)array_shift($bounce), 2);
  // echo $avg;

  $minGallons = round($sum / 32, 3);
  $maxGallons = round($sum / 26, 3);
  $minGasPrice = round($minGallons * 3, 2);
  $maxGasPrice = round($maxGallons * 3, 2);

  // Load entries from range
  $statement = $db->prepare("SELECT * FROM trip WHERE trip_date BETWEEN '$date_from'::DATE AND '$date_to'::DATE ORDER BY trip_id DESC");
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
    <a href="./../" id="logolink"><img id="top" src="<?=$assetPointer?>/2logo.png" alt="SpinLog"></a>
		<h4>Mind your Miles</h4>
	</div>
  <hr>
	<div class="entry">
		<h2>Trip details by range</h2>
    <p>From <?=$date_from;?> to <?=$date_to;?> (<?=$days;?> days),
    you drove <?=$sum;?> miles in <?=$trips;?> recorded trips. 
    This was approximately <?=$avg;?> miles per trip. If gas is $3.00/gal,
    this driving period cost between $<?=$minGasPrice;?>-$<?=$maxGasPrice;?>.</p>
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
      echo "</table><p>No data found in range</p>";
    } else {
      echo "</table>";
    }
  ?>
  </div>
  <footer>
    <hr>
    <p>KevMGaming© 2021</p>
    <p>All Rights Reserved</p>
  </footer>
</body>
</html>