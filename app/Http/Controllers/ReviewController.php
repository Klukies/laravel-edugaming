<?php

namespace App\Http\Controllers;

use App\Rating;
use App\Review;
use App\Http\Resources\Review as ReviewResource;
use Illuminate\Http\Request;
use Tymon\JWTAuth\Exceptions\JWTException;

class ReviewController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
        try {
            if (! $user = \JWTAuth::parseToken()->authenticate()) {
                return response()->json(['user_not_found'], 404);
            }
        } catch (JWTException $e) {
            return response()->json($e->getMessage(), 404);
        }

        $review = new Review;
        $review->user_id = $user->id;
        $review->coach_id = $request->coach_id;
        $review->review = $request->review;
        $review->rating = $request->rating;
        $review->save();

        $rating = new Rating;
        $rating->coach_id = $request->coach_id;
        $rating->user_id = $user->id;
        $rating->rating = $request->rating;
        $rating->save();

        return response()->json(ReviewResource::collection(
            Review::where('coach_id', $request->coach_id)->OrderBy('reviews.created_at', 'DESC')->take(6)->get()
        ), 200);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Review  $review
     * @return \Illuminate\Http\Response
     */
    public function show(Review $review)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Review  $review
     * @return \Illuminate\Http\Response
     */
    public function edit(Review $review)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Review  $review
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Review $review)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Review  $review
     * @return \Illuminate\Http\Response
     */
    public function destroy(Review $review)
    {
        //
    }
}
