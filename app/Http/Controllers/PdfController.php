<?php

namespace App\Http\Controllers;

use App\Models\buku;
use Illuminate\Http\Request;

class PdfController extends Controller
{
    public function view_pdf()
    {
        $mpdf = new \Mpdf\Mpdf();
        $data = buku::orderBy('idBuku', 'asc')->get();

        $html ='<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar buku</title>
</head>
<body>
    <h1>Daftar Siswa</h1>

    <table border="1" cellpadding="10" cellspacing="0">

            <tr>
            <th class="col-md-1">idBuku</th>
            <th class="col-md-3">Judul</th>
            <th class="col-md-3">Penulis</th>
            <th class="col-md-2">Penerbit</th>
            <th class="col-md-2">Tahun Terbit</th>
            </tr>';

        foreach( $data as $item ) {
            $html .= '<tr>
                <td>'. $item["idBuku"] .'</td>
                <td>'. $item["judul"] .'</td>
                <td>'. $item["penulis"] .'</td>
                <td>'. $item["penerbit"] .'</td>
                <td>'. $item["tahunterbit"] .'</td>
            </tr>';
        }

$html .= '</table>
</body>
</html>';

        $mpdf->WriteHTML($html);
        $mpdf->Output();
    }
}
