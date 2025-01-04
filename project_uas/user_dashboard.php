<?php
include 'config.php';
session_start();

if (!isset($_SESSION['email']) || $_SESSION['level'] != 'user') {
    header("Location: login.php");
    exit();
}

$email = $_SESSION['email'];

// Mengambil data pengguna
$sql_user = "SELECT * FROM users WHERE email='$email'";
$result_user = $conn->query($sql_user);
$row_user = $result_user->fetch_assoc();

// Mengambil jadwal kerja
$sql_jadwal = "SELECT * FROM jadwal WHERE email='$email'";
$result_jadwal = $conn->query($sql_jadwal);

// Mengambil gaji
$sql_gaji = "SELECT * FROM gaji WHERE email='$email'";
$result_gaji = $conn->query($sql_gaji);

// Menambahkan absensi
if (isset($_POST['submit_absensi'])) {
    $tanggal = $_POST['tanggal'];
    $status = $_POST['status'];

    $sql_insert_absensi = "INSERT INTO absensi (email, tanggal, status) VALUES ('$email', '$tanggal', '$status')";
    if ($conn->query($sql_insert_absensi) === TRUE) {
        echo "Absensi berhasil ditambahkan!";
    } else {
        echo "Error: " . $sql_insert_absensi . "<br>" . $conn->error;
    }
}

// Mengambil absensi
$sql_absensi = "SELECT * FROM absensi WHERE email='$email'";
$result_absensi = $conn->query($sql_absensi);

?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Dashboard - Pengelolaan Karyawan</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <header>
        <h1>User Dashboard Pengelolaan Karyawan</h1>
        <p>Perusahaan BIZKA adalah perusahaan terkemuka di bidang teknologi yang berfokus pada inovasi dan kualitas.</p>
    </header>
    <main>
        <section class="dashboard-section">
            <h2>Selamat Datang, <?php echo isset($row_user['nama_lengkap']) ? $row_user['nama_lengkap'] : 'Nama tidak ditemukan'; ?></h2>
            <div class="user-info">
                <p><strong>Nama Lengkap:</strong> <?php echo isset($row_user['nama_lengkap']) ? $row_user['nama_lengkap'] : 'Nama tidak ditemukan'; ?></p>
                <p><strong>Email:</strong> <?php echo isset($row_user['email']) ? $row_user['email'] : 'Email tidak ditemukan'; ?></p>
                <p><strong>Level:</strong> <?php echo isset($row_user['level']) ? $row_user['level'] : 'Level tidak ditemukan'; ?></p>
                <p><strong>Foto Profil:</strong></p>
                <?php if (!empty($row_user['foto_profil'])) { ?>
                    <img src="uploads/<?php echo $row_user['foto_profil']; ?>" alt="Foto Profil" width="100">
                <?php } else { ?>
                    <p>Foto profil tidak tersedia</p>
                <?php } ?>
            </div>

            <h3>Jadwal Kerja</h3>
            <table>
                <tr>
                    <th>Tanggal</th>
                    <th>Shift</th>
                </tr>
                <?php while ($row_jadwal = $result_jadwal->fetch_assoc()) { ?>
                    <tr>
                        <td><?php echo $row_jadwal['tanggal']; ?></td>
                        <td><?php echo $row_jadwal['shift']; ?></td>
                    </tr>
                <?php } ?>
            </table>

            <h3>Form Absensi</h3>
            <form method="post" action="">
                <input type="date" name="tanggal" placeholder="Tanggal" required>
                <select name="status" required>
                    <option value="Hadir">Hadir</option>
                    <option value="Izin">Izin</option>
                    <option value="Sakit">Sakit</option>
                    <option value="Tidak Hadir">Tidak Hadir</option>
                </select>
                <button type="submit" name="submit_absensi">Submit</button>
            </form>

            <h3>Absensi</h3>
            <table>
                <tr>
                    <th>Tanggal</th>
                    <th>Status</th>
                </tr>
                <?php while ($row_absensi = $result_absensi->fetch_assoc()) { ?>
                    <tr>
                        <td><?php echo $row_absensi['tanggal']; ?></td>
                        <td><?php echo $row_absensi['status']; ?></td>
                    </tr>
                <?php } ?>
            </table>

            <h3>Gaji</h3>
            <table>
                <tr>
                    <th>Bulan</th>
                    <th>Tahun</th>
                    <th>Jumlah</th>
                </tr>
                <?php while ($row_gaji = $result_gaji->fetch_assoc()) { ?>
                    <tr>
                        <td><?php echo $row_gaji['bulan']; ?></td>
                        <td><?php echo $row_gaji['tahun']; ?></td>
                        <td><?php echo  $row_gaji['gaji_bulanan']; ?></td>
                    </tr>
                <?php } ?>
            </table>

            <a href="logout.php" class="btn">Logout</a>
        </section>
    </main>
    <footer>
        <p>&copy; 2024 Pengelolaan Karyawan</p>
    </footer>
</body>
</html>
