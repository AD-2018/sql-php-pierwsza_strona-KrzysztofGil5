<?php
echo "<li>".$_POST['projekt'];

require_once("../../connect.php");

$sql = "INSERT INTO projekt (id, projekt)
       VALUES (null, '".$_POST['projekt']."')";

if ($conn->query($sql) === TRUE) {
  echo "New record created successfully";
  header('Location: https://krzysztof-php.herokuapp.com/cssgrid/grid1/index.php');
} else {
  echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
?>