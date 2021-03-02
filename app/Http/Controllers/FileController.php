<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\File;
use App\Models\Category;
use App\Models\Extension;
use App\Models\Rule;

use App\Http\Resources\FileResource;
use App\Rules\CategoryExtensionsCheck;
use Illuminate\Support\Facades\Storage;

class FileController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $files = FileResource::collection(File::get());
        return view('files.index', ['files' => $files]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::all();
        return view('files.new', ['categories' => $categories]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //dd($request->file);
        
        //dd($request->active);
        
        $this->validate($request, [
            'name'=>'required',
            'file'=>'required',
        ]); 
        $ext_str = $request->file('file')->extension();
        $categoryModels = Category::findMany($request->categories);
        foreach($categoryModels as $category){
            
            if(!$category->extensions->pluck('name')->contains($ext_str)){
                return redirect()->route('files_create')->withErrors(['file', 'Zvolené kategorie nepodporují tuto příponu']);
            }
        }

        $link = $request->file('file')->store('public'); 
        $ext = Extension::where('name', $ext_str)->first();
        
        $rules = $ext->rules()->get();
        //dd($rules);
        foreach($rules as $rule){
            ($rule->transformer)($link, $rule->value);
        }

        $f = File::create([
            'name' => $request->name,
            'link' => $link,
            'ip' => $request->ip(),
            'size' => $request->file('file')->getSize(),
            'active' => filter_var( $request->active, FILTER_VALIDATE_BOOLEAN)
        ]);
        
        $f->categories()->sync($request->categories);
        return redirect()->route('files');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(File $file)
    {
        return view('files.detail', ['file' => new FileResource($file)]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(File $file)
    {
        $categories = Category::all();
        return view('files.edit', ['file' => new FileResource($file), 'categories' => $categories]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, File $file)
    {
        //dd($request->categories);
        
        $this->validate($request, [
            'name'=>'required',
        ]); 
        $file->name = $request->name;
        $file->save();
        $file->categories()->sync($request->categories);
        return redirect()->route('files');
    }

    public function download(File $file){
        return Storage::download($file->link);
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(File $file)
    {
        $file->delete();
        return redirect()->route('files');
    }
}
