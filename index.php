<?php
$servername ="sql7.freemysqlhosting.net";
$username = "sql7373404";
$password = "b1DIlA93DR";
$dbname = "sql7373404";
echo("Witaj świecie nazywam się Krzysztof Gil");
// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

echo("<h1>Zadanie1</h1>");
$sql = "SELECT * FROM pracownicy";

$result = mysqli_query($conn,$sql);

echo("<table border=1>");
echo("<tr><td>ID</td><td>Imię</td><td>Dział</td><td>Zarobki</td><td>Data Urodzenia</td></tr>");
while($row=mysqli_fetch_assoc($result)) {
    echo("<tr>");
    echo("<td>".$row['id_pracownicy']."</td>"."<td>".$row['imie']."</td>"."<td>".$row['dzial']."</td>"."<td>".$row['zarobki']."</td>"."<td>".$row['data_urodzenia']."</td>");
    echo("</tr>");
}
echo ("</table>");
?>
