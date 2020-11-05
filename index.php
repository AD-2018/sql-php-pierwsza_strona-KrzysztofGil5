<!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" href="style.css">
</head>
<body>
  <a href="https://github.com/AD-2018/sql-php-pierwsza_strona-KrzysztofGil5">Github</a><br>
<?php
require "connect.php";

echo("<br>Witaj świecie nazywam się Krzysztof Gil<br>");

echo("<br><h3>Wszyscy pracownicy</h3>");
$sql = "SELECT * FROM pracownicy";

if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

$result = mysqli_query($conn, $sql);

echo("<table border=1>");
echo("<tr><td>ID</td><td>Imię</td><td>Dział</td><td>Zarobki</td><td>Data Urodzenia</td></tr>");
while($row=mysqli_fetch_assoc($result)) {
    echo("<tr>");
    echo("<td>".$row['id_pracownicy']."</td>"."<td>".$row['imie']."</td>"."<td>".$row['dzial']."</td>"."<td>".$row['zarobki']."</td>"."<td>".$row['data_urodzenia']."</td>");
    echo("</tr>");
}
echo ("</table>");

echo("<br><h3>Tylko mężczyźni</h3>");
$sql = "SELECT * FROM pracownicy WHERE imie NOT LIKE '%a'";

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
  }

$result = mysqli_query($conn, $sql);

echo("<table border=1>");
echo("<tr><td>ID</td><td>Imię</td><td>Dział</td><td>Zarobki</td><td>Data Urodzenia</td></tr>");
while($row=mysqli_fetch_assoc($result)) {
    echo("<tr>");
    echo("<td>".$row['id_pracownicy']."</td>"."<td>".$row['imie']."</td>"."<td>".$row['dzial']."</td>"."<td>".$row['zarobki']."</td>"."<td>".$row['data_urodzenia']."</td>");
    echo("</tr>");
}
echo ("</table>");

echo("<br><h3>Tylko kobiety</h3>");
$sql = "SELECT * FROM pracownicy WHERE imie LIKE '%a'";

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
  }

$result = mysqli_query($conn, $sql);

echo("<table border=1>");
echo("<tr><td>ID</td><td>Imię</td><td>Dział</td><td>Zarobki</td><td>Data Urodzenia</td></tr>");
while($row=mysqli_fetch_assoc($result)) {
    echo("<tr>");
    echo("<td>".$row['id_pracownicy']."</td>"."<td>".$row['imie']."</td>"."<td>".$row['dzial']."</td>"."<td>".$row['zarobki']."</td>"."<td>".$row['data_urodzenia']."</td>");
    echo("</tr>");
}
echo ("</table>");
</body>
</html>
