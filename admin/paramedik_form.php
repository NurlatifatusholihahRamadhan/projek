<?php
error_reporting(0);
$obj_paramedik = new Paramedik();
$data_paramedik = $obj_paramedik->dataparamedik();
$idedit = $_REQUEST['idedit'];
$pm = !empty($idedit) ? $obj_paramedik->getParamedik($idedit) : array() ;

?>
<head>
  <link rel="preconnect" href="https://fonts.googleapis.com" />
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
  <link
    href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,400;0,600;0,700;0,800;0,900;1,100&display=swap"
    rel="stylesheet" />
  <link rel="stylesheet" href="style.css" />
</head>
<body>
  <nav class="nav-bar" id="mini-navbar">
    <div class="nav-logo">DATA PARAMEDIK</div>
  </nav>
  <div id="main">
    <div>
      <h3>Masukkan Data yang diperlukan</h3>
      <p>Kami menghimbau Anda untuk memasukkan data dengan benar dalam formulir pendaftaran kami. Data yang akurat sangat penting bagi kami untuk memberikan perawatan terbaik kepada Anda. Mohon pastikan semua informasi yang Anda berikan sudah benar dan lengkap.</p>
    </div>
    <fieldset class="daftar-card">
      <legend>Form Data Paramedik</legend>
      <form id="daftar-form" method="POST" action="paramedik_controller.php">
        <div class="daftar-container-1">
          <div class="form">
            <label for="nama">Nama</label>
            <input id="nama" name="nama" type="text" class="form-control" placeholder="Nama Lengkap" value="<?= $pm['nama']?>">
          </div>
          <div class="form">
            <label for="gender" class="form-label">Jenis Kelamin</label>
            <div class="checkbox">
                <input name="gender" id="radio_1" type="radio" value="L" <?= $pm['gender'] == 'L' ? 'checked' : '' ?>>
                <label for="radio_1">Laki-Laki</label>
                <input name="gender" id="radio_2" type="radio" value="P" <?= $pm['gender'] == 'P' ? 'checked' : '' ?>>
                <label for="radio_2">Perempuan</label>
            </div>
          </div>
          <div class="form">
            <label for="tmp_lahir">Tempat Lahir</label>
            <input id="tmp_lahir" name="tmp_lahir" type="text" class="form-control" placeholder="Tempat Lahir Pasien" value="<?= $pm['tmp_lahir']?>">
          </div>
          <div class="form">
            <label for="tgl_lahir">Tanggal Lahir</label>
            <input id="tgl_lahir" name="tgl_lahir" type="date" class="form-control" placeholder="Tanggal Lahir Pasien" value="<?= $pm['tgl_lahir']?>">
          </div>
          <div class="form">
            <div>
            <?php
            if(empty($idedit)){
            ?>
            <button name="proses" type="submit" value="simpan" class="btn btn-primary" id="btn-submit-form">Submit</button>
            <?php

            } else {
            ?>
            <button name="proses" type="submit" value="ubah" class="btn btn-danger">Update</button>
            <input type="hidden" name="idx" value="<?= $idedit ?>">
            <?php } ?>
            </div>
          </div>
        </div>
        <div class="daftar-container-2">
        <div class="form-group row
          <?php
          $ar_kategori = ["DU"=>"Dokter Umum", "PW"=>"Perawat", "BD"=>"Bidan", "DS"=>"Dokter Spesialis"]; //Array Prodi
          ?> 
          <label for="select">Kategori</label> 
          <div class="form">
            <select id="select" name="kategori" class="form-control">
              <?php
              foreach ($ar_kategori as $kategori => $k) {
              ?>
              <option value="<?= $k ?>"<?= $pm['kategori'] == $k ? 'selected' : '' ?>><?= $k ?></option>

              <?php } ?>

              </select>
            </div>
          </div>
          <div class="form">
            <label for="telpon">No Telpon</label>
            <input id="telpon" name="telpon" type="text" class="form-control" placeholder="EX: 08123456789" value="<?= $pm['telpon']?>">
          </div>
          <div class="form">
            <label for="alamat">Alamat</label>
            <input id="alamat" name="alamat" type="text" class="form-control" placeholder="Masukkan Alamat" value="<?= $pm['alamat']?>">
          </div>
          <div class="form">
          <label for="unit_kerja_id">UNIT KERJA ID</label>
          <?php
            $sqlunitkerja = "SELECT * FROM unitkerja";
            $unitkerja = $dbh->query($sqlunitkerja);
            ?>
            <select class="form-control" id="nama" name="unit_kerja_id">
                <?php
                foreach ($unitkerja as $rowunitkerja) {
                ?>
                    <option value="<?= $rowunitkerja['id'] ?>" <?= $pm['nama'] == $rowunitkerja['id'] ? 'selected' : '' ?>><?= $rowunitkerja['nama'] ?></option>
                <?php
                }
                ?>
            </select>
          </div>
        </div>
      </form>
    </fieldset>
</body>