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
    echo("<td>".$row['id']."</td>"."<td>".$row['osoba']."</td>".

    '<td>

    <form action="del_osoba.php" method="POST">
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
<h4>Dodawanie Osoby</h4>
	<form action="add_osoba.php" method="POST">
		<label>Osoba: </label><input type="text" name="osoba"></br>
		<input type="submit" value="Dodaj">
	</form></br>
  <h4>Dodawanie Roli</h4>
	<form action="add_rola.php" method="POST">
		<label>Rola: </label><input type="text" name="rola"></br>
		<input type="submit" value="Dodaj">
	</form></br>
  <h4>Dodawanie Wiele do wielu</h4>
	<form action="add_id.php" method="POST">
		<label>ID Osoby: </label><input type="text" name="addosoba"></br>
    <label>ID Roli: </label><input type="text" name="addrola"></br>
		<input type="submit" value="Dodaj">
	</form>
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
    echo("<td>".$row['id']."</td>"."<td>".$row['rola']."</td>".

    '<td>

    <form action="del_rola.php" method="POST">
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

echo("<br><h3>Osoby z rolami</h3>");
$sql = "SELECT idor.id, osoba, rola FROM osoba, rola, idor WHERE osoba.id = idor.idos AND rola.id = idor.idro";
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
echo("<tr><ID><th>Osoba</th><th>Rola</th></tr>");
while($row=mysqli_fetch_assoc($result)) {
    echo("<tr>");
    echo("<td>".$row['id']."</td>"."<td>".$row['osoba']."</td>"."<td>".$row['rola']."</td>".

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
      4
      </footer>
      <div class="yellow">
            6
      </div>
    </div>
  </body>
</html>