<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>CSS Grid - 3</title>
</head>
<body>
<div class="container">
<header>
<?php
require "../../connect.php";

echo("<br><h3>Prawnicy i ich sprawy</h3>");
$sql = "SELECT idps.id, prawnik, sprawa FROM prawnik, sprawa, idps WHERE prawnik.id = idps.idpr AND sprawa.id = idps.idsp";
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
echo("<tr><th>ID</th><th>Prawnik</th><th>Sprawa</th><th>Usuwanie</th></tr>");
while($row=mysqli_fetch_assoc($result)) {
    echo("<tr>");
    echo("<td>".$row['id']."</td>"."<td>".$row['prawnik']."</td>"."<td>".$row['sprawa']."</td>".

    '<td>

    <form action="del_id.php" method="POST">
     <input type="hidden" name="id" value="'.$row['id'].'"></br>
      <input type="submit" value="Usuń">
</form>

    </td>');
    echo("</tr>");
}
echo ("</table>");
?>
</header>
<nav>
<?php
require "../../connect.php";

echo("<br><h3>Prawnicy</h3>");
$sql = "SELECT * FROM prawnik";
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
echo("<tr><th>ID</th><th>Prawnik</th><th>Usuwanie</th></tr>");
while($row=mysqli_fetch_assoc($result)) {
    echo("<tr>");
    echo("<td>".$row['id']."</td>"."<td>".$row['prawnik']."</td>".

    '<td>

    <form action="del_prawnik.php" method="POST">
     <input type="hidden" name="id" value="'.$row['id'].'"></br>
      <input type="submit" value="Usuń">
</form>

    </td>');
    echo("</tr>");
}
echo ("</table>");
?>
</nav>
<main>
<h4>Dodawanie Prawnika</h4>
	<form action="add_prawnik.php" method="POST">
		<label>Prawnik: </label><input type="text" name="prawnik"></br>
		<input type="submit" value="Dodaj">
	</form></br>
  <h4>Dodawanie Sprawy</h4>
	<form action="add_sprawa.php" method="POST">
		<label>Sprawa: </label><input type="text" name="sprawa"></br>
		<input type="submit" value="Dodaj">
	</form></br>
  <h4>Dodawanie Wiele do wielu</h4>
	<form action="add_id.php" method="POST">
		<label>ID Prawnika: </label><input type="text" name="addprawnik"></br>
    <label>ID Sprawy: </label><input type="text" name="addsprawa"></br>
		<input type="submit" value="Dodaj">
	</form>
</main>
<aside>
5
</aside>
<footer>
<?php
require "../../connect.php";

echo("<br><h3>Sprawy sądowe</h3>");
$sql = "SELECT * FROM sprawa";
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
echo("<tr><th>ID</th><th>Sprawa</th><th>Usuwanie</th></tr>");
while($row=mysqli_fetch_assoc($result)) {
    echo("<tr>");
    echo("<td>".$row['id']."</td>"."<td>".$row['sprawa']."</td>".

    '<td>

    <form action="del_sprawa.php" method="POST">
     <input type="hidden" name="id" value="'.$row['id'].'"></br>
      <input type="submit" value="Usuń">
</form>

    </td>');
    echo("</tr>");
}
echo ("</table>");
?>
</footer>
</div>
</body>
</html>