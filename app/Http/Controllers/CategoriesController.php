<?php

namespace App\Http\Controllers;

use App\Models\categories;
use Illuminate\Http\Request;

class CategoriesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories=categories::all();
        return view('categories.categories',compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
        'name' => 'required|unique:categories|max:255',
        'image' => 'required:categories'
    ],[

        'name.required' =>'please enter category name',
        'name.unique' =>'category name already exists',
        'image.required' =>'please choose image',


    ]);

        categories::create([
            'name' => $request->name,
            'description' => $request->description,
            'image' => $request->image,

        ]);
        session()->flash('Add', 'Category added successfully ');
        return redirect('/categories');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\categories  $categories
     * @return \Illuminate\Http\Response
     */
    public function show(categories $categories)
    {
        return '122222222222';
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\categories  $categories
     * @return \Illuminate\Http\Response
     */
    public function edit(categories $categories)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\categories  $categories
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request ,$idd)
    {
        $id = $request->id;

        $validatedData = $request->validate([
            'name' => 'required|unique:categories|max:255',
            'image' => 'required:categories'
        ],[

            'name.required' =>'please enter category name',
            'name.unique' =>'category name already exists',
            'image.required' =>'please choose image',


        ]);

        $categories = categories::find($id);
        $categories->update([
            'name' => $request->name,
            'description' => $request->description,
            'image' => $request->image,
        ]);

        session()->flash('edit','Edit Category Done Successfully');
        return redirect('/categories');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\categories  $categories
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        $id = $request->id;
        categories::find($id)->delete();
        session()->flash('delete','Delete Category Done Successfully');
        return redirect('/categories');
    }
}
