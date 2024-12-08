<!DOCTYPE html>
<html>

<head>
    <title></title>
</head>

<body>
    <h2>SI Sekolah | Data Siswa </h2>
    <br />
    <a href="tambah.php">+ Tambah Data</a>
    <br />
    <table border="1">
        <tr>
            <th>No</th>
            <th>Nama</th>
            <th>NIS</th>
            <th>Alamat</th>
            <th>0psi</th>
        </tr>
        <?php
        include 'koneksi.php';
        $no = 1;
        $query = mysqli_query($konek, " SELECT * from class");
        while ($data = mysqli_fetch_array($query)) {
            ?>
            <tr>
                <td><?php echo $no++; ?></td>
                <td><?php echo $data['nama']; ?></td>
                <td><?php echo $data['nis']; ?></td>
                <td><?php echo $data['alamat']; ?></td>
                <td>
                    <a href="edit.php?id=<?php echo $data['id']; ?>">EDIT</a>
                    <a href="hapus.php?id=<?php echo $data['id']; ?>">HAPUS</a>
                </td>
            </tr>
            <?php
        }
        ?>
    </table>
</body>

</html>