<?php

namespace App\Http\Controllers;
use App\Models\Post;
use Flasher\Prime\FlasherInterface;

use Illuminate\Http\Request;

class TestController extends Controller
{
    public function all_post(){
        
        $test =Post::all();
        return view('test',['all_post'=>$test,]);
    }


            ///post edit
    public function edit($id,FlasherInterface $flasher){
        $post =Post::find($id);

        if(empty($post)){
            $flasher->addError('Post Not Found');
            return redirect()->route('all-post');
        }

        return view('edit',[
            'post'  =>$post,
        ]);
    }

             ////post update
    public function update($id,REQUEST $request,FlasherInterface $flasher){
        $post =Post::findOrFail($id);

        $request->validate([
            'title'     =>'required',
            'content'   =>'required',

        ]);


        $post->title  =  $request->title;
        $post->content = $request->content;
        $post->save();

        $flasher->addSuccess('Your Post Updated');
        

        return redirect()->route('all-post');

    }

        //Delete Post
        public function delete($id,FlasherInterface $flasher){
            $post   =Post::findOrFail($id);
            $post->delete();

            $flasher->addSuccess('Your Post Deleted');
            return redirect()->route('all-post');
        }



   
}
