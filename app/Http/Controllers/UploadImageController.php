<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;
use App\Models\Photo;

class UploadImageController extends Controller
{
    public function index()
    {
        return view('upload.index');
    }

    public function save(Request $request)
    {

        $validatedData = $request->validate([
         'photo' => 'required|image|mimes:jpg,png,jpeg,gif,webp|max:2048',
        ]);

        $file = $request->file('photo');

        $title = $request->title;
        $nospace_title = preg_replace('/\W|_+/', '', $title);
        $lowercase_title = strtolower($nospace_title);

        $file_name = $lowercase_title . '_' . time() . '.' . $file->getClientOriginalExtension();

        $file->storeAs('public/'.$lowercase_title, $file_name);
        $path = Storage::url($lowercase_title.'/'.$file_name);

        $save = new Photo;
        $save->title = $title;
        $save->file_name = $file_name;
        $save->path = $path;
        $save->save();

        return redirect('/')->with('status', 'Photo has been uploaded');

    }
}
