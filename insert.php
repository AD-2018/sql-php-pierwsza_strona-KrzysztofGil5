<?php
echo("jestes w insert.php");
echo $_POST['name'];

require "connect.php";

$sql = "INSERT INTO pracownicy (null, $_POST['name'], dzial, zarobki) 
       VALUES (null,'Ksawery', 3, 36,'1995-10-21')";

if ($conn->query($sql) === TRUE) {
  echo "New record created successfully";
} else {
  echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
?>
