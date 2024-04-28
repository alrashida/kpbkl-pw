<?php

namespace App\Http\Controllers;

use App\Models\Gallery;
use Illuminate\Http\Request;
use App\Models\GalleryImages;
use Illuminate\Support\Facades\File;


class GalleryAddImages extends Controller
{
    public function index(int $id)
    {
        $Gallery = Gallery::findOrFail($id);

        $GalleryImages = GalleryImages::where('image_id', $id)->get();
        return view('galleryaddimage.index', compact('Gallery', 'GalleryImages'));
    }
    public function store(Request $request,int $id)
    {
        $request->validate([
            'images.*' => 'required|image|mimes:png,jgp,jpeg,webp'
        ]);

        $Gallery = Gallery::findOrFail($id);

        $imageData = [];
        if($file = $request->file('images')){
            foreach($file as $key => $file){
                $extension = $file->getClientOriginalExtension();
                $filename = $key.'-'.time(). '.' .$extension;

                $path = "contentimages/";

                $file-> move($path, $filename);

                $imageData[] = [
                    'image_id' => $Gallery->id,
                    'images' => $path.$filename, 
                ];
            }
        }

        GalleryImages::insert($imageData);

        return redirect()->back()->with('status', 'Upload Success');
    }
    public function delete(int $id)
    {

        $id = GalleryImages::findOrFail($id);
        if(File::exists($id->images)){
            File::delete($id->images);
        }
        $id->delete();
        return redirect()->back()->with('status','Image Deleted');
    }
}
