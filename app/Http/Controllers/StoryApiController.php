<?php

namespace App\Http\Controllers;

use App\Http\Resources\StoryResource;
use App\Models\Story;
use Illuminate\Http\Request;

class StoryApiController extends Controller
{
    public function index()
    {
        $stories = Story::with('tags')->get();
        return StoryResource::collection($stories);
    }

    public function show($id)
    {
        $story = Story::findOrFail($id);
        return new StoryResource($story);
    }
}
