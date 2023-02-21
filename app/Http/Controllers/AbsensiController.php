<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Absensi;
use App\Models\Santri;
class AbsensiController extends Controller
{
    public function index()
    {
        $absensis = santri::all();
        return view('absensis.index', compact('absensis'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required',
            'keterangan' => 'required',
            'kehadiran' => 'required',
        ]);

        Absensi::create($request->all());

        return redirect('/absensis')->with('success', 'Data absensi berhasil disimpan.');
    }
    //   /**
    //  * create
    //  *
    //  * @return void
    //  */
    // public function create()
    // {
    //     return view('absensis.create');
    // }

    // /**
    //  * store
    //  *
    //  * @param Request $request
    //  * @return void
    //  */
    // public function store(Request $request)
    // {
    //     //validate form
    //     $this->validate($request, [
    //         'nama' => 'required|min:5',
    //         'kehadiran' => 'required|min:10',
    //         'keterangan' => 'required|min:10',

    //     ]);


    //     //create post
    //     Post::create([
    //         'nama' => $request->name,
    //         'kehadiran' => $request->email,
    //         'keterangan' => $request->phone,
    //     ]);

    //     //redirect to index
    //     return redirect()->route('absensis.index')->with(['success' => 'Data Berhasil Disimpan!']);
    // }
}
