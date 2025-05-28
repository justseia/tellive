<?php

namespace App\Http\Controllers\Admin\Editor;

use App\Http\Controllers\Controller;
use App\Models\LandingBanner;
use App\Models\LandingReview;
use App\Models\Review;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class EditorController extends Controller
{
    public function index(): View
    {
        $userId = auth()->id();

        $reviews = LandingReview::query()
            ->latest('index')
            ->where('user_id', $userId)
            ->get();

        $banners = LandingBanner::query()
            ->latest('index')
            ->where('user_id', $userId)
            ->get();

        return view('admin.editor.index')
            ->with(compact('banners'))
            ->with(compact('reviews'));
    }

    public function update(Request $request): RedirectResponse
    {
        return back();
    }
}
