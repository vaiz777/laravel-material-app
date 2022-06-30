<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Barang;

class MasterBarangController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        // $barangs = Barang::latest()->get();
        // return view('barang.index').compact('barangs');
        return view('barang.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $this->validate($request, [
            'barang_nama'   => 'required',
            'barang_jumlah' => 'numeric|min:1',
            'barang_harga'  => 'numeric'
        ]); 

        $barang = Barang::create([
            'barang_nama'   => $request->barang_nama,
            'barang_jumlah' => $request->barang_jumlah,
            'barang_harga'  => $request->barang_harga
        ]);

        if($barang)
        {
            return redirect()
             ->route('barang.index')
             ->with([
                'success' => 'Data has been saved'
             ]);
        }else{
            return redirect()
                    ->back()
                    ->withErrors($validator)->withInput();
        }

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
        $this->validate($request, [
            'barang_nama'   => 'required',
            'barang_jumlah' => 'numeric|min:1',
            'barang_harga'  => 'numeric'
        ]); 

        $barang = Barang::findOrFail($id);

        $barang->update([
            'barang_nama'   => $request->barang_nama,
            'barang_jumlah' => $request->barang_jumlah,
            'barang_harga'  => $request->barang_harga
        ]);

        if($barang)
        {
            return redirect()
             ->route('barang.index')
             ->with([
                'success' => 'Data has been saved'
             ]);
        }else{
            return redirect()
                    ->back()
                    ->withErrors($validator)->withInput();
        }

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