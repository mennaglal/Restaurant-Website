<?php

namespace App\Http\Controllers;

use App\Models\categories;
use App\Models\foods;
use Illuminate\Http\Request;

class FoodsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $foods=foods::all();
        $categories=categories::all();
        return view('foods.foods',compact('foods','categories'));
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
            'name' => 'required|unique:foods|max:255',
            'price' => 'required:foods',
            'quantity' => 'required:foods',
            'image' => 'required:foods',
        ],[

            'name.required' =>'please enter food name',
            'name.unique' =>'category name already exists',
            'price.required' =>'please write price',
            'quantity.required' =>'please write quantity',
            'image.required' =>'please choose image',


        ]);

        foods::create([
            'name' => $request->name,
            'description' => $request->description,
            'price' => $request->price,
            'quantity' => $request->quantity,
            'category_id' => $request->category_id,
            'image' => $request->image,

        ]);
        session()->flash('Add', 'Food added successfully ');
        return redirect('/foods');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\foods  $foods
     * @return \Illuminate\Http\Response
     */
    public function show(foods $foods)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\foods  $foods
     * @return \Illuminate\Http\Response
     */
    public function edit(foods $foods)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\foods  $foods
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $idd)
    {
        $cat_id = categories::where('name', $request->category_name)->first()->id;

        $foods = foods::findOrFail($request->id);

        $foods->update([
            'name' => $request->name,
            'description' => $request->description,
            'price' => $request->price,
            'quantity' => $request->quantity,
            'image' => $request->image,
            'category_id' => $cat_id,
        ]);

        session()->flash('edit','Edit Food Done Successfully');
        //return back();
        return redirect('/foods');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\foods  $foods
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        $foods = foods::findOrFail($request->id);
        $foods->delete();
        session()->flash('delete', 'Delete Food Done Successfully');
        return redirect('/foods');
    }
}
