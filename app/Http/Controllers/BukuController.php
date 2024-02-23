<?php

namespace App\Http\Controllers;

use App\Models\buku;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class BukuController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = Buku::orderBy('idBuku', 'asc')->paginate(20);
        return view('book.buku')->with('data', $data);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('book.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        session::flash('idBuku', $request->id);
        Session::flash('judul', $request->judul);
        Session::flash('penulis', $request->penulis);
        Session::flash('penerbit', $request->penerbit);
        Session::flash('tahunterbit', $request->tahunterbit);

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
            'idBuku' => $request->id,
            'judul' => $request->judul,
            'penulis' => $request->penulis,
            'penerbit' => $request->penerbit,
            'tahunterbit' => $request->tahunterbit,
        ];

        Buku::create($data);
        return redirect()->to('administrator')->with('success', 'Berhasil menambahkan data');
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
        return view('book.edit')->with('data', $data);
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
        return redirect()->to('administrator')->with('success', 'Berhasil mengedit data');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        buku::where('idbuku', $id)->delete();
        return redirect()->to('administrator')->with('success', 'Berhasil menghapus data');
    }
}
