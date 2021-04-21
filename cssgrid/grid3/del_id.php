<?php
echo $_POST['id'];

require("../../connect.php");

$sql = "DELETE FROM idps WHERE id=".$_POST['id'];

echo $sql;

if ($conn->query($sql) === TRUE) {
  echo "Record deleted successfully";
  header('Location: https://krzysztof-php.herokuapp.com/cssgrid/grid3/index.php');
} else {
  echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
?>