<!DOCTYPE html>
<html>
<head>
  <title>Krzysztof - Formatowanie dat</title>
<link rel="stylesheet" href="https://krzysztof-php.herokuapp.com/style.css">
</head>
<body>
  <div class="banner">
    <h1>Krzysztof Gil nr 5</h1>
  </div>
        <div class="nav">
        <a href="https://krzysztof-php.herokuapp.com/">Powrót</a>
    </div>
<div class="tabele">
<?php
require "../connect.php";
echo("Jestem w: Formatowanie dat");

echo("<br><h3>Wyświetl nazwy dni w dacie urodzenia</h3>");
$sql = "SELECT *, DATE_FORMAT(data_urodzenia,'%W-%M-%Y') as data from pracownicy";
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
echo("<tr><th>ID</th><th>Imię</th><th>Zarobki</th><th>Data Urodzenia</th></tr>");
while($row=mysqli_fetch_assoc($result)) {
    echo("<tr>");
    echo("<td>".$row['id_pracownicy']."</td>"."<td>".$row['imie']."</td>"."<td>".$row['zarobki']."</td>"."<td>".$row['data']."</td>");
    echo("</tr>");
}
echo ("</table>");

// -----------------------------------------------------------------------------------------------------------------------------------------------------------------------------------

echo("<br><h3>Wyświetl nazwy miesięcy w dacie urodzenia</h3>");

$sql = "SELECT *, DATE_FORMAT(data_urodzenia,'%W-%M-%Y') as miesiac from pracownicy";
echo(".$sql");
$result = mysqli_query($conn, $sql);
if ( $result) {
    echo "<li>Ok";
}
else {
    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}

echo("<table border=1>");
echo("<tr><th>ID</th><th>Imię</th><th>Zarobki</th><th>Data Urodzenia</th></tr>");
while($row=mysqli_fetch_assoc($result)) {
    echo("<tr>");
    echo("<td>".$row['id_pracownicy']."</td>"."<td>".$row['imie']."</td>"."<td>".$row['zarobki']."</td>"."<td>".$row['miesiac']."</td>");
    echo("</tr>");
}
echo ("</table>");

// -----------------------------------------------------------------------------------------------------------------------------------------------------------------------------------

echo("<br><h3>Obecna, dokładna godzina</h3>");

$sql = "SELECT curtime(4) as czas";
echo(".$sql");
$result = mysqli_query($conn, $sql);
if ( $result) {
    echo "<li>Ok";
}
else {
    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}

echo("<table border=1>");
echo("<tr><th>Aktualna godzina</th></tr>");
while($row=mysqli_fetch_assoc($result)) {
    echo("<tr>");
    echo("<td>".$row['czas']."</td>");
    echo("</tr>");
}
echo ("</table>");

// -----------------------------------------------------------------------------------------------------------------------------------------------------------------------------------

echo("<br><h3>Wyświetl datę urodzenia w formie: ROK-MIESIĄC-DZIEŃ</h3>");

$sql = "SELECT *, DATE_FORMAT(data_urodzenia,'%Y-%M-%W') as 'data' from pracownicy";
echo(".$sql");
$result = mysqli_query($conn, $sql);
if ( $result) {
    echo "<li>Ok";
}
else {
    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}

echo("<table border=1>");
echo("<tr><th>ID</th><th>Imię</th><th>Zarobki</th><th>Data Urodzenia</th></tr>");
while($row=mysqli_fetch_assoc($result)) {
    echo("<tr>");
    echo("<td>".$row['id_pracownicy']."</td>"."<td>".$row['imie']."</td>"."<td>".$row['zarobki']."</td>"."<td>".$row['data']."</td>");
    echo("</tr>");
}
echo ("</table>");

// -----------------------------------------------------------------------------------------------------------------------------------------------------------------------------------

echo("<br><h3>Ile godzin, minut już żyjesz</h3>");

$sql = "SELECT imie,DATEDIFF(CURDATE(),data_urodzenia) as dni, DATEDIFF(CURDATE(),data_urodzenia)*24 as godziny, DATEDIFF(CURDATE(),data_urodzenia)*24*60 as minuty FROM pracownicy";
echo(".$sql");
$result = mysqli_query($conn, $sql);
if ( $result) {
    echo "<li>Ok";
}
else {
    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}

echo("<table border=1>");
echo("<tr><th>Imię</th><th>Dni</th><th>Godziny</th><th>Minuty</th></tr>");
while($row=mysqli_fetch_assoc($result)) {
    echo("<tr>");
    echo("<td>".$row['imie']."</td>"."<td>".$row['dni']."</td>"."<td>".$row['godziny']."</td>"."<td>".$row['minuty']."</td>");
    echo("</tr>");
}
echo ("</table>");

// -----------------------------------------------------------------------------------------------------------------------------------------------------------------------------------

echo("<br><h3>W którym dniu roku urodziłeś się</h3>");

$sql = "SELECT DATE_FORMAT('2002-03-09', '%j') as urodzenie";
echo(".$sql");
$result = mysqli_query($conn, $sql);
if ( $result) {
    echo "<li>Ok";
}
else {
    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}

echo("<table border=1>");
echo("<tr><th>Dzien roku narodzin</th></tr>");
while($row=mysqli_fetch_assoc($result)) {
    echo("<tr>");
    echo("<td>".$row['urodzenie']."</td>");
    echo("</tr>");
}
echo ("</table>");
?>
  </div>
</body>
</html>
