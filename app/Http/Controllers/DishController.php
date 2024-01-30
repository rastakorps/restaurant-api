<?php

namespace App\Http\Controllers;

use App\Http\Requests\DishRequest;
use App\Models\Dish;
use Illuminate\Http\Request;

class DishController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $dishes = Dish::all();
        return response()->json($dishes);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(DishRequest $request)
    {
        $dish = new Dish($request->input());
        $dish->save();

        return response()->json([
            'status' => true,
            'message' => 'Dish created successfully',
        ], 200);
    }

    /**
     * Display the specified resource.
     */
    public function show(Dish $dish)
    {
        return response()->json([
            'status' => true,
            'data' => $dish
        ], 200);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(DishRequest $request, Dish $dish)
    {
        $dish->update($request->input());

        return response()->json([
            'status' => true,
            'message' => 'Dish updated successfully',
        ], 200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Dish $dish)
    {
        $dish->delete();
        return response()->json([
            'status' => true,
            'message' => 'Dish delete successfully',
        ], 200);
    }
}
