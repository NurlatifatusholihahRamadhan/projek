<?php
class Paramedik {
 private $koneksi;
 public function __construct(){
    global $dbh; //instance object koneksi.php
    $this->koneksi = $dbh;
}   
 public function dataParamedik(){
    $sql = "SELECT * FROM paramedik ";
    $ps = $this->koneksi->prepare($sql);
    $ps->execute();
    $rs = $ps->fetchAll();
    return $rs;
}
public function simpan($data){
    $sql = "INSERT INTO paramedik (nama, gender, tmp_lahir, tgl_lahir, kategori, telpon, alamat, unit_kerja_id) VALUES (?,?,?,?,?,?,?,?)";
    $ps = $this->koneksi->prepare($sql);
    $ps->execute($data);
}
public function getParamedik($id){
    $sql = "SELECT * FROM paramedik WHERE id=?";
    $ps = $this->koneksi->prepare($sql);
    $ps->execute([$id]);
    $rs = $ps->fetch();
    return $rs;
}
public function edit($data){
    $sql = "UPDATE paramedik SET nama=?, gender=?, tmp_lahir=?, tgl_lahir=?, kategori=?, telpon=?, alamat=?, unit_kerja_id=? WHERE id=?";
    $ps = $this->koneksi->prepare($sql);
    $ps->execute($data);
}
public function hapus($id){
    $sql = "DELETE FROM paramedik WHERE id=?";
    $ps = $this->koneksi->prepare($sql);
    $ps->execute([$id]);
}


}

?>