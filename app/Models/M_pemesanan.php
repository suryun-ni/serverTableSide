<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class M_pemesanan extends Model
{
    use HasFactory;
    protected $table = 'pemesanan';
    public function user(){
        return $this->belongsTo('App\Models\M_user','user_id','id');
    }
}
