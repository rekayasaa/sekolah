<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Album extends Model
{
    protected $primaryKey = 'id';
    protected $table = 'album';
    protected $fillable = ['judul','slug','aktif'];
    public $timestamps = false;
}
