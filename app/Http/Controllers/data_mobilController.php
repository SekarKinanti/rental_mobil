<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use JWTAuth;
use Tymon\JWTAuth\Exceptions\JWTException;
use App\data_mobilModel;
use Auth;

class data_mobilController extends Controller
{
    public function store(Request $req)
    {
        $validator=Validator::make($req->all(),
        [
            'id_jenis'=>'required',
            'nama_mobil'=>'required',
            'merk'=>'required',
            'plat'=>'required',
            'kondisi'=>'required'
           
        ]);
        if($validator->fails()){
            return Response()->json($validator->errors());
        }

        $simpan=data_mobilModel::create([
            'id_jenis'=>$req->id_jenis,
            'nama_mobil'=>$req->nama_mobil,
            'merk'=>$req->merk,
            'plat'=>$req->plat,
            'kondisi'=>$req->kondisi
        ]);
            return Response()->json(['status'=>"data mobil berhasil ditambahkan"]);
        
        
    }
    public function update($id,Request $req)
    {
        $validator=Validator::make($req->all(),
        [
            'id_jenis'=>'required',
            'nama_mobil'=>'required',
            'merk'=>'required',
            'plat'=>'required',
            'kondisi'=>'required'
           
        ]);

        if($validator->fails()){
            return Response()->json($validator->errors());
        }
        $ubah=data_mobilModel::where('id_data', $id)->update([
            'id_jenis'=>$req->id_jenis,
            'nama_mobil'=>$req->nama_mobil,
            'merk'=>$req->merk,
            'plat'=>$req->plat,
            'kondisi'=>$req->kondisi
        ]);
            return Response()->json(['status'=>"data mobil berhasil diubah"]);
        
    }
    
    public function hapus($id)
    {
        
        $hapus=data_mobilModel::where('id_data',$id)->delete();
            return Response()->json(['status'=>"data pelanggan berhasil dihapus"]);
        
    }

    public function tampil_data(){
        
            $dt_buku=data_mobilModel::get();
            return response()->json($dt_buku);
        
    }
}