<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Laporan extends Model
{
    protected $table = 'laporans';

    protected $fillable = [
        'nama_pelapor',
        'kontak',
        'is_anonim',
        'kategori',
        'pegawai_id',
        'alamat',
        'maps_link',
        'latitude',
        'longitude',
        'foto_bukti',
        'deskripsi',
        'status'
    ];
}
