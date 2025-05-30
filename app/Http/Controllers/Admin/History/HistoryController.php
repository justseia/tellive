<?php

namespace App\Http\Controllers\Admin\History;

use App\Enums\TypeTravelEnum;
use App\Http\Controllers\Controller;
use App\Models\History;
use App\Models\HistoryBlock;
use App\Models\HistoryFavorite;
use App\Models\User;
use Illuminate\Contracts\View\View;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class HistoryController extends Controller
{
    public function index(): View
    {
        $userId = auth()->id();
        $histories = History::query()
            ->where('user_id', $userId)
            ->get();

        return view('admin.history.index')
            ->with(compact('histories'));
    }

    public function search(Request $request): View
    {
        $typeTravelEnum = TypeTravelEnum::get();

        $histories = History::query()
            ->where('type', 'public')
            ->when($request->filled('type'), function ($query) use ($request) {
                $query->where('type', $request->input('type'));
            })
            ->when($request->filled('search'), function ($query) use ($request) {
                $query->where('title', $request->input('search'));
            })
            ->when($request->filled('tariff'), function ($query) use ($request) {
                $query->where('tariff', $request->input('tariff'));
            })->get();

        return view('admin.history.search')
            ->with(compact('typeTravelEnum'))
            ->with(compact('histories'));
    }

    public function show(History $history): View
    {
        return view('admin.history.show')
            ->with(compact('history'));
    }

    public function create(): View
    {
        return view('admin.history.create');
    }

    public function store(Request $request): RedirectResponse
    {
        $userId = auth()->id();

        $historyId = History::query()->create([
            'type' => $request->type,
            'views' => 0,
            'title' => $request->title,
            'date' => $request->date,
            'image_url' => $request->image_url,
            'type_of_history' => $request->type_of_history,
            'user_id' => $userId,
        ])->id;

        foreach ($request->blocks as $block) {
            HistoryBlock::query()->create([
                'text' => $block->title,
                'images_url' => $block->images_url,
                'youtube_url' => $block->youtube_url,
                'history_id' => $historyId,
            ]);
        }

        return redirect()->route('admin.history.index');
    }

    public function like(History $history): JsonResponse
    {
        $userId = auth()->id();

        $historyFavorite = HistoryFavorite::query()
            ->where('user_id', $userId)
            ->where('history_id', $history->id)
            ->first();

        if ($historyFavorite) {
            $historyFavorite->delete();
        } else {
            HistoryFavorite::query()->create([
                'user_id' => auth()->id(),
                'history_id' => $history->id,
            ]);
        }

        return response()->json();
    }
}
