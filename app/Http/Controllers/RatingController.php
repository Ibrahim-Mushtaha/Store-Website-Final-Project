<?php

namespace App\Http\Controllers;

use App\Models\rating;
use Illuminate\Http\Request;

class RatingController extends Controller
{

    public function store(Request $request)
    {
        $rate = $request->rate;
        $store_id = $request->store_id;
        $user_id = $request->userIP;

        $ra = new  rating();
        $ra->user_id = $user_id;
        $ra->rate = $rate;
        $ra->store_id = $store_id;
        $ra->save();
        return redirect()->back();
    }

    public function update(Request $request, rating $rating)
    {
        $rate = $request->rate;
        $ra = rating::where("user_id",$request->userIP)->where("store_id",$request->store_id)->first();

        $ra->rate = $rate;
        $ra->update();
        toastr()->success('Updated successfully!');
        return  redirect()->back();

    }

}
