<?php

namespace App\Http\Controllers;

use App\Models\Url;
use Illuminate\Support\Str;
use Illuminate\Http\Request;

class ShortnerController extends Controller
{
    public function index () {
        return view('home');
    }

    public function store (Request $request) {
        $random = Str::random(15);
        $shortned_url = route('shortner.index') . '/' . $random;

        $url = Url::where('url', $request->input('url'))->first();
        if ($url != null)
            return redirect()->route('shortner.show', ['shortned_url' => $url->url]);;


        Url::create([
            'shortned_url' => $random,
            'url' => $request->input('url')
        ]);

        return redirect()->route('shortner.show', ['shortned_url' => $shortned_url]);
    }

    public function show (Request $request) {
        $request->validate([
            'shortned_url' => 'required|url'
        ]);
        return $request->shortned_url;
    }

    public function redirect(string $uri) {
        return redirect()->away(Url::where('shortned_url', $uri)->first()->url);
    }
}
