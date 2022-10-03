<?php

require_once 'lingkaran.php';
require_once 'persegiPanjang.php';
require_once 'segitiga.php';

$ar_judul = ['No', 'Nama Bidang', 'Keterangan', 'Luas Bidang', 'Keliling Bidang'];

$lingkaran1 = new Lingkaran(15);
$lingkaran2 = new Lingkaran(30);
$persegipanjang1 = new PersegiPanjang(5, 6);
$persegipanjang2 = new PersegiPanjang(4, 12);
$segitiga1 = new Segitiga(3, 3);
$segitiga2 = new Segitiga(6, 12);

$kumpulan_bidang = [$lingkaran1, $lingkaran2, $persegipanjang1, $persegipanjang2, $segitiga1, $segitiga2];

?>

<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Tugas 5_PHP</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">
</head>

<body class="bg-blue text-black">
    <div class="container my-5">
       <div class="alert alert-primary" role="alert">
           <h3 class="text-center">Kumpulan Bidang</h3>
       </div>
        <table class="table table-dark table-striped">
            <thead>
                <tr>
                    <?php
                    foreach ($ar_judul as $juduls) {
                    ?>
                        <th><?= $juduls ?></th>
                    <?php } ?>
                </tr>
            </thead>
            <tbody>
                <?php
                $no = 1;
                foreach ($kumpulan_bidang as $bidang) { ?>
                    <tr>
                        <td><?= $no++; ?></td>
                        <td><?= $bidang->namaBidang(); ?></td>
                        <td><?= $bidang->keterangan(); ?></td>
                        <td><?= $bidang->luasBidang(); ?></td>
                        <td><?= $bidang->kelilingBidang(); ?></td>
                    </tr>
                <?php } ?>
            </tbody>
        </table>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-u1OknCvxWvY5kfmNBILK2hRnQC3Pr17a+RTT6rIHI7NnikvbZlHgTPOOmMi466C8" crossorigin="anonymous">
    </script>
</body>

</html>