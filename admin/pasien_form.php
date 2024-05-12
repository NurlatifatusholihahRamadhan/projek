<?php
error_reporting(0);
$obj_pasien = new Pasien();
$data_pasien = $obj_pasien->datapasien();
$idedit = $_REQUEST['idedit'];
$ps = !empty($idedit) ? $obj_pasien->getPasien($idedit) : array() ;

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
    <div class="nav-logo">DATA PASIEN</div>
  </nav>
  <div id="main">
    <div>
      <h3>Masukkan Data yang diperlukan</h3>
      <p>Kami menghimbau Anda untuk memasukkan data dengan benar dalam formulir pendaftaran kami. Data yang akurat sangat penting bagi kami untuk memberikan perawatan terbaik kepada Anda. Mohon pastikan semua informasi yang Anda berikan sudah benar dan lengkap.</p>
    </div>
    <fieldset class="daftar-card">
      <legend>Form Data Pasien</legend>
      <form id="daftar-form" method="POST" action="pasien_controller.php">
        <div class="daftar-container-1">
          <div class="form">
            <label for="kode">Kode Pasien</label>
            <input id="kode" name="kode" type="text" class="form-control" placeholder="Misal K10234" value="<?= $ps['kode']?>">
          </div>
          <div class="form">
            <label for="nama">Nama Pasien</label>
            <input id="nama" name="nama" type="text" class="form-control" placeholder="Masukkan Nama" value="<?= $ps['nama']?>">
          </div>
          <div class="form">
            <label for="tmp_lahir">Tempat Lahir</label>
            <input id="tmp_lahir" name="tmp_lahir" type="text" class="form-control" placeholder="Tempat Lahir Pasien" value="<?= $ps['tmp_lahir']?>">
          </div>
          <div class="form">
            <label for="tgl_lahir">Tanggal Lahir</label>
            <input id="tgl_lahir" name="tgl_lahir" type="date" class="form-control" placeholder="Tanggal Lahir Pasien" value="<?= $ps['tgl_lahir']?>">
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
          <div class="form">
            <label for="gender" class="form-label">Jenis Kelamin</label>
            <div class="checkbox">
                <input name="gender" id="radio_1" type="radio" value="L" <?= $ps['gender'] == 'L' ? 'checked' : '' ?>>
                <label for="radio_1">Laki-Laki</label>
                <input name="gender" id="radio_2" type="radio" value="P" <?= $ps['gender'] == 'P' ? 'checked' : '' ?>>
                <label for="radio_2">Perempuan</label>
            </div>
          </div>
          <div class="form">
            <label for="email">Email</label>
            <input id="email" name="email" type="email" class="form-control" placeholder="Masukkan Email" value="<?= $ps['email']?>">
          </div>
          <div class="form">
            <label for="alamat">Alamat</label>
            <input id="alamat" name="alamat" type="textarea" class="form-control" placeholder="Masukkan Alamat" value="<?= $ps['alamat']?>">
          </div>
          <div class="form">
          <label for="kel">Kelurahan ID</label>
          <?php
            $sqlkelurahan = "SELECT * FROM kelurahan";
            $kelurahan = $dbh->query($sqlkelurahan);
            ?>
            <select class="form-control" id="kelurahan_id" name="kelurahan_id">
                <?php
                foreach ($kelurahan as $rowkelurahan) {
                ?>
                    <option value="<?= $rowkelurahan['id'] ?>" <?= $ps['kelurahan_id'] == $rowkelurahan['id'] ? 'selected' : '' ?>><?= $rowkelurahan['nama'] ?></option>
                <?php
                }
                ?>
            </select>
          </div>
        </div>
      </form>
    </fieldset>
</body>