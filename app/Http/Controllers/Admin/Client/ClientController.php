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
            ->latest()
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

    public function edit(Client $client): View
    {
        return view('admin.client.edit')
            ->with(compact('client'));
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
            'full_name' => 'sometimes|nullable|string|max:255',
            'type' => 'sometimes|nullable|string',
            'tariff' => 'sometimes|nullable|string',
            'phone_number' => 'sometimes|nullable|string',
            'curator' => 'sometimes|nullable|string',
            'city' => 'sometimes|nullable|string',
            'last_payment_date' => 'sometimes|nullable|date',
            'last_payment_partnership' => 'sometimes|nullable|date',
            'note' => 'sometimes|nullable|string',
        ]);

        Client::query()
            ->where('id', $client->id)
            ->update($validated);

        return back();
    }
}
