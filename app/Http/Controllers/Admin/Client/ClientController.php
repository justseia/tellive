<?php

namespace App\Http\Controllers\Admin\Client;

use App\Http\Controllers\Controller;
use App\Models\Client;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class ClientController extends Controller
{
    public function index(): View
    {
        $userId = auth()->id();

        $clients = Client::query()
            ->latest('created_at')
            ->where('user_id', $userId)
            ->get();

        return view('admin.client.index')
            ->with(compact('clients'));
    }

    public function show(Client $client): View
    {
        return view('admin.client.show')
            ->with(compact('client'));
    }

    public function create(): View
    {
        return view('admin.client.create');
    }

    public function store(Request $request): RedirectResponse
    {
        $validated = $request->validate([
            'full_name' => 'required|string|max:255',
            'type' => 'required|string',
            'tariff' => 'required|string',
            'phone_number' => 'required|string',
            'curator' => 'nullable|string',
            'city' => 'nullable|string',
        ]);

        $validated['user_id'] = auth()->id();

        Client::query()->create($validated);

        return redirect()->route('admin.client.index');
    }

    public function update(Client $client, Request $request): RedirectResponse
    {
        $validated = $request->validate([
            'full_name' => 'required|string|max:255',
            'type' => 'required|string',
        ]);

        Client::query()
            ->where('id', $client->id)
            ->update($validated);

        return redirect()->route('admin.client.index');
    }
}
