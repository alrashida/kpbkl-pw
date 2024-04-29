<?php

namespace App\Http\Controllers;

use App\Models\Gallery;
use App\Models\GalleryImages;

use Illuminate\Http\Request;

class GalleryController extends Controller
{
    public function index()
    {
        $Gallery = Gallery::all();
        return view("gallery", compact("Gallery"));
    }

    public function show(int $id)
    {
        $Gallery = Gallery::findOrFail($id);
        $GalleryImages = GalleryImages::where('image_id', $Gallery->id)->get();
        return view('gallery-show', compact('Gallery', 'GalleryImages'));
    }

    public function crud()
    {
        $Gallery = Gallery::all();
        return view('adminview.gallerycrud', compact('Gallery'));
    }

    public function store(Request $request)
    {
    $request->validate([
        'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        'title' => 'required|string',
        'description' => 'required|string',
    ]);

    $gallery = new Gallery();

    if ($request->hasFile('image')) {
        $image = $request->file('image');
        $imagetime = time(). '.'. $image->getClientOriginalExtension();
        $image->move('galleryimages', $imagetime);
        $gallery->image = $imagetime;
    }

    $gallery->title = $request->title;
    $gallery->description = $request->description;
    $gallery->save();

    return redirect()->route('gallery')->with('success', 'Gallery added successfully!');}

}
