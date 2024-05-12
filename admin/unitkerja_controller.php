<?php
include_once 'koneksi.php';
include_once 'models/Unitkerja.php';

//step pertama yaitu menangkap request form
$nama = $_POST['nama'];

//menangkapan form diatas dijadikan array
$data = [
    $nama,
];
$model = new Unitkerja();
$tombol = $_REQUEST['proses'];
switch($tombol){
    case 'simpan':$model->simpan($data); break;
    case 'ubah':
        $data[] = $_POST['idx']; $model->edit($data);break;
    case 'hapus':
        unset($data); $model->hapus($_POST['idx']); break;
    default:
    header('Location:index.php?url=unitkerja');
    break;
}
header('Location:index.php?url=unitkerja');

?>