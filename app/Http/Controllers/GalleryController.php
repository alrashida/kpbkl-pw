<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
 
use App\Models\Gallery;

class GalleryController extends Controller
{
    public function index()
    {
        $Gallery = Gallery::all();
        return view("gallery", compact("Gallery"));
    }

    public function show($id)
    {
        $Gallery = Gallery::find($id);
        return view("gallery-show", compact('Gallery'));
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
