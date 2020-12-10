<!DOCTYPE html>
<html>
<head>
  <title>Krzysztof - Biblioteka</title>
  <link rel="stylesheet" href="style.css">
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width">
  <title>Biblioteka</title>
</head>
<body>
<?php
require "connect.php";

echo("Jestem w: biblioteka.php");
echo("<br><h3>Wszyscy autorzy</h3>");
$sql = "SELECT * FROM biblAutor";
echo(".$sql");
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

$result = mysqli_query($conn, $sql);
if ( $result) {
    echo "<li>Ok";
}
else {
    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}

echo("<table border=1>");
echo("<tr><th>ID</th><th>Autor</th></tr>");
while($row=mysqli_fetch_assoc($result)) {
    echo("<tr>");
    echo("<td>".$row['id']."</td>"."<td>".$row['autor']."</td>");
    echo("</tr>");
}
echo ("</table>");

//---------------------------------------------------------------------------

echo("<br><h3>Wszystkie tytuły </h3>");
$sql = "SELECT * FROM biblTytul";
echo(".$sql");
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

$result = mysqli_query($conn, $sql);
if ( $result) {
    echo "<li>Ok";
}
else {
    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}

echo("<table border=1>");
echo("<tr><th>ID</th><th>Tytuł</th></tr>");
while($row=mysqli_fetch_assoc($result)) {
    echo("<tr>");
    echo("<td>".$row['id']."</td>"."<td>".$row['tytul']."</td>");
    echo("</tr>");
}
echo ("</table>");

//---------------------------------------------------------------------------

echo("<br><h3>Wszystkie ID</h3>");
$sql = "SELECT * FROM biblAutor_biblTytul";
echo(".$sql");
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

$result = mysqli_query($conn, $sql);
if ( $result) {
    echo "<li>Ok";
}
else {
    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}

echo("<table border=1>");
echo("<tr><th>ID</th><th>biblAutor_id</th><th>biblTytul_id</th></tr>");
while($row=mysqli_fetch_assoc($result)) {
    echo("<tr>");
    echo("<td>".$row['id']."</td>"."<td>".$row['biblAutor_id']."</td>"."<td>".$row['biblTytul_id']."</td>");
    echo("</tr>");
}
echo ("</table>");
?>
</body>
</html>
