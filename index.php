<?php
include 'koneksi.php';
include 'header.php';
?>
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Daftar Mahasiswa</h1>
        <a href="mahasiswatambah.php" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i class="fas fa-download fa-sm text-white-50"></i> Tambah Data</a>
    </div>
    <div class="row">
        <div class="col-md-12 mb-4">
            <div class="card border-left-primary shadow h-100 py-2">
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-striped" id="table">
                            <thead>
                                <tr>
                                    <th>No.</th>
                                    <th>NISN</th>
                                    <th>Nama</th>
                                    <th>Jenis Kelamin</th>
                                    <th>Foto Siswa</th>
                                    <th>Alamat</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $no = 1;
                                $ambil = $koneksi->query("select * from mahasiswa order by idmahasiswa desc");
                                while ($row = $ambil->fetch_assoc()) {
                                ?>
                                    <tr>
                                        <td><?= $no ?></td>
                                        <td><?= $row['nisn'] ?></td>
                                        <td><?= $row['nama'] ?></td>
                                        <td><?= $row['jeniskelamin'] ?></td>
                                        <td><?= $row['foto'] ?></td>
                                        <td><?= $row['alamat'] ?></td>
                                        <td>
                                            <a class="btn btn-warning" href="mahasiswaedit.php?id=<?= $row['idmahasiswa'] ?>">Edit</a>
                                            <a class="btn btn-danger" href="mahasiswahapus.php?id=<?= $row['idmahasiswa'] ?>" onclick="return confirm('Apakah anda yakin ingin menghapus data ini ?')">Hapus</a>
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
        </div>
    </div>
</div>
<?php
include 'footer.php';
?>