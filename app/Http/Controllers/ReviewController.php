<?php

namespace App\Http\Controllers;

use Exception;
use App\Models\Review;
use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;

class ReviewController extends Controller
{
    public function create(Request $request)
    {
        try{
            $request->validate([
                'user_id' => ['required', 'exists:users,id'],
                'artisan_id' => ['required', 'exists:users,id'],
                'rating' => ['required', 'numeric', 'min:1','max:5'],
                'review' => ['required', 'string'],
            ]);

            Review::create([
                'user_id' => $request->user_id,
                'artisan_id' => $request->artisan_id,
                'rating' => $request->rating,
                'review' => $request->review,
            ]);

            return response()->json([
                'responseCode' => 201,
                'responseMessage' => 'Review posted successfully',
            ], 201);
        } catch (ValidationException $e) {
            return response()->json([
                'responseMessage' => $e->errors() ? array_values($e->errors())[0][0] : 'Validation failed',
                'responseCode' => 422,
            ], 422);
        }
    }
}
