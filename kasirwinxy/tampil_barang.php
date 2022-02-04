<?php
include 'index.php';
?>

<table border="1" class="table table-dark table-striped">
        <tr>
            <td>ID Barang</td>
            <td>Nama Barang</td>
            <td>Harga</td>
            <td>Stok</td>
            <td>Foto</td>
            <td colspan="2">Aksi</td>
        </tr>
        <?php
        include "koneksi.php";
        $query = mysqli_query($koneksi, "SELECT * FROM barang");
        while ($data = mysqli_fetch_array($query)) {
        ?>
            <tr>
                <td> <?php echo $data['id_barang'] ?> </td>
                <td> <?php echo $data['nama_barang'] ?> </td>
                <td> <?php echo $data['harga'] ?> </td>
                <td> <?php echo $data['stok'] ?></td>
                <td> <img src="gambar/<?php echo $data['foto'] ?>" width="70px" height="80px"></td>
                <td><a href="edit_barang.php?nama_barang=<?php echo $data['nama_barang'] ?>">Edit</td>
                <td><a href="hapus_barang.php?id_barang=<?php echo $data['id_barang'] ?>">Hapus</td>

            </tr>
        <?php } ?>
    </table>