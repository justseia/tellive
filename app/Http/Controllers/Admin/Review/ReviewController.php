<?php

namespace App\Http\Controllers\Admin\Review;

use App\Enums\TypeTravelEnum;
use App\Helpers\ImageHelper;
use App\Http\Controllers\Controller;
use App\Models\Review;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class ReviewController extends Controller
{
    public function index(): View
    {
        $typeTravelEnum = TypeTravelEnum::get();
        $user = app('user');

        $reviews = Review::query()
            ->latest()
            ->where('user_id', $user->id)
            ->get();

        return view('admin.review.index')
            ->with(compact('typeTravelEnum'))
            ->with(compact('reviews'));
    }

    public function create(): View
    {
        $typeTravelEnum = TypeTravelEnum::get();

        return view('admin.review.create')
            ->with(compact('typeTravelEnum'));
    }

    public function store(Request $request, ImageHelper $imageHelper): RedirectResponse
    {
        $imageUrl = $imageHelper->upload($request->file('image'));

        Review::query()->create([
            'title' => $request->title,
            'description' => $request->description,
            'image_url' => $imageUrl,
            'type_of_travel' => $request->type_of_travel,
            'youtube_url' => $request->youtube_url,
            'user_id' => auth()->id(),
        ]);

        return redirect()->route('admin.review.index');
    }
}
