<?php
echo $_POST['id'];

require_once("https://krzysztof-php.herokuapp.com/pracownicy/connect.php");

$sql = "DELETE FROM bibl_autor WHERE id_autor=".$_POST['id'];

echo $sql;

if ($conn->query($sql) === TRUE) {
  echo "Record deleted successfully";
  header('Location: https://stanikjoanna.herokuapp.com/ksiazki/ksiazki.php');
} else {
  echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
?>