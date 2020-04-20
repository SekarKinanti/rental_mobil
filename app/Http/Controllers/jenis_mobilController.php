<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use JWTAuth;
use Tymon\JWTAuth\Exceptions\JWTException;
use App\jenis_mobilModel;
use Auth;

class jenis_mobilController extends Controller
{
    public function store(Request $req)
    {
        $validator=Validator::make($req->all(),
        [
            'nama_jenis'=>'required'
           
        ]);
        if($validator->fails()){
            return Response()->json($validator->errors());
        }

        $simpan=jenis_mobilModel::create([
            'nama_jenis'=>$req->nama_jenis,
            
        ]);
            return Response()->json(['status'=>"jenis mobil berhasil ditambahkan"]);
       
    }
    public function update($id,Request $req)
    {
       
        $validator=Validator::make($req->all(),
        [
            'nama_jenis'=>'required'
           
        ]);

        if($validator->fails()){
            return Response()->json($validator->errors());
        }
        $ubah=jenis_mobilModel::where('id_jenis', $id)->update([
            'nama_jenis'=>$req->nama_jenis
        ]);
            return Response()->json(['status'=>"jenis mobil berhasil diubah"]);
        
    }
    
    public function hapus($id)
    {
        
        $hapus=jenis_mobilModel::where('id_jenis',$id)->delete();
            return Response()->json(['status'=>"jenis mobil berhasil dihapus"]);
        
    }

    public function tampil_jenis(){
       
            $dt_buku=jenis_mobilModel::get();
            return response()->json($dt_buku);
       
    }
}