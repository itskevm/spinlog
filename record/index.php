<?php
  // Access the database
  $assetPointer = "../assets";
  require "$assetPointer/dbConnect.php";
  $db = get_db($assetPointer);

  $statement = $db->prepare("INSERT INTO trip
  VALUES (DEFAULT,1,'$_POST[fecha]','$_POST[distancia]',
    'blanknote',FALSE);");  
  $statement->execute();

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