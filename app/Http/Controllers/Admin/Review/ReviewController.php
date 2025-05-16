<?php

namespace App\Http\Controllers\Admin\Review;

use App\Http\Controllers\Controller;
use App\Models\Review;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;

class ReviewController extends Controller
{
    public function index(): View
    {
        $user = app('user');

        $reviews = Review::query()
            ->where('user_id', $user->id)
            ->get();

        return view('admin.review.index')
            ->with(compact('reviews'));
    }
}
