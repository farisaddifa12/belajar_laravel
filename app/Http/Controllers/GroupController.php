<?php

namespace App\Http\Controllers;

use App\Models\Group;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class GroupController extends Controller
{
    /**
     * index
     *
     * @return void
     */
    public function index()
    {
        //get posts
        $groups = group::latest()->paginate(5);

        //render view with posts
        return view('groups.index', compact('groups'));
    }
    /**
     * create
     *
     * @return void
     */
    public function create()
    {
        return view('groups.create');
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
            'id' => 'required|min:5',
            'user_id' => 'required|min:10',
            'name' => 'required|min:10',

        ]);
        //create post
        Group::create([
            'id' => $request->id,
            'user_id' => $request->user_id,
            'name' => $request->name,
        ]);

        //redirect to index
        return redirect()->route('groups.index')->with(['success' => 'Data Berhasil Disimpan!']);
    }
    /**
     * edit
     *
     * @param  mixed $group
     * @return void
     */
    public function edit(Group $group)
    {
        return view('groups.edit', compact('group'));
    }

    /**
     * update
     *
     * @param  mixed $request
     * @param  mixed $group
     * @return void
     */
    public function update(Request $request, Group $group)
    {
        //validate form
        $this->validate($request, [
            'id' => 'required|min:5',
            'user_id' => 'required|min:10',
            'name' => 'required|min:10',

        ]);


        //update post without photo$photo
        $group->update([
            'id' => $request->id,
            'user_id' => $request->user_id,
            'name' => $request->name,
        ]);


        //redirect to index
        return redirect()->route('groups.index')->with(['success' => 'Data Berhasil Diubah!']);
    }
    /**
     * destroy
     *
     * @param  mixed $groups
     * @return void
     */
    public function destroy(Group $group)
    {

        //delete post
        $group->delete();

        //redirect to index
        return redirect()->route('groups.index')->with(['success' => 'Data Berhasil Dihapus!']);
    }
}
