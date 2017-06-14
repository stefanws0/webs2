<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable = ['name', 'description', 'price'];

    public function reviews()
    {
        return $this->hasMany(Review::class);
    }

    public function addReview($body, $title)
    {

        $this->reviews()->create(compact('body', 'title'));
    }
}
