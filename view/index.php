<?php
  // Retrieve database connection code
  $assetPointer = "../assets";
  require "$assetPointer/dbConnect.php";

  // Establish database connection
  $db = get_db($assetPointer);

  // Prepare the SELECT statement
  $statement = $db->prepare("SELECT * FROM trip WHERE driver_id=1");
	$statement->execute();
  
  /*
  if (file_exists('../record/data.json')) {
    $contents = file_get_contents('../record/data.json');
    $contentsArray = json_decode($contents, true);
    $maxIndex = count($contentsArray);
  }
  */
?>

<!DOCTYPE html>
<html>
<head>
  <link rel="icon" href="https://i.imgur.com/RTCGtq7.png">
	<meta charset="utf-8">
  <title>SpinLog | Verify</title>
  <link href="../index.css" rel="stylesheet" type="text/css"/>
	<meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="description" content="">
  <meta name="author" content="Kevin Matos">
  <script src="../index.js">
  </script>
</head>

<body>
  <div class="logo">
		<h1>SpinLog</h1>
		<h3>Mind your Miles</h3>
		<hr>
  </div>
  <div class="entry">
    <h2>Trip History</h2>
    <table>
      <tr>
        <th>Date</th>
        <th>Distance driven</th>
        <th>Remove</th>
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
      echo "<td><a href=''><img src='./assets/trash.png' id='binIcon' alt='remove'></a>";
      echo "</td></tr>";
    }
    
    if ($empty)
    {
      echo "</table><p>No data to display</p>";
    }
    else {
      echo "</table>";
    }
    
  ?>
  </div>
  <div class="view">
		<button type="button" onclick="newEntry()">Enter a trip</button>
  </div>
  <div class="view">
    <form action="./delete" id="deletion" name="deletion" method="POST">
      <input type="hidden" id="form_name" name="form_name" value="delete">
      <button type="button" id="delete_btn" form="deletion" onclick="deleteRecord()">Delete history</button>
    </form>
	</div>
  <footer>
  </footer>
</body>
</html>