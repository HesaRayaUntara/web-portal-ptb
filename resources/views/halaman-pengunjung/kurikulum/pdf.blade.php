<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Mata Kuliah Program Studi PTB</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            font-size: 10pt;
            margin: 20px;
        }
        .header {
            text-align: center;
            margin-bottom: 30px;
        }
        .header h1 {
            font-size: 14pt;
            font-weight: bold;
            margin: 10px 0;
        }
        .header h2 {
            font-size: 12pt;
            font-weight: bold;
            margin: 10px 0;
        }
        .header p {
            font-size: 11pt;
            margin: 5px 0;
        }
        .semester-section {
            margin-bottom: 25px;
            page-break-inside: avoid;
        }
        .semester-title {
            font-size: 12pt;
            font-weight: bold;
            margin-bottom: 10px;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 15px;
        }
        th {
            background-color: #f0f0f0;
            border: 1px solid #000;
            padding: 8px;
            text-align: center;
            font-weight: bold;
            font-size: 9pt;
        }
        td {
            border: 1px solid #000;
            padding: 6px;
            font-size: 9pt;
        }
        td:first-child {
            text-align: center;
        }
        td:nth-child(4), td:nth-child(5) {
            text-align: center;
        }
    </style>
</head>
<body>
    <div class="header">
        <h1>MATA KULIAH PROGRAM STUDI</h1>
        <h2>PEMULIAAN TANAMAN DAN TEKNOLOGI BENIH</h2>
        <p>SEKOLAH VOKASI - IPB UNIVERSITY</p>
    </div>

    @foreach($kurikulumBySemester as $semester => $kurikulumItems)
        <div class="semester-section">
            <div class="semester-title">Semester {{ $semester }}</div>
            <table>
                <thead>
                    <tr>
                        <th style="width: 5%;">No</th>
                        <th style="width: 12%;">Kode</th>
                        <th style="width: 50%;">Nama Mata Kuliah</th>
                        <th style="width: 13%;">Jenis MK</th>
                        <th style="width: 20%;">SKS</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($kurikulumItems as $index => $item)
                        <tr>
                            <td>{{ $index + 1 }}</td>
                            <td>{{ $item->kode_mk }}</td>
                            <td>{{ $item->nama_mk }}</td>
                            <td>{{ $item->jenis_mk }}</td>
                            <td>{{ $item->sks_kuliah + $item->sks_praktikum }} ({{ $item->sks_kuliah }}-{{ $item->sks_praktikum }})</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    @endforeach
</body>
</html>

