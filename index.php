<?php
require_once __DIR__ . "/database.php";

$stmt = $conn->prepare("SELECT * FROM `departments` WHERE `id`=?");
$stmt->bind_param("d", $id);
$id = $_GET("id");

$stmt->execute();
$result = $stmt->get_result();

var_dump($result);


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
    <a href="single-departments.php?id=<?php echo $department["id"] ?>">Vedi informazioni</a>
  </div>
  <?php } ?>

</body>
</html>