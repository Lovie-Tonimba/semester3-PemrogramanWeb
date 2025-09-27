<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title></title>
    <style>
        body{
            font-family: sans-serif;   
            margin: 20px;         
        }
        table {
            border-collapse: collapse;
            width: 300px;
        }
        th, td {
            border: 1px solid #000;
            padding: 6px 10px;
            text-align: left;
        }
        th {
            background: #eee;
        }
    </style>
</head>
<body>
    <h2>Dosen Information</h2>
    <?php
    $Dosen = [
        'nama' => 'Elok Nur Hamdana',
        'domisili' => 'Malang',
        'jenis_kelamin' => 'Perempuan'];
    // echo "Nama : {$Dosen ['nama']} <br>";
    // echo "Domisili : {$Dosen ['domisili']} <br>";
    // echo "Jenis Kelamin : {$Dosen ['jenis_kelamin']} <br>";
    ?>
    <table>
        <tr><th>Field</th><th>Value</th></tr>
        <tr>
            <td>Nama</td>
            <td><?php echo $Dosen['nama']; ?></td>
        </tr>
        <tr>
            <td>Domisili</td>
            <td><?php echo $Dosen['domisili']; ?></td>
        </tr>
        <tr>
            <td>Jenis Kelamin</td>
            <td><?php echo $Dosen['jenis_kelamin']; ?></td>
        </tr>
    </table>
</body>
</html>