<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pengurus extends Model
{
    protected $table = 'pengurus';
    protected $fillable = ['nama_jabatan','order'];
    public $timestamps = false;

    public function alumni()
    {
        return $this->hasOne(Alumni::class);
    }
}
