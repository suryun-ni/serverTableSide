<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\softDeletes;
class M_pemesanan extends Model
{
    use HasFactory;
    // use softDeletes;
    protected $table = 'pemesanan';
    protected $fillbale = [
        'kamar',
        'user_id',
        'status',
    ];

    public function user(){
        return $this->belongsTo('App\Models\M_user','user_id','id');
    }
}
