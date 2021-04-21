<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>CSS Grid - 1</title>
</head>
<body>


<div class="container">
<header>
<h4>Dodawanie Pracownika</h4>
	<form action="add_prac.php" method="POST">
		<label>Pracownik: </label><input type="text" name="pracownik"></br>
		<input type="submit" value="Dodaj">
	</form></br>
  <h4>Dodawanie Projektu</h4>
	<form action="add_projekt.php" method="POST">
		<label>Projekt: </label><input type="text" name="projekt"></br>
		<input type="submit" value="Dodaj">
	</form></br>
  <h4>Dodawanie Wiele do wielu</h4>
	<form action="add_id.php" method="POST">
		<label>ID Pracownika: </label><input type="text" name="prac"></br>
    <label>ID Projektu: </label><input type="text" name="proj"></br>
		<input type="submit" value="Dodaj">
	</form>
</header>
<nav>
<?php
require "../../connect.php";

echo("<br><h3>Pracownicy firmy</h3>");
$sql = "SELECT * FROM pracownik";
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
echo("<tr><th>ID</th><th>Pracownik</th><th>Usuwanie</th></tr>");
while($row=mysqli_fetch_assoc($result)) {
    echo("<tr>");
    echo("<td>".$row['id']."</td>"."<td>".$row['pracownik']."</td>".

    '<td>

    <form action="del_prac.php" method="POST">
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
3
</main>
<aside>
<?php
require "../../connect.php";

echo("<br><h3>Pracownicy i ich projekty</h3>");
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
echo("<tr><th>Pracownik</th><th>Projekt</th><th>Usuwanie</th></tr>");
while($row=mysqli_fetch_assoc($result)) {
    echo("<tr>");
    echo("<td>".$row['pracownik']."</td>"."<td>".$row['projekt']."</td>".

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
</aside>
<footer>
<?php
require "../../connect.php";

echo("<br><h3>Projekty</h3>");
$sql = "SELECT * FROM projekt";
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
echo("<tr><th>ID</th><th>Projekt</th><th>Usuwanie</th></tr>");
while($row=mysqli_fetch_assoc($result)) {
    echo("<tr>");
    echo("<td>".$row['id']."</td>"."<td>".$row['projekt']."</td>".

    '<td>

    <form action="del_projekt.php" method="POST">
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