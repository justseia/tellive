<?php

namespace App\Http\Controllers\Admin\History;

use App\Enums\TypeTravelEnum;
use App\Http\Controllers\Controller;
use App\Models\History;
use App\Models\HistoryFavorite;
use Exception;
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
            ->latest()
            ->where('user_id', $userId)
            ->get();

        return view('admin.history.index')
            ->with(compact('histories'));
    }

    public function search(Request $request): View
    {
        $typeTravelEnum = TypeTravelEnum::get();

        $histories = History::query()
            ->latest()
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
        $history->load(['user']);

        return view('admin.history.show')
            ->with(compact('history'));
    }

    public function create(): View
    {
        $typeTravelEnum = TypeTravelEnum::get();

        return view('admin.history.create')
            ->with(compact('typeTravelEnum'));
    }

    public function store(Request $request): RedirectResponse
    {
        try {
            $userId = auth()->id();

            $mainImagePath = '/storage/' . $request->file('image')->store('tellive', 'public');

            $blocks = $request->blocks;
            foreach ($request->blocks as $indexBlock => $block) {
                foreach ($block['images'] as $indexImage => $image) {
                    $imagePath = '/storage/' . $image->store('tellive', 'public');
                    $blocks[$indexBlock]['images'][$indexImage] = $imagePath;
                }
            }

            History::query()->create([
                'archived' => false,
                'type' => $request->type,
                'views' => 0,
                'title' => $request->title,
                'date' => $request->date,
                'image_url' => $mainImagePath,
                'type_of_history' => $request->type_of_history,
                'user_id' => $userId,
                'blocks' => json_encode($blocks),
            ])->id;
        } catch (Exception $e) {
            return back()->withErrors(['error' => $e->getMessage()]);
        }

        return redirect()->route('admin.history.index')->with('success', 'Успешно');
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
