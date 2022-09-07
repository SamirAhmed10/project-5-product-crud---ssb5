<?php
namespace App\Http\Controllers\Backend;
use App\Http\Controllers\Controller;
use  App\Models\category;
use Illuminate\Http\Request;
use Illuminate\Support\str;
use File;
use Image;
class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories=category::orderby('name','asc')->get();
        return view('backend.pages.Categories.manage' , compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $parents=category::orderby('name','asc')->where('is_parent',0)->get();
      

    
        return view('backend.pages.Categories.create',compact('parents'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $category=new category;
        $category->name=$request->name;
        $category->slug=Str::slug($request->name);
        $category->description=$request->description;
        
        $category->is_parent=$request->is_parent;

        $category->status=$request->status;
        if($request->image)
        {
            $image= $request->file('image');
            $img= time().'.'.$image->getClientOriginalExtension();
            $location= public_path('backend/img/category/'. $img);
            Image::make($image)->save($location);
            $category->image= $img;
        }

        $category->save();
        return redirect()->route('category.manage');



    }

    /**
     * where('is_parent','!=',0)->orWhereNull('is_parent')->
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
        $categorie =category::find($id);

        if( !is_null($categorie))
        {
            $parents=category::orderBy('name','asc')->where('is_parent',0)->get();
        
            return view('backend.pages.Categories.edit',compact('parents','categorie'));
            
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
        $categorie =category::find($id);
        $categorie->name=$request->name;
        $categorie->slug=Str::slug($request->name);
        $categorie->description=$request->description;
        
        $categorie->is_parent=$request->is_parent;
       

        $categorie->status=$request->status;
        if($request->image)
        {
            $image= $request->file('image');
            $img= time().'.'.$image->getClientOriginalExtension();
            $location= public_path('backend/img/category/'. $img);
            Image::make($image)->save($location);
            $categorie->image= $img;
        }

        $categorie->save();
        return redirect()->route('category.manage');




    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    { 
       
       
        $categorie =category::find($id);
        $categori=category::orderby('name','asc')->get();
        foreach(Category::orderBy('name', 'asc')->where('is_parent', $categorie->id)->get() as $caat )
        {
            if($categorie->id==$caat->is_parent)
            {
                return redirect()->route('category.manage');
            }
        
        }

        if( !is_null($categorie))
        {
            if(File::exists('backend/img/category/'. $categorie->img))
            {
                File::delete('backend/img/category/'. $categorie->img);
            }
        }
        $categorie->delete();
        return redirect()->route('category.manage');
    }
    }

          
    

