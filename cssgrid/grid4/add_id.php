<?php
echo "<li>".$_POST['id'];

require_once("../../connect.php");

$sql = "INSERT INTO idpa (id, idpr, idar)
       VALUES (null, '".$_POST['addproducent']."', '".$_POST['addartykul']."')";

if ($conn->query($sql) === TRUE) {
  echo "New record created successfully";
  header('Location: https://krzysztof-php.herokuapp.com/cssgrid/grid4/index.php');
} else {
  echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
?>