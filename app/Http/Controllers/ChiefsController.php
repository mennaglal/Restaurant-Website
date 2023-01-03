<?php

namespace App\Http\Controllers;

use App\Models\categories;
use App\Models\chiefs;
use Illuminate\Http\Request;

class ChiefsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $chiefs=chiefs::all();
        return view('chiefs.chiefs',compact('chiefs'));
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
            'name' => 'required|unique:chiefs|max:255',
            'image' => 'required:chiefs',
            'facebook_link' => 'required:chiefs',
            'twitter_link' => 'required:chiefs',
            'instagram_link' => 'required:chiefs',
        ],[

            'name.required' =>'please enter category name',
            'name.unique' =>'category name already exists',
            'facebook_link.required' =>'please choose facebook link',
            'twitter_link.required' =>'please choose twitter link',
            'instagram_link.required' =>'please choose instagram link',


        ]);

        chiefs::create([
            'name' => $request->name,
            'image' => $request->image,
            'facebook_link' => $request->facebook_link,
            'twitter_link' => $request->twitter_link,
            'instagram_link' => $request->instagram_link,

        ]);
        session()->flash('Add', 'Chief added successfully ');
        return redirect('/chiefs');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\chiefs  $chiefs
     * @return \Illuminate\Http\Response
     */
    public function show(chiefs $chiefs)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\chiefs  $chiefs
     * @return \Illuminate\Http\Response
     */
    public function edit(chiefs $chiefs)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\chiefs  $chiefs
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $idd)
    {
        $id = $request->id;

        $validatedData = $request->validate([
            'name' => 'required|unique:chiefs|max:255',
            'image' => 'required:chiefs',
            'facebook_link' => 'required:chiefs',
            'twitter_link' => 'required:chiefs',
            'instagram_link' => 'required:chiefs',
        ],[

            'name.required' =>'please enter chief name',
            'name.unique' =>'category name already exists',
            'facebook_link.required' =>'please choose facebook link',
            'twitter_link.required' =>'please choose twitter link',
            'instagram_link.required' =>'please choose instagram link',


        ]);
        $chiefs = chiefs::find($id);
        $chiefs->update([
            'name' => $request->name,
            'image' => $request->image,
            'facebook_link' => $request->facebook_link,
            'twitter_link' => $request->twitter_link,
            'instagram_link' => $request->instagram_link,
        ]);

        session()->flash('edit','Edit Chief Done Successfully');
        return redirect('/chiefs');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\chiefs  $chiefs
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        $id = $request->id;
        chiefs::find($id)->delete();
        session()->flash('delete','Delete Chief Done Successfully');
        return redirect('/chiefs');
    }
}
