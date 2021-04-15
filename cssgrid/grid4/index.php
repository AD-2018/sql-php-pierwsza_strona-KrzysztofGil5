<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>CSS Grid - 4</title>
</head>
<body>
<div class="container">
<header>
<?php
require "../../connect.php";

echo("<br><h3>Producenci i ich artykuły</h3>");
$sql = "SELECT producent, artykul FROM producent, artykul, idpa WHERE producent.id = idpa.idpr AND artykul.id = idpa.idar";
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
echo("<tr><th>Producent</th><th>Artykuł</th></tr>");
while($row=mysqli_fetch_assoc($result)) {
    echo("<tr>");
    echo("<td>".$row['producent']."</td>"."<td>".$row['artykul']."</td>");
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

echo("<br><h3>Producenci</h3>");
$sql = "SELECT * FROM producent";
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
echo("<tr><th>ID</th><th>Producent</th></tr>");
while($row=mysqli_fetch_assoc($result)) {
    echo("<tr>");
    echo("<td>".$row['id']."</td>"."<td>".$row['producent']."</td>");
    echo("</tr>");
}
echo ("</table>");
?>
</main>
<aside>
<?php
require "../../connect.php";

echo("<br><h3>Artykuły</h3>");
$sql = "SELECT * FROM artykul";
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
echo("<tr><th>ID</th><th>Artykuł</th></tr>");
while($row=mysqli_fetch_assoc($result)) {
    echo("<tr>");
    echo("<td>".$row['id']."</td>"."<td>".$row['artykul']."</td>");
    echo("</tr>");
}
echo ("</table>");
?>
</aside>
<footer>
4
</footer>
</div>
</body>
</html>