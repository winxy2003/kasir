<?php
include "index.php";
?>
<!DOCTYPE html>
<html>

<head>
    <title>CRUD Barang, Bagian Edit Data</title>
</head>

<body>
    <h2>Edit Data User</h2>
    <br>
    <form action="update_transaksi.php" method="POST">
        <?php
        include 'koneksi.php';
        $id_barang = $_GET['id_transaksi'];
        $query = mysqli_query($koneksi, "SELECT * FROM transaksi WHERE id_transaksi='$id_barang'");
        while ($data = mysqli_fetch_array($query)) {
        ?>
            <table>
                <tr>
                    <td>ID transaksi</td>
                    <td><input type="text" name="id_transaksi" value="<?php echo $data['id_transaksi'] ?>"></td>
                </tr>
                <tr>
                    <td>Tanggal</td>
                    <td><input type="text" name="tanggal" value="<?php echo $data['tanggal'] ?>"></td>
                </tr>
                <tr>
                    <td>Nama barang</td>
                    <td>
                    <select name="id_barang" id="id_barang" onchange="changeValue(this.value)">
                        <?php
                        include "koneksi.php";
                        $query = mysqli_query($koneksi, "SELECT * FROM barang");
                        $jsArray =  "var dtBrg =  new Array();\n";
                        while ($data = mysqli_fetch_array($query)) {
                            echo "<option value = $data[id_barang]> $data[nama_barang] </option>";
                            $jsArray .= "dtBrg['" . $data['id_barang'] . "'] 
                            = {harga:'" . addslashes($data['harga']) . "'};";
                        }
                        ?>
                    </select><br>
                </td>
                </tr>
                <tr>
                    <td>Jumlah</td>
                    <td><input type="text" name="jumlah" value="<?php echo $data['jumlah'] ?>" onekeyup="hitung();"></td>
                </tr>
                <tr>
                    <td>Total</td>
                    <td><input type="text" name="total" value="<?php echo $data['total'] ?>"></td>
                </tr>
                <tr>
                    <td><input type="submit" name="update" value="Update"></td>
                </tr>
            </table>
        <?php } ?>
    </form>
    <script>
    <?php echo $jsArray; ?>
    //menampilkan perubahan harga ketika nama barang dirubah klik
    function changeValue(id_barang) {
        document.getElementById('id_transaksi').value = dtBrg[id_barang].harga;
    };
    //menghitung total = jumlah * harga
    function hitung() {
        var jumlah = document.getElementById('jumlah').value;
        var harga_barang = document.getElementById('id_transaksi').value;
        var result = parseInt(jumlah) * parseInt(id_transaksi);
        if (!isNaN(result)) {
            document.getElementById('total').value = result;
        }
    }
</script>
</body>

</html>