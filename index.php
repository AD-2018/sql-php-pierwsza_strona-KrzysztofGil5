<?php
$servername ="sql7.freemysqlhosting.net";
$username = "sql7373404";
$password = "b1DIlA93DR";
$dbname = "sql7373404";
echo("Witaj świecie nazywam się Krzysztof Gil");
// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

echo ("<h3>Zadanie 1</h3>");
$sql = "SELECT * FROM pracownicy";

$result = $mysqli_query( $sql );

echo('<table border="1" class="tabela"');
echo ("<tr><th>ID</th><th>Imię</th><th>Dział</th><th>Zarobki</th><th>Nazwa działu</tr>");
while($row=mysqli_fetch_assoc($result)){
    echo("<tr>");    
    echo("<tr>");
    echo("<td>".$row['id_pracownicy']."</td><td>".$row['imie']."</td><td>".$row['dzial']."</td><td>".$row['zarobki']."</td>"."<td>".$row['nazwa_dzial']."</td>");
    echo("<tr>");
    echo("</tr>");
}
echo ("</table>");
?>
