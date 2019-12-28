<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Agenda extends Model
{
    protected $table = 'agenda';
    protected $fillable = ['nama_agenda','tempat','tanggal_mulai','tanggal_selesai','waktu_mulai','waktu_selesai'];
    public $timestamps = false;
}
