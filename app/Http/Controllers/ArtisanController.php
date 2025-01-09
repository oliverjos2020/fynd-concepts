<?php

namespace App\Http\Controllers;

use Exception;
use App\Models\User;
use App\Models\LGA;
use App\Models\Review;
use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;

class ArtisanController extends Controller
{
    public function artisans(Request $request)
    {
        try {
            // Default limit
        $loggedInUserId = $request->input('user_id');
        $limit = $request->input('limit', 20);

            // Query builder
         $query = User::with([
            'photos',
            'service' => function ($myquery) {
                $myquery->select('id', 'service'); // Include 'id' or the relevant foreign key
            },
            'state',
            'lga',
            'favorites' => function ($myquery) use ($loggedInUserId) {
                $myquery->where('user_id', $loggedInUserId);
            }
        ])
        ->where('role_id', 2)->where('is_profile_complete', 1)->where('status', 1);

            // Apply filters
            if ($request->has('service_id')) {
                $query->where('service_id', $request->input('service_id'));
            }
            if ($request->has('subservice_id')) {
                $query->where('subservice_id', $request->input('subservice_id'));
            }
            if ($request->has('lga_id')) {
                $query->where('lga_id', $request->input('lga_id'));
            }
            if ($request->has('state_id')) {
                $query->where('state_id', $request->input('state_id'));
            }

            // Get the results with the limit
            $data = $query->limit($limit)->get();

            // Calculate average rating for each artisan
            $data->each(function ($artisan) {
                $artisan->rating = round(Review::where('artisan_id', $artisan->id)->avg('rating'), 2);
            });
            // $data->each(function ($artisan) use ($loggedInUserId) {
            //     $artisan->is_favorite = $loggedInUserId && $artisan->favorites->isNotEmpty();
            // });
            $data->each(function ($artisan) {
                $artisan->is_favorite = $artisan->favorites->isNotEmpty();
            });

            return response()->json([
                'responseCode' => 200,
                'responseMessage' => 'success',
                'data' => $data
            ], 200);
        } catch (Exception $e) {
            return response()->json([
                'errors' => $e->getMessage(),
                'responseCode' => 422,
            ], 422);
        }
    }

    public function AllLGA(Request $request)
    {
        try {
            // Default limit
            $limit = $request->input('limit', 20);

            // Query builder
         $query = LGA::query();

            // Apply filters
            if ($request->has('state_id')) {
                $query->where('state_id', $request->input('state_id'));
            }
            $data = $query->limit($limit)->get();

            return response()->json([
                'responseCode' => 200,
                'responseMessage' => 'success',
                'data' => $data
            ], 200);
        } catch (Exception $e) {
            return response()->json([
                'errors' => $e->getMessage(),
                'responseCode' => 422,
            ], 422);
        }
    }

    public function allState()
    {
       $state =  State::all();
       return response()->json([
                'responseCode' => 200,
                'responseMessage' => 'Profile updated successfully',
                'data' => $state
            ], 200);

    }
    public function updateProfile(Request $request)
    {
        // try{
            // Validation with user-friendly messages
            $request->validate([
                'email' => ['required', 'email'],
                'business_name' => ['required', 'string', 'max:255'],
                'work_phone_no' => ['required', 'string'],
                'state_id' => ['required', 'exists:states,id'],
                'lga_id' => ['required', 'exists:l_g_a_s,id'],
                'service_id' => ['required', 'exists:services,id'],
                'subservice_id' => ['required', 'exists:sub_services,id'],
                'yrs_of_expertise' => ['required'],
                'work_address' => ['required'],
                'bio' => ['required'],
                'passport' => ['required'],
                'document' => ['required']
            ], [
                'email.required' => 'Email is required.',
                'email.email' => 'Please provide a valid email address.',
            ]);

            // Update User
            $userUpdated = User::where('email', $request->email)->update([
                'business_name' => $request->business_name,
                'work_phone_no' => $request->work_phone_no,
                'work_address' => $request->work_address,
                'state_id' => $request->state_id,
                'lga_id' => $request->lga_id,
                'service_id' => $request->service_id,
                'subservice_id' => $request->subservice_id,
                'yrs_of_expertise' => $request->yrs_of_expertise,
                'bio' => $request->bio,
                'is_profile_complete' => 1,
                'passport' => $request->passport,
                'id_doc' => $request->document
            ]);

            // Check Update Result
            if (!$userUpdated) {
                return response()->json(['responseMessage' => 'User with email not found', 'responseCode' => 404], 404);
            }

            return response()->json([
                'responseCode' => 200,
                'responseMessage' => 'Profile updated successfully',
            ], 200);
        // }catch(Exception $e) {
        //     return response()->json(['responseMessage' => $e->getMessage(), 'responseCode' => 500], 500);
        // }
    }

}


