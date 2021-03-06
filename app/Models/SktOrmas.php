<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SktOrmas extends Model
{
    // use HasFactory;
    protected $table = 'skt_ormas_tbl';
    protected $fillable =[
        'kode',
        'anggaran_dasar',
        'logo',
        'bendera',
        'program_kerja',
        'domisili',
        'kepemilikan',
        'foto_kantor',
        'susunan_pengurus',
        'biodata_ketua',
        'foto_ketua',
        'ktp_ketua',
        'biodata_sekretaris',
        'foto_sekretaris',
        'ktp_sekretaris',
        'biodata_bendahara',
        'foto_bendahara',
        'ktp_bendahara',
        'formulir',
        'rekomendasi',
        'surat_pernyataan_permendagri',
        'surat_pernyataan_kesediaan',
        'dokumen_rekomendasi',
        'perbaikan',
        'tanggal',
        'waktu',
        'status',
        'user_id'
    ];
}