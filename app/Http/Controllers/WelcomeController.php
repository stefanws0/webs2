<?php
/**
 * Created by PhpStorm.
 * User: stefa
 * Date: 27/03/2017
 * Time: 22:04
 */

namespace App\Http\Controllers;

use App\Models\Navigation;


class WelcomeController
{
    public function index()
    {
        return view('welcome');
    }
}