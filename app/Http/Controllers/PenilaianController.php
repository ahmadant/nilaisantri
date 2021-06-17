<?php

namespace App\Http\Controllers;

use App\Penilaian;
use Illuminate\Http\Request;

use Yajra\Datatables\Datatables;
class PenilaianController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       return view('penilaian.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('penilaian.create');
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
            'id_santri'=>'required',
            'id_kategori'=>'required',
            'keterangan'=>'required'
        ]);
        $new_nilai = new Penilaian;
        // $kode_nilai = today('ymd')."#".$request->id_santri;
        // foreach ($request->ktgnilai as $key) {
            // $new_nilai->id_santri = $request->id_santri;
            // $new_nilai->kode_nilai = $kode_nilai;
            // $new_nilai->id_kategori = $request->ktgnilai;
            // $new_nilai->keterangan = $request->keterangan;
            // $new_nilai->save();
        // }
        Penilaian::Create($request->all());
        return redirect()->route('penilaian.index')->with('sukses','penilaian berhasil di masukan');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Penilaian  $penilaian
     * @return \Illuminate\Http\Response
     */
    public function show(Penilaian $penilaian)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Penilaian  $penilaian
     * @return \Illuminate\Http\Response
     */
    public function edit(Penilaian $penilaian)
    {
        $penilaian=Penilaian::findOrFail($penilaian)->first();
        return view('penilaian.edit',compact('penilaian'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Penilaian  $penilaian
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Penilaian $penilaian)
    {
        $penilaian=Penilaian::findOrFail($penilaian)->first();
        $this->validate($request,[
            'id_santri'=>'required',
            'id_kategori'=>'required',
            'keterangan'=>'required'
        ]);
        $penilaian->update($request->all());
        return redirect()->route('penilaian.index')->with('edit','sukses edit nilai');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Penilaian  $penilaian
     * @return \Illuminate\Http\Response
     */
    public function destroy(Penilaian $penilaian)
    {
        //
    }
    public function data()
    {
        $penilaian=Penilaian::query();
        return Datatables::of($penilaian)
        ->addIndexColumn()
        ->addColumn('nama',function($penilaian){
            return $penilaian->santri->nama;
        })
        ->addColumn('nis',function($penilaian){
            return $penilaian->santri->nis;
        })
        ->addColumn('kategori',function($penilaian){
            return $penilaian->kategori->nama;
        })
        ->addColumn('bobot',function($penilaian){
            return $penilaian->kategori->bobot;
        })
        ->addColumn('action',function($penilaian){
          return view('layouts.button',[
             'edit' =>route('penilaian.edit',$penilaian->id),
             'hapus'=>route('penilaian.destroy',$penilaian->id),
             'model'=>$penilaian
          ]);
        })
        ->rawColumns(['action','santri','pelanggan','nis','bobot'])
        ->make(true);
    }
}
