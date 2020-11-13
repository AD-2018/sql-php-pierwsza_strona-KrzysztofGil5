<!DOCTYPE html>
<html>
<head>
  <title>Krzysztof - Pracownicy i Organizacja</title>
<link rel="stylesheet" href="style.css">
</head>
<body>
    <h1>Krzysztof Gil nr 5</h1>
    <a href="https://github.com/AD-2018/sql-php-pierwsza_strona-KrzysztofGil5">Github</a><br>
        <div class="nav">
        <a href="pracownicy.php">Pracownicy</a>
        <a href="index.php">Pracownicy i Organizacja</a>
        <a href="funcAgregujace.php">Funkcje Agregujące</a>
        <a href="sortowanie.php">Sortowanie</a>
        <a href="groupby.php">Group By</a>
        <a href="limit.php">Limit</a>
        <a href="having.php">Klauzula Having</a>
    </div>
<?php
require "connect.php";
echo("Jestem w: Sortowanie");

echo("<br><h3>Pracownicy posortowani malejąco wg imienia</h3>");
$sql = "SELECT * FROM pracownicy,organizacja WHERE dzial=id_org ORDER BY imie DESC";

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
echo("<tr><th>ID</th><th>Imię</th><th>Nazwa Działu</th><th>Zarobki</th><th>Data Urodzenia</th></tr>");
while($row=mysqli_fetch_assoc($result)) {
    echo("<tr>");
    echo("<td>".$row['id_pracownicy']."</td>"."<td>".$row['imie']."</td>"."<td>".$row['nazwa_dzial']."</td>"."<td>".$row['zarobki']."</td>"."<td>".$row['data_urodzenia']."</td>");
    echo("</tr>");
}
echo ("</table>");

// -----------------------------------------------------------------------------------------------------------------------------------------------------------------------------------

echo("<br><h3>Pracownicy z działu 3 posortowani rosnąco po imieniu</h3>");

$sql = "SELECT * FROM pracownicy,organizacja WHERE dzial=id_org AND (dzial=3) ORDER BY imie ASC";

$result = mysqli_query($conn, $sql);
if ( $result) {
    echo "<li>Ok";
}
else {
    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}

echo("<table border=1>");
echo("<tr><th>ID</th><th>Imię</th><th>Nazwa Działu</th><th>Zarobki</th><th>Data Urodzenia</th></tr>");
while($row=mysqli_fetch_assoc($result)) {
    echo("<tr>");
    echo("<td>".$row['id_pracownicy']."</td>"."<td>".$row['imie']."</td>"."<td>".$row['nazwa_dzial']."</td>"."<td>".$row['zarobki']."</td>"."<td>".$row['data_urodzenia']."</td>");
    echo("</tr>");
}
echo ("</table>");

// -----------------------------------------------------------------------------------------------------------------------------------------------------------------------------------

echo("<br><h3>Kobiety posortowane rosnąco po imieniu </h3>");
$sql = "SELECT * FROM pracownicy,organizacja WHERE dzial=id_org AND imie LIKE '%a' ORDER BY imie ASC";

$result = mysqli_query($conn, $sql);
if ( $result) {
    echo "<li>Ok";
}
else {
    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}

echo("<table border=1>");
echo("<tr><th>ID</th><th>Imię</th><th>Nazwa Działu</th><th>Zarobki</th><th>Data Urodzenia</th></tr>");
while($row=mysqli_fetch_assoc($result)) {
    echo("<tr>");
    echo("<td>".$row['id_pracownicy']."</td>"."<td>".$row['imie']."</td>"."<td>".$row['nazwa_dzial']."</td>"."<td>".$row['zarobki']."</td>"."<td>".$row['data_urodzenia']."</td>");
    echo("</tr>");
}
echo ("</table>");

// -----------------------------------------------------------------------------------------------------------------------------------------------------------------------------------

echo("<br><h3>Kobiety z działu 1 i 3 posortowane rosnąco po zarobkach</h3>");
$sql = "SELECT * FROM pracownicy,organizacja WHERE dzial=id_org AND (dzial=1 or dzial=3) AND imie LIKE '%a' ORDER BY zarobki ASC";

$result = mysqli_query($conn, $sql);
if ( $result) {
    echo "<li>Ok";
}
else {
    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}

echo("<table border=1>");
echo("<tr><th>ID</th><th>Imię</th><th>Nazwa Działu</th><th>Zarobki</th><th>Data Urodzenia</th></tr>");
while($row=mysqli_fetch_assoc($result)) {
    echo("<tr>");
    echo("<td>".$row['id_pracownicy']."</td>"."<td>".$row['imie']."</td>"."<td>".$row['nazwa_dzial']."</td>"."<td>".$row['zarobki']."</td>"."<td>".$row['data_urodzenia']."</td>");
    echo("</tr>");
}
echo ("</table>");

// -----------------------------------------------------------------------------------------------------------------------------------------------------------------------------------

echo("<br><h3>Kobiety z działu 1 i 3 posortowane rosnąco po zarobkach</h3>");
$sql = "SELECT * FROM pracownicy,organizacja WHERE dzial=id_org AND (dzial=1 or dzial=3) AND imie LIKE '%a' ORDER BY zarobki ASC";

$result = mysqli_query($conn, $sql);
if ( $result) {
    echo "<li>Ok";
}
else {
    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}

echo("<table border=1>");
echo("<tr><th>ID</th><th>Imię</th><th>Nazwa Działu</th><th>Zarobki</th><th>Data Urodzenia</th></tr>");
while($row=mysqli_fetch_assoc($result)) {
    echo("<tr>");
    echo("<td>".$row['id_pracownicy']."</td>"."<td>".$row['imie']."</td>"."<td>".$row['nazwa_dzial']."</td>"."<td>".$row['zarobki']."</td>"."<td>".$row['data_urodzenia']."</td>");
    echo("</tr>");
}
echo ("</table>");

// -----------------------------------------------------------------------------------------------------------------------------------------------------------------------------------

echo("<br><h3>Mężczyźni posortowani rosnąco: po nazwie działu</h3>");
$sql = "SELECT * FROM pracownicy,organizacja WHERE dzial=id_org AND imie NOT LIKE '%a' ORDER BY nazwa_dzial ASC";

$result = mysqli_query($conn, $sql);
if ( $result) {
    echo "<li>Ok";
}
else {
    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}

echo("<table border=1>");
echo("<tr><th>ID</th><th>Imię</th><th>Nazwa Działu</th><th>Zarobki</th><th>Data Urodzenia</th></tr>");
while($row=mysqli_fetch_assoc($result)) {
    echo("<tr>");
    echo("<td>".$row['id_pracownicy']."</td>"."<td>".$row['imie']."</td>"."<td>".$row['nazwa_dzial']."</td>"."<td>".$row['zarobki']."</td>"."<td>".$row['data_urodzenia']."</td>");
    echo("</tr>");
}
echo ("</table>");

// -----------------------------------------------------------------------------------------------------------------------------------------------------------------------------------

echo("<br><h3>Mężczyźni posortowani rosnąco: po wysokości zarobków</h3>");
$sql = "SELECT * FROM pracownicy,organizacja WHERE dzial=id_org AND imie NOT LIKE '%a' ORDER BY zarobki ASC";

$result = mysqli_query($conn, $sql);
if ( $result) {
    echo "<li>Ok";
}
else {
    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}

echo("<table border=1>");
echo("<tr><th>ID</th><th>Imię</th><th>Nazwa Działu</th><th>Zarobki</th><th>Data Urodzenia</th></tr>");
while($row=mysqli_fetch_assoc($result)) {
    echo("<tr>");
    echo("<td>".$row['id_pracownicy']."</td>"."<td>".$row['imie']."</td>"."<td>".$row['nazwa_dzial']."</td>"."<td>".$row['zarobki']."</td>"."<td>".$row['data_urodzenia']."</td>");
    echo("</tr>");
}
echo ("</table>");
?>
</body>
</html>