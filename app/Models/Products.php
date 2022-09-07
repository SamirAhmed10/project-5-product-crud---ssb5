<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Products extends Model
{
    use HasFactory;
  
    protected $fillable=[
        'name',
        'slug',
        'description',
        'specification',
        'category_id',
        'brand_id',
        'quantity',
        'price',
        'offer_price',
       
        


    ];
   
    //get the category name that owns the product
    public function category()
        {
    
        return $this->belongsTo (Category:: class);

    }
    //get the brand name that owns the product
   public function brand()
    {

    return $this->belongsTo (Brands:: class);

}
  //get the images that owns the product
  
    public function images(){  

    return $this->hasMany(ProductImage::class);

}


    

    
}
