<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Barang extends Model
{
    use HasFactory;
    protected $table = 'tb_barang';
    protected $primaryKey = 'id_barang';
    public $incrementing = false;
    protected $fillable = ['id_brg','nama_barang','deskripsi','gambar','stok'];
    public $timestamps = false;
}
