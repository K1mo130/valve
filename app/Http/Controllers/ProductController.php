<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use App\Models\Product;


class ProductController extends Controller
{
        /**
     * Write code on Method
     *
     * @return response()
     */
    public function index()
    {
        $apiKey = '5af1cfd2f6004e0698ee9fc217dd31fc';

        $platformsUrl = "https://api.rawg.io/api/platforms?key={$apiKey}";
        $gamesUrl = "https://api.rawg.io/api/games?key={$apiKey}&dates=2019-09-01,2019-09-30&platforms=18,1,7";

        // Fetch platforms data
        $platformsResponse = Http::get($platformsUrl);
        $platformsData = $platformsResponse->json();

        // Fetch games data
        $gamesResponse = Http::get($gamesUrl);
        $gamesData = $gamesResponse->json();

        $gameDetails = [];
        foreach ($gamesData['results'] as $game) {
            $id = $game['id'];
            $slug = $game['slug'];
            $name = $game['name'];
            $added = $game['added'];

            // Check if "background_image" key exists
            $imageBackground = isset($game['background_image']) ? $game['background_image'] : '';

            // Store game details in array
            $gameDetails[] = [
                'id' => $id,
                'slug' => $slug,
                'name' => $name,
                'added' => $added,
                'imageBackground' => $imageBackground,
            ];

            // Create a new Product instance and save it in the database
            $product = Product::updateOrCreate(
                ['slug' => $slug],
                ['id' => $id, 'name' => $name, 'added' => $added, 'image' => $imageBackground]
            );
        }

        return view('dashboard', ['games' => $gameDetails]);
    }

}