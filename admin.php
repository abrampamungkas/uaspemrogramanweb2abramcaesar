<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Buku Perpustakaan Online</title>
    <style>
        body {
            margin: 0;
            padding: 0;
            background: #dedede;
            font-family: 'Arial', sans-serif;
        }

        h1 {
            text-align: center;
            color: black;
            font-family: 'Arial', sans-serif;
        }

        th {
            color: black;
            font-weight: bold;
            font-size: 18px;
            background: #dedede;
        }

        tr {
            text-align: center;
            background: white;
            font-weight: bold;
        }

        td {
            color: black;
        }

        table {
            margin: auto;
            border-collapse: collapse;
            width: 80%;
        }

        a {
            color: red;
            display: block;
            text-align: center;
        }

        a:hover {
            color: blue;
        }
    </style>
</head>

<body>
    <?php include("sidebar.php");
    if (!in_array("spp", $_SESSION['admin_akses'])) {
        echo "kamu tidak memiliki akses";
        include("close.php");
        exit();
    }
    ?>
    <?php include("close.php");
    require 'function.php';
    $result = mysqli_query($conn, "SELECT * FROM datakaryawan");
    ?>
    <div>
        <h1>Data Karyawan</h1>
        <div>
            <a href="tambahdata.php" target="_blank">Tambah Barang
            </a>
            <br>
            <a href="cetak.php" target="_blank">Download atau Print
            </a>
        </div>
        <br>
        <table border="1" cellpadding="10">
            <tr>
                <th>No</th>
                <th>NAMA BARANG</th>
                <th>JENIS</th>
                <th>WAT</th>
                <th>WARNA</th>
                <th>HARGA</th>
                <th>STOK</th>
                <th>GAMBAR</th>
                <th>UPDATE</th>
            </tr>

            <?php $i = 1; ?>
            <?php while ($row = mysqli_fetch_assoc($result)) : ?>
                <tr>
                    <td><?= $i; ?> </td>
                    <td><?= $row["nama"]; ?></td>
                    <td><?= $row["email"]; ?></td>
                    <td><?= $row["nohp"]; ?></td>
                    <td><?= $row["ttl"]; ?></td>
                    <td><?= $row["tanggallahir"]; ?></td>
                    <td><?= $row["idkaryawan"]; ?></td>
                    <td><img src="img/<?php echo $row["gambar"]; ?>" width="70"></td>
                    <td>
                        <a href="ubah.php?id=<?= $row["id"]; ?> ">Ubah</a>
                        <br>
                        <a href="hapus.php?id=<?= $row["id"]; ?> " onclick="
                    return confirm('Apakah Mau Menghapus ?');">Hapus
                    </td>
                </tr>
                <?php $i++; ?>
            <?php endwhile; ?>
        </table>
    </div>
    <div>
</body>

</html>