<?php
include_once 'koneksi.php';
include_once 'models/Paramedik.php';

//step pertama yaitu menangkap request form
$nama = $_POST['nama'];
$gender = $_POST['gender'];
$tmp_lahir = $_POST['tmp_lahir'];
$tgl_lahir = $_POST['tgl_lahir'];
$kategori = $_POST['kategori'];
$telpon = $_POST['telpon'];
$alamat = $_POST['alamat'];
$unitkerja = $_POST['unit_kerja_id'];

//menangkapan form diatas dijadikan array
$data = [
    $nama,
    $gender,
    $tmp_lahir,
    $tgl_lahir,
    $kategori,
    $telpon,
    $alamat,
    $unitkerja
];
$model = new Paramedik();
$tombol = $_REQUEST['proses'];
switch($tombol){
    case 'simpan':$model->simpan($data); break;
    case 'ubah':
        $data[] = $_POST['idx']; $model->edit($data);break;
    case 'hapus':
        unset($data); $model->hapus($_POST['idx']); break;
    default:
    header('Location:index.php?url=paramedik');
    break;
}
header('Location:index.php?url=paramedik');

?>