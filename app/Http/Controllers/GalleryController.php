<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Gallery;
use App\Models\Photo;
use Auth;

class GalleryController extends Controller
{
    public function galleryCreate(){
        return view('galleries.galleryCreate');
    }

    public function galleryStore(request $request)
    {
        $this->validate($request, [
        'title' => 'required',
        'cover' => 'required',
        'description' => 'required'
        ]);

        $gallery = new Gallery;

        $gallery->title = $request->title;
        $gallery->description = $request->description;
        $gallery->user_id = Auth::user()->id;

        $cover = $request->file('cover');
        $cover_ext = $cover->getClientOriginalExtension();
        $cover_name = rand(123456, 999999) . '.' . $cover_ext;
        $cover_path = public_path('/galleries/');
        $cover->move($cover_path, $cover_name);

        $gallery->cover = $cover_name;

        $gallery->save();

        return redirect()->route('home');
    }
        public function galleryShow($id){
            $gallery = Gallery::find($id);
            $photos = Photo::where('gallery_id', $gallery->id)->get();
            return view('galleries.galleryShow', compact('gallery', 'photos'));
        }
    public function galleryEdit($id){
        $gallery = Gallery::find($id);
        return view('galleries.galleryEdit', compact('gallery'));
    }
    public function galleryUpdate(Request $request, $id){
        $gallery = gallery::find($id);

        $gallery->title = $request->title;
        $gallery->description = $request->description;

        $gallery->cover = $gallery->cover;

        if ($request->hasFile('cover')) {
            unlink(public_path('galleries/' . $gallery->cover));

        $cover = $request->file('cover');
        $cover_ext = $cover->getClientOriginalExtension();
        $cover_name = rand(123456, 999999) . '.' . $cover_ext;
        $cover_path = public_path('/galleries/');
        $cover->move($cover_path, $cover_name);
        $gallery->cover = $cover_name;
        } else{
            $gallery->cover = $request->old_cover;
        }

        $gallery->save();

        return redirect()->route('galleryShow', $id);

    }
    public function galleryDelete($id)
    {
        $gallery = Gallery::find($id);
        $gallery_cover = $gallery->cover;
        unlink(public_path('galleries/'). $gallery_cover);
        $gallery->delete();
        return redirect()->route('home');

    }

    // photo methods
    public function photoCreate($id){
        $gallery = Gallery::find($id);
        return view('galleries/photos/photoCreate', compact('gallery'));
    }
    public function photoStore(Request $request)
    {
        $this->validate($request, [
            'title' => 'required',
            'photo' => 'required',
            'description' => 'required',
            'gellery_id' => 'required'
        ]);

        $photos = new Photo;
        $gallery_id = $request->gellery_id;

        $photos->title = $request->title;
        $photos->description = $request->description;
        $photos->gallery_id = $gallery_id;

        $photo = $request->file('photo');
        $photo_ext = $photo->getClientOriginalExtension();
        $photo_name = rand(123456, 999999) . '.' . $photo_ext;
        $photo_path = public_path('galleries/photos/');

        $photo->move($photo_path, $photo_name);

        $photos->photo = $photo_name;

        $photos->save();
        
        return redirect()->route('galleryShow', $gallery_id);
    }
    public function photoShow($id){
        $photo = Photo::find($id);
        return view('galleries/photos/photoShow', compact('photo'));
    }
}