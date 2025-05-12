<?php

namespace App\Http\Controllers\Admin\Review;

use App\Http\Controllers\Controller;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;

class ReviewController extends Controller
{
    public function index(): View
    {
        return view('admin.review.index');
    }
}
