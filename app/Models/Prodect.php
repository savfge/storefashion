<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Prodect extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function category()
    {
        return $this->belongsTo(Category::class);
    }
    public function barnd()
    {
        return $this->belongsTo(Barnd::class);
    }
    public function color()
    {
        return $this->belongsTo(Color::class);
    }
    public function subcategory()
    {
        return $this->belongsTo(SubCategory::class);
    }
    public function size()
    {
        return $this->belongsTo(Size::class);
    }
    public static function categorycount($category_id)
    {
       $categorycount =  Prodect::where('category_id',$category_id)->count();
        return $categorycount;
    }
    public static function countbard($barnd_id)
    {
        $countbard = Prodect::where('barnd_id',$barnd_id)->count();
        return $countbard ;
    }
    public function review()
    {
        return $this->hasMany(Review::class);
    }
    public function commper()
    {
        return $this->hasMany(Commper::class);
    }
}
