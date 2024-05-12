<?php
class Pasien {
 private $koneksi;
 public function __construct(){
    global $dbh; //instance object koneksi.php
    $this->koneksi = $dbh;
}   
 public function dataPasien(){
    $sql = "SELECT * FROM pasien ";
    $ps = $this->koneksi->prepare($sql);
    $ps->execute();
    $rs = $ps->fetchAll();
    return $rs;
}
public function simpan($data){
    $sql = "INSERT INTO pasien (kode, nama, tmp_lahir, tgl_lahir, gender, email, alamat, kelurahan_id) VALUES (?,?,?,?,?,?,?,?)";
    $ps = $this->koneksi->prepare($sql);
    $ps->execute($data);
}
public function getPasien($id){
    $sql = "SELECT * FROM pasien WHERE id=?";
    $ps = $this->koneksi->prepare($sql);
    $ps->execute([$id]);
    $rs = $ps->fetch();
    return $rs;
}
public function edit($data){
    $sql = "UPDATE pasien SET kode=?, nama=?, tmp_lahir=?, tgl_lahir=?, gender=?, email=?, alamat=?, kelurahan_id=? WHERE id=?";
    $ps = $this->koneksi->prepare($sql);
    $ps->execute($data);
}
public function hapus($id){
    $sql = "DELETE FROM pasien WHERE id=?";
    $ps = $this->koneksi->prepare($sql);
    $ps->execute([$id]);
}


}

?>