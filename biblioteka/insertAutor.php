<?php
echo "<li>".$_POST['autor'];

require("../connect.php");

$sql = "INSERT INTO biblAutor (id_autor, autor) 
       VALUES (null, '".$_POST['autor']."')";

if ($conn->query($sql) === TRUE) {
  echo "New record created successfully";
  header('Location: https://krzysztof-php.herokuapp.com/biblioteka/biblioteka.php');
} else {
  echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
?>
