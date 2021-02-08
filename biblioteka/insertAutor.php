
<?php
echo "<li>".$_POST['autor'];

require_once("https://krzysztof-php.herokuapp.com/pracownicy/connect.php");

$sql = "INSERT INTO bibl_autor (id_autor, autor) 
       VALUES (null, '".$_POST['autor']."')";

if ($conn->query($sql) === TRUE) {
  echo "New record created successfully";
  header('Location: https://stanikjoanna.herokuapp.com/ksiazki/ksiazki.php');
} else {
  echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
?>
