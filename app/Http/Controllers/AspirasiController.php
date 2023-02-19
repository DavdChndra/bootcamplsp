<?php

namespace App\Http\Controllers;

use App\Models\Aspirasi;
use App\Models\Input_aspirasi;
use App\Models\Kategori;
use App\Models\Penduduk;
use Illuminate\Http\Request;

class AspirasiController extends Controller
{
    public function index()
    {
        $aspirasi = Aspirasi::latest();
        $noUrut = $aspirasi->max('id');
        $kategori = Kategori::all();
        $id =abs($noUrut + 1);
        return View('aspirasi', [
            'title' => 'Pengaduan',
            'aspirasi' => $aspirasi->fillter(request(['search']))->get(),
            'no' => $id,
            'kategori' => $kategori,
            
        ]);
    }

    public function store(Request $request)
    {
        $ValidateData = $this->validate($request, [
            'nik' => 'required',
            'lokasi' => 'required',
            'kategori_id' => 'required',
            'ket' => 'required',
            'image' => 'image|file|max:1024'
        ]);

        if($request->file('image')){
            $ValidateData['image'] = $request->file('image')->store('post-images');
        }
    
        $data = Penduduk::all()->where('id',$request->nik)->count();
        if ($data > 0) {
       
            Input_aspirasi::create(
                $ValidateData
            );
            Aspirasi::create([
                'id' => $request->id,
                'id_aspirasi' => $request->id,
                'kategori_id' => $request->kategori_id,
            ]);
            return Redirect("/?id=$request->id");
            } else{
                return Redirect("/?nik=$request->nik");
            }
        }
    public function feedback(Request $request)
    {
        Aspirasi::where('id_aspirasi',  $request->id_aspirasi)
        ->update(['feedback' => $request->feedback]);
        return redirect('/aspirasi#aspirasi');
    }
}