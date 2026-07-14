<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <title>Gagal Mencetak</title>
    <style>
        body {
            font-family: sans-serif;
            max-width: 480px;
            margin: 80px auto;
            text-align: center;
            color: #333;
        }

        .box {
            border: 1px solid #f3c6c6;
            background: #fff5f5;
            padding: 24px;
            border-radius: 8px;
        }

        h2 {
            color: #c0392b;
            margin-top: 0;
        }

        ul {
            text-align: left;
            display: inline-block;
        }

        a {
            display: inline-block;
            margin-top: 16px;
        }
    </style>
</head>

<body>
    <div class="box">
        <h2>Tidak Bisa Cetak Laporan</h2>
        <p>Periksa kembali tanggal yang dipilih untuk <strong>{{ $siswa->nama }}</strong>:</p>
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
        <br>
        <a href="javascript:window.close()">Tutup tab ini</a>
    </div>
</body>

</html>
