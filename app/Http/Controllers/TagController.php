<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Traids\Messageable;
use App\Tag;
use Illuminate\Http\Request;

class TagController extends Controller
{
    use Messageable;
    /**
     * TagController constructor.
     */
    public function __construct()
    {
        $this->middleware('admin');
    }

    public function index()
    {
        $tags = Tag::with('posts')
            ->latest()
            ->paginate(20);

        return view('tags.index')->with([
            'tags' => $tags
        ]);

    }

    public function create()
    {
        return view('tags.create');
    }

    public function store(Request $request)
    {
        $this->validate($request , [
            'name' => 'required|min:3'
        ]);
        $data = $request->only(['name']);
        // maybe check if slug with request name exists or not
        Tag::create($data);

        return redirect()->route('tags.index')->with($this->createMessage('Tag'));
    }

    public function edit(Tag $tag)
    {
        return view('tags.edit' , compact('tag'));
    }

    public function update(Request $request , Tag $tag)
    {
        $this->validate($request , [
            'name' => 'required|min:2',
        ]);

        $data = $request->only('name' , 'slug');
        $tag->update($data);

        return redirect()->route('tags.index')
            ->with($this->updateMessage('Tag'));
    }

    public function delete(Tag $tag)
    {
        $tag->delete();
        return redirect()->route('tags.index')
            ->with($this->deleteMessage('Tag'));
    }

}
