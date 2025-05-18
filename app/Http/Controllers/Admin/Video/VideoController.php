<?php

namespace App\Http\Controllers\Admin\Video;

use App\Helpers\ImageHelper;
use App\Http\Controllers\Controller;
use App\Models\Video;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class VideoController extends Controller
{
    public function index(): View
    {
        $user = app('user');

        $videos = Video::query()
            ->latest('created_at')
            ->where('user_id', $user->id)
            ->get();

        return view('admin.video.index')
            ->with(compact('videos'));
    }

    public function create(): View
    {
        return view('admin.video.create');
    }

    public function store(Request $request, ImageHelper $imageHelper): RedirectResponse
    {
        $imageUrl = $imageHelper->upload($request->file('image'));

        Video::query()->create([
            'title' => $request->title,
            'image_url' => $imageUrl,
            'youtube_url' => $request->youtube_url,
            'user_id' => auth()->id(),
        ]);

        return redirect()->route('admin.video.index');
    }
}
