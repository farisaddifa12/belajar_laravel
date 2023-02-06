<?php

namespace App\Http\Controllers;
use App\Dashboard;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;


class DashboardController extends Controller
{ 
    public function index()
    {
        //get posts
        $posts = post::latest()->paginate(5);

        //render view with posts
        return view('posts.index', compact('posts'));
    }
    //
}
