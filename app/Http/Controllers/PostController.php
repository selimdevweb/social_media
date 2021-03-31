<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function axios(){
        $posts = Post::latest()->with(['user', 'likes'])->paginate(20);

       return response()->json($posts);
    }

    public function index(){

        //latest()/orderBy('created_at', 'desc')
      $posts = Post::latest()->with(['user', 'likes'])->paginate(20);
        return view('posts.index', compact('posts'));
    }

    public function show(Post $item){
        return view('posts.show', [
            'item' =>$item
        ]);
    }

    public function store(Request $request){
        $this->validate($request, [
            'body'=>'required|max:500',
        ]);

        $request ->user()->posts()->create($request->only(('body')));
        return back();
    }

    public function destroy(Post $item){
        $this->authorize('delete', $item);
        $item ->delete();
       return redirect('/posts');
        /* dd($item->id); */
    }
}


 /* Post::create([
            'user_id' => auth()->id(),
            'body'=>$request->body,
        ]); */

        /* $request ->user()->posts()->create([
            'body'=>$request->body
        ]);
        return back(); */
