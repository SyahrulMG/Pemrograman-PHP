<?php 
require "new.php"; 
    
$pegawai = [
    [
        "nip" => "19650001", 
        "nama" => "udin", 
        "jabatan" => "Asisten",
        "agama" => "Islam",
        "status" => "Menikah",
    ],

    [
        "nip" => "19650002", 
        "nama" => "Bambang", 
        "jabatan" => "Manager",
        "agama" => "Kristen",
        "status" => "Menikah",
    ],

    
    [
        "nip" => "19650003", 
        "nama" => "Ani", 
        "jabatan" => "Asisten",
        "agama" => "Islam",
        "status" => "Menikah",
    ],

    [
        "nip" => "19650004", 
        "nama" => "Ahmad", 
        "jabatan" => "Staff",
        "agama" => "Islam",
        "status" => "Belum Menikah",
    ],


    [
        "nip" => "19650005", 
        "nama" => "Abdul", 
        "jabatan" => "Manager",
        "agama" => "Islam",
        "status" => "Belum Menikah",
    ],

    ]
    ?>
        <?php 
            foreach ($pegawai as $Data) {
                $nip = $Data['nip'];
                $nama = $Data['nama'];
                $jabatan = $Data['jabatan'];
                $agama = $Data['agama'];
                $status = $Data['status'];

                $pegawai = new Pegawai($nip, $nama, $jabatan, $agama, $status);
                $pegawai->mencetak();
            }
            
           

    