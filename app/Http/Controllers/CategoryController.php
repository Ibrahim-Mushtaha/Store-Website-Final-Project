<?php

namespace App\Http\Controllers;

use App\Http\Requests\CategoryRequest;
use App\Models\category;
use App\Models\store;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class CategoryController extends Controller
{


    public function index()
    {
        $data = category::all();
        return view('category.index',compact('data'));
    }

    public function categoryStore()
    {
        $data = category::all();
        $stores = store::all();
        $categoryID = '#';
        return view('home.home',compact('data','stores','categoryID'));
    }

    public function StoreByID($id)
    {
        $categoryID = $id;
        $data = category::all();
        if ($id == '#')
        $stores = store::all();
    else
        $stores = store::where('category_id', $id)->get();
        return view('home.home',compact('data','stores','categoryID'));
    }

    public function StoreByName(Request $request)
    {
        $categoryID = '#';
        $data = category::all();
        $stores = store::where('name', $request['search'])->get();
        return view('home.home',compact('data','stores','categoryID'));
    }


    public function create()
    {
        return view('category.create');
    }


    public function store(CategoryRequest $request)
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
        $data = category::all();
        return view('category.index',compact('data'));
    }


    public function show($id)
    {
        $category =  category::where('id', $id)->get();
        return view('category.edit',compact('category'));
    }


    public function edit(category $category)
    {
        //
    }


    public function update(CategoryRequest $request,$id)
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

    public function destroy($id)
    {
        category::find($id)->delete();
       return redirect()->back();
    }

}
