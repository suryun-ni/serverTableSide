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
        return DataTables::of($pemesanans)->editColumn('status',
        function($data_pemesanan){
            if($data_pemesanan->status == 1){
                return 'Check-in';
            }elseif ($data_pemesanan->status == 2) {
                return 'Check-out';
            }elseif ($data_pemesanan->status == 0) {
                return 'empty';
            }
        }
        )->make();
    }
}
