<?php
// include_once 'top.php';

// include_once 'menu.php';
$model = new Pasien();
$data_pasien = $model->dataPasien();

// foreach ($data_produk as $row){
//     print $row['kode'];
// }


?>
                        <h1 class="mt-4">Data Pasien</h1>
                        <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item"><a href="index.html">Dashboard</a></li>
                            <li class="breadcrumb-item active">Data Pasien</li>
                        </ol>
                        <div class="card mb-4">
                            <div class="card-body">
                                DataTables is a third party plugin that is used to generate the demo table below. For more information about DataTables, please visit the
                                <a target="_blank" href="https://datatables.net/">official DataTables documentation</a>
                                .
                            </div>
                        </div>
                        <div class="card mb-4">
                            <div class="card-header">
                                <!-- <i class="fas fa-table me-1"></i>
                                DataTable Example -->
                                <!-- membuat tombol mengarahkan ke file produk_form.php -->
                               
                                <a href="index.php?url=pasien_form" class="btn btn-primary btn-sm"> Tambah</a>
                               
                            </div>

                            <div class="card-body">
                                <table id="datatablesSimple">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Kode</th>
                                            <th>Nama</th>
                                            <th>Tempat Lahir</th>
                                            <th>Tanggal Lahir</th>
                                            <th>Gender</th>
                                            <th>Email</th>
                                            <th>Alamat</th>
                                            <th>Kelurahan ID</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tfoot>
                                        <tr>
                                            <th>No</th>
                                            <th>Kode</th>
                                            <th>Nama</th>
                                            <th>Tempat Lahir</th>
                                            <th>Tanggal Lahir</th>
                                            <th>Gender</th>
                                            <th>Email</th>
                                            <th>Alamat</th>
                                            <th>Kelurahan ID</th>
                                            <th>Action</th>
                                        </tr>
                                    </tfoot>
                                    <tbody>
                                        <!-- hapus dari baris 64 sampai 511 -->
                                        <!-- dari <tr> ke </tr> -->
                                        <?php
                                        $no = 1;
                                        foreach($data_pasien as $row){

                                        ?>
                                        <tr>
                                            <td><?= $no ?></td>
                                            <td><?= $row['kode']?></td>
                                            <td><?= $row['nama']?></td>  
                                            <td><?= $row['tmp_lahir']?></td>
                                            <td><?= $row['tgl_lahir']?></td>
                                            <td><?= $row['gender']?></td>
                                            <td><?= $row['email']?></td>
                                            <td><?= $row['alamat']?></td>
                                            <td><?= $row['kelurahan_id']?></td>            
                                            <td>
                                                <form action="pasien_controller.php" method="POST">
                                                <a href="index.php?url=pasien_form&idedit=<?= $row['id']?>" class="btn btn-warning btn-sm">Edit</a>
                                                
                                                <button type="submit" class="btn btn-danger btn-sm" name="proses" value="hapus"
                                                    onclick="return confirm('Anda yakin akan dihapus?')">Hapus</button>
                                                    <input type="hidden" name="idx" value="<?= $row['id']?>">

                                                </form>
                                            </td>
                                        </tr>
                                      <?php
                                        $no++; 
                                        }
                                        ?>
                                    </tbody>
                                </table>
                            </div>

</div>
</div>

                <?php

        // include_once 'bottom.php';
                ?>

