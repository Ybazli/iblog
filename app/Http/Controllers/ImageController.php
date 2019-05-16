<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class ImageController extends Controller
{
    /**
     * ImageController constructor.
     */
    public function __construct()
    {
        $this->middleware('admin');
    }


    /**
     * upload image
     * return String $image
     */
    public function store()
    {
        $this->validate(request(), [
            'file' => 'require|mime:jpeg,png,svg,jpg'
        ]);
        $file = request()->file('image')->store('/posts-image', 'public_uploads');
        return 'uploads/' . $file;
    }


    public function delete()
    {
        $this->validate(request() , [
            'image' => 'require'
        ]);

        $path = request('image');

        if(File::exists($path)){
            File::delete($path);
            return response(201);
        }
        return response()->json(['error' => 'The file dos not exist.'] , 404);
    }


}
