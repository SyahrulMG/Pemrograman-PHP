<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

    <title>Form Registrasi</title>
  </head>
  <body>
  <div class="col-12 col-md-10 col-lg-8 table-responsive m-auto card  overflow-hidden pt-3">
  <button class="btn btn-secondary" type="button">Form Registrasi</button>  
  <form id="contactForm" data-sb-form-api-token="API_TOKEN" method="POST">
        <div class="mb-3">
            <label class="form-label" for="nama">Nama</label>
            <input class="form-control" id="nama" type="text" placeholder="Nama" name="nama" data-sb-validations="required" />
            <div class="invalid-feedback" data-sb-feedback="nama:required">Nama is required.</div>
        </div>
        <div class="mb-3">
            <label class="form-label" for="agama">Agama</label>
            <select class="form-select" id="agama" name="agama" aria-label="Agama">
                <option >==Pilih Agama==</option>
                <option value="Islam" name="Islam">Islam</option>
                <option value="Kristen" name="kriten">Kristen</option>
                <option value="Hindu" name="hindu">Hindu</option>
                <option value="Budha" name="budha">Budha</option>
            </select>
        </div>
        <div class="mb-3">
            <label class="form-label d-block">Jabatan</label>
            <div class="form-check form-check-inline">
                <input class="form-check-input" id="manager" type="radio" name="jabatan" value="manager" data-sb-validations="required" />
                <label class="form-check-label" for="manager" name="manager">Manager</label>
            </div>
            <div class="form-check form-check-inline">
                <input class="form-check-input" id="asistenManager" type="radio" name="jabatan" value="asisten" data-sb-validations="required" />
                <label class="form-check-label" for="asistenManager">Asisten</label>
            </div>
            <div class="form-check form-check-inline">
                <input class="form-check-input" id="kepalaBagian" type="radio" name="jabatan" value="kabag" data-sb-validations="required" />
                <label class="form-check-label" for="kepalaBagian">Kabag</label>
            </div>
            <div class="form-check form-check-inline">
                <input class="form-check-input" id="staff" type="radio" name="jabatan" value="staff" data-sb-validations="required" />
                <label class="form-check-label" for="staff">Staff</label>
            </div>
            <div class="invalid-feedback" data-sb-feedback="jabatan:required">One option is required.</div>
        </div>
        <div class="mb-3">
            <label class="form-label d-block">Status</label>
            <div class="form-check form-check-inline">
                <input class="form-check-input" id="menikah" type="radio" name="status" value="menikah" data-sb-validations="required" />
                <label class="form-check-label" for="menikah">Menikah</label>
            </div>
            <div class="form-check form-check-inline">
                <input class="form-check-input" id="belumMenikah" type="radio" name="status" value="belum menikah" data-sb-validations="required" />
                <label class="form-check-label" for="belumMenikah">Belum menikah</label>
            </div>
            <div class="invalid-feedback" data-sb-feedback="status:required">One option is required.</div>
        </div>
        <div class="mb-3">
            <label class="form-label" for="jumlahAnak">Jumlah Anak</label>
            <input class="form-control" id="jumlahAnak" type="text" placeholder="Jumlah Anak" name="anak" data-sb-validations="required" />
            <div class="invalid-feedback" data-sb-feedback="jumlahAnak:required">Jumlah Anak is required.</div>
        </div>
      
            <button class="btn btn-primary btn-lg disabled" id="submitButton" type="submit" name="kirim">Simpan </button>
        </div>
    </form>
</div>
<?php
$nama = $_POST ['nama'];
$agama = $_POST['agama'];
$jabatan = $_POST['jabatan'];
$status = $_POST['status'];
$anak = $_POST['anak'];
$tombol = $_POST['kirim'];
$gjkotor = 0;

//Menentukan jabatan
switch ($jabatan) {
  case 'manager':
       $gjpokok = 20000000;
        break;
  case 'asisten':
       $gjpokok = 15000000;
        break;
  case 'kabag': 
       $gjpokok = 10000000;
   break;
  case 'staff':
       $gjpokok = 4000000;
        break;
  default :
        $gjpokok = 0 ;
   break;
}
//tentukan tunjangan jabatan
$tunjab = $gjpokok*20/100;

//tunjangan keluarga
if ($status =='menikah' && $anak <= 2){
  $tunjkel = $gjpokok*5/100;
}else if ($status =='menikah' && $anak <= 5){
  $tunjkel = $gjpokok*10/100;
}else if ($status =='menikah' && $anak >= 6){
  $tunjkel = $gjpokok*15/100;
}else $tunjkel=0;

//Tentukan gaji kotor
  $gjkotor = $gjpokok + $tunjab + $tunjkel;
  
  $no=1;
   //zakat profesi
  $zakat = ($gjkotor >= 6000000 && $agama == "Islam") ? 2.5 * $gjkotor/100 : 0 ;
  //takehomePay
  $takeHome = $gjkotor - $zakat;

// efent ketika tombol di tekan
if (isset($tombol)) { ?>
<div class="container mt-5">
        <div class="row">
            <div class=" table-responsive m-auto card  overflow-hidden pt-3">
            <button class="btn btn-secondary" type="button">Data kariawan</button>    
            <table class="table">
                    <thead class="bg-dark text-white rounded">
                        <tr>
                            <th scope="col">No</th>
                            <th scope="col">Nama Pegawai</th>
                            <th scope="col">Agama</th>
                            <th scope="col">Jabatan</th>
                            <th scope="col">Status</th>
                            <th scope="col">Jumlah Anak</th>
                            <th scope="col">Gaji Pokok</th>
                            <th scope="col">Tunjangan Jabatan</th>
                            <th scope="col">Tunjangan Keluarga</th>
                            <th scope="col">Gaji Kotor</th>
                            <th scope="col">Zakat Profesi</th>
                            <th scope="col">Take HomePay</th>     
                        </tr>
                    </thead>
                    <tbody class="bg-dark text-white rounded">
                        <tr>
                            <td><?= $no; ?></td>
                            <td ><?= $nama; ?></td>
                            <td ><?= $agama; ?></td>
                            <td ><?= $jabatan; ?></td>
                            <td ><?= $status; ?></td>
                            <td ><?= $anak; ?></td>
                            <td><?= number_format($gjpokok, 2, ',', '.'); ?></td>
                            <td><?= number_format($tunjab, 2, ',', '.'); ?></td>
                            <td><?= number_format($tunjkel, 2, ',', '.'); ?></td>
                            <td><?= number_format($gjkotor, 2, ',', '.'); ?></td>
                            <td><?= number_format($zakat, 2, ',', '.'); ?></td>
                            <td><?= number_format($takeHome, 2, ',', '.'); ?></td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
   <?php } ?>
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.7/dist/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
       
  </body>
</html>