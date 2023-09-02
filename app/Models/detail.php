<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class detail extends Model
{
    use HasFactory;
    protected $table = 'tb_detail_belanja';
    protected $primaryKey = 'id_detail';
    // public $incrementing = false;
    protected $fillable = ['id_detail','id_brg','id_transaksi','jumlah','harga_jual','id_user','status','tanggal'];
    public $timestamps = false;
    public function barang()  {
        return $this->belongsTo(Barang::class,'id_brg')->withDefault([
            'id_brg' => 'tidak ada'
        ]);
    }
}
