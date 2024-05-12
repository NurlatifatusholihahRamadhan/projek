<?php
class Periksa {
 private $koneksi;
 public function __construct(){
    global $dbh; //instance object koneksi.php
    $this->koneksi = $dbh;
}   
public function dataPeriksa(){
    $sql = "SELECT * FROM periksa ";
    $ps = $this->koneksi->prepare($sql);
    $ps->execute();
    $rs = $ps->fetchAll();
    return $rs;
}
public function simpan($data){
    $sql = "INSERT INTO periksa (tanggal, berat, tinggi, tensi, keterangan, pasien_id, paramedik_id) VALUES (?,?,?,?,?,?,?)";
    $ps = $this->koneksi->prepare($sql);
    $ps->execute($data);
}
public function getPeriksa($id){
    $sql = "SELECT * FROM periksa WHERE id=?";
    $ps = $this->koneksi->prepare($sql);
    $ps->execute([$id]);
    $rs = $ps->fetch();
    return $rs;
}
public function edit($data){
    $sql = "UPDATE periksa SET tanggal=?, berat=?, tinggi=?, tensi=?, keterangan=?, pasien_id=?, paramedik_id=? WHERE id=?";
    $ps = $this->koneksi->prepare($sql);
    $ps->execute($data);
}
public function hapus($id){
    $sql = "DELETE FROM periksa WHERE id=?";
    $ps = $this->koneksi->prepare($sql);
    $ps->execute([$id]);
}

}

?>