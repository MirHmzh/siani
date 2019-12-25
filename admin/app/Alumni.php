<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Alumni extends Model
{
    protected $table = 'alumni';
    protected $fillable = ['id_pengurus','nama_alumni','alamat_alumni','jurusan_alumni','kelas_alumni','thn_masuk','thn_lulus','foto'];
    protected $timestamp = false;
}
