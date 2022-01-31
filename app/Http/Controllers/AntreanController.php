<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AntreanController extends Controller
{
    public function status(Request $request)
    {
        $kodePoli = $request->kodepoli;
        $kodeDokter = $request->kodedokter;
        $tanggalPeriksa = $request->tanggalperiksa;
        $jamPraktek = $request->jampraktek;

        $data = DB::connection('simrs')->table('')
            ->select([''])
            ->where('')
            ->get();

        if (!$data) {
            return $this->response([], ['message' => 'Data tidak ditemukan', 'code' => 201]);
        }

        return $this->response([
            "namapoli" => $data,
            "namadokter" => "Dr. Hendra",
            "totalantrean" => 25,
            "sisaantrean" => 4,
            "antreanpanggil" => "A-21",
            "sisakuotajkn" => 5,
            "kuotajkn" => 30,
            "sisakuotanonjkn" => 5,
            "kuotanonjkn" => 30,
            "keterangan" => "",
        ], [
            'message' => 'Ok',
            'code' => 200,
        ]);
    }

    public function ambil(Request $request)
    {
        $nomorkartu = $request->nomorkartu;
        $nik = $request->nik;
        $nohp = $request->nohp;
        $kodepoli = $request->kodepoli;
        $norm = $request->norm;
        $tanggalperiksa = $request->tanggalperiksa;
        $kodedokter = $request->kodedokter;
        $jampraktek = $request->jampraktek;
        $jeniskunjungan = $request->jeniskunjungan;
        $nomorreferensi = $request->nomorreferensi;

        $data = DB::connection('simrs')->table('')
            ->select([''])
            ->where('')
            ->get();

        if (!$data) {
            return $this->response([], ['message' => 'Data tidak ditemukan', 'code' => 202]);
        }

        return $this->response([
            "nomorantrean" => "A-12",
            "angkaantrean" => 12,
            "kodebooking" => "16032021A001",
            "norm" => "123345",
            "namapoli" => "Anak",
            "namadokter" => "Dr. Hendra",
            "estimasidilayani" => 1615869169000,
            "sisakuotajkn" => 5,
            "kuotajkn" => 30,
            "sisakuotanonjkn" => 5,
            "kuotanonjkn" => 30,
            "keterangan" => "Peserta harap 60 menit lebih awal guna pencatatan administrasi.",
        ], [
            'message' => 'Ok',
            'code' => 200,
        ]);
    }

    public function sisa(Request $request)
    {
        $kodebooking = $request->kodebooking;

        $data = DB::connection('simrs')->table('')
            ->select([''])
            ->where('')
            ->get();

        if (!$data) {
            return $this->response([], ['message' => 'Data tidak ditemukan', 'code' => 201]);
        }

        return $this->response([
            "nomorantrean" => "A20",
            "namapoli" => "Anak",
            "namadokter" => "Dr. Hendra",
            "sisaantrean" => 12,
            "antreanpanggil" => "A-8",
            "waktutunggu" => 9000,
            "keterangan" => "",
        ], [
            'message' => 'Ok',
            'code' => 200,
        ]);
    }

    public function batal(Request $request)
    {
        $kodebooking = $request->kodebooking;
        $keterangan = $request->keterangan;

        $data = DB::connection('simrs')->table('')
            ->select([''])
            ->where('')
            ->get();

        if (!$data) {
            return $this->response([], ['message' => 'Data tidak ditemukan', 'code' => 201]);
        }

        return $this->response([], [
            'message' => 'Ok',
            'code' => 200,
        ]);
    }
}
