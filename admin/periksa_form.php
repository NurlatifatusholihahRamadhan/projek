<?php
error_reporting(0);
$obj_periksa = new Periksa();
$data_periksa = $obj_periksa->dataperiksa();
$idedit = $_REQUEST['idedit'];
$pr = !empty($idedit) ? $obj_periksa->getPeriksa($idedit) : array() ;

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
    <div class="nav-logo">DATA Periksa</div>
  </nav>
  <div id="main">
    <div>
      <h3>Masukkan Data yang diperlukan</h3>
      <p>Kami menghimbau Anda untuk memasukkan data dengan benar dalam formulir pendaftaran kami. Data yang akurat sangat penting bagi kami untuk memberikan perawatan terbaik kepada Anda. Mohon pastikan semua informasi yang Anda berikan sudah benar dan lengkap.</p>
    </div>
    <fieldset class="daftar-card">
      <legend>Form Data Periksa</legend>
      <form id="daftar-form" method="POST" action="periksa_controller.php">
        <div class="daftar-container-1">
          <div class="form">
            <label for="tanggal">Masukkan Tanggal</label>
            <input id="tanggal" name="tanggal" type="date" class="form-control" placeholder="24-02-2022" value="<?= $pr['tanggal']?>">
          </div>
          <div class="form">
            <label for="berat">Berat Badan</label>
            <input id="berat" name="berat" type="text" class="form-control" placeholder="65" value="<?= $pr['berat']?>">
          </div>
          <div class="form">
            <label for="tinggi">Tinggi Badan</label>
            <input id="tinggi" name="tinggi" type="text" class="form-control" placeholder="175" value="<?= $pr['tinggi']?>">
          </div>
          <div class="form">
            <label for="tensi">Tensi</label>
            <input id="tensi" name="tensi" type="text" class="form-control" placeholder="90" value="<?= $pr['tensi']?>">
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
            <label for="keterangan">Masukkan Keterangan</label>
            <input id="keterangan" name="keterangan" type="text" class="form-control" placeholder="Demam / Alergi" value="<?= $pr['keterangan']?>">
          </div>
          <div class="form">
            <label for="pasien">Pasien ID</label>
            <?php
            $sqlpasien = "SELECT * FROM pasien";
            $pasien = $dbh->query($sqlpasien);
            ?>
            <select class="form-control" id="pasien_id" name="pasien_id">
                <?php
                foreach ($pasien as $rowpasien) {
                ?>
                    <option value="<?= $rowpasien['id'] ?>"><?= $rowpasien['nama'] ?></option>
                <?php
                }
                ?>
            </select>
          </div>
          <div class="form">
          <label for="paramedik">Paramedik ID</label>
          <?php
            $sqlparamedik = "SELECT * FROM paramedik";
            $paramedik = $dbh->query($sqlparamedik);
            ?>
            <select class="form-control" id="paramedik_id" name="paramedik_id">
                <?php
                foreach ($paramedik as $rowparamedik) {
                ?>
                    <option value="<?= $rowparamedik['id'] ?>" <?= $pr['paramedik_id'] == $rowparamedik['id'] ? 'selected' : '' ?>><?= $rowparamedik['nama'] ?></option>
                <?php
                }
                ?>
            </select>
          </div>
        </div>
      </form>
    </fieldset>
</body>