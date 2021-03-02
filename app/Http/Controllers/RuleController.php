<?php

namespace App\Http\Controllers;
use App\Models\Rule;

use Illuminate\Http\Request;

class RuleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $rules = Rule::get();
        return view('rules.index', ['rules' => $rules]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('rules.new');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request){

        $this->validate($request, [
            'name'=>'required',
            'transformer' => 'required',
            'value'=>'required'
        ]); 
        //dd($request->active);
        Rule::create([
            'name' => $request->name,
            'value' => $request->value,
            'active' => filter_var( $request->active, FILTER_VALIDATE_BOOLEAN),
            'transformer' => $request->transformer
        ]);

        return redirect()->route('rules');
        //dd($request->name);
        
        /*DB::table('rules')->insert([
            
        ]);*/
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Rule $rule)
    {
        $extensions = $rule->extensions()->get();
        return view('rules.detail', ['rule' => $rule, 'extensions' => $extensions]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Rule $rule){
        return view('rules.edit', ['rule' => $rule]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Rule $rule)
    {
        $this->validate($request, [
            'name'=>'required',
            'transformer' => 'required',
            'value'=>'required'
        ]); 
        
        $rule->name = $request->name;
        $rule->transformer = $request->transformer;
        $rule->value = $request->value;
        $rule->active = filter_var( $request->active, FILTER_VALIDATE_BOOLEAN);
        $rule->save();
        return redirect()->route('rules');
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Rule $rule)
    {
        //
        $rule->delete();
        return redirect()->route('rules');

    }
}
