<?php

namespace App\Http\Controllers\Dashboard;

use App\Models\Post;
use App\Models\Unit;
use App\Models\User;
use App\Models\Sponsor;
use App\Models\Comment;
use App\Http\Controllers\Controller;

class DashboardController extends Controller
{
    /**
     * DashboardController constructor.
     */

    public function index()
    {
        return view('dashboard.index');
    }
}
