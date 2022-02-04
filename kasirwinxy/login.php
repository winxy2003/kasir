<?php
include "index.php";
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kasir</title>
</head>

<body>
    <h2>CRUD Data User</h2>

    <form action="simpan_foto.php" method="POST" enctype="multipart/form-data">
        <table>
            <tr>
                <td>Username</td>
                <td><input type="text" name="username"></td>
            </tr>
            <tr>
                <td>Password</td>
                <td><input type="password" name="password"></td>
            </tr>
            <tr>
                <td>Upload Foto</td>
                <td><input type="file" name="foto"></td>
            </tr>
            <tr>
                <td><input type="submit" value="Simpan"></td>
            </tr>
            </table>
    </form>
    <table border="1">
        <tr>
            <td>Username</td>
            <td>Password</td>
            <td>Upload Foto</td>
            <td colspan="2">Aksi</td>
        </tr>
        <?php
        include "koneksi.php";
        $query = mysqli_query($koneksi, "SELECT * FROM user");
        while ($data = mysqli_fetch_array($query)) {
        ?>
            <tr>
                <td> <?php echo $data['username'] ?> </td>
                <td> <?php echo $data['password'] ?> </td>
                <td> <img src="gambar user/<?php echo $data['foto'] ?>" width="70px" height="80px"></td>
                <td><a href="edit_user.php?username=<?php echo $data['username'] ?>">Edit</td>
                <td><a href="hapus_user.php?username=<?php echo $data['username'] ?>">Hapus</td>
            </tr>
        <?php } ?>
    </table>
</body>

</html>