<?php
// Judul program
echo "<h2 style='text-align:center;'>🧾 POLGAN MART </h2>";
echo "<hr style='width:45%;'>";


// 🧾 PROGRAM PENJUALAN - POLGAN MART

// ✅ Commit 1 – Setup awal
$tanggal = date("d/m/Y H:i:s");

echo "<div style='width:450px; margin:auto; font-family:Consolas, monospace;
border:1px solid #ccc; padding:20px; border-radius:12px;
box-shadow:0 2px 8px rgba(0,0,0,0.1); background:#fff;'>";

echo "<h2 style='text-align:center; margin:0; font-size:22px;'> PROGRAM PENJUALAN</h2>";
echo "<p style='text-align:center; margin:0; font-size:16px; letter-spacing:1px;'>POLGAN MART</p>";
echo "<hr style='border:1px dashed #999; margin:10px 0;'>";

echo "<p style='font-size:14px;margin-bottom:10px;'>Tanggal : <b>$tanggal</b></p>";

// Daftar barang dan harga
$nama_barang  = ["Laptop ", "Keyboard ", "Mouse ", "Monitor ", "Headset "];
$harga_barang = [7500000, 350000, 150000, 1800000, 500000];
$kode_barang  = ["BRG001", "BRG002", "BRG003", "BRG004", "BRG005"];

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
echo "<div style='border:1px solid #000; border-radius:8px; overflow:hidden; margin-top:10px;'>";

// 🧮 Commit 3 – Perhitungan total
// ============================
echo "<table style='width:100%; font-size:13px; border-collapse:collapse;text-align:left;'>";
echo "<thead style='background-color:#444; color:white;'>
        <tr>
          <th style='padding:8px; width:5%; text-align:center;'>No</th>
          <th style='padding:8px; width:12%; text-align:center;'>Kode</th>
          <th style='padding:8px; width:35%;'>Nama Barang</th>
          <th style='padding:8px; width:10%; text-align:center;'>Qty</th>
          <th style='padding:8px; width:18%; text-align:right;'>Harga</th>
          <th style='padding:8px; width:20%; text-align:right;'>Total</th>
        </tr>
      </thead>";
$no = 1;
for ($i = 0; $i < $jumlah_produk; $i++) {
    $barang = $nama_barang[$i];
    $kode = $kode_barang[$i];
    $qty = $jumlah_beli[$i];
    $harga = $total[$i] / $qty;
    $subtotal = $total[$i];

    echo "<tr>
            <td style='padding:6px 8px;'>$no</td>
            <td style='padding:6px 8px;'>$kode</td>
            <td style='padding:6px 8px;'>$barang</td>
            <td style='padding:6px 8px; text-align:center;'>$qty</td>

            <td style='padding:6px 8px; text-align:right;'>
            <span style='float:left; margin-left:20px;'>Rp</span>
                <span style='float:right;'>" . number_format($harga, 0, ',', '.') . "</span>
            </td>
            <td style='padding:6px 8px; text-align:right;'>
            <span style='float:left; margin-left:20px;'>Rp</span>
                <span style='float:right;'>" . number_format($subtotal, 0, ',', '.') . "</span>
            </td>
          </tr>";

           $grandtotal += $subtotal;
    $no++;
}
echo "</table>";

// 🔹🧩 Commit 6 – Menambahkan Diskon
// =================================
$diskon = 0;
$persen_diskon = 0;

if ($grandtotal <= 50000) {
    $persen_diskon = 5;
    $diskon = $grandtotal * 0.05;
} elseif ($grandtotal > 50000 && $grandtotal <= 100000) {
    $persen_diskon = 10;
    $diskon = $grandtotal * 0.10;
} else {
    $persen_diskon = 20;
    $diskon = $grandtotal * 0.20;
}

$total_setelah_diskon = $grandtotal - $diskon;

// 🔹🧩 Commit 7 – Menambahkan Total Pembayaran (uang bayar & kembalian)
$uang_bayar = rand($total_setelah_diskon, $total_setelah_diskon + 5000000);
$kembalian = $uang_bayar - $total_setelah_diskon;

// 🧾 Commit 4 – Output akhir
// ============================
echo "<hr style='border:1px dashed #999;'>";
echo "<table style='width:100%; font-size:14px;'>";

echo "<tr>
<td><b>Total Penjualan</b></td>
<td style='text-align:right;'>Rp " . number_format($grandtotal, 0, ',', '.') . "</td></tr>";

echo "<tr>
<td>Diskon ($persen_diskon%)</td>
          <td style='text-align:right; color:#d00;'>- Rp " . number_format($diskon, 0, ',', '.') . "</td></tr>";

echo "<tr><td><b>Total Pembayaran</b></td>
          <td style='text-align:right; font-weight:bold; background:#e8f5e9; border-radius:4px;'>
              Rp " . number_format($total_setelah_diskon, 0, ',', '.') . "
          </td></tr>";
          echo "<tr>
<td>Uang Bayar</td>
<td style='text-align:right;'>Rp " . number_format($uang_bayar, 0, ',', '.') . "</td></tr>";

echo "<tr>
<td><b>Kembalian</b></td>
<td style='text-align:right; font-weight:bold; color:#009688;'>Rp " . number_format($kembalian, 0, ',', '.') . "</td></tr>";

echo "</table>";
echo "<hr style='border:1px dashed #999;'>";
echo "<p style='text-align:center; font-size:13px;'>Terima kasih telah berbelanja di POLGAN MART 😊</p>";
echo "</div>";
?>
