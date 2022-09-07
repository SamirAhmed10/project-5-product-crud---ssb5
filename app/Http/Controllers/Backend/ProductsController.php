<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use  App\Models\category;
use  App\Models\brands;
use  App\Models\Products;
use  App\Models\ProductImage;
use Illuminate\Http\Request;
use Illuminate\Support\str;
use File;
use Image;

class ProductsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $product=Products::orderBy('id','desc')->get();
        return view('backend.pages.Products.manage', compact('product'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories=category::orderBy('name','asc')->where('is_parent',0)->get();
        $categoriess=category::orderBy('name','asc')->where('is_parent','!=',0)->get();

        $brand=brands::orderby('name','asc')->get();
        return view('backend.pages.Products.create',compact('categories', 'categoriess','brand'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $Prdct=new Products;
        $Prdct->name=$request->name;
        $Prdct->slug=Str::slug($request->name);
        $Prdct->category_id=$request->category_id;
        $Prdct->brand_id=$request->brand_id;
        $Prdct->quantity=$request->quantity;
        $Prdct->price=$request->price;
        $Prdct->offer_price=$request->offer_price;
        $Prdct->description=$request->description;
        $Prdct->specification=$request->specification;
        $Prdct->save();
        if($request->profileImage)
        {
            request()->validate([
                 'profileImage.*' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            ]);
            if ($files = $request->file('profileImage')) {
            // Define upload path
            $destinationPath = public_path('backend/img/products/'); // upload path
                 foreach($files as $img) {
      // Upload Orginal Image           
                $profileImage =$img->getClientOriginalName();
                $img->move($destinationPath, $profileImage);
                  // Save In Database
                
            $imagemodel= new ProductImage();
            $imagemodel->image="$profileImage";
            $imagemodel->products_id = $Prdct->id;
            $imagemodel->save();
                  }
      }
      
             
      return redirect()->route('products.manage');
      
         }
    
    return redirect()->route('products.manage');

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
        { 
            $prdcts =Products::find($id);
    
            if( !is_null($prdcts))
            {
                $categories=category::orderBy('name','asc')->where('is_parent',0)->get();
                $categoriess=category::orderBy('name','asc')->where('is_parent','!=',0)->get();
        
                $brand=brands::orderby('name','asc')->get();
            
                return view('backend.pages.Products.edit',compact('prdcts','categories','categoriess','brand'));
                
            }
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
        $prdcts=Products::find($id);
        $prdcts->name=$request->name;
        $prdcts->slug=Str::slug($request->name);
        $prdcts->category_id=$request->category_id;
        $prdcts->brand_id=$request->brand_id;
        $prdcts->quantity=$request->quantity;
        $prdcts->price=$request->price;
        $prdcts->offer_price=$request->offer_price;
        $prdcts->description=$request->description;
        $prdcts->specification=$request->specification;
        $prdcts->save();
        
      
     
        if($request->profileImage)
        {
            request()->validate([
                 'profileImage.*' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            ]);
            if ($files = $request->file('profileImage')) {
            // Define upload path
            $destinationPath = public_path('backend/img/products/'); // upload path
                 foreach($files as $img) {
      // Upload Orginal Image           
                $profileImage =$img->getClientOriginalName();
                $img->move($destinationPath, $profileImage);
                  // Save In Database
                
            $imagemodel= new ProductImage();
            $imagemodel->image="$profileImage";
            $imagemodel->products_id = $prdcts->id;
            $imagemodel->save();
                  }
      }
      
             
      return redirect()->route('products.manage');
      
         }
       
    return redirect()->route('products.manage');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    
    
    public function destroy($id)
    
        {
            $prdcts =Products::find($id);
            if( !is_null($prdcts))
      {
                if(File::exists('backend/img/products/'. $prdcts->img))
                {
                    File::delete('backend/img/products/'. $prdcts->img);
                }
            }
            
            $prdcts->delete();
            return redirect()->route('products.manage');
            
        }
        
    public function destroyimage($id)
    
    {
        $prdcts =ProductImage::find($id);
        if( !is_null($prdcts))
  {
            if(File::exists('backend/img/products/'. $prdcts->img))
            {
                File::delete('backend/img/products/'. $prdcts->img);
            }
        }
        
        $prdcts->delete();
        return redirect()->route('products.manage');
        
    }
    
        
      
        }
        
    

