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
            'kehadiran' => 'required',
            'keterangan' => 'required',
        ]);

        Absensi::create($request->all());

        return redirect('/absensis')->with('success', 'Data absensi berhasil disimpan.');
    }public function absensi_store(Request $request)
    {
        $inputs = $request->input('absensi');
        $rules = [
            'absensi.*.nama' => 'required',
            'absensi.*.kehadiran' => 'required',
            'absensi.*.keterangan' => 'required',
        ];
        $this->validate($request, $rules);

        foreach ($inputs as $input) {
            try {
                Absensi::create([
                    'id' => $input['id'],
                    'nama' => $input['nama'],
                    'kehadiran' => $input['kehadiran'],
                    'keterangan' => $input['keterangan']
                ]);
            } catch (\Exception $e) {
                // Handle the exception here
            }
        }

        return redirect()->route('absensis')->with(['success' => 'Data Berhasil Disimpan!']);
    }
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
    //         'nama' => 'required',
    //         'kehadiran' => 'required',
    //         'keterangan' => 'required,

    //     ]);

    //     //redirect to index
    //     return redirect()->route('absensis.index')->with(['success' => 'Data Berhasil Disimpan!']);
    // }

