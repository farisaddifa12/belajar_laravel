<?php

namespace App\Http\Controllers;

use App\Models\Mapel;
use Illuminate\Http\Request;

class MapelController extends Controller
{    
    /**
     * index
     *
     * @return void
     */
    public function index()
    {
        //get posts
        $mapels = Mapel::latest()->paginate(5);

        //render view with posts
        return view('mapels.index', compact('mapels'));
    }

    public function create()
    {
        return view('posts.create');
    }

    /**
     * store
     *
     * @param Request $request
     * @return void
     */
    public function store(Request $request)
    {
        //validate form
        $this->validate($request, [
            'kelas'     => 'required|min:5',
            'id_guru'   => 'required|min:10'
        ]);


        //create post
        Mapel::create([
            'kelas'     => $request->kelas,
            'id_guru'   => $request->id_guru
        ]);

        //redirect to index
        return redirect()->route('mapels.index')->with(['success' => 'Data Berhasil Disimpan!']);
    }
}