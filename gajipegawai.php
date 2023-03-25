<!DOCTYPE html>
<html>
<head>
	<title>Form Input Gaji</title>
</head>
<body>
	<h2>Form Input Gaji</h2>
	<form method="post">
		<label for="nama">Nama:</label>
		<input type="text" name="nama" id="nama"><br><br>
		<label for="jabatan">Jabatan:</label>
		<select name="jabatan" id="jabatan">
			<option value="Manager">Manager</option>
			<option value="Asisten">Asisten</option>
			<option value="Kabag">Kabag</option>
			<option value="Staff">Staff</option>
		</select><br><br>
		<label for="status_pernikahan">Status Pernikahan:</label>
		<select name="status_pernikahan" id="status_pernikahan">
			<option value="Belum Menikah">Belum Menikah</option>
			<option value="Sudah Menikah">Sudah Menikah</option>
		</select><br><br>
		<label for="jml_anak">Jumlah Anak:</label>
		<input type="number" name="jml_anak" id="jml_anak"><br><br>
		<input type="submit" name="submit" value="Hitung Gaji">
	</form>

	<?php
	if ($_SERVER["REQUEST_METHOD"] == "POST") {
		$nama = $_POST["nama"];
		$jabatan = $_POST["jabatan"];
		$status_pernikahan = $_POST["status_pernikahan"];
		$jml_anak = $_POST["jml_anak"];

		$gaji_pokok = 0;
		$tunjangan_jabatan = 0;
		$tunjangan_keluarga = 0;
		$gaji_kotor = 0;
		$zakat_profesi = 0;
		$take_home_pay = 0;
    }

		switch ($jabatan) {
		    case "Manager":
		        $gaji_pokok = 20000000;
		        break;
		    case "Asisten":
		        $gaji_pokok = 15000000;
		        break;
		    case "Kabag":
		        $gaji_pokok = 10000000;
		        break;
		    case "Staff":
		        $gaji_pokok = 4000000;

		        break;
		    default:
		        echo "tidak ada jabatan";
		        break;
		}

		$tunjangan_jabatan = 0.2 * $gaji_pokok;

		if ($status_pernikahan == "Sudah Menikah") {
		    if ($jml_anak <= 2) {
		        $tunjangan_keluarga = 0.05 * $gaji_pokok;
		    } elseif ($jml_anak >= 3 && $jml_anak <= 5) {
		        $tunjangan_keluarga = 0.1 * $gaji_pokok;
		    }
		}

		$gaji_kotor = $gaji_pokok + $tunjangan_jabatan + $tunjangan_keluarga;

		$is_muslim = true;

		$zakat_profesi = $is_muslim && $gaji_kotor >= 6000000 ? 0.025 * $gaji_kotor : 0;

		$take_home_pay = $gaji_kotor - $zakat_profesi;
			
		echo "Nama : " . $nama . "<br>";
        echo "Gaji pokok: " . $gaji_pokok . "<br>";
        echo "Tunjangan jabatan: " . $tunjangan_jabatan . "<br>";
        echo "Tunjangan keluarga: " . $tunjangan_keluarga . "<br>";
        echo "Gaji kotor: " . $gaji_kotor . "<br>";
        echo "Zakat profesi: " . $zakat_profesi . "<br>";
        echo "Take home pay: " . $take_home_pay;
        ?>