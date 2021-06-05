<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Dokumen extends Model
{
    	// use HasFactory;
	protected $table = 'dokumen_tbl';
	protected $fillable =['judul','dokumen','user_id'];
}
