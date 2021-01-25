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
echo("$sql");
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
echo ('<br>');
echo('<br><select name="Autor">');

    while($row=mysqli_fetch_assoc($result)){
        echo'<option value="'.$row['id_autor'].'">';
        echo($row['autor']);
        echo"</option>";
    }
echo('</select>');

//---------------------------------------------------------------------------

echo("<br><h3>Wszystkie tytuły </h3>");
$sql = "SELECT * FROM biblTytul";
echo("$sql");
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

$sql = "SELECT * FROM biblTytul";
    $result = mysqli_query($conn, $sql);
echo('<br><select name="Tytuł">');

    while($row=mysqli_fetch_assoc($result)){
        echo'<option value="'.$row['id_tytul'].'">';
        echo($row['tytul']);
        echo"</option>";
    }
echo('</select>');

//---------------------------------------------------------------------------

echo("<br><h3>Wszystkie ID</h3>");
$sql = "SELECT * FROM biblAutor_biblTytul,biblTytul,biblAutor WHERE id_tytul=biblTytul_id AND id_autor=biblAutor_id ORDER BY id";
echo("$sql");
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
echo("<th>ID</th><th>Autor</th><th>Tytuł</th>");
while($row=mysqli_fetch_assoc($result)) {
    echo("<tr>");
    echo("<td>".$row['id']."</td>"."<td>".$row['autor']."</td>"."<td>".$row['tytul']."</td>");
    echo("</tr>");
}
echo ("</table>");
?>
</body>
</html>