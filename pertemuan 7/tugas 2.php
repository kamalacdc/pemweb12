<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Periksa Umur</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 20px;
        }
        h2 {
            color: #333;
        }
        .result {
            margin-top: 20px;
            padding: 10px;
            border-radius: 5px;
            color: #fff;
        }
        .dewasa {
            background-color: #4CAF50; /* Green */
        }
        .belum-dewasa {
            background-color: #f44336; /* Red */
        }
        .input-section {
            margin-bottom: 20px;
        }
        input[type="number"] {
            padding: 10px;
            width: 100px;
            border: 1px solid #ccc;
            border-radius: 4px;
        }
        button {
            padding: 10px 15px;
            background-color: #007BFF; /* Blue */
            color: white;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }
        button:hover {
            background-color: #0056b3; /* Darker Blue */
        }
    </style>
</head>
<body>
    <h2>Periksa Umur Anda</h2>
    
    <div class="input-section">
        <label for="umur">Masukkan umur Anda: </label>
        <input type="number" id="umur" name="umur" min="0" max="120">
        <button onclick="checkAge()">Periksa</button>
    </div>

    <div id="result" class="result"></div>

    <script>
        function checkAge() {
            var umur = document.getElementById('umur').value;
            var resultDiv = document.getElementById('result');

            if (umur >= 18) {
                resultDiv.innerHTML = "<p>Anda sudah dewasa.</p>";
                resultDiv.className = "result dewasa";
            } else {
                resultDiv.innerHTML = "<p>Anda belum cukup umur.</p>";
                resultDiv.className = "result belum-dewasa";
            }
        }
    </script>

</body>
</html>