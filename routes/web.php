<?php

use App\Http\Controllers\ProgramController;

use App\Http\Controllers\GalleryController;

use App\Models\Program;

use App\Models\Gallery;

use Illuminate\Support\Facades\Route;


Route::get('/', function () {

    $Programs=Program::all();
    $Gallerys=Gallery::all();

    return view('home', compact('Programs','Gallerys'));
});

Route::get('/visi&misi', function () {
    return view('visimisi');
});

Route::get('/kontak', function () {
    return view('kontak');
});




Route::get('/gallery', [GalleryController::class, 'index'])
->name('gallery');

Route::post('/gallery', [GalleryController::class, 'store'])
->name('gallery.store');

Route::get('/gallery/{id}', [GalleryController::class, 'show'])
->name('gallery.show');

Route::get('/addgallery', function () {
    return view('addgallery');
});







Route::get('/program', [ProgramController::class, 'index'])
->name('program');

Route::get('/addprogram', function () {
    return view('addprogram');
});
Route::get('/program/{id}', [ProgramController::class, 'show'])->name('program.show');

Route::post('/program', [ProgramController::class, 'store'])
->name('program.store');
