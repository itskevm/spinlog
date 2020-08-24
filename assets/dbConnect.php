<?php
function get_db($localPath)
{
  $db = NULL;
  try {
    if (getenv('DATABASE_URL')) {
      $dbUrl = getenv('DATABASE_URL');
      echo "Prod ";
    } else {
      $file = fopen("$localPath/file.txt","r") or die("Unable to open file.");
      $dbUrl = fgets($file);
      fclose($file);
      echo "Local ";
    }
    $dbOpts = parse_url($dbUrl);

    $dbHost = $dbOpts["host"];
    $dbPort = $dbOpts["port"];
    $dbUser = $dbOpts["user"];
    $dbPassword = $dbOpts["pass"];
    $dbName = ltrim($dbOpts["path"],'/');

    $db = new PDO("pgsql:host=$dbHost;port=$dbPort;dbname=$dbName", $dbUser, $dbPassword);

    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
  } catch (PDOException $ex) {
    echo 'Error!: ' . $ex->getMessage();
    die();
  }
  echo "Connection Live.";
  return $db;
}
?>