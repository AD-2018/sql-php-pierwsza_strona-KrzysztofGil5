<!DOCTYPE html>
<html>
<head>
  <title>Krzysztof - Limit</title>
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
require "https://krzysztof-php.herokuapp.com/connect.php";
echo("Jestem w: Limit");

echo("<br><h3>Dwóch najlepiej zarabiających pracowników z działu 4</h3>");
$sql = "SELECT * FROM pracownicy,organizacja WHERE dzial=id_org AND dzial=4 ORDER BY zarobki DESC LIMIT 2";
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
echo("<tr><th>ID</th><th>Imię</th><th>Nazwa Działu</th><th>Zarobki</th><th>Data Urodzenia</th></tr>");
while($row=mysqli_fetch_assoc($result)) {
    echo("<tr>");
    echo("<td>".$row['id_pracownicy']."</td>"."<td>".$row['imie']."</td>"."<td>".$row['nazwa_dzial']."</td>"."<td>".$row['zarobki']."</td>"."<td>".$row['data_urodzenia']."</td>");
    echo("</tr>");
}
echo ("</table>");

// -----------------------------------------------------------------------------------------------------------------------------------------------------------------------------------

echo("<br><h3>Trzy najlepiej zarabiające kobiety z działu 4 i 2</h3>");

$sql = "SELECT * FROM pracownicy,organizacja WHERE dzial=id_org AND (dzial=2 or dzial=4) AND imie LIKE '%a' ORDER BY zarobki DESC LIMIT 3";
echo(".$sql");
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

echo("<br><h3>Najstarszy pracownik</h3>");
$sql = "SELECT * FROM pracownicy,organizacja WHERE dzial=id_org ORDER BY data_urodzenia ASC LIMIT 1";
echo(".$sql");
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
  </div>
</body>
</html>
