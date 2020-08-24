<?php
  // Proceed only if form data has been received
  if (!isset($_POST['distancia'])) {
    header('Location: ./../');
    exit();
  }
  
  // Retrieve database connection code
  $assetPointer = "../assets";
  require "$assetPointer/dbConnect.php";

  // Establish database connection
  $db = get_db($assetPointer);
  
  // Prepare the RECORD statement
  $statement = $db->prepare("INSERT INTO trip(driver_id, trip_date, distance, notes, metric)
  VALUES (1,'$_POST[fecha]',$_POST[distancia],'blanknote',$_POST[metrico]);");  
  // Execute the statement
  $statement->execute();

  // Prevent post data from being read again if user goes Back
  unset($_POST['distancia']);
  
  // Go up a directory (main page)
  header('Location: ./../');
  exit();
?>

<!DOCTYPE html>
<html>
<head>
  <link rel="icon" href="../assets/favicon.ico">
	<meta charset="utf-8">
  <title>SpinLog | Verify</title>
  <link href="../index.css" rel="stylesheet" type="text/css"/>
	<meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="description" content="Recording data">
  <meta name="author" content="Kevin Matos">
</head>
<body>
  <p>Recording...</p>
  <footer>
  </footer>
</body>
</html>