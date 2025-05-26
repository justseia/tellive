<?php

namespace App\Http\Controllers\Admin\Editor;

use App\Http\Controllers\Controller;
use App\Models\Review;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class EditorController extends Controller
{
    public function index(): View
    {
        $userId = auth()->id();

        $reviews = Review::query()
            ->latest()
            ->where('user_id', $userId)
            ->get();

        $banners = Review::query()
            ->latest()
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

    public function createReview(): View
    {
        return view('admin.editor.create-review');
    }

    public function storeReview(Request $request): RedirectResponse
    {
        return redirect()->route('admin.editor.index');
    }

    public function deleteReview(): RedirectResponse
    {
        return back();
    }

    public function createBanner(): View
    {
        return view('admin.editor.create-banner');
    }

    public function storeBanner(Request $request): RedirectResponse
    {
        return redirect()->route('admin.editor.index');
    }

    public function deleteBanner(): RedirectResponse
    {
        return back();
    }
}
