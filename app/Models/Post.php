<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;
use App\Models\category;
use App\Models\SubCategory;



class Post extends Model
{
    use HasFactory;

    //for fill in database
    protected $fillable = [
        'category_id',
        'subcategory_id',
        'user_id',
        'title',
        'slug',
        'description',
        'image',
        'tags',
        'status',
        'post_date',
    ];

    // Join With Category
    public function category(){
        return $this->belongsTo(category::class,'category_id');
    }

    //Join With SubCategory
    public function subcategory(){
        return $this->belongsTo(SubCategory::class,'subcategory_id');
    }

    //Join With User
    public function user(){
        return $this->belongsTo(User::class,'user_id');
    }
}
