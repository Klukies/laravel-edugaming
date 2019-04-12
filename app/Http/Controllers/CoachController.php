<?php

namespace App\Http\Controllers;

use App\Coach;
use App\Review;
use DB;
use App\Http\Resources\Coaches as CoachesResource;
use App\Http\Resources\Coach as CoachResource;
use Illuminate\Http\Request;
use Illuminate\Support\Collection;

class CoachController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $coaches = Coach::paginate(6);
        return response(CoachesResource::collection($coaches)->jsonSerialize(), 200);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Coach  $coach
     * @return \Illuminate\Http\Response
     */
    public function show(String $username)
    {
        $coach = Coach::where('username', $username)
            ->with(array('reviews' => function ($reviews) {
                $reviews->orderBy('reviews.created_at', 'DESC');
                $reviews->take(6);
            }))
            ->get();
        return response(CoachResource::collection($coach), 200);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Coach  $coach
     * @return \Illuminate\Http\Response
     */
    public function edit(Coach $coach)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Coach  $coach
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Coach $coach)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Coach  $coach
     * @return \Illuminate\Http\Response
     */
    public function destroy(Coach $coach)
    {
        //
    }

    /**
     * Filter the coaches based on the filters from POST
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function filter(Request $request) {
        $games = $request->input('games');
        $price = $request->input('price');
        $rating = $request->input('rating');

        if ($games != null) {
            $coaches = $this->getCoachesByGames($games);
        } else {
            $coaches = new Coach;
            $coaches->newQuery();
        }

        if ($price != null) {
            $coaches = $this->getCoachesByPrices($coaches, $price);
        }

        if ($rating != -1) {
            $coaches = $this->getCoachesByRating($coaches, $rating);
        } else {
            $coaches = $coaches->paginate(6);
        }

        return response(CoachesResource::collection($coaches)->jsonSerialize(), 200);
    }

    /*
     * Get all coaches if they teach a certain game
     *
     */
    private function getCoachesByGames($games) {
        return Coach::whereIn('game_id', $games);
    }

    /*
     * Get all coaches if the cost per hour is lower or more then $price
     */
    private function getCoachesByPrices($coaches, $price) {
        if ($price == "50+") {
            return $coaches->where('price', '>', '50');
        } else {
            return $coaches->where('price', '<', $price);
        }
    }

    /*
     * Get all coaches if they have a higher or equal rating as $rating
     */
    private function getCoachesByRating($coaches, $rating) {
        $coaches = $coaches->paginate(6);
        $coachesByRating = new Collection();
        foreach ($coaches as $coach) {
            if($coach->ratings()->avg('rating') >= $rating) {
                $coachesByRating->push($coach);
            }
        }
        return $coachesByRating;
    }

}
