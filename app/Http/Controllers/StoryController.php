<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoryStoreRequest;
use App\Http\Requests\UpdateStoryRequest;
use App\Models\Story;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class StoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $stories = Story::all();
        return view('stories.index', compact('stories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('stories.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoryStoreRequest $request)
    {
        /* $request->validate([
            'title' => ['required', 'min:3', 'max:255'] ,
        ]);
        $story = new Story();

        $story->title =  $request->input('title');
        $story->save(); */

        //$request->session()->flash('status', 'added');
        
        // return redirect('/stories');
        // return redirect()->route('stories.index');

        /* $validatedData = $request->validate([
            'title' => ['required', 'min:3', 'max:255'] ,
        ]); */
        $validatedData = $request->validated();
        $validatedData['image'] = $request->file('image')->store('stories');
        Story::create($validatedData);

        return to_route('stories.index')->with('status', 'Story is added successfully');


    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $story = Story::find($id);
        return view('stories.show', compact('story'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Story $story)
    {
        //$story = Story::findOrFail($id);
        return view('stories.edit', compact('story'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateStoryRequest $request, Story $story)
    {   
        if($request->hasFile('image')){
            Storage::delete($story->image);
            $story->image = $request->file('image')->store('stories');
        }

        $story->update($request->validated() + [
            'image' => $story->image,
        ]);
        
        //dd($story);
        return to_route('stories.index')->with('status', 'Story is updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Story $story)
    {
        Storage::delete($story->image);
        $story->delete();

        return back()->with('status', 'Story is deleted successfully');
    }
}
