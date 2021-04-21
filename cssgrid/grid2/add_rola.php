<?php
echo "<li>".$_POST['rola'];

require_once("../../connect.php");

$sql = "INSERT INTO rola (id, rola)
       VALUES (null, '".$_POST['rola']."')";

if ($conn->query($sql) === TRUE) {
  echo "New record created successfully";
  header('Location: https://krzysztof-php.herokuapp.com/cssgrid/grid2/index.php');
} else {
  echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
?>