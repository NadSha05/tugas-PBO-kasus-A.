<?php include 'koneksi.php'; ?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Showroom Kendaraan</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 min-h-screen">
    <div class="container mx-auto p-8">
        <h1 class="text-3xl font-bold mb-8 text-blue-900">Showroom Kendaraan</h1>
        
        <div class="flex gap-4 mb-8">
            <a href="index.php" class="bg-gray-800 text-white px-4 py-2 rounded hover:bg-gray-700">Semua</a>
            <a href="?filter=mobil_konvensional" class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700">Mobil Konvensional</a>
            <a href="?filter=mobil_listrik" class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700">Mobil Listrik</a>
            <a href="?filter=motor_besar" class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700">Motor Besar</a>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
            <?php
            $filter = $_GET['filter'] ?? '';
            $query = "SELECT * FROM kendaraan";
            if ($filter) {
                $query .= " WHERE jenis_kendaraan = '$filter'";
            }
            
            $result = mysqli_query($conn, $query);
            
            while($row = mysqli_fetch_assoc($result)) {
                echo "
                <div class='bg-white p-6 rounded-xl shadow-md border hover:shadow-lg transition'>
                    <h2 class='text-xl font-bold mb-2'>{$row['brand']} {$row['model']}</h2>
                    <p class='text-gray-500 capitalize'>Jenis: " . str_replace('_', ' ', $row['jenis_kendaraan']) . "</p>
                    <p class='text-gray-500'>Tahun: {$row['tahun']}</p>
                    <p class='text-blue-600 font-bold mt-4'>Rp " . number_format($row['harga_pasar'], 0, ',', '.') . "</p>
                </div>";
            }
            ?>
        </div>
    </div>
</body>
</html>