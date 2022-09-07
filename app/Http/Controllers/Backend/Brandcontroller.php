<?php

namespace App\Http\Controllers\Backend;
use App\Http\Controllers\Controller;
use  App\Models\brands;
use Illuminate\Http\Request;
use Illuminate\Support\str;
use File;
use Image;

class Brandcontroller extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $brand=brands::orderby('name','asc')->get();
        return view('backend.pages.Brand.manage' , compact('brand'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.pages.Brand.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $brand=new brands;
        $brand->name=$request->name;
        $brand->slug=Str::slug($request->name);
        $brand->description=$request->description;
        $brand->status=$request->status;
        if($request->image)
        {
            $image= $request->file('image');
            $img= time().'.'.$image->getClientOriginalExtension();
            $location= public_path('backend/img/brand/'. $img);
            Image::make($image)->save($location);
            $brand->image= $img;
        }
        

        $brand->save();
        return redirect()->route('brand.manage');
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
        $brnd =brands::find($id);
        if( !is_null($brnd))
        {
        return view('backend.pages.Brand.edit',compact('brnd'));
        }
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
        $brnd =brands::find($id);
        $brnd->name=$request->name;
        $brnd->slug=Str::slug($request->name);
        $brnd->description=$request->description;
        $brnd->status=$request->status;
        if($request->image)
        {
            $image= $request->file('image');
            $img= time().'.'.$image->getClientOriginalExtension();
            $location= public_path('backend/img/brand/'. $img);
            Image::make($image)->save($location);
            $brnd->image= $img;
        }

        $brnd->save();
        return redirect()->route('brand.manage');
    }
    

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $brnd =brands::find($id);
        if( !is_null($brnd))
        {
            if(File::exists('backend/img/brand/'. $brnd->img))
            {
                File::delete('backend/img/brand/'. $brnd->img);
            }
        }
        $brnd->delete();
        return redirect()->route('brand.manage');
        
    }
    }

