<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;
use App\Models\Photo;

use Intervention\Image\Facades\Image As Image;

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
        $path_150px = Storage::url($lowercase_title.'/150px-'.$file_name);

        Image::make($file->getRealPath())
            ->resize(null, 150, function ($constraint) {
		        $constraint->aspectRatio();
		    })
            ->save('../storage/app/public/'.$lowercase_title.'/150px-'.$file_name);

        $save = new Photo;
        $save->title = $title;
        $save->file_name = $file_name;
        $save->path = $path;
        $save->path_150px = $path_150px;
        $save->save();

        return redirect('/')->with('status', 'Photo has been uploaded');

    }
}
