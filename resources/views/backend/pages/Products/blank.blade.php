Route::post('/destroyimage/{id}','App\Http\Controllers\Backend\ProductsController@destroyimage')->middleware('auth')->name('products.destroyimage');

<div class="row">
                  <div class="col-lg-12">
                     <div class="form-group">
                       <label>Main Image(*)</label>
                       <input type="file" class="form-control-file"  name="p_image[]">
                     </div>
                  </div>
              <div class="col-lg-12">
                <div class="form-group">
                  <label>Extra Image 1</label>
                  <input type="file" class="form-control-file"  name="p_image[]">
                </div>
              </div>
              <div class="col-lg-6">
                <div class="form-group">
                  <label>Extra Image 2</label>
                  <input type="file" class="form-control-file"  name="p_image[]">
               </div>
              </div>
         </div>
          </div>


          
       if($request->p_image)
    {
        foreach ( $request->p_image as $image )
        {
        $img= rand(1,9999999) . '.' . $image->getClientOriginalExtension();
        $location= public_path('backend/img/products/'. $img);
        Image::make($image)->save($location);
        $p_image=new ProductImage;
        $p_image->products_id = $Prdct->id;
        $p_image->image =$img;
        $p_image->save();
        }
    }

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