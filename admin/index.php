<?php

//memanggil dan memproses file bagian atas
include_once 'koneksi.php';
include_once 'models/Kelurahan.php';
include_once 'models/Pasien.php';
include_once 'models/Periksa.php';
include_once 'models/Paramedik.php';
include_once 'models/Unitkerja.php';

include_once 'top.php';
//memanggil dan memproses file bagian menu
include_once 'menu.php';
?>
 <div id="layoutSidenav_content">
    <main>
        <div class="container-fluid px-4">
            <?php 
            //algoritma menangkap url agar masuk kedalam index
            $url = isset($_GET['url']) ? $_GET['url'] : ''; // Memeriksa apakah $_GET['url'] telah diset sebelum mengaksesnya
            if($url == 'dashboard'){
                include_once 'dashboard.php';
            } else if (!empty($url)){
                include_once $url.'.php';
            } else {
                include_once 'dashboard.php'; // Menambahkan perintah include_once untuk memuat dashboard.php
            }   
            ?>
        </div>
    </main>
</div>
<?php
//memanggil file bagian bawah
include_once 'bottom.php';
?>
