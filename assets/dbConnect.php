<?php
function get_db()
{
  $db = NULL;
  try {
    if (getenv('DATABASE_URL')) {
      $dbUrl = getenv('DATABASE_URL');
    } else {
      $dbUrl = "postgres://qzlwtfnyadsvam:bdf4f245cf4d618c9770b3d89913aac28140467284ee9429f6a81bba3e66be5c@ec2-52-204-20-42.compute-1.amazonaws.com:5432/d7qotsi56goomr";
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
  echo "returning successfully";
  return $db;
}
?>