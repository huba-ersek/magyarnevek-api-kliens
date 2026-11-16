<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class NameController extends Controller
{
    public function index()
    {
        $response = Http::api()->get('/names');
        if ($response->failed())
        {
            return redirect()->route('/')->with('error', $response->json('message'));
        }
        $data = json_decode($response->body(), false) ?? [];
        $names = $data->data;
        return view('names.index', compact('names'));
    }
}
