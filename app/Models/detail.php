<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class detail extends Model
{
    use HasFactory;
    protected $table = 'tb_barang';
    protected $primaryKey = 'id_detail';
    // public $incrementing = false;
    protected $fillable = ['id_brg','jumlah','harga_jual','id_user','status','tanggal'];
    public $timestamps = false;
}
