<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Http\Requests\CategoryRequest;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
       // $categories['records'] = Category::paginate(2);
        $categories['records'] = Category::all();
        return view('backend.category.index', compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('backend.category.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(CategoryRequest $request)
    {
        $request->request->add(['created_by' => Auth::user()->id]);
        $record= Category::create($request->all());

        if ( $record ){
            $request->session()->flash('success','Category Created Successfully.');
        } else {
            $request->session()->flash('error', 'Category Creation Failed !');
        }
        return redirect()->route('backend.category.create');

    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $category['record'] = Category::find($id);
        return view('backend.category.show', compact('category'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $category['record'] = Category::find($id);
        return view('backend.category.edit', compact('category'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $category['record'] = Category::find($id);
        $category['record']->update($request->all());
        return view('backend.category.edit', compact('category'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $category = Category::find($id);
       if($category->delete()) {
           request()->session()->flash('success','Category Deleted Successfully.');
    } else {
        request()->session()->flash('error', 'Category Deletion Failed !');
    }
        return redirect()->route('backend.category.index');
    }
}
