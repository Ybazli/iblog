<?php

namespace App\Http\Controllers;

use App\Category;
use App\Http\Controllers\Traids\Messageable;
use App\Http\Requests\PostRequest;
use App\Post;
use App\Tag;
use Illuminate\Http\Response;

class PostController extends Controller
{
    use Messageable;

    public function __construct()
    {
        $this->middleware('admin');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts = Post::with('owner')->latest()->paginate(20);

        return view('posts.index', compact('posts'));

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
        return view('posts.create', compact('categories', 'tags'));

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param PostRequest $request
     * @return void
     */
    public function store(PostRequest $request)
    {
        //StorePost
        $request->validated();

        $data = $request->only('title', 'body', 'image', 'category_id', 'meta');
        $data['user_id'] = auth()->user()->id;

        $tags = extractId($request->tags);
        $post = Post::create($data);
        $post->addTag($tags);
        return redirect()->route('posts.index')
            ->with($this->createMessage('Post'));


    }

    /**
     * Display the specified resource.
     *
     * @param Post $post
     * @return Response
     */
    public function show(Post $post)
    {
        return $post;
    }

    /**
     * Show the form for editing the specified resource.
     * @param Post $post
     * @return view with post categories and tags collection
     */
    public function edit(Post $post)
    {
        $categories = Category::all();
        $tags = Tag::all();
        return view('posts.edit', compact('post', 'categories', 'tags'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param PostRequest $request
     * @param Post $post
     * @return void
     */
    public function update(PostRequest $request, Post $post)
    {
        $request->validated();
        $data = $request->only('title', 'body', 'image', 'category_id', 'meta');

        $tags = extractId($request->tags);

        if($request->image != $post->image){
            
            File::delete(public_path($post->image));
        }

        $post->update($data);

        foreach ($tags as $tag) {
            $oldTag = Tag::find($tag);
            if ($oldTag) {
                $post->tags()->sync($oldTag->id);
            } else {
                $createTag = Tag::create(['name' => $tag]);
                $post->tags()->attach($createTag->id);
            }
        }
        return redirect()->route('posts.index')
            ->with($this->updateMessage('Post'));

    }

    /**
     * Remove the specified resource from storage.
     * @param Post $post
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function delete(Post $post)
    {
        $post->delete();
        return redirect()->route('posts.index')
            ->with($this->deleteMessage('post'));
    }


}
