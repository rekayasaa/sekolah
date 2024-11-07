<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Identitas extends Model
{
    protected $primaryKey = 'id';
    protected $table = 'identitas';
    protected $fillable = ['nama','alamat','facebook','instagram','youtube','kor_lat','kor_long','url','email'];
    public $timestamps = false;
}
