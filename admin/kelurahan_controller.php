<?php
include_once 'koneksi.php';
include_once 'models/Kelurahan.php';

//step pertama yaitu menangkap request form
$nama = $_POST['nama'];
$kec = $_POST['kec_id'];

//menangkapan form diatas dijadikan array
$data = [
    $nama,
    $kec,
];
$model = new Kelurahan();
$tombol = $_REQUEST['proses'];
switch($tombol){
    case 'simpan':$model->simpan($data); break;
    case 'ubah':
        $data[] = $_POST['idx']; $model->edit($data);break;
    case 'hapus':
        unset($data); $model->hapus($_POST['idx']); break;
    default:
    header('Location:index.php?url=kelurahan');
    break;
}
header('Location:index.php?url=kelurahan');

?>