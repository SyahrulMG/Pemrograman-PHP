<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Data Pegawai</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">
  </head>
  <body>
     
<?php 

class Pegawai {
public $nip;
    public $nama;
    public $jabatan;
    public $agama;
    public $status;
    const judul = "DATA PEGAWAI";
    //konstruktor
    public function __construct($nip, $nama, $jabatan, $agama, $status) {
        $this -> nip = $nip;
        $this -> nama = $nama;
        $this -> jabatan = $jabatan;
        $this -> agama = $agama;
        $this -> status = $status;
    }
    //menentukan gaji pokok
    public function setGapok() {
        switch ($this->jabatan) {
            case 'Manager':
                $gapok = 15000000;
                break;
            case 'Asisten':
                $gapok = 10000000;
                break;
            case 'Kabag':
                $gapok = 7000000;
                break;
            case 'Staff':
                $gapok = 4000000;
                break;
            default :
                $gjpokok = 0 ;
           break;
        }
            return $gapok;
    }

    // tunjangan jabatan
    public function setTunjab() {
        $tunjab = (20 * $this -> setGapok()) / 100;
        return $tunjab;
    }
    //Menentukan tunjangan keluarga
    public function TunKel() {
        $tunKel = ($this -> status == "Menikah") ? (10 * $this -> setGapok()) / 100 : 0;
        return $tunKel;
    }
    public function setGaKor() {
        $gakor = $this -> setGapok() + $this -> setTunjab() + $this -> TunKel();
        return $gakor;
    }

    public function setZakat() {
        $zakat = ($this -> agama == 'Islam' && $this -> setGaKor() >= 6000000) ? (2.5 * $this -> setGapok()) / 100 : 0;
        return $zakat;
    }
    
    public function setGaber() {
        $gaber = $this -> setGaKor() - $this -> setZakat();
        return $gaber;
    }
   
    public function mencetak() {
      echo'  
        <div class="alert alert-primary" role="alert">
           <b><u>'.self :: judul.'</u></b>
          </br>No. pegawai : '.$this ->nip.'
          </br>Nama pegawai :'.$this->nama.'
          </br>jabatan : '.$this ->jabatan.'
          </br>Agama : '.$this ->agama.'
          </br>Status : '.$this ->status.'
          </br>Gaji Pokok : RP '.number_format($this -> setGapok()).'
          </br>Tunjangan Jabatan : RP '.number_format($this -> setTunjab()).'
          </br>Tunjangan Keluarga : RP '.number_format($this -> TunKel()).'
          </br>Gaji Kotor : RP '.number_format($this -> setGaKor()).'
          </br>Zakat : RP '.number_format($this -> setZakat()).'
          </br>Gaji Bersih : RP '.number_format($this -> setGaber()).'
        </div>';
  
       
    }
}
?>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.min.js" integrity="sha384-7VPbUDkoPSGFnVtYi0QogXtr74QeVeeIs99Qfg5YCF+TidwNdjvaKZX19NZ/e6oz" crossorigin="anonymous"></script>
  </body>
</html>