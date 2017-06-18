<?php
/**
 * Created by PhpStorm.
 * User: stefa
 * Date: 16/06/2017
 * Time: 12:51
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    public function user()
    {
        return $this->belongsTo('App\Models\User');
    }
}