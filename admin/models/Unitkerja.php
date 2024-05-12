<?php
class Unitkerja {
 private $koneksi;
 public function __construct(){
    global $dbh; //instance object koneksi.php
    $this->koneksi = $dbh;
}   
 public function dataUnitkerja(){
    $sql = "SELECT * FROM unitkerja ";
    $ps = $this->koneksi->prepare($sql);
    $ps->execute();
    $rs = $ps->fetchAll();
    return $rs;
}
public function simpan($data){
    $sql = "INSERT INTO unitkerja (nama) VALUES (?)";
    $ps = $this->koneksi->prepare($sql);
    $ps->execute($data);
}
public function getUnitkerja($id){
    $sql = "SELECT * FROM unitkerja WHERE id=?";
    $ps = $this->koneksi->prepare($sql);
    $ps->execute([$id]);
    $rs = $ps->fetch();
    return $rs;
}
public function edit($data){
    $sql = "UPDATE unitkerja SET nama=? WHERE id=?";
    $ps = $this->koneksi->prepare($sql);
    $ps->execute($data);
}
public function hapus($id){
    $sql = "DELETE FROM unitkerja WHERE id=?";
    $ps = $this->koneksi->prepare($sql);
    $ps->execute([$id]);
}

}

?>