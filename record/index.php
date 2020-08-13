<?php
  if (!file_exists('data.json')) {
    $file=fopen("data.json", "a");
    fwrite($file, "");
    fclose($file);
    $contentsArray = array($_POST);
    $json = json_encode($contentsArray);
    file_put_contents('data.json', $json);
  } else {
    $contents = file_get_contents('data.json');
    $contentsArray = json_decode($contents, true);
    $newIndex = count($contentsArray);
    $contentsArray[$newIndex] = $_POST;
    $json = json_encode($contentsArray);
    file_put_contents('data.json', $json);
  }
  header('Location: ../');
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