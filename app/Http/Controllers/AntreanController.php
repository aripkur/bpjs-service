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

        // your query
        $data = DB::connection('simrs')->table('');

        return $this->bpjsResponse([
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

        // your query
        $data = DB::connection('simrs')->table('');

        return $this->bpjsResponse([
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

        // your query
        $data = DB::connection('simrs')->table('');

        return $this->bpjsResponse([
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

        // your query
        $data = DB::connection('simrs')->table('');

        return $this->bpjsResponse([], [
            'message' => 'Ok',
            'code' => 200,
        ]);
    }
    public function checkIn(Request $request)
    {
        $kodebooking = $request->kodebooking;
        $waktu = $request->waktu;

        // your query
        $data = DB::connection('simrs')->table('');

        return $this->bpjsResponse([], [
            'message' => 'Ok',
            'code' => 200,
        ]);
    }
    public function pasienBaru(Request $request)
    {
        $nomorkartu = $request->nomorkartu;
        $nik = $request->nik;
        $nomorkk = $request->nomorkk;
        $nama = $request->nama;
        $jeniskelamin = $request->jeniskelamin;
        $tanggallahir = $request->tanggallahir;
        $nohp = $request->nohp;
        $alamat = $request->alamat;
        $kodeprop = $request->kodeprop;
        $namaprop = $request->namaprop;
        $kodedati2 = $request->kodedati2;
        $namadati2 = $request->namadati2;
        $kodekec = $request->kodekec;
        $namakec = $request->namakec;
        $kodekel = $request->kodekel;
        $namakel = $request->namakel;
        $rw = $request->rw;
        $rt = $request->rt;

        // your query
        $data = DB::connection('simrs')->table('');

        return $this->bpjsResponse([
            "norm" => "123456",
        ], [
            'message' => 'Harap datang ke admisi untuk melengkapi data rekam medis',
            'code' => 200,
        ]);
    }
    public function jadwalOperasiRs(Request $request)
    {
        $tanggalawal = $request->tanggalawal;
        $tanggalakhir = $request->tanggalakhir;

        // your query
        $data = DB::connection('simrs')->table('');

        return $this->bpjsResponse(
            [
                "list" =>
                [
                    "kodebooking" => "123456ZXC",
                    "tanggaloperasi" => "2019-12-11",
                    "jenistindakan" => "operasi gigi",
                    "kodepoli" => "001",
                    "namapoli" => "Poli Bedah Mulut",
                    "terlaksana" => 1,
                    "nopeserta" => "0000000924782",
                    "lastupdate" => 1577417743000,
                ],
                [
                    "kodebooking" => "67890QWE",
                    "tanggaloperasi" => "2019-12-11",
                    "jenistindakan" => "operasi mulut",
                    "kodepoli" => "001",
                    "namapoli" => "Poli Bedah Mulut",
                    "terlaksana" => 0,
                    "nopeserta" => "",
                    "lastupdate" => 1577417743000,
                ],
            ], [
                'message' => 'Ok',
                'code' => 200,
            ]);
    }
    public function jadwalOperasiPasien(Request $request)
    {
        $nopeserta = $request->nopeserta;

        // your query
        $data = DB::connection('simrs')->table('');

        return $this->bpjsResponse(
            [
                "list" =>
                [
                    "kodebooking" => "123456ZXC",
                    "tanggaloperasi" => "2019-12-11",
                    "jenistindakan" => "operasi gigi",
                    "kodepoli" => "001",
                    "namapoli" => "Poli Bedah Mulut",
                    "terlaksana" => 0,
                ],
            ], [
                'message' => 'Ok',
                'code' => 200,
            ]);
    }
}