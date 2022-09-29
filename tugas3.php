<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Daftar Nilai Mahasiswa</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">
  </head>
  <body>
    <?php
    $mhs1 = ['nim'=>'19650001','nama'=>'Ahmad','nilai'=>80];
    $mhs2 = ['nim'=>'19650002','nama'=>'Andi','nilai'=>60];
    $mhs3 = ['nim'=>'19650003','nama'=>'Udin','nilai'=>90];
    $mhs4 = ['nim'=>'19650004','nama'=>'Ani','nilai'=>87];
    $mhs5 = ['nim'=>'19650005','nama'=>'Bunga','nilai'=>88];
    $mhs6 = ['nim'=>'19650006','nama'=>'Santoso','nilai'=>65];
    $mhs7 = ['nim'=>'19650007','nama'=>'Budi','nilai'=>50];
    $mhs8 = ['nim'=>'19650008','nama'=>'Sri','nilai'=>89];
    $mhs9 = ['nim'=>'19650009','nama'=>'Bambang','nilai'=>99];
    $mhs10 = ['nim'=>'19650010','nama'=>'Bagus','nilai'=>97];
    $mahasiswa = [$mhs1,$mhs2,$mhs3,$mhs4,$mhs5,$mhs6,$mhs7,$mhs8,$mhs9,$mhs10];
    
    //array untuk judul tabel
    $judul = ['No','Nim','Nama','Nilai','Keterngan','Grade','Predikat'];
    ?>
    
    <div class="container mt-5">
        <div class="row">
        <div class="col-12 col-md-10 col-lg- table-responsive m-auto card  overflow-hidden pt-3">
        <div class="alert alert-primary" role="alert"><h3 align = "center">DAFTAR NILAI MAHASISWA</h3> </div>
            <table class="table">
                    <thead class="bg-dark text-white">
                        <tr>
                            <?php
                            foreach ($judul as $title) {
                            ?>
                            <th scope="col"><?= $title ?></th>  
                            <?php } ?>   
                        </tr>
                    </thead>
                    <tbody class="bg-dark text-white">
                    <?php
                    $no = 1;
                    foreach ($mahasiswa as $mhs) {
                        
                        $nim = $mhs['nim'];
                        $nama = $mhs['nama'];
                        $nilai = $mhs['nilai'];
                        $ket = ($nilai >= 60) ? 'Lulus' : 'Gagal';

                        if ($nilai >=90 && $nilai <=100) {
                            $grade = 'A';
                        }else if ($nilai >=80 && $nilai <=90) {
                            $grade = 'B';
                        }else if ($nilai >=70 && $nilai <=80) {
                            $grade = 'C';
                        }else if ($nilai >=60 && $nilai <=70) {
                            $grade = 'D';
                        }else $grade = 'E';
                    
                        //Menentukan Predikat
                        switch ($grade) {
                            case 'A': $predikat = 'memuaskan';
                                break;
                            case 'B': $predikat = 'Baik';
                                break;
                            case 'C': $predikat = 'Cukup';
                                break;
                            case 'D': $predikat = 'Kurang';
                                break;
                            default:
                                $predikat = 'buruk';
                                break;
                        } 
                    ?>
                        <tr>
                            <td><?= $no++; ?></td>
                            <td ><?= $nim; ?></td>
                            <td ><?= $nama; ?></td>
                            <td ><?= $nilai; ?></td>
                            <td ><?= $ket; ?></td>
                            <td ><?= $grade; ?></td>
                            <td ><?= $predikat; ?></td>
                        </tr>
                        <?php } ?>
                    </tbody>
                    
                    <tfoot>
                    
                        <?php
                        $jumlahMhs = count($mahasiswa);
                        $kumpulanNilai = array_column ($mahasiswa,'nilai');
                        $nilaiTotal = array_sum($kumpulanNilai);
                        $nilaiTerbesar = max ($kumpulanNilai);
                        $nilaiTerkecil = min ($kumpulanNilai);
                        $rata2 = $nilaiTotal / $jumlahMhs;

                        $Tfoot = ['Jumlah Mahasiswa'=>$jumlahMhs,
                                   'Nilai Terbesar' => $nilaiTerbesar,
                                   'Nilai Terkecil' => $nilaiTerkecil,
                                   'Rata-Rata' => $rata2
                        ];

                        foreach ($Tfoot as $key => $value) {
                            ?>
                            <tr bgcolor="gray">
                                <td colspan="6"><?= $key; ?></td>
                                <td><?= $value; ?></td>    
                            </tr>
                        <?php } ?>
                    
                    </tfoot>
                </table>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-u1OknCvxWvY5kfmNBILK2hRnQC3Pr17a+RTT6rIHI7NnikvbZlHgTPOOmMi466C8" crossorigin="anonymous"></script>
  </body>

</html>
