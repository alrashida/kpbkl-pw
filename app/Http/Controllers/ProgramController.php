<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Program;
class ProgramController extends Controller
{
    public function index()
    {
    $programs = Program::all();
    return view('program', compact('programs'));
    }
    public function store(Request $request)
    {
        $request->validate([
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'title' => 'required|string',
            'content' => 'required|string',
        ]);
    
        $program = new Program();
    
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $imagetime = time(). '.'. $image->getClientOriginalExtension();
            $image->move('programimages', $imagetime);
            $program->image = $imagetime;
        }
    
        $program->title = $request->title;
        $program->content = $request->content;
        $program->save();
    
        return redirect()->route('program')->with('success', 'Program added successfully!');
    }

    public function show($id)
    {
    $program = Program::find($id);
    return view('program-show', compact('program'));
    }
}
