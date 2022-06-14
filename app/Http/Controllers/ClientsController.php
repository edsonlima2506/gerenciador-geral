<?php

namespace App\Http\Controllers;

use App\Models\Client;
use Illuminate\Http\Request;

class ClientsController extends Controller
{
    public function index() {
        return view('clients.index');
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
