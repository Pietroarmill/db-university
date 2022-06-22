<?php
define("DB_SERVERNAME", "localhost");
define("DB_USERNAME",  "root");
define("DB_PASSWORD",  "root");
define("DB_NAME",   "university");
define("DB_PORT", 3306);

$conn = new mysqli(DB_SERVERNAME, DB_USERNAME, DB_PASSWORD, DB_NAME, DB_PORT);

if ($conn && $conn->connect_error) {
  echo "error";
  die();
}

$sql = "SELECT * FROM `departments`;";
$result = $conn->query($sql);

$departments = [];

if ($result && $result->num_rows > 0) {
  while ($row = $result->fetch_assoc()) {
    $departments[] = $row;
  }
} elseif ($result) {
  echo "middle";
} else {
  echo "Query error";
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
</head>
<body>
  
  <h1>DIPARTIMENTI</h1>

  <?php foreach($departments as $department) { ?>
  <div>
    <h2><?php echo $department["name"] ?></h2>
    <a href="">Vedi informazioni</a>
  </div>
  <?php } ?>

</body>
</html>