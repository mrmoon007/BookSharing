<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Publisher;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class PublisherController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $publishers=Publisher::all();
        return view('backend.publisher.index', compact('publishers'));
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
         //return $request;
         $validateData=$request->validate([
            'name' => 'required|string|max:255',
            //'link' => 'required|string|max:255',
            'description' => 'required',
            'outlet' => 'required',
        ]);

        $data=array();
        $data['name']=$request->name;
        $data['link']=Str::slug($request->name);
        $data['description']=$request->description;
        $data['address']=$request->address;
        $data['outlet']=$request->outlet;

        $publishers=Publisher::insert($data);
        return redirect()->back()->with('message', 'publisher created successfully!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $validateData=$request->validate([
            'name' => 'required|string|max:255',
            //'link' => 'required|string|max:255',
            'description' => 'required',
        ]);

        $data=array();
        $data['name']=$request->name;
        //$data['link']=Str::slug($request->name);
        $data['description']=$request->description;

        $publishers=Publisher::find($id)->update($data);
        session()->flash('message', 'Publisher updated successfully');
        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $publishers=Publisher::find($id)->delete();
        session()->flash('message', 'Publisher deleted successfully');
        return redirect()->back();
    }
}
