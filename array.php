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
