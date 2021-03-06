<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Alumni extends Model
{
    protected $table = 'alumni';
    protected $fillable = ['pengurus_id','nama_alumni','alamat_alumni','jurusan_alumni','kelas_alumni','thn_masuk','thn_lulus','foto'];
    public $timestamps = false;

    public function pengurus()
    {
        return $this->belongsTo(Pengurus::class);
    }
}
