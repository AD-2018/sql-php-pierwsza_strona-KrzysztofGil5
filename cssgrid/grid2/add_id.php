<?php
echo "<li>".$_POST['id'];

require_once("../../connect.php");

$sql = "INSERT INTO idor (id, idpos, idro)
       VALUES (null, '".$_POST['addosoba']."', '".$_POST['addrola']."')";

if ($conn->query($sql) === TRUE) {
  echo "New record created successfully";
  header('Location: https://krzysztof-php.herokuapp.com/cssgrid/grid2/index.php');
} else {
  echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
?>