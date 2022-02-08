<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Models\Photo;

class PhotoController extends Controller
{
    public function index()
    {
        // $photos = Photo::latest()->paginate(5);
        $photos = Photo::all();

        // return view('photos.index', ['photos', $photos]);

        return view('photos.index', compact('photos'))
            ->with('i', (request()->input('page', 1) - 1) * 5);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Photo  $photo
     * @return \Illuminate\Http\Response
     */
    public function destroy(Photo $photo)
    {
        preg_match('/^[^\_]*/', $photo->file_name, $title);
        // delete from database
        $photo->delete();

        // delete image directory from public folder
        Storage::disk('public')->deleteDirectory($title[0]);

        return redirect('/')->with('status','Photo deleted successfully');
    }

}
