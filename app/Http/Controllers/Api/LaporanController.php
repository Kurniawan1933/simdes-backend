<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Laporan;

class LaporanController extends Controller
{
    /**
     * GET /api/laporan
     * (kamu pakai nama: kirim)
     */
    public function kirim()
    {
        try {
            $data = Laporan::orderBy('id', 'desc')->get();

            return response()->json([
                'success' => true,
                'message' => 'Data laporan masuk berhasil diambil',
                'data' => $data
            ], 200);

        } catch (\Throwable $e) {
            return response()->json([
                'success' => false,
                'message' => 'Gagal mengambil data laporan',
                'error_message' => $e->getMessage(),
                'line' => $e->getLine(),
                'file' => $e->getFile()
            ], 500);
        }
    }

    /**
     * POST /api/laporan
     * (kamu pakai nama: menampilkan)
     */
    public function menampilkan(Request $request)
    {
        try {
            // VALIDASI (biar error jelas di mobile)
            $request->validate([
                'nama_pelapor' => 'required',
                'kategori' => 'required',
                'deskripsi' => 'required'
            ]);

            // SIMPAN DATA
            $data = Laporan::create([
                'nama_pelapor' => $request->nama_pelapor,
                'kontak' => $request->kontak,
                'is_anonim' => $request->is_anonim ?? 0,
                'kategori' => $request->kategori,
                'pegawai_id' => $request->pegawai_id,
                'alamat' => $request->alamat,
                'maps_link' => $request->maps_link,
                'latitude' => $request->latitude,
                'longitude' => $request->longitude,
                'foto_bukti' => $request->foto_bukti,
                'deskripsi' => $request->deskripsi,
                'status' => $request->status ?? 'pending'
            ]);

            return response()->json([
                'success' => true,
                'message' => 'Laporan berhasil dikirim',
                'data' => $data
            ], 201);

        } catch (\Illuminate\Validation\ValidationException $e) {
            return response()->json([
                'success' => false,
                'message' => 'VALIDATION ERROR',
                'errors' => $e->errors()
            ], 422);

        } catch (\Throwable $e) {
            return response()->json([
                'success' => false,
                'message' => 'SERVER ERROR',
                'error_message' => $e->getMessage(),
                'line' => $e->getLine(),
                'file' => $e->getFile()
            ], 500);
        }
    }
}
