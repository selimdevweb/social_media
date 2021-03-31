<?php

namespace App\Http\Controllers;

use App\Mail\PostLiked;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class PostLikeController extends Controller
{
    public function  __construct(){
            $this-> middleware(['auth']);
    }
    public function store(Post $item, Request $request){
        if ($item ->likedBy($request->user())) {
            return response(null, 409);
        }

        $item->likes()->create([
            'user_id' => $request ->user()->id
        ]);
        if ($item->likes()->onlyTrashed()->where('user_id', $request->user()->id)->count()) {
            Mail::to($item->user)->send(new PostLiked(auth()->user(), $item));
        }

        /* Mail::to($item->user)->send(new PostLiked(auth()->user(), $item)); */
        return back();

    }

    public function destroy(Post $item, Request $request){
            $request ->user()->likes()->where('post_id', $item->id)->delete();
            return back();
        }

}
