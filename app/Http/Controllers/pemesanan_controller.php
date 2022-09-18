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
        $pemesanans = M_pemesanan::select(['id','kamar','user_id','status'])
        ->with(['user']);
        return DataTables::of($pemesanans)->editColumn('status',
        function($data_pemesanan){
            if($data_pemesanan->status == 1){
                return '<button class="btn btn-success btn-xs">Check-in</button>';
            }elseif ($data_pemesanan->status == 2) {
                return '<button class ="btn btn-warning btn-xs">Check Out</button>';
            }elseif ($data_pemesanan->status == 0) {
                return '<button class ="btn btn-secondary btn-xs">Empty</button>';
            }
        })->addColumn('action',function($data){
            $url_edit = url('siswa/edit/'.$data->id);
            $url_hapus = url('siswa/hapus/'.$data->id);
            $button = '<a href="'.$url_edit.'" class="btn btn-primary">Edit</a>';
            $button .= '<a href="'.$url_hapus.'" class="btn btn-danger">Hapus</a>';
            return $button;
        })->rawColumns(['status','action'])->make(true);
    }
}
