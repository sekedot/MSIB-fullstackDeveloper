<?php
$ar_prodi = ["SI"=>"Sistem Informasi", "TI"=>"Teknik Informatika","ILKOM"=>"Ilmu Komputer","TE"=>"Teknik Elektro"];

$ar_skill = ["HTML"=>10,"CSS"=>10, "Javascript"=>20, "RWD Bootstrap"=>20, "PHP"=>30, "MySQL"=>30,"Laravel"=>40];
$domisili = ["Jakarta","Bandung","Bekasi","Malang","Surabaya", "lainnya"];
?>
<fieldset style="background-color:aquamarine; margin-bottom:20px;">
    <legend>Form Registrasi Kelompok Belajar</legend>
<table>
    <thead>
        <tr>
            <th>Form Registrasi</th>
        </tr>
    </thead>
    <tbody>
        <form method="POST">
            <tr>
                <td>NIM : </td>
                <td> 
                    <input type="text" name="nim" >
                </td>
            </tr>
            <tr>
                <td>Nama : </td>
                <td> 
                    <input type="text" name="nama" >
                </td>
            </tr>
            <tr>
                <td>Jenis Kelamin : </td>
                <td> 
                    <input type="radio" name="jk" value="Laki-laki" >Laki-Laki &nbsp;
                    <input type="radio" name="jk" value="Laki-laki" >Perempuan 
                </td>
            </tr>
            <tr>
                <td>Program Studi: </td>
                <td> 
                    <select name="prodi">
                        <?php 

                        foreach($ar_prodi as $prodi => $v){
                            ?>
                            <option value="<?= $prodi ?>"><?= $v ?></option>
                       <?php } ?>
                        </select>
                </td>
            </tr>
            <tr>
                <td>Skill Programming : </td>
                <td> 
                    <?php
                    foreach ($ar_skill as $skill => $s){
                        ?>
                    <input type="checkbox" name="skill[]" value="<?= $skill ?>" ><?= $skill ?>

                    <?php } ?>
                </td>
            </tr>
            <tr>
                <td>Domisili : </td>
                <td> 
                    <select name="domisili">
                        <?php 

                        foreach($domisili as $d){
                            ?>
                            <option value="<?= $d ?>"><?= $d ?></option>
                       <?php } ?>
                        </select>
                </td>
            </tr>
            <tr>
                <td>Email: </td>
                <td><input type="text" name="email"></td>
            </tr>
            <tfoot>
                <tr>
                    <th colspan="2">
                        <button name="proses">Submit</button>
                    </th>
                </tr>
            </tfoot>
    </table>
            

</fieldset>
<?php 

if(isset($_POST['proses'])){
    $nim = $_POST['nim'];
    $nama = $_POST['nama'];
    $jk = $_POST['jk'];
    $prodi = $_POST['prodi'];
    $skill = $_POST['skill'];
    $domisili = $_POST['domisili'];
    $email = $_POST['email'];
}

$score = 0;
foreach ($skill as $s) {
    if (isset($ar_skill[$s])) $score += $ar_skill[$s];
}

function skillCategory ($score){
    if ($score >= 100) $predikat = "sangat baik";
    elseif ($score >= 60 && $score < 100) $predikat = "baik";
    elseif ($score >= 40 && $score < 60) $predikat = "cukup";
    elseif ($score >= 0 && $score < 40) $predikat = "kurang";
    else $predikat = "tidak memadai";

    return $predikat;
}

?>
<fieldset>
NIM : <?= $nim ?><br>
Nama : <?= $nama ?><br>
Jenis Kelamin <?= $jk ?><br>
Program Studi : <?= $prodi ?><br>
Skill : 
<?php 
foreach($skill as $s){ ?>
<?= $s ?> ,
<?php } ?>
<br>Skor skill : <?= $score ?>
<br>Kategori skill :  <?= skillCategory($score) ?>
<br>Email : <?= $email ?>
<br>Domisili : <?= $domisili ?>
</fieldset>