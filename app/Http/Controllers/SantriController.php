<?php

namespace App\Http\Controllers;

use App\Santri;
use Illuminate\Http\Request;
use Yajra\Datatables\Datatables;
class SantriController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('santri.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('santri.createcopy');
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
              'nama'   => 'required|string|min:3',
              'nis'    => 'required|unique:santris|max:10',
              'alamat' => 'required',
              'foto'   => 'required'
        ]);
        Santri::create($request->all());
        return redirect()->route('santri.index')
                         ->with('sukses','berhasil memasukan data');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Santri  $Santri
     * @return \Illuminate\Http\Response
     */
    public function show(santri $santri)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Santri  $Santri
     * @return \Illuminate\Http\Response
     */
    public function edit(Santri $santri)
    {
        $santri=Santri::findOrFail($santri)->first();
        return view('santri.edit',compact('santri'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Santri  $Santri
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Santri $santri)
    {
        $santri=Santri::findOrFail($santri)->first();
        $this->validate($request,[
            'nama'   => 'required|string|min:3',
            'nis'    => 'required|max:10',
            'alamat' => 'required',
            'foto'   => 'required'
      ]);
       $santri->update($request->all());
       return redirect()->route('santri.index')
                         ->with('edit','berhasil edit data');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Santri  $Santri
     * @return \Illuminate\Http\Response
     */
    public function destroy(Santri $santri)
    {
        $santri=Santri::findOrFail($santri)->first();
        $santri->delete();
        return redirect()->route('santri.index')
                         ->with('hapus','berhasil hapus data');

    }

    public function dataTable()
    {
        $santri=Santri::query();
        return Datatables::of($santri)
        ->addColumn('foto',function($santri){
            return '<img src="'.asset($santri->foto).'" height="32" width="32">';
        })
        ->addIndexColumn()
        ->addColumn('action',function($santri){
            return view('layouts.button',[
                'model'=>$santri,
                'edit'=>route('santri.edit',$santri->id),
                'hapus'=>route('santri.destroy',$santri->id)
            ]);
        })
        ->rawColumns(['foto','action'])
        ->make(true);
     }
}
