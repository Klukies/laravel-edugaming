<?php

namespace App\Http\Controllers;

use App\Coach;
use DB;
use App\Http\Resources\Coach as CoachResource;
use Illuminate\Http\Request;
use function MongoDB\BSON\toJSON;
use phpDocumentor\Reflection\Types\Integer;

class CoachController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $coaches = $this->getAllCoachesPaginated();
        return response(CoachResource::collection($coaches)->jsonSerialize(), 200);
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
    public function show(Coach $coach)
    {
        //
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

    /*
     * Get all coaches paginated
     */
    private function getAllCoachesPaginated() {
        return DB::table('coaches')
            ->select('coaches.*')
            ->leftJoin('ratings', 'coaches.coach_id', '=', 'ratings.rateable_id')
            ->addSelect(DB::raw('AVG(ratings.rating) as average_rating'))
            ->groupBy('coaches.coach_id')
            ->orderBy('average_rating', 'desc')
            ->paginate(6);
    }

    /**
     * Filter the coaches based on the filters from POST
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function filter(Request $request) {
        $games = $request->input('games');
        $coaches = $this->getCoachesByGames($games);
        //todo prices & ratings

        return response(CoachResource::collection($coaches)->jsonSerialize(), 200);
    }

    private function getCoachesByGames($games) {
        if(empty($games)) {
            return $this->getAllCoachesPaginated();
        } else {
            return Coach::whereIn('game_id', $games)->get();
        }
    }
}
