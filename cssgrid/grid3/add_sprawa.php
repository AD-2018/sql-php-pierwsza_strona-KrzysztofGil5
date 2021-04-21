<?php
echo "<li>".$_POST['sprawa'];

require_once("../../connect.php");

$sql = "INSERT INTO sprawa (id, sprawa)
       VALUES (null, '".$_POST['sprawa']."')";

if ($conn->query($sql) === TRUE) {
  echo "New record created successfully";
  header('Location: https://krzysztof-php.herokuapp.com/cssgrid/grid3/index.php');
} else {
  echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
?>