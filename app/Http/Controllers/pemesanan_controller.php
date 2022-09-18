<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\M_pemesanan;
use DataTables;

class pemesanan_controller extends Controller
{
    public function index(){
        return view('pemesanan.index');
    }
    //
    public function yajra(){
        $pemesanans = M_pemesanan::select(['id','kamar','user_id','status']);
        return DataTables::of($pemesanans)->make();
    }
}
