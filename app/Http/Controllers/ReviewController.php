<?php

namespace App\Http\Controllers;

use App\Models\Review;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class ReviewController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $reviews = Review::paginate(10);

        return response()->json($reviews);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(),[
            'review' => 'required',
            'stars'  => 'required',
            'business_id'  => 'required',
        ]);

        if ($validator->fails()){
            return response()->json($validator->errors()->toJson(),400);
        }

        $review = new Review();

        $review->review = $request->review;
        $review->stars = $request->stars;
        $review->business_id = $request->business_id;
        $review->user_id = Auth::user()->id; //Auth::id()
        $review->save();

        return response()->json('Review is added');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $reviews = Review::where('business_id',$id)->paginate();

        return response()->json($reviews);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {

        $validator = Validator::make($request->all(),[
            'review' => 'required',
            'stars'  => 'required',
            'business_id'  => 'required',
        ]);

        if ($validator->fails()){
            return response()->json($validator->errors()->toJson(),400);
        }

        $review = Review::findOrFail($id);

        $review->review = $request->review;
        $review->stars = $request->stars;
        $review->business_id = $request->business_id;
        $review->user_id = Auth::user()->id; //Auth::id()
        $review->save();

        return response()->json('Review is updated');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $review = Review::findOrFail($id);
        $review->delete();

        return response()->json('Review has been deleted');
    }
}
