<?php

namespace App\Http\Controllers\Admin\Editor;

use App\Http\Controllers\Controller;
use App\Models\LandingReview;
use Exception;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class ReviewController extends Controller
{
    public function edit(LandingReview $review): View
    {
        return view('admin.editor.review.edit')
            ->with(compact('review'));
    }

    public function update(LandingReview $review, Request $request): RedirectResponse
    {
        try {
            if ($request->has('type')) {
                $type = $request->input('type');

                if ($type == 'up') {
                    $swap = LandingReview::query()->where('index', $review->index + 1)->first();

                    if ($swap) {
                        $swap->decrement('index');
                        $review->increment('index');
                    }
                } elseif ($type == 'down') {
                    $swap = LandingReview::query()->where('index', $review->index - 1)->first();
                    if ($swap) {
                        $swap->increment('index');
                        $review->decrement('index');
                    }
                }

                return back()->with('success', 'Успешно');
            }

            $validated = $request->validate([
                'name_review' => ['required', 'string', 'max:255'],
                'title' => ['required', 'string', 'max:255'],
                'text_review' => ['required', 'string'],
                'countries' => ['required', 'string', 'max:255'],
                'image' => ['nullable', 'image'],
                'date' => ['required', 'date'],
            ]);

            if ($request->hasFile('image')) {
                $imagePath = '/' . $request->file('image')->store('reviews', 'public');
            }

            $review->update([
                'name_review' => $validated['name_review'],
                'title' => $validated['title'],
                'text_review' => $validated['text_review'],
                'countries' => $validated['countries'],
                'image_url' => $imagePath ?? $review->image_url,
                'date' => $validated['date'],
                'user_id' => auth()->id(),
            ]);
        } catch (Exception $e) {
            return back()->withErrors(['error' => $e->getMessage()]);
        }

        return back()->with('success', 'Успешно');
    }

    public function create(): View
    {
        return view('admin.editor.review.create');
    }

    public function store(Request $request): RedirectResponse
    {
        try {
            $validated = $request->validate([
                'name_review' => ['required', 'string', 'max:255'],
                'title' => ['required', 'string', 'max:255'],
                'text_review' => ['required', 'string'],
                'countries' => ['required', 'string', 'max:255'],
                'image' => ['required', 'image'],
                'date' => ['required', 'date'],
            ]);

            $imagePath = '/' . $request->file('image')->store('reviews', 'public');

            $maxIndex = LandingReview::max('index') ?? 0;
            LandingReview::query()->create([
                'index' => $maxIndex + 1,
                'name_review' => $validated['name_review'],
                'title' => $validated['title'],
                'text_review' => $validated['text_review'],
                'countries' => $validated['countries'],
                'image_url' => $imagePath,
                'date' => $validated['date'],
                'user_id' => auth()->id(),
            ]);
        } catch (Exception $e) {
            return back()->withErrors(['error' => $e->getMessage()]);
        }

        return redirect()->route('admin.editor.index')
            ->with('success', 'Успешно');
    }

    public function delete(LandingReview $review): RedirectResponse
    {
        $userId = auth()->id();
        $landingReviews = LandingReview::query()
            ->where('user_id', $userId)
            ->where('index', '>', $review->index)
            ->get();

        foreach ($landingReviews as $landingReview) {
            $landingReview->decrement('index');
        }

        $review->delete();

        return back()->with('success', 'Успешно');
    }
}
