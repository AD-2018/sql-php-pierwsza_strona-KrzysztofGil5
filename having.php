<!DOCTYPE html>
<html>
<head>
  <title>Krzysztof - Klauzula Having</title>
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
    </div>
<?php
require "connect.php";
echo("Jestem w: Klauzula Having");

echo("<br><h3>Suma zarobków w poszczególnych działach mniejsza od 28</h3>");
$sql = "SELECT sum(zarobki),nazwa_dzial FROM pracownicy, organizacja WHERE dzial=id_org GROUP BY nazwa_dzial HAVING sum(zarobki)<28";
echo (".$sql");

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
echo("<tr><th>Suma zarobków</th><th>Nazwa działu</th></tr>");
while($row=mysqli_fetch_assoc($result)) {
    echo("<tr>");
    echo("<td>".$row['sum(zarobki)']."</td>"."<td>".$row['nazwa_dzial']."</td>");
    echo("</tr>");
}
echo ("</table>");

// -----------------------------------------------------------------------------------------------------------------------------------------------------------------------------------

echo("<br><h3>Średnie zarobków mężczyzn w poszczególnych działach większe od 30</h3>");

$sql = "SELECT avg(zarobki), nazwa_dzial FROM pracownicy,organizacja WHERE dzial=id_org AND imie NOT LIKE '%a' GROUP BY nazwa_dzial HAVING avg(zarobki)>30";
echo (".$sql");

$result = mysqli_query($conn, $sql);
if ( $result) {
    echo "<li>Ok";
}
else {
    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}

echo("<table border=1>");
echo("<tr><th>Średnia zarobków</th><th>Nazwa Działu</th></tr>");
while($row=mysqli_fetch_assoc($result)) {
    echo("<tr>");
    echo("<td>".$row['avg(zarobki)']."</td>"."<td>".$row['nazwa_dzial']."</td>");
    echo("</tr>");
}
echo ("</table>");

// -----------------------------------------------------------------------------------------------------------------------------------------------------------------------------------

echo("<br><h3>Ilość pracowników w poszczególnych działach większa od 3</h3>");

$sql = "SELECT count(id_pracownicy), nazwa_dzial FROM pracownicy,organizacja WHERE dzial=id_org GROUP by nazwa_dzial HAVING count(id_pracownicy)>3";
echo (".$sql");

$result = mysqli_query($conn, $sql);
if ( $result) {
    echo "<li>Ok";
}
else {
    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}

echo("<table border=1>");
echo("<tr><th>Ilość pracowników</th><th>Nazwa Działu</th></tr>");
while($row=mysqli_fetch_assoc($result)) {
    echo("<tr>");
    echo("<td>".$row['count(id_pracownicy)']."</td>"."<td>".$row['nazwa_dzial']."</td>");
    echo("</tr>");
}
echo ("</table>");
?>
</body>
</html>
