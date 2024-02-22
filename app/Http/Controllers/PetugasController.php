<?php

namespace App\Http\Controllers;

use App\Models\buku;
use Illuminate\Http\Request;

class PetugasController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = buku::orderBy('idBuku', 'asc')->paginate(5);
        return view('buku2.petugas')->with('data', $data);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $data = buku::where('idbuku', $id)->first();
        return view('buku2.edit')->with('data', $data);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'judul' => 'required',
            'penulis' => 'required',
            'penerbit' => 'required',
            'tahunterbit' => 'required'
        ],[
            'judul.required' => 'judul wajib di isi',
            'penulis.required' => 'penulis wajib di isi',
            'penerbit.required' => 'penerbit wajib di isi',
            'tahunterbit.required' => 'tahun terbit wajib di isi'
        ]);

        $data = [
            'judul' => $request->judul,
            'penulis' => $request->penulis,
            'penerbit' => $request->penerbit,
            'tahunterbit' => $request->tahunterbit,
        ];

        Buku::where('idbuku',$id)->update($data);
        return redirect()->to('petugas')->with('success', 'Berhasil mengedit data');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        buku::where('idbuku', $id)->delete();
        return redirect()->to('petugas')->with('success', 'Berhasil menghapus data');
    }
}
