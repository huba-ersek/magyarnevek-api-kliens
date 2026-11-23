<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class NameController extends Controller
{
    public function index(Request $request)
    {
        $url = '/names';
        $pageToken = $request->input('pageToken');
        $firstLetter = $request->input('c');
        if ($pageToken || $firstLetter)
        {
            $pieces = [];
            if ($pageToken) $pieces[] = "pageToken=$pageToken";
            if ($firstLetter) $pieces[] = "firstLetter=$firstLetter";
            $url .= "?" . implode("&", $pieces);
        }
        $response = Http::api()->get($url);
        if ($response->failed())
        {
            return redirect()->route('/')->with('error', $response->json('message'));
        }
        $data = json_decode($response->body(), false) ?? [];
        $names = $data->data;
        return view('names.index', ['names' => $names, 'nextPageToken' => $data->nextPageToken]);
    }

    public function show(string $id)
    {
        $responseName = Http::api()->get("/names/$id?fields=*");
        $responseNameday = Http::api()->get("/namedays/$id");
        $responseNameForms = Http::api()->get("/name-forms/$id");
        if ($responseName->failed()
            || $responseNameday->failed()
            || $responseNameForms->failed())
        {
            $message = $responseName->json('message')
                ?? $responseNameday->json('message')
                ?? $responseNameForms->json('message');
            return back()->with('error', $message);
        }
        $name = json_decode($responseName->body(), false);
        $nameday = json_decode($responseNameday->body(), false);
        $nameForms = json_decode($responseNameForms->body(), false);
        $nameForms->isEmpty = !$nameForms->forms->latin
            && !$nameForms->forms->cyrillic && !$nameForms->forms->greek;
        return view('names.show', compact('name', 'nameday', 'nameForms'));
    }
}
