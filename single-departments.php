<?php
require_once __DIR__ . "/database.php";

$id = $_GET["id"];
$sql = "SELECT * FROM `departments` WHERE `id`=$id;";
$result = $conn->query($sql);

$departments = [];

if ($result && $result->num_rows > 0) {
  while($row = $result->fetch_assoc()) {
    $departments[] = $row;
  }
} elseif ($result) {
  echo "il dipartimento non è stato trovato";
} else {
  echo "errore query";
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
  <?php foreach ($departments as $department) { ?>
  <h1><?php echo $department["name"] ?></h1>
  <p><?php echo $department["head_of_department"] ?></p>

  <h2>Contatti</h2>
  <ul>
    <li>
      indirizzo: <?php echo $department["address"] ?>
    </li>
    <li>
      telefono: <?php echo $department["phone"] ?>
    </li>
    <li>
      email: <?php echo $department["email"] ?>
    </li>
    <li>
      sitoweb: <?php echo $department["website"] ?>
    </li>
  </ul>
  <?php } ?>
  
  <!-- <a href="index.php">Torna alla home</a> -->
  
</body>

</html>