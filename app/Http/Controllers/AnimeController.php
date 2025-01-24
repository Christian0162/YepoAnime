<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Inertia\Inertia;

class AnimeController extends Controller
{

    public function getTrending()
    {
        $api_url = 'https://api.jikan.moe/v4/top/anime';

        $getTrending = Http::get($api_url);

        // Safely handle the API response
        $response = $getTrending->successful() ? $getTrending->json()['data'] : [];

        $getAiringAnime = Http::get('https://api.jikan.moe/v4/top/anime?filter=airing')
        ->json()['data'];

        $getAiringAnime = array_slice($getAiringAnime, 0 ,10);

        $response = array_slice($response, 0, 10);

        // dump($getAiringAnime);

        // Pass the data to the Vue component using Inertia
        return Inertia::render('test', [
            'response' => $response,
            'getAiringAnime' => $getAiringAnime
        ]);
    }
    public function getAnime ($id) {

        $getAnime = Http::get('https://api.jikan.moe/v4/anime/'. $id .'/full')
        ->json()['data'];

        $getRecom = Http::get('https://api.jikan.moe/v4/recommendations/anime')
        ->json()['data'];

        $getRecom = array_slice($getRecom, 0, 17);

        dump($getAnime);

        return Inertia::render('Detail',
        ['getAnime' => $getAnime,
         'getRecom' => $getRecom
        ]);
    }
}
