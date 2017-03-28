<?php
/**
 * Created by PhpStorm.
 * User: stefa
 * Date: 27/03/2017
 * Time: 21:29
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Navigation extends Model
{
    protected $table = 'navigation';

    public function categories()
    {
        return $this->hasMany(Category::class);
    }

//    public function parent() {
//
//        return $this->hasOne('navigation', 'id', 'parent_id');
//
//    }
//
//    public function children() {
//
//        return $this->hasMany('App\Models\Navigation', 'parent_id', 'id');
//
//    }
}