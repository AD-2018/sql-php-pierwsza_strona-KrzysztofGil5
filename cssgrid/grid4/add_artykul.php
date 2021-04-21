<?php
echo "<li>".$_POST['artykul'];

require_once("../../connect.php");

$sql = "INSERT INTO artykul (id, artykul)
       VALUES (null, '".$_POST['artykul']."')";

if ($conn->query($sql) === TRUE) {
  echo "New record created successfully";
  header('Location: https://krzysztof-php.herokuapp.com/cssgrid/grid4/index.php');
} else {
  echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
?>