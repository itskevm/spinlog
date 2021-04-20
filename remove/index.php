<?php
  // Proceed only if form data has been received
  if (!isset($_GET['entryid'])) {
    // unset($_SESSION['form_name']);
    header('Location: ./../view');
    exit();
  }

  // Retrieve database connection code
  $assetPointer = "../assets";
  require "$assetPointer/dbConnect.php";
  
  // Establish database connection
  $db = get_db($assetPointer);
  $val = $_GET['entryid'];
  // Prepare the DELETE statement
  $statement = $db->prepare("DELETE FROM trip WHERE trip_id = $val;");  
  // Execute the statement
  $statement->execute();
  
  // Prevent post data from being read again if user goes Back
  unset($_GET['entryid']);

  // Ensure you're back on the View page
  header('Location: ./../view');
  exit();
?>

<!DOCTYPE html>
<html>
<head>
<link rel="icon" href="../assets/favicon.ico">
	<meta charset="utf-8">
  <title>SpinLog | Remove</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="description" content="Removing entry">
  <meta name="author" content="Kevin Matos">
</head>

<body>
  <p>Removing...</p>
  <footer>
  </footer>
</body>
</html>