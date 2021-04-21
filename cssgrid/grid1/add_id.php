<?php
echo "<li>".$_POST['id'];

require_once("../../connect.php");

$sql = "INSERT INTO idpp (id, idpra, idpro)
       VALUES (null, '".$_POST['addpracownik']."', '".$_POST['addprojekt']."')";

if ($conn->query($sql) === TRUE) {
  echo "New record created successfully";
  header('Location: https://krzysztof-php.herokuapp.com/cssgrid/grid1/index.php');
} else {
  echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
?>