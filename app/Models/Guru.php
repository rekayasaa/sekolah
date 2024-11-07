<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Guru extends Model
{
    
    protected $primaryKey = 'id';
    protected $table = 'guru';
    protected $fillable = ['nama','nip','tempat_lahir','tgl_lahir','jabatan','foto'];
    public $timestamps = false;
}
