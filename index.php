<?php
require = "connect.php";

if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}
$sql = "SELECT * FROM pracownicy";

$result = mysqli_query($conn,$sql);
echo("Witaj świecie nazywam się Krzysztof Gil");

echo("<table border=1>");
echo("<tr><td>ID</td><td>Imię</td><td>Dział</td><td>Zarobki</td><td>Data Urodzenia</td></tr>");
while($row=mysqli_fetch_assoc($result)) {
    echo("<tr>");
    echo("<td>".$row['id_pracownicy']."</td>"."<td>".$row['imie']."</td>"."<td>".$row['dzial']."</td>"."<td>".$row['zarobki']."</td>"."<td>".$row['data_urodzenia']."</td>");
    echo("</tr>");
}
echo ("</table>");
?>
