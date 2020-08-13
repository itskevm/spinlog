<?php
  if (file_exists('../record/data.json')) {
    unlink('../record/data.json');
  }
  header('Location: ../view');
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