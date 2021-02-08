<?php
echo $_POST['id'];

require_once("https://krzysztof-php.herokuapp.com/pracownicy/connect.php");

$sql = "DELETE FROM bibl_tytul WHERE id_tytul=".$_POST['id'];

echo $sql;

if ($conn->query($sql) === TRUE) {
  echo "Record deleted successfully";
  header('Location: https://krzysztof-php.herokuapp.com/biblioteka/biblioteka.php');
} else {
  echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
?>
