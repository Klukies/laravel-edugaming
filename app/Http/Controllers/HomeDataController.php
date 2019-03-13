<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Game;
use App\http\Resources\Game as GameResource;
use Symfony\Component\HttpFoundation\Response;

class HomeDataController extends Controller
{
  public function index()
  {
    $games = Game::all();
    return response(GameResource::collection($games)->jsonSerialize(), Response::HTTP_OK);
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
