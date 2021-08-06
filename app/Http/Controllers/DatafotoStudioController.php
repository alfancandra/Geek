<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\DatafotoStudio;
use App\Models\DatapaketStudio;
use Illuminate\Support\Facades\DB;

class DatafotoStudioController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $datafoto = DatafotoStudio::join('datapaket_studios','datafoto_studios.paket','=','datapaket_studios.id')
        ->select(['datafoto_studios.*','datapaket_studios.id','datapaket_studios.nama_paket','datapaket_studios.harga','datapaket_studios.orang As perorang','datapaket_studios.tambahan'])->get();

        return view('datafotostudio.index',compact('datafoto'))
            ->with('i',(request()->input('page',1)-1)*5);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $datapaket = DatapaketStudio::latest()->paginate(5);
        return view('datafotostudio.create',compact('datapaket'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required',
            'alamat' => 'required',
            'telp' => 'required',
            'paket' => 'required',
            'orang' => 'required',
        ]);
         
        /// insert setiap request dari form ke dalam database via model
        /// jika menggunakan metode ini, maka nama field dan nama form harus sama
        $idpaket = $request->paket;
        $jmlorang = $request->orang;
        $file = new DatafotoStudio();
        $paket = DatapaketStudio::where('id',$idpaket)->first();
        if ($jmlorang > $paket->perorang) {
            $totalharga = $paket->harga+($paket->tambahan*($jmlorang-$paket->perorang));
        }else{
            $totalharga = $paket->harga;
        }
        $file->nama = $request->nama;
        $file->alamat = $request->alamat;
        $file->telp = $request->telp;
        $file->paket = $request->paket;
        $file->orang = $request->orang;
        $file->total = $totalharga;
        $file->save();
         
        /// redirect jika sukses menyimpan data
        return redirect()->route('datafotostudio.index')
                        ->with('success','created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(DatafotoStudio $datafotoStudi)
    {
        return view('datafotostudio.edit',compact('datafotoStudi'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, DatafotoStudio $datafotoStudi)
    {
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
