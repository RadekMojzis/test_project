<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Extension;
use App\Models\Rule;
class ExtensionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $extensions = Extension::get();
        return view('extensions.index', ['extensions' => $extensions]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $rules = Rule::all();
        return view('extensions.new', ['rules'=>$rules]);
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
            'name'=>'required'
        ]); 
        //dd($request->active);
        $ext = Extension::create([
            'name' => $request->name,
            'active' => filter_var( $request->active, FILTER_VALIDATE_BOOLEAN),
        ]);
        $ext->rules()->sync($request->rules);
        return redirect()->route('extensions');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Extension $extension)
    {
        $rules = $extension->rules()->get();
        return view('extensions.detail', ['extension' => $extension, 'rules'=>$rules]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Extension $extension)
    {
        $rules = Rule::all();
        $selected = $extension->rules()->get();
        return view('extensions.edit', ['extension' => $extension, 'rules'=> $rules, 'selected' => $selected]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Extension $extension)
    {
        $this->validate($request, [
            'name'=>'required',
        ]); 
        
        $extension->name = $request->name;
        $extension->active = filter_var( $request->active, FILTER_VALIDATE_BOOLEAN);
        $extension->save();
        $extension->rules()->sync($request->rules);
        return redirect()->route('extensions');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Extension $extension)
    {
        $extension->delete();
        return redirect()->route('extensions');
    }
}
