<?php

include'koneksi.php';
require_once("dompdf/autoload.inc.php");
use Dompdf\Dompdf;
$dompdf = new Dompdf();
$query = mysqli_query($kon,"select * from transaksi");
$html = '<h3 align = "center">Daftar Transaksi Pelanggan</h3>
<br/><hr/><br/>';
$html .= '<table border="1" width="100%" style = "border-collapse : collapse">
        <tr align = center>
            <th>No</th>
            <th>Id Pelanggan</th>
            <th>Nama Pelanggan</th>
            <th>Paket</th>
            <th>Tanggal tempo</th>
            <th>Status</th>
        </tr>';
$no = 1;
while($row = mysqli_fetch_array($query))
{
    $html .= "<tr>
        <td>".$no."</td>
        <td>".$row['id']."</td>
        <td>".$row['nama']."</td>
        <td>".$row['jenis_paket']."</td>
        <td>".$row['tgl_tempo']."</td>
        <td>".$row['status']."</td>
    </tr>";
    $no++;
}
$html .= "</html>";
$dompdf->loadHtml($html);
// Setting ukuran dan orientasi kertas
$dompdf->setPaper('A4', 'potrait');
// Rendering dari HTML Ke PDF
$dompdf->render();
// Melakukan output file Pdf
$dompdf->stream('laporan transaksi.pdf');
?>