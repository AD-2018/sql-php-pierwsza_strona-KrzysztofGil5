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
?>
</body>
</html>
