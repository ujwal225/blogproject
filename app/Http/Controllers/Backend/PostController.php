<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;

use App\Http\Requests\PostRequest;

use App\Models\Category;
use App\Models\Post;
use App\Models\Tag;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // $categories['records'] = Category::paginate(2);
        $posts['records'] = Post::all();
        return view('backend.post.index', compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $data['categories'] = Category::select('id', 'title')->get();
        $data['tags'] = Tag::select('id', 'title')->get();
        return view('backend.post.create', compact('data'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(PostRequest $request)
    {
        $request->request->add(['created_by' => Auth::user()->id]);

        if($request->hasFile('image_file')){
            $image = $request->file('image_file');
            $fname = uniqid() . '_' . $image->getClientOriginalName();
            $image->move('images/post/', $fname);
            $request->request->add(['feature_image' => $fname]);
        }
        $record= Post::create($request->all());

        if ( $record ){
            $record->tags()->attach($request->input('tag_id'));
            $request->session()->flash('success','Post Created Successfully.');
        } else {
            $request->session()->flash('error', 'Post Creation Failed !');
        }
        return redirect()->route('backend.post.create');

    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $post['record'] = Post::find($id);
        return view('backend.post.show', compact('post'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $post['record'] = Post::find($id);
        $data['tags'] = Tag::select('id', 'title')->get();
        $post['categories'] = Category::select('id', 'title')->get();
        return view('backend.post.edit', compact('post', 'data'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(PostRequest $request, string $id)
    {
        $post['record'] = Post::find($id);
        $request->request->add(['updated_by' => Auth::user()->id]);
        if($request->hasFile('image_file')){
            $image = $request->file('image_file');
            $fname = $image->getClientOriginalName();
            $image->move('images/post/', $fname);
            $request->request->add(['feature_image' => $fname]);
        }
        if($post['record']->update($request->all())) {
            request()->session()->flash('success','Post Updated Successfully.');
        } else {
            request()->session()->flash('error','Post Update Failed !');
        }
        return redirect()->route('backend.post.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $post = Post::find($id);
        if($post->delete()) {
            request()->session()->flash('success','Post Deleted Successfully.');
        } else {
            request()->session()->flash('error', 'Post Deletion Failed !');
        }
        return redirect()->route('backend.post.index');
    }
}
