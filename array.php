<?php

// 🧾 PROGRAM PENJUALAN - POLGAN MART

// ✅ Commit 1 – Setup awal
$tanggal = date("d/m/Y H:i:s");

echo "<div style='width:400px; margin:auto; font-family:Courier New; border:1px solid #999; padding:15px; border-radius:8px;'>";
echo "<h2 style='text-align:center; margin:0;'>🧾 PROGRAM PENJUALAN</h2>";
echo "<p style='text-align:center; margin:0;'>POLGAN MART</p>";
echo "<hr style='border:1px dashed #999;'>";
echo "<p style='font-size:14px;'>Tanggal : $tanggal</p>";

// Daftar barang dan harga
$nama_barang  = ["Laptop ", "Keyboard ", "Mouse ", "Monitor ", "Headset "];
$harga_barang = [7500000, 350000, 150000, 1800000, 500000];

// 🛒 Commit 2 – Logika pembelian
// ============================
shuffle($nama_barang); // Acak urutan barang
$jumlah_produk = rand(1, count($nama_barang)); // Acak jumlah produk
$jumlah_beli = [];
$total = [];
$grandtotal = 0;

for ($i = 0; $i < $jumlah_produk; $i++) {
    $jumlah_beli[$i] = rand(1, 5);
    $index_harga = array_search($nama_barang[$i], ["Laptop ", "Keyboard ", "Mouse ", "Monitor ", "Headset"]);
    $total[$i] = $harga_barang[$index_harga] * $jumlah_beli[$i];
}

// 🧮 Commit 3 – Perhitungan total
// ============================
echo "<table style='width:100%; font-size:14px; border-collapse:collapse;'>";
echo "<tr style='border-bottom:1px solid #999; font-weight:bold;'>
        <td>No</td>
        <td>Nama Barang</td>
        <td style='text-align:center;'>Qty</td>
        <td style='text-align:right;'>Harga</td>
        <td style='text-align:right;'>Total</td>
      </tr>";
$no = 1;
for ($i = 0; $i < $jumlah_produk; $i++) {
    $barang = $nama_barang[$i];
    $qty = $jumlah_beli[$i];
    $harga = $total[$i] / $qty;
    $subtotal = $total[$i];

    echo "<tr>
            <td>$no</td>
            <td>$barang</td>
            <td style='text-align:center;'>$qty</td>
            <td style='text-align:right;'>Rp " . number_format($harga, 0, ',', '.') . "</td>
            <td style='text-align:right;'>Rp " . number_format($subtotal, 0, ',', '.') . "</td>
          </tr>";

           $grandtotal += $subtotal;
    $no++;
}
echo "</table>";

// 🧾 Commit 4 – Output akhir
// ============================
echo "<hr style='border:1px dashed #999;'>";
echo "<table style='width:100%; font-size:14px;'>";
echo "<tr><td><b>Total Penjualan</b></td><td style='text-align:right;'><b>Rp " . number_format($grandtotal, 0, ',', '.') . "</b></td></tr>";
echo "</table>";
echo "<hr style='border:1px dashed #999;'>";
echo "<p style='text-align:center; font-size:13px;'>Terima kasih telah berbelanja di POLGAN MART 😊</p>";
echo "</div>";
?>
