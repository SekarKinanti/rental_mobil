<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use JWTAuth;
use Tymon\JWTAuth\Exceptions\JWTException;
use App\PenyewaModel;
use Auth;

class PenyewaController extends Controller
{
    public function store(Request $req)
    {
        $validator=Validator::make($req->all(),
        [
            'nama_penyewa'=>'required',
            'alamat'=>'required',
            'telp'=>'required',
           
        ]);
        if($validator->fails()){
            return Response()->json($validator->errors());
        }

        $simpan=PenyewaModel::create([
            'nama_penyewa'=>$req->nama_penyewa,
            'alamat'=>$req->alamat,
            'telp'=>$req->telp
        ]);
            return Response()->json(['status'=>"penyewa berhasil ditambahkan"]);
        
        
    }
    public function update($id,Request $req)
    {
        $validator=Validator::make($req->all(),
        [
            'nama_penyewa'=>'required',
            'alamat'=>'required',
            'telp'=>'required',
           
        ]);

        if($validator->fails()){
            return Response()->json($validator->errors());
        }
        $ubah=PenyewaModel::where('id_penyewa', $id)->update([
            'nama_penyewa'=>$req->nama_penyewa,
            'alamat'=>$req->alamat,
            'telp'=>$req->telp
        ]);
            return Response()->json(['status'=>"data penyewa berhasil diubah"]);
    }
    
    public function hapus($id)
    {
        
        $hapus=PenyewaModel::where('id_penyewa',$id)->delete();
            return Response()->json(['status'=>"data penyewa berhasil dihapus"]);
        
    }

    public function tampil_penyewa(){
        
            $dt_buku=PenyewaModel::get();
            return response()->json($dt_buku);
        
    }
}