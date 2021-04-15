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
1
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
echo("<tr><th>ID</th><th>Pracownik</th></tr>");
while($row=mysqli_fetch_assoc($result)) {
    echo("<tr>");
    echo("<td>".$row['id']."</td>"."<td>".$row['pracownik']."</td>");
    echo("</tr>");
}
echo ("</table>");
?>
</nav>
<main>
3
</main>
<aside>
5
</aside>
<footer>
4
</footer>
</div>
</body>
</html>