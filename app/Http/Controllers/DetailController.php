<?php

namespace App\Http\Controllers;

use App\Models\Detail;
use Illuminate\Http\Request;
use Carbon\Carbon;
use App\Models\User;
use Illuminate\Support\Facades\Storage;

class DetailController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $details = Detail::all()->first();
        return view('profile.detail', ['details' => $details]);
       
    }

 
    public function store(Request $request)
    {
        if(!User::all()->first())
        {
            $Detail = new Detail;
            $Detail->phone_no = $request->phone_no;
            $Detail->address = $request->address;
            $imageName = Carbon::now()->timestamp. '.' . $request->image->extension();
            $request->image->storeAs('public/details', $imageName);
            $Detail->image = $imageName;
            $Detail->user_id = User::find($id);
        }
        else
        {
            $Detail = Detail::all()->first();
            $Detail->phone_no = $request->phone_no;
            $Detail->address = $request->address;
            if ($request->hasFile('image') && !empty($request->image)) {
            
                $imageName = Carbon::now()->timestamp. '.' . $request->image->extension();
                $request->image->storeAs('public/details', $imageName);
                if ($Detail->image) {
                    Storage::delete('public/details/' . $Detail->image);
                }
            } else {
              $imageName = $Detail->image;
                        
            }
            $Detail->image = $imageName;
        }
        $Detail->save();
        session()->flash('message', 'Details updated successfully!');
        return redirect('/admin/detail');
    }

    public function show($id)
    {
        $detail = Detail::find($id);
        return view('profile.detail')->compact('detail');
    }

   
}
