<?php

namespace App\Http\Controllers;

use App\Coach;
use App\Http\Resources\Review as ReviewResource;
use App\Review;
use Illuminate\Http\Request;
use App\Game;
use App\http\Resources\Game as GameResource;
use App\http\Resources\Coaches as CoachesResource;
use Symfony\Component\HttpFoundation\Response;

class HomeDataController extends Controller
{
  public function index()
  {
    $games = GameResource::collection(Game::all())->jsonSerialize();
    $coaches = CoachesResource::collection(Coach::inRandomOrder()->take(2)->get())->jsonSerialize();
    $reviews = ReviewResource::collection(Review::where('rating', '5')->take(2)->get())->jsonSerialize();
    return response()->json(['games' => $games, 'coaches' => $coaches, 'reviews' => $reviews]);
  }

  public function hidden() {
    $games = Game::all();
    return response(GameResource::collection($games)->jsonSerialize(), Response::HTTP_OK);
  }

  public function visible() {
    $games = Game::all();
    return response(GameResource::collection($games)->jsonSerialize(), Response::HTTP_OK);
  }
}
