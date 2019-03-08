<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Game;
use App\http\Resources\Game as GameResource;
use Symfony\Component\HttpFoundation\Response;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
      $games = Game::all();
      return response(GameResource::collection($games)->jsonSerialize(), Response::HTTP_OK);
    }
}
