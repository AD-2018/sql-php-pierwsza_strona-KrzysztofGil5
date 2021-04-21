<?php
echo "<li>".$_POST['producent'];

require_once("../../connect.php");

$sql = "INSERT INTO producent (id, producent)
       VALUES (null, '".$_POST['producent']."')";

if ($conn->query($sql) === TRUE) {
  echo "New record created successfully";
  header('Location: https://krzysztof-php.herokuapp.com/cssgrid/grid4/index.php');
} else {
  echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
?>