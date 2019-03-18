<?php

namespace App\Http\Controllers;

use App\Coach;
use Illuminate\Http\Request;
use App\Game;
use App\http\Resources\Game as GameResource;
use App\http\Resources\CoachHome as CoachHomeResource;
use Symfony\Component\HttpFoundation\Response;

class HomeDataController extends Controller
{
  public function index()
  {
    $games = GameResource::collection(Game::all())->jsonSerialize();
    $coaches = CoachHomeResource::collection(Coach::inRandomOrder()->take(1)->get())->jsonSerialize();
    return response()->json(['games' => $games, 'coaches' => $coaches]);
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
