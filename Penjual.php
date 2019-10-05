<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\ModelPenjual;
use Validator;

class Penjual extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = ModelPenjual::all();

        return view('penjual', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('penjual_create');
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
            'nama' => 'required',
            'jenis_kelamin' => 'required',
            'Jabatan' => 'required',
            'no_hp' => 'required',
        ]);

        $data = new ModelPenjual();
        $data->nama = $request->nama;
        $data->jenis_kelamin = $request->jenis_kelamin;
        $data->Jabatan = $request->Jabatan;
        $data->no_hp = $request->no_hp;
        $data->save();

        return redirect()->route('penjual.index')->with('alert_message', 'Berhasil menambah data!');
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
    public function edit($id)
    {
        $data = ModelPenjual::where('id', $id)->get();
        return view('penjual_edit', compact('data'));
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
        $this->validate($request,[
            'nama' => 'required',
            'jenis_kelamin' => 'required',
            'Jabatan' => 'required',
            'no_hp' => 'required',
        ]);

        $data = ModelPenjual::where('id', $id)->first();
        $data->nama = $request->nama;
        $data->jenis_kelamin = $request->jenis_kelamin;
        $data->Jabatan = $request->Jabatan;
        $data->no_hp = $request->no_hp;
        $data->save();

        return redirect()->route('penjual.index')->with('alert_message', 'Berhasil mengubah data!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data = ModelPenjual::where('id', $id)->first();
        $data->delete();

        return redirect()->route('penjual.index')->with('alert_message', 'Berhasil menghapus data!');
    }
}
