<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Business;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class BusinessController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $businesses = Business::paginate(10);
        return response()->json($businesses);
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
            'name' => 'required',
            'user_id' => 'required',
            'opening_hours'  => 'required'
        ]);

        if ($validator->fails()){
            return response()->json($validator->errors()->toJson());
        }

        Business::create(array_merge($validator->validated()));
        return response()->json('business is added');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
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
        $business = Business::findOrFail($id);

        $validator = Validator::make($request->all(),[
            'name' => 'required',
            'user_id' => 'required',
            'opening_hours'  => 'required'
        ]);

        if ($validator->fails()){
            return response()->json($validator->errors()->toJson());
        }

        $business->update(array_merge($validator->validated()));
        return response()->json('business is updated');


    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $business = Business::findOrFail($id);
        $business->delete();

        return response()->json('business is deleted');
    }
}
