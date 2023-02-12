<?php

namespace App\Http\Controllers;

use App\Http\Resources\TagResource;
use App\Models\Tag;
use Illuminate\Http\Request;

class TagApiController extends Controller
{
    public function index()
    {
        $tags = Tag::with('stories')->get();
        return TagResource::collection($tags);
    }

    public function show($id)
    {
        $tag = Tag::with('stories')->findOrFail($id);
        return new TagResource($tag);
    }
}
