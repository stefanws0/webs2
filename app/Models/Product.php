<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $table = 'products';
    protected $fillable = ['name', 'description', 'price', 'category_id'];

    public function reviews()
    {
        return $this->hasMany(Review::class);
    }

    public function foo()
    {
        return $this->belongsTo('App\Models\Category','category_id');
    }

    public function addReview($body, $title)
    {

        $this->reviews()->create(compact('body', 'title'));
    }
}
