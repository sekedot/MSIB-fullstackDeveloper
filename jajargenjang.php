<!DOCTYPE html>
<html>
<head>
	<title>Jajar Genjang</title>
	<style type="text/css">
		body {
			font-family: sans-serif;
		}
		form {
			margin: 20px auto;
			width: 300px;
			border: 2px solid #ccc;
			padding: 10px;
			border-radius: 5px;
			background-color: #f9f9f9;
		}
		label {
			display: block;
			margin-bottom: 5px;
		}
		input[type="number"] {
			width: 100%;
			padding: 8px;
			border: 1px solid #ccc;
			border-radius: 3px;
			box-sizing: border-box;
			margin-bottom: 10px;
		}
		
		input[type="submit"]:hover {
			background-color: #3e8e41;
		}
	</style>
</head>
<body>
	<form method="post" action="">
		<label for="alas">Alas:</label>
		<input type="number" id="alas" name="alas" required>
		
		<label for="tinggi">Tinggi:</label>
		<input type="number" id="tinggi" name="tinggi" required>
		
		<label for="sisi">Sisi:</label>
		<input type="number" id="sisi" name="sisi" required>
		
		<input type="submit" name="hitung" value="Hitung">
	</form>
	
	<?php
		if(isset($_POST['hitung'])){
			$alas = $_POST['alas'];
			$tinggi = $_POST['tinggi'];
			$sisi = $_POST['sisi'];
			
			$luas = $alas * $tinggi;
			$keliling = 2 * ($alas + $sisi);
			
			echo "<h2>Hasil :</h2>";
			echo "<p>Luas Jajar Genjang: " . $luas . "</p>";
			echo "<p>Keliling Jajar Genjang: " . $keliling . "</p>";
		}
	?>
</body>
</html>
