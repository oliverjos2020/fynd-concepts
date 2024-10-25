<?php

namespace App\Http\Controllers;

use Exception;
use App\Models\User;
use Illuminate\Http\Request;

class ArtisanController extends Controller
{
    public function artisans(Request $request)
    {
        try {
            // Default limit
            $limit = $request->input('limit', 20);

            // Query builder
            // $query = Vehicle::with('photos');
            $query = User::with(['photos']);

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
}
