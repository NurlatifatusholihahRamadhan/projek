<?php
include_once 'koneksi.php';
include_once 'models/Pasien.php';

//step pertama yaitu menangkap request form
$kode = $_POST['kode'];
$nama = $_POST['nama'];
$tmp_lahir = $_POST['tmp_lahir'];
$tgl_lahir = $_POST['tgl_lahir'];
$gender = $_POST['gender'];
$email = $_POST['email'];
$alamat = $_POST['alamat'];
$kel = $_POST['kelurahan_id'];

//menangkapan form diatas dijadikan array
$data = [
    $kode,
    $nama,
    $tmp_lahir,
    $tgl_lahir,
    $gender,
    $email,
    $alamat,
    $kel
];
$model = new Pasien();
$tombol = $_REQUEST['proses'];
switch($tombol){
    case 'simpan':$model->simpan($data); break;
    case 'ubah':
        $data[] = $_POST['idx']; $model->edit($data);break;
    case 'hapus':
        unset($data); $model->hapus($_POST['idx']); break;
    default:
    header('Location:index.php?url=pasien');
    break;
}
header('Location:index.php?url=pasien');

?>