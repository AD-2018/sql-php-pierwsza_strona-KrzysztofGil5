<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <meta http-equiv="X-UA-Compatible" content="ie=edge"/>
    <title>CSS Grid - 2</title>
    <link rel="stylesheet" href="style.css"/>
  </head>
  <body>
    <div class="container">
      <header>
      <?php
require "../../connect.php";

echo("<br><h3>Osoby</h3>");
$sql = "SELECT * FROM osoba";
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
echo("<tr><th>ID</th><th>osoba</th></tr>");
while($row=mysqli_fetch_assoc($result)) {
    echo("<tr>");
    echo("<td>".$row['id']."</td>"."<td>".$row['osoba']."</td>");
    echo("</tr>");
}
echo ("</table>");
?>
      </header>
      <nav>
        2
      </nav>
      <main>
      <?php
require "../../connect.php";

echo("<br><h3>Role</h3>");
$sql = "SELECT * FROM rola";
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
echo("<tr><th>ID</th><th>rola</th></tr>");
while($row=mysqli_fetch_assoc($result)) {
    echo("<tr>");
    echo("<td>".$row['id']."</td>"."<td>".$row['rola']."</td>");
    echo("</tr>");
}
echo ("</table>");
?>
      </main>
      <aside>
        5
        </aside>
      <footer>
      <?php
require "../../connect.php";

echo("<br><h3>Osoby z rolami</h3>");
$sql = "SELECT pracownik, projekt FROM pracownik, projekt, idpp WHERE  pracownik.id = idpp.idpra AND projekt.id = idpp.idpro";
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
echo("<tr><th>Osoba</th><th>Rola</th></tr>");
while($row=mysqli_fetch_assoc($result)) {
    echo("<tr>");
    echo("<td>".$row['osoba']."</td>"."<td>".$row['rola']."</td>");
    echo("</tr>");
}
echo ("</table>");
?>
      </footer>
      <div class="yellow">
            6
      </div>
    </div>
  </body>
</html>