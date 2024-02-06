<?php
include 'koneksi.php';
include 'header.php';
?>
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Tambah Mahasiswa</h1>
    </div>
    <div class="row">
        <div class="col-md-12 mb-4">
            <div class="card border-left-primary shadow h-100 py-2">
                <div class="card-body">
                    <form method="post" enctype="multipart/form-data">
                        <div class="form-group">
                            <label>NISN</label>
                            <input type="number" name="nisn" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label>Nama</label>
                            <input text="text" name="nama" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label>Jenis Kelamin</label>
                            <select name="jeniskelamin" class="form-control" required>
                                <option value="Laki - Laki">Laki - Laki</option>
                                <option value="Perempuan">Perempuan</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label>Foto Siswa</label>
                            <input type="file" name="foto" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label>Alamat</label>
                            <textarea rows="3" name="alamat" class="form-control" required></textarea>
                        </div>
                        <div class="form-group">
                            <button class="btn btn-primary float-right" name="simpan" value="simpan">Simpan</button>
                        </div>
                    </form>
                    <?php
                    if (isset($_POST['simpan'])) {
                        $nisn = $_POST['nisn'];
                        $nama = $_POST['nama'];
                        $jeniskelamin = $_POST['jeniskelamin'];
                        $alamat = $_POST['alamat'];
                        $foto = $_FILES['foto']['name'];
                        $lokasifoto = $_FILES['foto']['tmp_name'];
                        move_uploaded_file($lokasifoto, "foto/" . $foto);
                        $koneksi->query("insert into mahasiswa (nisn,nama,jeniskelamin,foto,alamat) values ('$nisn','$nama','$jeniskelamin','$foto','$alamat')");
                        echo "<script>alert('Data Berhasil Di Simpan');</script>";
                        echo "<script>location='index.php';</script>";
                    }
                    ?>
                </div>
            </div>
        </div>
    </div>
</div>
<?php
include 'footer.php';
?>