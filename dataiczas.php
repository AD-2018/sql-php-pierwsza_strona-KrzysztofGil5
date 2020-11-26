<!DOCTYPE html>
<html>
<head>
  <title>Krzysztof - Data i czas</title>
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
        <a href="dataiczas.php">Data i czas</a>
        <a href="formatowaniedat.php">Formatowanie dat</a>
        <a href="formularz.html">Formularz</a>
        <a href="insert.php">Insert</a>
        <a href="danedobazy.php">Dane do bazy</a>
    </div>
<?php
require "connect.php";
echo("Jestem w: Data i czas");

echo("<br><h3>Wiek poszczególnych pracowników (w latach) </h3>");
$sql = "SELECT * ,YEAR(CURDATE())-YEAR(data_urodzenia) AS wiek FROM pracownicy";
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
echo("<tr><th>ID</th><th>Imię</th><th>Zarobki</th><th>Data Urodzenia</th><th>Wiek</th></tr>");
while($row=mysqli_fetch_assoc($result)) {
    echo("<tr>");
    echo("<td>".$row['id_pracownicy']."</td>"."<td>".$row['imie']."</td>"."<td>".$row['zarobki']."</td>"."<td>".$row['data_urodzenia']."</td>"."<td>".$row['wiek']."</td>");
    echo("</tr>");
}
echo ("</table>");

// -----------------------------------------------------------------------------------------------------------------------------------------------------------------------------------

echo("<br><h3>Wiek poszczególnych pracowników (w latach) z działu serwis</h3>");

$sql = "SELECT * ,YEAR(curdate())-YEAR(data_urodzenia) AS wiek FROM pracownicy, organizacja WHERE nazwa_dzial='serwis'";
echo(".$sql");
$result = mysqli_query($conn, $sql);
if ( $result) {
    echo "<li>Ok";
}
else {
    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}

echo("<table border=1>");
echo("<tr><th>ID</th><th>Imię</th><th>Zarobki</th><th>Data Urodzenia</th><th>Wiek</th></tr>");
while($row=mysqli_fetch_assoc($result)) {
    echo("<tr>");
    echo("<td>".$row['id_pracownicy']."</td>"."<td>".$row['imie']."</td>"."<td>".$row['zarobki']."</td>"."<td>".$row['data_urodzenia']."</td>"."<td>".$row['wiek']."</td>");
    echo("</tr>");
}
echo ("</table>");

// -----------------------------------------------------------------------------------------------------------------------------------------------------------------------------------

echo("<br><h3>Suma lat wszystkich pracowników</h3>");
$sql = "SELECT SUM(YEAR(CURDATE()) - YEAR(data_urodzenia)) as SumaLat from pracownicy";
echo(".$sql");
$result = mysqli_query($conn, $sql);
if ( $result) {
    echo "<li>Ok";
}
else {
    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}

echo("<table border=1>");
echo("<tr><th>Suma lat</th></tr>");
while($row=mysqli_fetch_assoc($result)) {
    echo("<tr>");
    echo("<td>".$row['SumaLat']."</td>");
    echo("</tr>");
}
echo ("</table>");

// -----------------------------------------------------------------------------------------------------------------------------------------------------------------------------------

echo("<br><h3>Suma lat pracowników z działu handel</h3>");
$sql = "SELECT SUM(YEAR(CURDATE()) - YEAR(data_urodzenia)) as Suma from pracownicy,organizacja WHERE id_org=dzial and nazwa_dzial='handel'";
echo(".$sql");
$result = mysqli_query($conn, $sql);
if ( $result) {
    echo "<li>Ok";
}
else {
    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}

echo("<table border=1>");
echo("<tr><th>Suma lat</th></tr>");
while($row=mysqli_fetch_assoc($result)) {
    echo("<tr>");
    echo("<td>".$row['Suma']."</td>");
    echo("</tr>");
}
echo ("</table>");

// -----------------------------------------------------------------------------------------------------------------------------------------------------------------------------------

echo("<br><h3>Suma lat kobiet</h3>");
$sql = "SELECT SUM(YEAR(CURDATE()) - YEAR(data_urodzenia)) as SumaLatKobiet from pracownicy WHERE imie LIKE '%a'";
echo(".$sql");
$result = mysqli_query($conn, $sql);
if ( $result) {
    echo "<li>Ok";
}
else {
    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}

echo("<table border=1>");
echo("<tr><th>Suma lat</th></tr>");
while($row=mysqli_fetch_assoc($result)) {
    echo("<tr>");
    echo("<td>".$row['SumaLatKobiet']."</td>");
    echo("</tr>");
}
echo ("</table>");

// -----------------------------------------------------------------------------------------------------------------------------------------------------------------------------------

echo("<br><h3>Suma lat mężczyzn</h3>");
$sql = "SELECT SUM(YEAR(CURDATE()) - YEAR(data_urodzenia)) as SumaLatMezczyzn from pracownicy WHERE imie NOT LIKE '%a'";
echo(".$sql");
$result = mysqli_query($conn, $sql);
if ( $result) {
    echo "<li>Ok";
}
else {
    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}

echo("<table border=1>");
echo("<tr><th>Suma lat</th></tr>");
while($row=mysqli_fetch_assoc($result)) {
    echo("<tr>");
    echo("<td>".$row['SumaLatMezczyzn']."</td>");
    echo("</tr>");
}
echo ("</table>");

// -----------------------------------------------------------------------------------------------------------------------------------------------------------------------------------

echo("<br><h3>Średnia lat pracowników w poszczególnych działach</h3>");
$sql = "SELECT AVG(YEAR(CURDATE()) - YEAR(data_urodzenia)) as SredniaLat, nazwa_dzial from pracownicy,organizacja WHERE id_org=dzial GROUP BY nazwa_dzial";
echo(".$sql");
$result = mysqli_query($conn, $sql);
if ( $result) {
    echo "<li>Ok";
}
else {
    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}

echo("<table border=1>");
echo("<tr><th>Średnia lat</th><th>Nazwa Działu</th></tr>");
while($row=mysqli_fetch_assoc($result)) {
    echo("<tr>");
    echo("<td>".$row['SredniaLat']."</td>"."<td>".$row['nazwa_dzial']."</td>");
    echo("</tr>");
}
echo ("</table>");

// -----------------------------------------------------------------------------------------------------------------------------------------------------------------------------------

echo("<br><h3>Suma lat pracowników w poszczególnych działach </h3>");
$sql = "SELECT SUM(YEAR(CURDATE()) - YEAR(data_urodzenia)) as SumaLat, nazwa_dzial from pracownicy,organizacja WHERE id_org=dzial GROUP BY nazwa_dzial";
echo(".$sql");
$result = mysqli_query($conn, $sql);
if ( $result) {
    echo "<li>Ok";
}
else {
    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}

echo("<table border=1>");
echo("<tr><th>Suma lat</th><th>Nazwa Działu</th></tr>");
while($row=mysqli_fetch_assoc($result)) {
    echo("<tr>");
    echo("<td>".$row['SumaLat']."</td>"."<td>".$row['nazwa_dzial']."</td>");
    echo("</tr>");
}
echo ("</table>");

// -----------------------------------------------------------------------------------------------------------------------------------------------------------------------------------

echo("<br><h3>Najstarsi pracownicy w każdym dziale</h3>");
$sql = "SELECT MAX(YEAR(CURDATE()) - YEAR(data_urodzenia)) as Wiek, nazwa_dzial from pracownicy,organizacja WHERE id_org=dzial GROUP BY nazwa_dzial";
echo(".$sql");
$result = mysqli_query($conn, $sql);
if ( $result) {
    echo "<li>Ok";
}
else {
    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}

echo("<table border=1>");
echo("<tr><th>Wiek</th><th>Nazwa Działu</th></tr>");
while($row=mysqli_fetch_assoc($result)) {
    echo("<tr>");
    echo("<td>".$row['Wiek']."</td>"."<td>".$row['nazwa_dzial']."</td>");
    echo("</tr>");
}
echo ("</table>");

// -----------------------------------------------------------------------------------------------------------------------------------------------------------------------------------

echo("<br><h3>Najmłodsi pracownicy z działu: handel i serwis</h3>");
$sql = "SELECT MIN(YEAR(CURDATE()) - YEAR(data_urodzenia)) as min, nazwa_dzial from pracownicy,organizacja WHERE id_org=dzial and (nazwa_dzial='handel' OR nazwa_dzial='serwis') GROUP BY dzial";
echo(".$sql");
$result = mysqli_query($conn, $sql);
if ( $result) {
    echo "<li>Ok";
}
else {
    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}

echo("<table border=1>");
echo("<tr><th>Wiek</th><th>Nazwa Działu</th></tr>");
while($row=mysqli_fetch_assoc($result)) {
    echo("<tr>");
    echo("<td>".$row['min']."</td>"."<td>".$row['nazwa_dzial']."</td>");
    echo("</tr>");
}
echo ("</table>");

// -----------------------------------------------------------------------------------------------------------------------------------------------------------------------------------

echo("<br><h3>Długość życia pracowników w dniach</h3>");
$sql = "SELECT imie,DATEDIFF(CURDATE(),data_urodzenia) AS dni_zycia FROM pracownicy";
echo(".$sql");
$result = mysqli_query($conn, $sql);
if ( $result) {
    echo "<li>Ok";
}
else {
    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}

echo("<table border=1>");
echo("<tr><th>Imię</th><th>Dni życia</th></tr>");
while($row=mysqli_fetch_assoc($result)) {
    echo("<tr>");
    echo("<td>".$row['imie']."</td>"."<td>".$row['dni_zycia']."</td>");
    echo("</tr>");
}
echo ("</table>");

// -----------------------------------------------------------------------------------------------------------------------------------------------------------------------------------

echo("<br><h3>Najstarszy mężczyzna</h3>");
$sql = "SELECT * FROM pracownicy WHERE imie NOT LIKE '%a' ORDER BY data_urodzenia ASC LIMIT 1";
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
    echo("<td>".$row['id_pracownicy']."</td>"."<td>".$row['imie']."</td>"."<td>".$row['zarobki']."</td>"."<td>".$row['data_urodzenia']."</td>");
    echo("</tr>");
}
echo ("</table>");
?>
</body>
</html>
