<?php
echo "<li>".$_POST['osoba'];

require_once("../../connect.php");

$sql = "INSERT INTO osoba (id, osoba)
       VALUES (null, '".$_POST['osoba']."')";

if ($conn->query($sql) === TRUE) {
  echo "New record created successfully";
  header('Location: https://krzysztof-php.herokuapp.com/cssgrid/grid2/index.php');
} else {
  echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
?>