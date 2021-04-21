<?php
echo "<li>".$_POST['id'];

require_once("../../connect.php");

$sql = "INSERT INTO idps (id, idpr, idsp)
       VALUES (null, '".$_POST['addprawnik']."', '".$_POST['addsprawa']."')";

if ($conn->query($sql) === TRUE) {
  echo "New record created successfully";
  header('Location: https://krzysztof-php.herokuapp.com/cssgrid/grid3/index.php');
} else {
  echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
?>