<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;

use App\Http\Requests\TagRequest;

use App\Models\Tag;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TagController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // $categories['records'] = Category::paginate(2);
        $tags['records'] = Tag::all();
        return view('backend.tag.index', compact('tags'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('backend.tag.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(TagRequest $request)
    {
        $request->request->add(['created_by' => Auth::user()->id]);
        $record= Tag::create($request->all());

        if ( $record ){
            $request->session()->flash('success','Tag Created Successfully.');
        } else {
            $request->session()->flash('error', 'Tag Creation Failed !');
        }
        return redirect()->route('backend.tag.create');

    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $tag['record'] = Tag::find($id);
        return view('backend.tag.show', compact('tag'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $tag['record'] = Tag::find($id);
        return view('backend.tag.edit', compact('tag'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(TagRequest $request, string $id)
    {
        $tag['record'] = Tag::find($id);
        $request->request->add(['updated_by' => Auth::user()->id]);
        if($tag['record']->update($request->all())) {
            request()->session()->flash('success','Tag Updated Successfully.');
        } else {
            request()->session()->flash('error','Tag Update Failed !');
        }
        return redirect()->route('backend.tag.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $tag = Tag::find($id);
        if($tag->delete()) {
            request()->session()->flash('success','Tag Deleted Successfully.');
        } else {
            request()->session()->flash('error', 'Tag Deletion Failed !');
        }
        return redirect()->route('backend.tag.index');
    }
}
