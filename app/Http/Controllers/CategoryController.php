<?php

namespace App\Http\Controllers;
use App\Models\Category;
use App\Models\Extension;
use Illuminate\Http\Request;
use App\Http\Resources\CategoryResource;
class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('categories.index', ['categories' => CategoryResource::collection(Category::get())]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('categories.new', ['extensions' => Extension::all()]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'name'=>'required',
        ]); 
        $c = Category::create([
            'name' => $request->name,
            'active' => filter_var( $request->active, FILTER_VALIDATE_BOOLEAN),
        ]);
        $c->extensions()->sync($request->extensions);
        
        return redirect()->route('categories');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Category $category)
    {
        //$files = 10;
        return view('categories.detail', ['category' => new CategoryResource($category)]);//, 'files'  => $files]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Category $category)
    {
        return view('categories.edit', ['category'=>$category, 'extensions' => Extension::all()]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    public function update(Request $request, Category $category)
    {
        //dd($request->extensions);
        $this->validate($request, [
            'name'=>'required',
        ]); 
        $category->name = $request->name;
        $category->save();
        $category->extensions()->sync($request->extensions);
        
        return redirect()->route('categories');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Category $category)
    {
        $category->files()->detach();
        //dd($category->files());
        
        
        $category->delete();
        return redirect()->route('categories');
    }
}
