<?php

namespace App\Http\Controllers;

use App\Models\Client;
use Illuminate\Http\Request;

class ClientsController extends Controller
{
    public function index() {
        $clients = Client::all();
        return view('clients.index', compact('clients'));
    }

    public function store(Request $request) {
        $client = new Client();

        $client->name = $request->data['name'];
        $client->email = $request->data['email'];
        $client->birthday = $request->data['birthday'];
        $client->gender = $request->data['gender'];
        $client->cell = $request->data['number'];
        $client->adress = $request->data['adress'];
        $client->adress_number = $request->data['adress_number'];

        $client->save();

        return 1;
    }
}
