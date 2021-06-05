<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Berita extends Model
{
    // use HasFactory;
	protected $table = 'berita_tbl';
	protected $fillable =['judul','isi','foto','user_id'];
}
