<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Datacetak;

class DatacetakController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $datacetak = Datacetak::where('sudah','0')->get();

        return view('datacetak.index',compact('datacetak'))
            ->with('i',(request()->input('page',1)-1)*5);
    }

    public function sudahcetak()
    {
        $datacetak = Datacetak::where('sudah','1')->get();

        return view('datacetak.sudahcetak',compact('datacetak'))
            ->with('i',(request()->input('page',1)-1)*5);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('datacetak.create');
    }

    public function tercetak(Request $request,$cetak)
    {
        $page = Datacetak::find($cetak);

        // Make sure you've got the Page model
        if($page) {
            $page->sudah = '1';
            $page->save();
        }

        return redirect()->route('datacetak.index')
        ->with('success','Post Update Success');
    }
    public function back(Request $request,$cetak)
    {
        $page = Datacetak::find($cetak);

        // Make sure you've got the Page model
        if($page) {
            $page->sudah = '0';
            $page->save();
        }

        return redirect()->route('datacetak.index')
        ->with('success','Post Update Success');
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
            'gambar' =>  'required',
            'gambar.*' => 'mimes:jpeg,jpg,png,gif',
            'ukuran' => 'required',
        ]);

        if($request->hasfile('gambar')) {
            foreach($request->file('gambar') as $file)
            {
                $name = uniqid() . '_' . time(). '.' .$file->getClientOriginalName();
                $file->move(public_path().'/uploads/', $name);  
                $data[] = $name;  
            }

            $file= new Datacetak();
            $file->nama = $request->nama;
            $file->gambar=json_encode($data);
            $file->ukuran = $request->ukuran;
            $file->deskripsi = $request->deskripsi;
           
            $file->save();
           return redirect()->route('datacetak.index')
                        ->with('success','Post deleted successfully');
        }  
         
        /// insert setiap request dari form ke dalam database via model
        /// jika menggunakan metode ini, maka nama field dan nama form harus sama
        Datacetak::create($request->all());
        
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Datacetak $datacetak)
    {
        return view('datacetak.show',compact('datacetak'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $post = datacetak::find($id);
        $post->delete();
  
        return redirect()->route('datacetak.index')
                        ->with('success','Post deleted successfully');
    }
}
