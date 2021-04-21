<?php
echo "<li>".$_POST['pracownik'];

require_once("../../connect.php");

$sql = "INSERT INTO pracownik (id, pracownik)
       VALUES (null, '".$_POST['pracownik']."')";

if ($conn->query($sql) === TRUE) {
  echo "New record created successfully";
  header('Location: https://krzysztof-php.herokuapp.com/cssgrid/grid1/index.php');
} else {
  echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
?>