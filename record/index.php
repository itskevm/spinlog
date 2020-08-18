<?php
  echo "access";
  // Access the database
  $assetPointer = "../assets";
  require "$assetPointer/dbConnect.php";
  $db = get_db($assetPointer);
  echo "db set";
  $statement = $db->prepare("INSERT INTO trip(driver_id, trip_date, distance, notes, metric)
  VALUES (1,'$_POST[fecha]',$_POST[distancia],'blanknote',FALSE);");  
  echo "pre execute";
  $statement->execute();
  echo "post execute";
  echo 'pre header';
  header('Location: ./../');
  echo 'post header';
?>

<!DOCTYPE html>
<html>
<head>
  <link rel="icon" href="../assets/favicon.ico">
	<meta charset="utf-8">
  <title>SpinLog | Verify</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="description" content="Recording data">
  <meta name="author" content="Kevin Matos">
</head>

<body>
  <footer>
  </footer>
</body>
</html>