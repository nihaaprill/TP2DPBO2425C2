<?php
session_start();
session_destroy(); // hancurkan session lama
session_start();   // mulai session baru kosong
require 'classes.php';


// Inisialisasi produk default jika session kosong
if (!isset($_SESSION['daftarProduk'])) {
    $_SESSION['daftarProduk'] = [
        new Gadget('G001','HP Super',2000000,'Samsung',10,12,'X1','smartphone',4000,'hp2.jpg'),
        new Gadget('G002','Tab Pro',3500000,'Huawei',5,24,'T10','tablet',7000,'tab.jpg'),
        new Gadget('G003','NoteBook',8000000,'Acer',3,12,'N200','laptop',5000,'laptop2.jpg'),
        new Gadget('G004','EarPods',300000,'Thinkplus',20,6,'E1','accessory',0,'earpods.jpg'),
        new Gadget('G005','SmartWatch',1500000,'IWatch',8,12,'W9','wearable',300,'smartwatch.jpg')
    ];
}

// Tambah produk
if (isset($_POST['tambah'])) {
    $id = "G" . str_pad(count($_SESSION['daftarProduk'])+1, 3, "0", STR_PAD_LEFT);
    $nama = $_POST['nama'];
    $harga = $_POST['harga'];
    $merk = $_POST['merk'];
    $stok = $_POST['stok'];
    $garansi = $_POST['garansi'];
    $model = $_POST['model'];
    $kategori = $_POST['kategori'];
    $kapasitas = $_POST['kapasitas'];
    $foto = $_POST['foto'];

    $_SESSION['daftarProduk'][] = new Gadget($id, $nama, $harga, $merk, $stok, $garansi, $model, $kategori, $kapasitas, $foto);
}

// Hapus produk
if (isset($_GET['hapus'])) {
    $id = $_GET['hapus'];
    unset($_SESSION['daftarProduk'][$id]);
    $_SESSION['daftarProduk'] = array_values($_SESSION['daftarProduk']); // reindex
}

$daftarProduk = $_SESSION['daftarProduk'];
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Toko Elektronik</title>
    <style>
        body {font-family: Arial, sans-serif;background: #f5f7fa;margin: 0;padding: 0;}
        h1 {text-align: center;background: #0077cc;color: white;padding: 20px;margin: 0;}
        table {margin: 30px auto;border-collapse: collapse;width: 95%;background: white;
               box-shadow: 0px 4px 12px rgba(0,0,0,0.1);}
        th, td {padding: 12px;text-align: center;border-bottom: 1px solid #ddd;}
        th {background: #0077cc;color: white;}
        tr:hover {background: #f1f1f1;}
        img {width: 100px;border-radius: 8px;}
        form {margin: 20px auto;width: 90%;background: white;padding: 20px;
              box-shadow: 0px 4px 12px rgba(0,0,0,0.1);border-radius: 8px;}
        input, select {padding: 10px;margin: 5px;width: calc(100% - 20px);}
        button {padding: 10px 20px;background: #0077cc;color: white;border: none;
                border-radius: 5px;cursor: pointer;}
        button:hover {background: #005fa3;}
        .hapus {background: #e74c3c;}
        .hapus:hover {background: #c0392b;}
    </style>
</head>
<body>
    <h1>📦 Daftar Produk Toko Elektronik</h1>

    <!-- Form Tambah Produk -->
    <form method="POST">
        <h3>Tambah Produk</h3>
        <input type="text" name="nama" placeholder="Nama Produk" required>
        <input type="number" name="harga" placeholder="Harga" required>
        <input type="text" name="merk" placeholder="Merk" required>
        <input type="number" name="stok" placeholder="Stok" required>
        <input type="number" name="garansi" placeholder="Garansi (bln)" required>
        <input type="text" name="model" placeholder="Model" required>
        <input type="text" name="kategori" placeholder="Kategori" required>
        <input type="number" name="kapasitas" placeholder="Kapasitas (mAh)" required>
        <input type="text" name="foto" placeholder="Nama File Foto (contoh: hp2.jpg)" required>
        <button type="submit" name="tambah">Tambah Produk</button>
    </form>

    <!-- Tabel Produk -->
    <table>
        <tr>
            <th>ID</th>
            <th>Foto</th>
            <th>Nama</th>
            <th>Merk</th>
            <th>Harga</th>
            <th>Stok</th>
            <th>Garansi</th>
            <th>Model</th>
            <th>Kategori</th>
            <th>Kapasitas</th>
            <th>Aksi</th>
        </tr>
        <?php foreach ($daftarProduk as $i => $produk): ?>
        <tr>
            <td><?= $produk->id ?></td>
            <td><img src="foto_produk/<?= $produk->foto ?>" alt="<?= $produk->nama ?>"></td>
            <td><?= $produk->nama ?></td>
            <td><?= $produk->merk ?></td>
            <td>Rp <?= number_format($produk->harga, 0, ',', '.') ?></td>
            <td><?= $produk->stok ?></td>
            <td><?= $produk->garansi ?> bln</td>
            <td><?= $produk->model ?></td>
            <td><?= $produk->kategori ?></td>
            <td><?= $produk->kapasitas ?> mAh</td>
            <td>
                <a href="?hapus=<?= $i ?>" 
                   onclick="return confirm('Yakin mau hapus produk ini?')">
                   <button class="hapus">Hapus</button>
                </a>
            </td>
        </tr>
        <?php endforeach; ?>
    </table>
</body>
</html>
