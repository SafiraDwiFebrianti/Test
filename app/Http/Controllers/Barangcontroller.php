<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Barangmodel;
use Illuminate\Support\Facades\Validator;

class Barangcontroller extends Controller
{

  public function barang() {
        $data = "Data semua barang";
        return response()->json($data, 200);
    }

    public function barangAuth() {
        $data = "Welcome " . Auth::user()->name;
        return response()->json($data, 200);
    }


  // FUNGSI TAMBAH BARANG
  public function store(Request $req)
  {
    $validator = Validator::make($req->all(),
    [
      'nama_barang' => 'required',
      'harga' => 'required',
      'stok' => 'required'

    ]
  );

  if($validator->fails()){
    return Response()->json($validator->errors());
  }

  $simpan = Barangmodel::create([
    'nama_barang' => $req->nama_barang,
    'harga' => $req->harga,
    'stok' => $req->stok

  ]);

  if($simpan){
    return Response()->json(["Data barang berhasil ditambahkan"]);
  } else {
    return Response()->json(['status'=>0]);
  }
}


  // FUNGSI HAPUS BARANG
  public function destroy($id_barang)
  {
    $hapus = Barangmodel::where('id_barang', $id_barang)->delete();
    if($hapus){
      return Response()->json(["Data Anda berhasil dihapus !"]);
    } else {
      return Response()->json(["Data Anda gagal dihapus!"]);
    }
  }
}
