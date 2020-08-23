<?php
  // Proceed only if form data has been received
  if (!isset($_POST['form_name'])) {
    // unset($_SESSION['form_name']);
    header('Location: ./../view');
    exit();
  }

  // Retrieve database connection code
  $assetPointer = "../assets";
  require "$assetPointer/dbConnect.php";
  
  // Establish database connection
  $db = get_db($assetPointer);
  
  // Prepare the DELETE statement
  $statement = $db->prepare("DELETE FROM trip WHERE driver_id = 1;");  
  // Execute the statement
  $statement->execute();
  /*
  if (file_exists('../record/data.json')) {
    unlink('../record/data.json');
  }
  */
  header('Location: ./../view');
  exit();
?>

<!DOCTYPE html>
<html>
<head>
<link rel="icon" href="../assets/favicon.ico">
	<meta charset="utf-8">
  <title>SpinLog | Delete</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="description" content="Deleting data">
  <meta name="author" content="Kevin Matos">
</head>

<body>
  <footer>
  </footer>
</body>
</html>