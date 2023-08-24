<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserM extends Model
{
    use HasFactory;
    protected $table = 'users';
    protected $primaryKey = 'id_user';
    // public $incrementing = false;
    protected $fillable = ['id_user','name','username','email','password','role','alamat'];
    public $timestamps = false;
}
