<?php

namespace App\Http\Controllers;

use App\Models\Parkir;
use Carbon\Carbon;
use Illuminate\Http\Request;

class ParkirController extends Controller
{
    public function index()
    {
        $data = Parkir::all();
        return view('parkir', compact('data'));
    }
    public function proses(Request $request)
    {
        $request->validate([
            'jenis_kendaraan' => 'required',
            'no_plat' => 'required',
            'jam_masuk' => 'required',
            'jam_keluar' => 'required'
        ]);

        $jamMasuk = Carbon::parse($request->jam_masuk);
        $jamKeluar = Carbon::parse($request->jam_keluar);
        $selisihWaktu = $jamMasuk->diffInHours($jamKeluar);
        $totalBiaya = $this->biayaParkir($request->jenis_kendaraan, $selisihWaktu);

        Parkir::create([
            'jenis_kendaraan' => $request->jenis_kendaraan,
            'no_plat' => $request->no_plat,
            'jam_masuk' => $jamMasuk,
            'jam_keluar' => $jamKeluar,
            'total' => $totalBiaya
        ]);

        return redirect()->to(url('/'));
    }

    private function biayaParkir($jenisKendaraan, $selisih)
    {
        $biayaPertama = ($jenisKendaraan === 'Motor') ? 1000 : 3000;
        $biayaPerJam = ($jenisKendaraan === 'Motor') ? 2000 : 5000;
        $total = 0;

        if ($jenisKendaraan === 'Motor') {
            if ($selisih <= 2) {
                $total = $biayaPertama;
            } else {
                $selisih -= 2;
                $biayaSelisih = $selisih * $biayaPerJam;
                $total = $biayaPertama + $biayaSelisih;
                $diskon = ($total > 10000) ? $total * 0.05 : 0;
                $total -= $diskon;
            }
        } else {
            if ($selisih <= 2) {
                $total = $biayaPertama;
            } else {
                $selisih -= 2;
                $biayaSelisih = $selisih * $biayaPerJam;
                $total = $biayaPertama + $biayaSelisih;
                $diskon = ($total > 10000) ? $total * 0.10 : 0;
                $total -= $diskon;
            }
        }

        return $total;
    }

    public function hapus($id)
    {
        $parkir = Parkir::find($id);
        $parkir->delete();
        return redirect()->to(url('/'));
    }

    public function edit($id)
    {
        $parkir = Parkir::find($id);
        return view('editParkir', $parkir);
    }

    public function update(Request $request, $id)
    {
        $parkir = Parkir::find($id);
        $parkir->update($request->except(['_token', 'simpan']));
        return redirect()->to(url('/'));
    }
}