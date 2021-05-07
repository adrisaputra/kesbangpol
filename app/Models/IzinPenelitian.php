<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class IzinPenelitian extends Model
{
    // use HasFactory;
    protected $table = 'izin_penelitian_tbl';
    protected $fillable =[
        'kode',
        'surat_perguruan_tinggi',
        'proposal_penelitian',
        'ktp_peneliti',
        'izin_penelitian',
        'dokumen_rekomendasi',
        'perbaikan',
        'tanggal',
        'waktu',
        'status',
        'user_id'
    ];
}
