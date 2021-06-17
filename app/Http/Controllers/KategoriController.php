<?php

namespace App\Http\Controllers;

use App\Kategori;
use Illuminate\Http\Request;
use Yajra\Datatables\Datatables;
class KategoriController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('kategori.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('kategori.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request,[
            'nama'=>'required',
            'bobot'=>'numeric'
        ]);
        Kategori::create($request->all());
        return redirect()->route('kategori.index')
                         ->with('sukses','berhasil memasukan data');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\kategori  $kategori
     * @return \Illuminate\Http\Response
     */
    public function show(Kategori $kategori)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\kategori  $kategori
     * @return \Illuminate\Http\Response
     */
    public function edit(Kategori $kategori)
    {

       $kategori=Kategori::findOrFail($kategori)->first();
        return view('kategori.edit',compact('kategori'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\kategori  $kategori
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Kategori $kategori)
    {
        $kategori=Kategori::findOrFail($kategori)->first();
        $this->validate($request,[
            'nama'=>'required',
            'bobot'=>'numeric'
        ]);
        $kategori->update($request->all());
        return redirect()->route('kategori.index')
                         ->with('edit','berhasil edit data');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\kategori  $kategori
     * @return \Illuminate\Http\Response
     */
    public function destroy(Kategori $kategori)
    {
        $kategori=Kategori::findOrFail($kategori)->first();
        $kategori->delete();
        return redirect()->route('kategori.index')->with('hapus','sukses menghapus data');
    }

    public function data()
    {
        $kategori=Kategori::query();
        return Datatables::of($kategori)
        ->addIndexColumn()
        ->addColumn('action',function($kategori){
          return view('layouts.button',[
             'model'=>$kategori,
             'edit' =>route('kategori.edit',$kategori->id),
             'hapus'=>route('kategori.destroy',$kategori->id)
          ]);
        })
        ->rawColumns(['action'])
        ->make(true);
    }

}
