<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transaksi extends Model
{
    use HasFactory;
    protected $table = 'tb_transaksi';
    protected $primaryKey = 'id_transaksi';
    // public $incrementing = false;
    protected $fillable = ['id_transaksi','total','valid','id_user'];
    public $timestamps = false;
}
