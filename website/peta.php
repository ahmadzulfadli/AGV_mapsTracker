<!DOCTYPE html>
<html>

<head>
    <title>Pemantauan Posisi Robot AGV</title>
    <style>
        .container {
            width: 80%;
            margin: 0 auto;
        }

        .header {
            text-align: center;
            margin-bottom: 50px;
        }

        .header h1 {
            font-size: 36px;
            margin-bottom: 20px;
        }

        .header p {
            font-size: 18px;
            margin-bottom: 20px;
        }

        .map-container {
            width: 100%;
            height: 400px;
            margin-bottom: 50px;
        }

        .robot-position {
            width: 100%;
            text-align: center;
        }

        .robot-position h2 {
            font-size: 24px;
            margin-bottom: 20px;
        }

        .robot-position p {
            font-size: 18px;
            margin-bottom: 20px;
        }
    </style>
</head>

<body>
    <div class="container">
        <div class="header">
            <h1>Pemantauan Posisi Robot AGV</h1>
            <p>Ini adalah halaman untuk memantau posisi robot AGV pada gudang.</p>
        </div>
        <div class="map-container">
            <!--Tampilkan peta gudang disini-->
        </div>
        <div class="robot-position">
            <h2>Posisi Robot AGV Saat Ini</h2>
            <p>Koordinat X: <span id="x-coordinate">0</span></p>
            <p>Koordinat Y: <span id="y-coordinate">0</span></p>
        </div>
    </div>
    <script>
        // Script untuk memperbarui posisi robot AGV saat ini
        setInterval(function() {
            // Ambil data posisi AGV dari server
            fetch('/api/get-robot-position')
                .then(response => response.json())
                .then(data => {
                    // Update posisi AGV pada halaman
                    document.querySelector('#x-coordinate').innerHTML = data.x;
                    document.querySelector('#y-coordinate').innerHTML = data.y;
                })
                .catch(error => {
                    console.error(error);
                });
        }, 1000);
    </script>
</body>

</html>