<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\DatapaketStudio;

class DatapaketstudioController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $datapaket = DatapaketStudio::latest()->paginate(5);
        return view('datapaketstudio.index',compact('datapaket'))
            ->with('i',(request()->input('page',1)-1)*5);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('datapaketstudio.create');
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
            'nama_paket' => 'required',
            'harga' => 'required',
            'orang' => 'required',
            'tambahan' => 'required'
        ]);
         
        /// insert setiap request dari form ke dalam database via model
        /// jika menggunakan metode ini, maka nama field dan nama form harus sama
        DatapaketStudio::create($request->all());
         
        /// redirect jika sukses menyimpan data
        return redirect()->route('datapaketstudio.index')
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
    public function edit(DatapaketStudio $datapaketstudio)
    {
        return view('datapaketstudio.edit',compact('datapaketstudio'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,DatapaketStudio $datapaketstudio)
    {
        $request->validate([
            'nama_paket' => 'required',
            'harga' => 'required',
            'orang' => 'required',
            'tambahan' => 'required'
            ]);

        $datapaketstudio->update($request->all());

        return redirect()->route('datapaketstudio.index')
        ->with('success','Post Update Success');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $post = DatapaketStudio::find($id);
        $post->delete();
  
        return redirect()->route('datapaketstudio.index')
                        ->with('success','Post deleted successfully');
    }
}
