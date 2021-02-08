<?php
echo "<li>".$_POST['tytul'];

require_once("https://krzysztof-php.herokuapp.com/pracownicy/connect.php");

$sql = "INSERT INTO biblTytul (id_tytul, tytul) 
       VALUES (null, '".$_POST['tytul']."')";

if ($conn->query($sql) === TRUE) {
  echo "New record created successfully";
  header('Location: https://krzysztof-php.herokuapp.com/biblioteka/biblioteka.php');
} else {
  echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
?>
