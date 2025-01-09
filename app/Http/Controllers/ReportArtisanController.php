<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ReportArtisan;
use Illuminate\Validation\ValidationException;

class ReportArtisanController extends Controller
{
    public function create(Request $request)
    {
        try{
            $request->validate([
                'user_id' => ['required', 'exists:users,id'],
                'artisan_id' => ['required', 'exists:users,id'],
                'message' => ['required']
            ]);


            ReportArtisan::create([
                'user_id' => $request->user_id,
                'artisan_id' => $request->artisan_id,
                'message' => $request->message
            ]);
            return response()->json([
                'responseCode' => 200,
                'responseMessage' => 'Report recieved successfully',
            ], 200);


        } catch (ValidationException $e) {
            return response()->json([
                'responseMessage' => $e->errors() ? array_values($e->errors())[0][0] : 'Validation failed',
                'responseCode' => 422,
            ], 422);
        }
    }
}
