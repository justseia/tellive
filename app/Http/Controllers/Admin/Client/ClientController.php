<?php

namespace App\Http\Controllers\Admin\Client;

use App\Enums\TariffEnum;
use App\Enums\UserTypeEnum;
use App\Http\Controllers\Controller;
use App\Models\Client;
use Exception;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class ClientController extends Controller
{
    public function index(Request $request): View
    {
        $userId = auth()->id();

        $userTypeEnum = UserTypeEnum::get();
        $tariffEnum = TariffEnum::get();

        $clients = Client::query()
            ->latest()
            ->where('user_id', $userId)
            ->when($request->filled('last_payment_partnership'), function ($query) use ($request) {
                $query->where('last_payment_partnership', $request->input('payment'));
            })
            ->when($request->filled('type'), function ($query) use ($request) {
                $query->where('type', $request->input('client_type'));
            })
            ->when($request->filled('tariff'), function ($query) use ($request) {
                $query->where('tariff', $request->input('tariff'));
            })
            ->get();

        return view('admin.client.index')
            ->with(compact('userTypeEnum'))
            ->with(compact('tariffEnum'))
            ->with(compact('clients'));
    }

    public function show(Client $client): View
    {
        $userTypeEnum = UserTypeEnum::get();
        $tariffEnum = TariffEnum::get();

        return view('admin.client.show')
            ->with(compact('client'))
            ->with(compact('userTypeEnum'))
            ->with(compact('tariffEnum'));
    }

    public function create(): View
    {
        $userTypeEnum = UserTypeEnum::get();
        $tariffEnum = TariffEnum::get();

        return view('admin.client.create')
            ->with(compact('userTypeEnum'))
            ->with(compact('tariffEnum'));
    }

    public function edit(Client $client): View
    {
        return view('admin.client.edit')
            ->with(compact('client'));
    }

    public function store(Request $request): RedirectResponse
    {
        try {
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
        } catch (Exception $e) {
            return back()->withErrors(['error' => $e->getMessage()]);
        }

        return redirect()->route('admin.client.index')
            ->with('success', 'Успешно');
    }

    public function update(Client $client, Request $request): RedirectResponse
    {
        try {
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
        } catch (Exception $e) {
            return back()->withErrors(['error' => $e->getMessage()]);
        }

        return back()->with('success', 'Успешно');
    }
}
