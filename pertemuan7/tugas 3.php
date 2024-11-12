<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cek Hari</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            color: #333;
            margin: 0;
            padding: 20px;
        }
        h2 {
            color: #4CAF50;
        }
        .container {
            background: white;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
        }
        .date-time {
            font-size: 1.2em;
            margin-bottom: 20px;
        }
        .message {
            font-size: 1.1em;
            padding: 10px;
            border-left: 4px solid #4CAF50;
            background-color: #e8f5e9;
        }
    </style>
</head>
<body>
    <div class="container">
        <h2>Hari Ini</h2>
        <div class="date-time">
            <?php
            echo "Tanggal dan Waktu: " . date("l, d F Y H:i:s");
            ?>
        </div>

        <?php
        $hari = date("l"); // Mengambil hari saat ini

        switch ($hari) {
            case "Monday":
                echo "<p class='message'>Awali minggu dengan semangat!</p>";
                break;
            case "Tuesday":
                echo "<p class='message'>Hari kedua dalam minggu ini.</p>";
                break;
            case "Wednesday":
                echo "<p class='message'>Sudah pertengahan minggu.</p>";
                break;
            case "Thursday":
                echo "<p class='message'>Besok sudah Jumat!</p>";
                break;
            case "Friday":
                echo "<p class='message'>Hari terakhir kerja!</p>";
                break;
            case "Saturday":
            case "Sunday":
                echo "<p class='message'>Hari libur, nikmati waktu Anda!</p>";
                break;
            default:
                echo "<p class='message'>Hari tidak dikenal.</p>";
                break;
        }
        ?>
    </div>
</body>
</html>