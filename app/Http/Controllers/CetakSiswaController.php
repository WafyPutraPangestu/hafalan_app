<?php

namespace App\Http\Controllers;

use App\Models\Siswa;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class CetakSiswaController extends Controller
{
    public function __invoke(Siswa $siswa, Request $request)
    {
        $validator = Validator::make($request->all(), [
            'dari'   => 'required|date',
            'sampai' => 'required|date|after_or_equal:dari',
        ], [
            'dari.required'          => 'Tanggal mulai wajib diisi.',
            'sampai.required'        => 'Tanggal akhir wajib diisi.',
            'sampai.after_or_equal'  => 'Tanggal akhir tidak boleh sebelum tanggal mulai.',
        ]);

        if ($validator->fails()) {
            return response()->view('admin.siswa.cetak-error', [
                'siswa'  => $siswa,
                'errors' => $validator->errors(),
            ], 422);
        }

        $dari   = $request->date('dari');
        $sampai = $request->date('sampai');

        $setorans = $siswa->setorans()
            ->with('ustadz')
            ->whereBetween('tanggal', [$dari, $sampai])
            ->orderBy('tanggal')
            ->orderBy('jam')
            ->get()
            ->groupBy('jenis');

        $rekap = [
            'ziyadah'  => $this->hitungTotal($setorans->get('ziyadah')),
            'murojaah' => $this->hitungTotal($setorans->get('murojaah')),
            'tadarus'  => $this->hitungTotal($setorans->get('tadarus')),
        ];

        $pdf = Pdf::loadView('admin.siswa.cetak-pdf', [
            'siswa'    => $siswa,
            'setorans' => $setorans,
            'rekap'    => $rekap,
            'periode'  => [$dari, $sampai],
        ])->setPaper('a4', 'portrait');

        return $pdf->stream('hafalan-' . str($siswa->nama)->slug() . '.pdf');
    }

    private function hitungTotal($collection): array
    {
        if (!$collection) {
            return ['jumlah_setoran' => 0, 'total_halaman' => 0];
        }

        return [
            'jumlah_setoran' => $collection->count(),
            'total_halaman'  => round((float) $collection->sum('jumlah_halaman'), 2),
        ];
    }
}
