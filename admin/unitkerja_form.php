<?php
error_reporting(1);
$obj_unit_kerja = new Unitkerja();
$data_unit_kerja = $obj_unit_kerja->dataunitkerja();
$idedit = $_REQUEST['idedit'];
$uk = !empty($idedit) ? $obj_unit_kerja->getUnitkerja($idedit) : array() ;

?>
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css"> 
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">

<form id="daftar-form" method="POST" action="unitkerja_controller.php">
        <div class="daftar-container-1">
          <div class="form">
            <label for="nama">Unit Kerja</label>
            <input id="nama" name="nama" type="text" class="form-control" placeholder="Misal U10234" value="<?= $uk['nama']?>">
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
</form>