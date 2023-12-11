<?php

namespace App\Http\Controllers;

use App\Models\archive;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class archiveController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $katakunci = $request->katakunci;
        $jumlahbaris = 4;
        if (strlen($katakunci)) {
            $data = archive::where('code', 'like', "%$katakunci%")
            ->orWhere('title', 'like', "%$katakunci%")
            ->orWhere('category', 'like', "%$katakunci%")
            ->paginate($jumlahbaris);
        } else {
            $data = archive::orderBy('code', 'desc')->paginate($jumlahbaris);
        }
        return view('archive.index')->with('data', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('archive.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        Session::flash('code', $request->code);
        Session::flash('title', $request->title);
        Session::flash('category', $request->category);

        $request->validate([
            'code' => 'required|numeric|unique:archive,code',
            'title' => 'required',
            'category' => 'required',
        ], [
            'code.required' => 'Mohon mengisi Kode',
            'code.numeric' => 'Kode harus dalam angka',
            'code.unique' => 'Kode yang diisikan sudah ada dalam database',
            'title.required' => 'Mohon isi judul',
            'category.required' => 'Mohon isi kategori',
        ]);
        $data = [
            'code' => $request->code,
            'title' => $request->title,
            'category' => $request->category,
        ];
        archive::create($data);
        return redirect()->to('archive')->with('success', 'Berhasil menambahkan data');
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
        $data = archive::where('code', $id)->first();
        return view('archive.edit')->with('data', $data);
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
        $request->validate([
            'title' => 'required',
            'category' => 'required',
        ], [
            'title.required' => 'Mohon isi judul',
            'category.required' => 'Mohon isi ketegori',
        ]);
        $data = [
            'title' => $request->title,
            'category' => $request->category,
        ];
        archive::where('code', $id)->update($data);
        return redirect()->to('archive')->with('success', 'Berhasil melakukan update data');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        archive::where('code', $id)->delete();
        return redirect()->to('archive')->with('success', 'Berhasil melakukan delete data');
    }
}
