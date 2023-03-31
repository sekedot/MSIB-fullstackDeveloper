<?php
class Pegawai {
    protected $nip;
    public $nama;
    private $jabatan;
    private $agama;
    private $status;
    static $jml = 0;
    const PT = 'PT. HTP Indonesia';

    public function __construct($nip, $nama, $jabatan, $agama, $status) {
        $this->nip = $nip;
        $this->nama = $nama;
        $this->jabatan = $jabatan;
        $this->agama = $agama;
        $this->status = $status;
        self::$jml++;
    }

    public function setGajiPokok($jabatan) {
        $this->jabatan = $jabatan;
        switch($jabatan) {
            case 'Manager': $gapok = 15000000; break;
            case 'Asisten Manager': $gapok = 10000000; break;
            case 'Kepala Bagian ': $gapok = 7000000; break;
            case 'Staff ': $gapok = 5000000; break;
            default: $gapok = 0;
        }
        return $gapok;
    }

    public function setTunjanganJabatan($jabatan) {
        return $this->setGajiPokok($jabatan) * 0.2;
    }

    public function setTunjanganKeluarga() {
        return ($this->status == 'Menikah') ? $this->setGajiPokok($this->jabatan) * 0.1 : 0;
    }


    public function setGajiKotor() {
        return $this->setGajiPokok($this->jabatan) + $this->setTunjanganJabatan($this->jabatan) + $this->setTunjanganKeluarga();
    }

    public function setZakatProfesi() {
        if ($this->agama === 'Islam' && $this->setGajiKotor() >= 6000000) {
            return $this->setGajiPokok($this->jabatan) * 0.025;
        } else {
            return 0;
        }
    }

    public function setGajiBersih() {
        return $this->setGajiKotor() - $this->setZakatProfesi();
    }

    public function hasil() {
        echo 'NIP Pegawai : '.$this->nip;
        echo '<br>Nama Pegawai : '.$this->nama;
        echo '<br>Jabatan : '. $this->jabatan;
        echo '<br>Agama : '.$this->agama;
        echo '<br>Status : '.$this->status;
        echo '<br>Gaji Pokok : Rp.'.number_format($this->setGajiPokok($this->jabatan),0,',','.');
        echo '<br>Tunjangan Jabatan : Rp.'.number_format($this->setTunjanganJabatan($this->jabatan),0,',','.');
        echo '<br>Tunjangan Keluarga : Rp.'.number_format($this->setTunjanganKeluarga(),0,',','.');
        echo '<br>Zakat Profesi : Rp.'.number_format($this->setZakatProfesi(),0,',','.');
        echo '<br>Gaji Kotor : Rp.'.number_format($this->setGajiKotor(),0,',','.');
        echo '<br>Gaji Bersih : Rp.'.number_format($this->setGajiBersih(),0,',','.');
        echo '<hr>';
    }
}

$pegawai1 = new Pegawai('02461','Ali','Manager','Islam','Menikah');
$pegawai2 = new Pegawai('02462','Rifa','Staff','Islam','Menikah');
$pegawai3 = new Pegawai('02463','tyo','Kepala Bagian','Kristen','Belum Menikah');
$pegawai4 = new Pegawai('02464','Nisa','Asisten Manager','Islam','Menikah');
$pegawai5 = new Pegawai('02465','Made','Manager','Hindu','Belum Menikah');

$ar_pegawai = [$pegawai1, $pegawai2, $pegawai3, $pegawai4, $pegawai5];

foreach($ar_pegawai as $pegawai){
    $pegawai -> hasil();
}

?>