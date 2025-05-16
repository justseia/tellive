<?php

namespace App\Http\Controllers\Admin\Client;

use App\Http\Controllers\Controller;
use App\Models\Client;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;

class ClientController extends Controller
{
    public function index(): View
    {
        $userId = auth()->id();

        $clients = Client::query()
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

    public function create(Client $client): View
    {
        return view('admin.client.show')
            ->with(compact('client'));
    }
}
