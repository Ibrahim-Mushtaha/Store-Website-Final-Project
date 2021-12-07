<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreRequest;
use App\Models\category;
use App\Models\store;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class StoreController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = store::all();
        return view('store.index',compact('data'));
    }


    public function viewStores()
    {
        $data = store::all();
        $type = 'allStores';
        return view('store.index',compact('data','type'));
    }


    public function viewFeaturedStores()
    {
        $data = store::all();
        $type = 'featuredStores';
        return view('store.index',compact('data','type'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = category::all();
        return view('store.create',compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreRequest $request)
    {
        $path = 'public/uploads/store/';
        $image = $request->file('pic');
        $name = $path.time() . '.' . $image->getClientOriginalExtension();
        Storage::put($name,file_get_contents($image));

        $store = new store();

        $store->name = $request->store_name;
        $store->description = $request->store_description;
        $store->category_id = $request->category_id;
        $store->image = $name;
        if ($request-> featured_store != null)
        $store -> isFeaturedStore = $request->featured_store;
        $store->save();

        Toastr::success('Store Added successfully :)','Success');

        $data = store::all();
        $type = 'allStores';
        return view('store.index',compact('data','type'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\store  $store
     * @return \Illuminate\Http\Response
     */
    public function show(store $store)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\store  $store
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $categories = category::all();
        $store =  store::where('id', $id)->get();
        return view('store.edit',compact('store','categories'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\store  $store
     * @return \Illuminate\Http\Response
     */
    public function update(StoreRequest $request,$id)
    {


        $name = $request['store_name'];
        $description = $request['store_description'];
        $category_id = $request['category_id'];

        $store = store::find($id);
        $store ->name = $name;
        $store ->description = $description;
        $store ->category_id = $category_id;
        if ($request['featured_store'] != null) {
            $featuredStore = $request['featured_store'];
            $store->isFeaturedStore = $featuredStore;
        }else{
            $store->isFeaturedStore = false;
        }
        if ($request->hasFile('pic')){
            $path = 'public/uploads/store/';
            $image = $request->file('pic');
            $name = $path.time() . '.' . $image->getClientOriginalExtension();
            Storage::put($name,file_get_contents($image));
            $store ->image = $name;
        }

        $store->save();

        Toastr::success('Store Updated successfully :)','Success');

        $data = store::all();
        $type = 'allStores';
        return view('store.index',compact('data','type'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\store  $store
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        store::where('id', $id)->delete();
        return redirect()->back();
    }
}
