<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Review;
use App\Models\Favorite;
use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;

class FavoriteAPIController extends Controller
{
    public function create(Request $request)
    {
        try{
            $request->validate([
                'user_id' => ['required', 'exists:users,id'],
                'artisan_id' => ['required', 'exists:users,id']
            ]);

            $checkFavorite  = Favorite::where('user_id', $request->user_id)->where('artisan_id', $request->artisan_id)->first();
            if($checkFavorite){
                return response()->json([
                    'responseCode' => 422,
                    'responseMessage' => 'Artisan has already been added to favorites',
                ], 422);
            }
            Favorite::create([
                'user_id' => $request->user_id,
                'artisan_id' => $request->artisan_id
            ]);
            return response()->json([
                'responseCode' => 200,
                'responseMessage' => 'Artisan added to favorites',
            ], 200);


        } catch (ValidationException $e) {
            return response()->json([
                'responseMessage' => $e->errors(),
                'responseCode' => 422,
            ], 422);
        }
    }

    public function remove(Request $request)
    {
        try{
            $request->validate([
                'user_id' => ['required', 'exists:users,id'],
                'artisan_id' => ['required', 'exists:users,id']
            ]);
            Favorite::where('user_id', $request->user_id)->where('artisan_id', $request->artisan_id)->delete();
            return response()->json([
                'responseCode' => 200,
                'responseMessage' => 'Artisan removed from favorite',
            ], 200);
        } catch (ValidationException $e) {
            return response()->json([
                'responseMessage' => $e->errors(),
                'responseCode' => 422,
            ], 422);
        }
    }

    public function myFavorites(Request $request)
    {
        try{
            $request->validate([
                'user_id' => ['required', 'exists:users,id']
            ]);
            $loggedInUserId = $request->user_id;
            $artisanIds = Favorite::where('user_id', $request->user_id)  // Assuming the current user is the one adding favorites
            ->pluck('artisan_id');  // Get an array of artisan_ids
            // dd($artisanIds);
            $favorites = User::with([
                'photos',
                'service' => function ($myquery) {
                    $myquery->select('id', 'service'); // Include 'id' or the relevant foreign key
                },
                'state',
                'lga'])->whereIn('id', $artisanIds)->get();

                $favorites->each(function ($artisan) {
                    $artisan->rating = round(Review::where('artisan_id', $artisan->id)->avg('rating'), 2);
                });


            return response()->json([
                'responseCode' => 200,
                'responseMessage' => 'Success',
                'data' => $favorites
            ], 200);
        } catch (ValidationException $e) {
            return response()->json([
                'responseMessage' => $e->errors(),
                'responseCode' => 422,
            ], 422);
        }
    }
}
