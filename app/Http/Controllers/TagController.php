<?php

namespace App\Http\Controllers;

use App\Models\Tag;
use App\Http\Requests\StoreTagRequest;
use App\Http\Requests\UpdateTagRequest;

class TagController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // get All Tags
        $tags = Tag::all();
        // return the json response of all the tags with status code 200
        return response()->json($tags, 200);

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreTagRequest $request)
    {
        // Store the Tag
        $tag = Tag::create($request->all());
        return response()->json($tag, 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(Tag $tag)
    {
        // return tag with status code 200
        return response()->json($tag, 200);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateTagRequest $request, Tag $tag)
    {
        // update the tag
        $tag->update($request->all());
        return response()->json($tag, 200);
        

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Tag $tag)
    {
        // delete the tag
        $tag->delete();
        return response()->json(null, 204);
    }
}
