<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DetailTransaksi extends Model
{
    use HasFactory;
    protected $table = 'tb_detail_transaksi';
    protected $primaryKey = 'id_detail_tran';
    // public $incrementing = true;
    protected $fillable = [
        'id_detail_tran',
        'id_transaksi',
        'bank',
        'no_rek',
        'an',
        'gambar',
        'path',
    ];    
    public $timestamps = false;
}
