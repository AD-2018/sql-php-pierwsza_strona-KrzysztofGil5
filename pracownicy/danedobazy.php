<!DOCTYPE html>
<html>
<head>
  <title>Krzysztof - Dane do bazy</title>
  <link rel="stylesheet" href="https://krzysztof-php.herokuapp.com/style.css">
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width">
  <title>Dane do Bazy</title>
</head>
<body>
	Dodawanie pracownika<br>
	<form action="insert.php" method="POST">
			Imię<br>
			<input type="text" name="imie"><br>
			Dział<br>
			<input type="number" name="dzial"></br>
			Zarobki<br>
			<input type="number" name="zarobki"></br>
			Data Urodzenia<br>
			<input type="date" name="data_urodzenia"></br>
			<input type="submit" value="dodaj pracownika"><br>
	</form>
<br>
<br>
Usuwanie pracownika<br>
<form action="delete.php" method="POST">
	ID<br>
   <input type="number" name="id_pracownicy"></br>
   <input type="submit" value="Zapisz w zmiennej $_POST['id_pracownicy']">
</form>
<?php
require "../connect.php";

echo("<br><h3>Wszyscy Pracownicy</h3>");
$sql = "SELECT * FROM pracownicy";
echo ("<li>".$sql);
  $result = mysqli_query($conn, $sql);
    if ( $result) {
        echo "<li>ok";
    } else {
      echo "Error: " . $sql . "<br>" . mysqli_error($conn);
    }


echo('<table border="1">');
echo('<th>Id</th><th>Imie</th><th>zarobki</th><th>dzial</th><th>Data urodzenia</th>');

    while($row=mysqli_fetch_assoc($result)){
        echo('<tr>');
        echo('<td>'.$row['id_pracownicy'].'</td>'.'<td>'.$row['imie'].'</td>'.'<td>'.$row['zarobki'].'</td>'.'<td>'.$row['dzial'].'</td>'.'<td>'.$row['data_urodzenia'].'</td>'.
	     
	     '<td>
	    
	     <form action="delete.php" method="POST">
  		<input type="hidden" name="id" value="'.$row['id_pracownicy'].'"></br>
   		<input type="submit" value="Usuń">
	</form>
	     
	     </td>');
	    
        echo('</tr>');
    }
  echo('</table>');
?>
</body>
</html>
