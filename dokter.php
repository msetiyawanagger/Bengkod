<form class="form" method="POST" action="" name="myForm" onsubmit="return(validate());">
    <!-- Kode PHP untuk menghubungkan form dengan database -->
    <?php
    $nama = '';
    $alamat = '';
    $no_hp = '';

    if (isset($_GET['id'])) {
        $ambil = mysqli_query($mysqli, "SELECT * FROM poliklinik WHERE id='" . $_GET['id'] . "'");
        while ($row = mysqli_fetch_array($ambil)) {
            $nama = $row['nama'];
            $alamat = $row['alamat'];
            $no_hp = $row['no_hp'];
        }
    ?>
        <input type="hidden" name="id" value="<?php echo $_GET['id']; ?>">
    <?php
    }
    ?>
    <!-- Input Nama -->
    <div class="form-group mb-3">
        <label for="inputNama" class="form-label fw-bold">Nama</label>
        <input type="text" class="form-control" name="nama" id="inputNama" placeholder="Nama" value="<?php echo $nama; ?>" required>
    </div>

    <!-- Input Alamat -->
    <div class="form-group mb-3">
        <label for="inputAlamat" class="form-label fw-bold">Alamat</label>
        <input type="text" class="form-control" name="alamat" id="inputAlamat" placeholder="Alamat" value="<?php echo $alamat; ?>" required>
    </div>

    <!-- Input No HP -->
    <div class="form-group mb-3">
        <label for="inputNoHp" class="form-label fw-bold">No HP</label>
        <input type="text" class="form-control" name="no_hp" id="inputNoHp" placeholder="No HP" value="<?php echo $no_hp; ?>" required>
    </div>

    <!-- Tombol Simpan -->
    <div class="form-group">
        <button type="submit" class="btn btn-primary rounded-pill px-3" name="simpan">Simpan</button>
    </div>
</form>


<!-- Table -->
<table class="table table-hover">
    <!--thead atau baris judul-->
    <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">Nama</th>
            <th scope="col">Alamat</th>
            <th scope="col">No HP</th>
            <th scope="col">Aksi</th>
        </tr>
    </thead>
    <!--tbody berisi isi tabel sesuai dengan judul atau head-->
    <tbody>
        <!-- Kode PHP untuk menampilkan semua isi dari tabel urut berdasarkan status dan tanggal awal -->
        <?php
        // Mengambil data dari tabel kegiatan, urutkan berdasarkan status dan tanggal_awal
        $result = mysqli_query($mysqli, "SELECT * FROM dokter ORDER BY nama, alamat, no_hp");
        $no = 1;

        // Menampilkan data dalam tabel
        while ($data = mysqli_fetch_array($result)) {
        ?>
            <tr>
                <th scope="row"><?php echo $no++; ?></th>
                <td><?php echo $data['nama']; ?></td> <!-- Menampilkan data 'nama' -->
                <td><?php echo $data['alamat']; ?></td> <!-- Menampilkan data 'alamat' -->
                <td><?php echo $data['no_hp']; ?></td> <!-- Menampilkan data 'no_hp' -->
                <td>

                    <a class="btn btn-info rounded-pill px-3"
                    href="index.php?id=<?php echo $data['id']; ?>">Ubah
                    </a>
                    <a class="btn btn-danger rounded-pill px-3"
                    href="index.php?id=<?php echo $data['id']; ?>&aksi=hapus">Hapus
                    </a>
                </td>
            </tr>
        <?php
        }
        ?>
    </tbody>
</table>


<?php
$result = mysqli_query($mysqli, "SELECT * FROM dokter");
$no = 1;

while ($data = mysqli_fetch_array($result)) {
?>
    <tr>
        <td><?php echo $no++ ?></td>
        <td><?php echo $data['nama'] ?></td>
        <td><?php echo $data['alamat'] ?></td>
        <td><?php echo $data['no_hp'] ?></td>
        <td>
            <a class="btn btn-success rounded-pill px-3" href="index.php?page=dokter&id=<?php echo $data['id'] ?>">Ubah</a>
            <a class="btn btn-danger rounded-pill px-3" href="index.php?page=dokter&id=<?php echo $data['id'] ?>&aksi=hapus">Hapus</a>
        </td>
    </tr>
<?php
}
?>
