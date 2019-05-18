<?php

namespace App\Http\Controllers;

use App\Category;
use App\Http\Controllers\Traids\Messageable;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    use Messageable;

    public function __construct()
    {
        $this->middleware('admin');
    }

    public function index()
    {
        $categories = Category::with('posts')->latest()->paginate(20);
        return view('categories.index' , compact('categories'));
    }

    public function create()
    {
        return view('categories.create');
    }

    public function store(Request $request)
    {
        $this->validate($request , [
            'name' => 'required'
        ]);

        $data = $request->only('name');
        Category::create($data);
        return redirect()->route('categories.index')
            ->with($this->createMessage('Category'));
    }

    public function delete(Category $category)
    {
        $category->delete();
        return redirect()->route('categories.index')
            ->with($this->deleteMessage('Category'));
    }

    public function edit(Category $category)
    {
        return view('categories.edit' , compact('category'));
    }

    public function update(Request $request , Category $category)
    {
        $this->validate($request , [
            'name' => 'required|min:3',
        ]);

        $data = $request->only('name');
        $category->update($data);

        return redirect()->route('categories.index')
            ->with($this->updateMessage('Category'));
    }

}
