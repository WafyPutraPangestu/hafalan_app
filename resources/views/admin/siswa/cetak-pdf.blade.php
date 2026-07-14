<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <title>Laporan Hafalan - {{ $siswa->nama }}</title>
    <style>
        body {
            font-family: sans-serif;
            font-size: 12px;
            color: #222;
        }

        .header {
            text-align: center;
            border-bottom: 2px solid #333;
            padding-bottom: 10px;
            margin-bottom: 15px;
        }

        .header h2 {
            margin: 0;
        }

        .identitas {
            margin-bottom: 15px;
        }

        .identitas td {
            padding: 2px 8px 2px 0;
        }

        table.data {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 15px;
        }

        table.data th,
        table.data td {
            border: 1px solid #999;
            padding: 5px;
            font-size: 11px;
        }

        table.data th {
            background: #eee;
        }

        .rekap {
            width: 100%;
            border-collapse: collapse;
            margin-top: 10px;
        }

        .rekap th,
        .rekap td {
            border: 1px solid #999;
            padding: 6px;
            text-align: center;
        }

        .ttd {
            margin-top: 40px;
            width: 100%;
        }

        .ttd td {
            width: 50%;
            text-align: center;
            padding-top: 50px;
        }
    </style>
</head>

<body>
    <div class="header">
        <h2>Laporan Hafalan Santri</h2>
        <p>Nama Lembaga Anda</p>
    </div>

    <table class="identitas">
        <tr>
            <td><strong>Nama</strong></td>
            <td>: {{ $siswa->nama }}</td>
        </tr>
        <tr>
            <td><strong>NIS</strong></td>
            <td>: {{ $siswa->nis }}</td>
        </tr>
        <tr>
            <td><strong>Kelas</strong></td>
            <td>: {{ $siswa->kelas }}</td>
        </tr>
        <tr>
            <td><strong>Status</strong></td>
            <td>: {{ ucfirst($siswa->status) }}</td>
        </tr>
        <tr>
            <td><strong>Tanggal Cetak</strong></td>
            <td>: {{ now()->translatedFormat('d F Y') }}</td>
        </tr>
    </table>

    <h4>Rekap</h4>
    <table class="rekap">
        <tr>
            <th>Jenis</th>
            <th>Jumlah Setoran</th>
            <th>Total Halaman</th>
        </tr>
        @foreach (['ziyadah' => 'Ziyadah', 'murojaah' => 'Murojaah', 'tadarus' => 'Tadarus'] as $key => $label)
            <tr>
                <td>{{ $label }}</td>
                <td>{{ $rekap[$key]['jumlah_setoran'] }}</td>
                <td>{{ $rekap[$key]['total_halaman'] }}</td>
            </tr>
        @endforeach
    </table>

    <h4>Detail Riwayat Setoran</h4>
    @foreach (['ziyadah' => 'Ziyadah', 'murojaah' => 'Murojaah', 'tadarus' => 'Tadarus'] as $key => $label)
        @if ($setorans->get($key) && $setorans->get($key)->count())
            <p><strong>{{ $label }}</strong></p>
            <table class="data">
                <tr>
                    <th>Tanggal</th>
                    <th>Tingkatan</th>
                    <th>Detail</th>
                    <th>Halaman</th>
                    <th>Nilai</th>
                    <th>Ustadz</th>
                </tr>
                @foreach ($setorans->get($key) as $s)
                    <tr>
                        <td>{{ $s->tanggal->translatedFormat('d M Y') }}</td>
                        <td>{{ ucfirst(str_replace('_', ' ', $s->tingkatan)) }}</td>
                        <td>
                            @if ($s->tingkatan === 'iqro')
                                Iqro {{ $s->iqro_awal }} hal. {{ $s->halaman_iqro_awal }}
                                &rarr; Iqro {{ $s->iqro_akhir }} hal. {{ $s->halaman_iqro_akhir }}
                            @elseif ($s->tingkatan === 'juz_ama')
                                {{ $s->surah_awal }}:{{ $s->ayat_awal }}
                                &rarr; {{ $s->surah_akhir }}:{{ $s->ayat_akhir }}
                            @else
                                {{ $s->juz }}, hal. {{ $s->halaman_awal }}-{{ $s->halaman_akhir }}
                            @endif
                        </td>
                        <td>{{ $s->jumlah_halaman }}</td>
                        <td>{{ $s->nilai }}</td>
                        <td>{{ $s->ustadz->name ?? '-' }}</td>
                    </tr>
                @endforeach
            </table>
        @endif
    @endforeach

    <table class="ttd">
        <tr>
            <td>
                Wali Kelas / Ustadz<br><br><br><br>
                (____________________)
            </td>

        </tr>
    </table>
</body>

</html>
