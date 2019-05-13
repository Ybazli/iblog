<?php

namespace App\Http\Controllers;

use App\Post;
use Illuminate\Http\Request;

class SearchController extends Controller
{
    public function search(Request $request)
    {
        $this->validate($request , [
            'type' => 'required',
            'q' => 'required'
        ]);

        switch ($request->type){

            case 'posts':
                $posts = Post::where('title' , 'LIKE' , "%{$request->q}%")
                    ->orWhere('body' , 'LIKE' , "%{$request->q}%")
                    ->paginate(20);
                return view('posts.index' , compact('posts'));
                break;

            default:
                $errors = 'oops... Not recognize what is your search type!';
                return redirect()->back()->withErrors($errors);
        }
    }
}
