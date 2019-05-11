<?php

namespace App\Http\Controllers;

use App\Category;
use App\Http\Controllers\Traids\Messageable;
use App\Http\Requests\StorePost;
use App\Post;
use App\Tag;
use Illuminate\Http\Request;

class PostController extends Controller
{
    use Messageable;

    public function __construct()
    {
//        $this->middleware('admin', ['except' => ['index', 'show']]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts = Post::paginate(20);

        return view('posts.index' , compact('posts'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::all();
        $tags = Tag::all();
        return view('posts.create' , compact('categories' , 'tags'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param StorePost $request
     * @return void
     */
    public function store(Request $request)
    {
//        $request->validated();
        return $request->all(); 

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Post $post)
    {
        return $post;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     * @param int $id
     */
    public function destroy($id)
    {
    }

    public function imageUpload()
    {
        $this->validate(request() , [
           'file' => 'require|mime:jpeg,png,svg,jpg'
        ]);
        $file = request()->file('image')->store('/posts-image', 'public_uploads');
        return 'uploads/'.$file;
    }


}
