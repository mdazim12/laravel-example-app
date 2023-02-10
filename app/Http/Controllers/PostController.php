<?php

namespace App\Http\Controllers;
use App\Models\Post;
use Flasher\Prime\FlasherInterface;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function add(REQUEST $request, FlasherInterface $flasher){

        $request->validate([
            'title'     =>'required',
            'content'   =>'required',

        ]);

        $post           = new Post();
        $post->title    = $request->title;
        $post->date     = now();
        $post->content  = $request->content;
        $post->save();
        $flasher->addSuccess('Your Post Saved Successfully.');

        return redirect()->route('dashboard');
    }

    public function index( FlasherInterface $flasher  ){

        $flasher->addSuccess('Hello world');
        return view('index');
    }

   
}
