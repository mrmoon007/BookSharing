<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class CategoriesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories=Category::all();
        $pCategories=Category::where('parent_id',null)->get();
        return view('backend.categories.index', compact('categories','pCategories'));
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
            'slug' => 'nullable|unique:categories',
        ]);

        $data=array();
        $data['name']=$request->name;
        if (empty($request->slug)) {
            $data['slug']=Str::slug($request->name);
        } else {
            $data['slug']=$request->name;
        }
        $data['description']=$request->description;
        $data['parent_id']=$request->parent_id;

        $categories=Category::insert($data);
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

        $categories=Category::find($id)->update($data);
        session()->flash('message', 'Category updated successfully');
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
        $categories=Category::find($id)->delete();
        session()->flash('message', 'Category deleted successfully');
        return redirect()->back();
    }
}
