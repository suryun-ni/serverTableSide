<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\M_pemesanan;
use DataTables;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Hash;


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
            $button = '<a href="javascript:void(0)" data-toggle="tooltip"  id="btn-edit-post"  data-id="'.$data->id.'" data-original-title="Edit" class="edit btn btn-primary btn-sm editCustomer">Edit</a>';
            $button .=' <a href="javascript:void(0)" data-toggle="tooltip" id="btn-delete-post"   data-id="'.$data->id.'" data-original-title="Delete" class="btn btn-danger btn-sm deleteCustomer">Delete</a>';
            return $button;
        })->rawColumns(['status','action'])->make(true);

    }
        public function store(Request $request){
            $validator = Validator::make($request->all(),[
                'kamar' => 'required',
                'user_id' => 'required',
                'status' => 'required',
            ]);
            if ($validator->fails()) {
                return response()->json($validator->errors(), 422);
            }
            $post = M_pemesanan::updateOrCreate([
                'kamar' => $request->kamar,
                'user_id' => $request->user_id,
                'status' => $request->status,
            ]);
            
            if ($post) {         
                return response()->json([
                    'success' => true,
                    'data'=> $post,
                    'message' => 'sukses',
                ], 200);
            } else {
                return response()->json([
                    'success' => false,
                    'message' => 'gagal',
                ], 401);
            }
        }
        /**
     * show
     *
     * @param  mixed $post
     * @return void
     */
        public function show(M_pemesanan $M_pemesanan){
            return response()->json([
                'success'=>true,
                'message'=>'Detail Data',
                'data'=> $M_pemesanan
            ]);
        }
        /**
     * update
     *
     * @param  mixed $request
     * @param  mixed $M_pemesanan
     * @return void
     */
        public function update(Request $request, M_pemesanan $M_pemesanan){
            $validator = Validator::make($request->all(),[
                'kamar' => 'required',
                'user_id' => 'required',
                'status' => 'required',
            ]);
            if ($validator->fails()) {
                return response()->json($validator->errors(), 422);
            }

            $M_pemesanan->update([
                'kamar' => $request->kamar,
                'user_id' => $request->user_id,
                'status' => $request->status,
            ]);

            return response()->json([
                'success'=>true,
                'message'=>'Data berhasil di Update',
                'data'=>$M_pemesanan,
            ]);
        }
}
