<?php
echo $_POST['id'];

require("connect.php");

$sql = "DELETE FROM biblAutor WHERE id_autor=".$_POST['id'];

echo $sql;

if ($conn->query($sql) === TRUE) {
  echo "Record deleted successfully";
  header('Location: https://krzysztof-php.herokuapp.com/biblioteka/biblioteka.php');
} else {
  echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
?>
