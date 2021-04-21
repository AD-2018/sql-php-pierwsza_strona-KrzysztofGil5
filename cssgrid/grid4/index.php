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
echo("<tr><th>ID<th><th>Producent</th><th>Artykuł</th><th>Usuwanie</th></tr>");
while($row=mysqli_fetch_assoc($result)) {
    echo("<tr>");
    echo("<td>".$row['id']."</td>"."<td>".$row['producent']."</td>"."<td>".$row['artykul']."</td>".

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
<h4>Dodawanie Producenta</h4>
	<form action="add_producent.php" method="POST">
		<label>Pracownik: </label><input type="text" name="producent"></br>
		<input type="submit" value="Dodaj">
	</form></br>
  <h4>Dodawanie Artykułu</h4>
	<form action="add_artykul.php" method="POST">
		<label>Artykuł: </label><input type="text" name="artykul"></br>
		<input type="submit" value="Dodaj">
	</form></br>
  <h4>Dodawanie Wiele do wielu</h4>
	<form action="add_id.php" method="POST">
		<label>ID Producenta: </label><input type="text" name="addproducent"></br>
    <label>ID Artykułu: </label><input type="text" name="addartykul"></br>
		<input type="submit" value="Dodaj">
	</form>
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
echo("<tr><th>ID</th><th>Producent</th><th>Usuwanie</th></tr>");
while($row=mysqli_fetch_assoc($result)) {
    echo("<tr>");
    echo("<td>".$row['id']."</td>"."<td>".$row['producent']."</td>".

    '<td>

    <form action="del_producent.php" method="POST">
     <input type="hidden" name="id" value="'.$row['id'].'"></br>
      <input type="submit" value="Usuń">
</form>

    </td>');
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
echo("<tr><th>ID</th><th>Artykuł</th><th>Usuwanie</th></tr>");
while($row=mysqli_fetch_assoc($result)) {
    echo("<tr>");
    echo("<td>".$row['id']."</td>"."<td>".$row['artykul']."</td>".

    '<td>

    <form action="del_artykul.php" method="POST">
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
4
</footer>
</div>
</body>
</html>