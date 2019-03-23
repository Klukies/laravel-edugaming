<?php

namespace App\Http\Controllers;

use App\Game;
use Illuminate\Http\Request;
use App\http\Resources\Game as GameResource;
use App\http\Resources\Price as PriceResource;
use App\Http\Resources\Rating as RatingResource;

class FilterController extends Controller
{
    public function index() {
        $games = GameResource::collection(Game::all());
        $prices = PriceResource::get();
        $ratings = RatingResource::get();
        return response()->json(['Games' => $games, 'Prices' => $prices, 'Ratings' => $ratings]);
    }
}
