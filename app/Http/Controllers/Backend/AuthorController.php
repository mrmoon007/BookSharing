<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Author;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class AuthorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $authors=Author::all();
        return view('backend.author.index', compact('authors'));
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
        ]);

        $data=array();
        $data['name']=$request->name;
        $data['link']=Str::slug($request->name);
        $data['description']=$request->description;

        $author=Author::insert($data);
        return redirect()->back()->with('message', 'Author created successfully!');
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

        //$author=Author::find($id);

        $data=array();
        $data['name']=$request->name;
        //$data['link']=Str::slug($request->name);
        $data['description']=$request->description;

        $author=Author::find($id)->update($data);
        session()->flash('message', 'Author updated successfully');
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
        $author=Author::find($id)->delete();
        session()->flash('message', 'Author deleted successfully');
        return redirect()->back();
    }
}
