<!DOCTYPE html>
<html>
<head>
  <title>Krzysztof - Funkcje Agregujące</title>
<link rel="stylesheet" href="https://krzysztof-php.herokuapp.com/style.css">
</head>
<body>
  <div class="banner">
    <h1>Krzysztof Gil nr 5</h1>
  </div>
        <div class="nav">
        <a href="index.php">Powrót</a>
    </div>
  <div class="tabele">
<?php
require "connect.php";
echo("Jestem w: Funkcje Agregujące");

echo("<br><h3>Suma zarobków wszystkich pracowników</h3>");
$sql = "SELECT sum(zarobki) FROM pracownicy";
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
echo("<tr><th>Suma zarobków</th></tr>");
while($row=mysqli_fetch_assoc($result)) {
    echo("<tr>");
    echo("<td>".$row['sum(zarobki)']."</td>");
    echo("</tr>");
}
echo ("</table>");

// -----------------------------------------------------------------------------------------------------------------------------------------------------------------------------------

echo("<br><h3>Suma zarobków wszystkich kobiet</h3>");

$sql = "SELECT sum(zarobki) FROM pracownicy WHERE imie LIKE '%a'";
echo(".$sql");
$result = mysqli_query($conn, $sql);
if ( $result) {
    echo "<li>Ok";
}
else {
    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}

echo("<table border=1>");
echo("<tr><th>Suma zarobków</th></tr>");
while($row=mysqli_fetch_assoc($result)) {
    echo("<tr>");
    echo("<td>".$row['sum(zarobki)']."</td>");
    echo("</tr>");
}
echo ("</table>");

// -----------------------------------------------------------------------------------------------------------------------------------------------------------------------------------

echo("<br><h3>Suma zarobków mężczyzn pracujących w dziale 2 i 3</h3>");

$sql = "SELECT sum(zarobki) FROM pracownicy WHERE (dzial=2 or dzial=3) AND imie NOT LIKE '%a'";
echo(".$sql");
$result = mysqli_query($conn, $sql);
if ( $result) {
    echo "<li>Ok";
}
else {
    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}

echo("<table border=1>");
echo("<tr><th>Suma zarobków<th></tr>");
while($row=mysqli_fetch_assoc($result)) {
    echo("<tr>");
    echo("<td>".$row['sum(zarobki)']."</td>");
    echo("</tr>");
}
echo ("</table>");

// -----------------------------------------------------------------------------------------------------------------------------------------------------------------------------------

echo("<br><h3>Średnia zarobków wszystkich mężczyzn</h3>");

$sql = "SELECT avg(zarobki) FROM pracownicy WHERE imie NOT LIKE '%a'";
echo(".$sql");
$result = mysqli_query($conn, $sql);
if ( $result) {
    echo "<li>Ok";
}
else {
    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}

echo("<table border=1>");
echo("<tr><th>Średnia zarobków</th></tr>");
while($row=mysqli_fetch_assoc($result)) {
    echo("<tr>");
    echo("<td>".$row['avg(zarobki)']."</td>");
    echo("</tr>");
}
echo ("</table>");

// -----------------------------------------------------------------------------------------------------------------------------------------------------------------------------------

echo("<br><h3>Średnia zarobków pracowników z działu 4  </h3>");

$sql = "SELECT avg(zarobki) FROM pracownicy WHERE dzial=4";
echo(".$sql");
$result = mysqli_query($conn, $sql);
if ( $result) {
    echo "<li>Ok";
}
else {
    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}

echo("<table border=1>");
echo("<tr><th>Średnia zarobków</th></tr>");
while($row=mysqli_fetch_assoc($result)) {
    echo("<tr>");
    echo("<td>".$row['avg(zarobki)']."</td>");
    echo("</tr>");
}
echo ("</table>");

// -----------------------------------------------------------------------------------------------------------------------------------------------------------------------------------

echo("<br><h3>Średnia zarobków mężczyzn z działu 1 i 2</h3>");

$sql = "SELECT avg(zarobki) FROM pracownicy WHERE (dzial=1 or dzial=2)";
echo(".$sql");
$result = mysqli_query($conn, $sql);
if ( $result) {
    echo "<li>Ok";
}
else {
    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}

echo("<table border=1>");
echo("<tr><th>Średnia zarobków</th></tr>");
while($row=mysqli_fetch_assoc($result)) {
    echo("<tr>");
    echo("<td>".$row['avg(zarobki)']."</td>");
    echo("</tr>");
}
echo ("</table>");

// -----------------------------------------------------------------------------------------------------------------------------------------------------------------------------------

echo("<br><h3>Ilu jest wszystkich pracowników  </h3>");

$sql = "SELECT count(id_pracownicy) FROM pracownicy";
echo(".$sql");
$result = mysqli_query($conn, $sql);
if ( $result) {
    echo "<li>Ok";
}
else {
    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}

echo("<table border=1>");
echo("<tr><th>Ilość pracowników</th></tr>");
while($row=mysqli_fetch_assoc($result)) {
    echo("<tr>");
    echo("<td>".$row['count(id_pracownicy)']."</td>");
    echo("</tr>");
}
echo ("</table>");

// -----------------------------------------------------------------------------------------------------------------------------------------------------------------------------------

echo("<br><h3>Ile kobiet pracuje łącznie w działach 1 i 3</h3>");

$sql = "SELECT count(id_pracownicy) FROM pracownicy WHERE (dzial=1 or dzial=3) AND imie LIKE '%a'";
echo(".$sql");
$result = mysqli_query($conn, $sql);
if ( $result) {
    echo "<li>Ok";
}
else {
    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}

echo("<table border=1>");
echo("<tr><th>Ilość pracowników</th></tr>");
while($row=mysqli_fetch_assoc($result)) {
    echo("<tr>");
    echo("<td>".$row['count(id_pracownicy)']."</td>");
    echo("</tr>");
}
echo ("</table>");
?>
  </div>
</body>
</html>
