<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Menu extends Model
{
    protected $primaryKey = 'id';
    protected $table = 'menu';
    protected $fillable = ['nama','parent','urut','link','aktif','tipe'];
    public $timestamps = false;
}
