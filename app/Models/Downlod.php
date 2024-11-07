<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Downlod extends Model
{
    protected $primaryKey = 'id';
    protected $table = 'downlod';
    protected $fillable = ['judul','file','hit'];
    public $timestamps = false;
}
