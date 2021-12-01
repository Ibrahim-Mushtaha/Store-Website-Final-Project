<?php

namespace App\Http\Controllers;

use App\Models\category;
use App\Models\store;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class CategoryController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = category::all();
        return view('category.index',compact('data'));
    }

    public function categoryStore()
    {
        $data = category::all();
        $stores = store::all();
        return view('home.home',compact('data','stores'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('category.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $path = 'public/uploads/category/';
        $image = $request->file('pic');
        $name = $path.time() . '.' . $image->getClientOriginalExtension();
        Storage::put($name,file_get_contents($image));

        $category = new category();
        $category->name = $request->category_name;
        $category->image = $name;
        $category->save();

        Toastr::success('Category Added successfully :)','Success');
        return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\category  $category
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $category =  category::where('id', $id)->get();
        return view('category.edit',compact('category'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\category  $category
     * @return \Illuminate\Http\Response
     */
    public function edit(category $category)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\category  $category
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,$id)
    {
        $name = $request['category_name'];
        $category = category::find($id);
        $category ->name = $name;
        if ($request->hasFile('pic')){
            $path = 'public/uploads/category/';
            $image = $request->file('pic');
            $name = $path.time() . '.' . $image->getClientOriginalExtension();
            Storage::put($name,file_get_contents($image));
            $category ->image = $name;
        }

        $category->save();

        Toastr::success('Category Updated successfully :)','Success');
        $data = category::all();
        return view('category.index',compact('data'));
    }

    /**`
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\category  $category
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        category::find($id)->delete();
       return redirect()->back();
    }

}
