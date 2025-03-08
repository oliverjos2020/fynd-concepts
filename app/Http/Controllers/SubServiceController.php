<?php

namespace App\Http\Controllers;

use App\Models\SubService;
use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;

class SubServiceController extends Controller
{
    public function index(Request $request){
        try {
            $request->validate([
                'service_id' => ['required']
            ]);
            // Get the search query and limit from the request
            $search = $request->input('search'); // Search for services
            $service_id = $request->input('service_id');
            $limit = $request->input('limit', 50); // Default limit is 20, but can be overridden

            // Start building the query
            $query = SubService::query();

            // If there's a search, add a where clause for the 'service' column
            if ($search) {
                $query->where('sub_category', 'like', '%' . $search . '%');
            }

            // Get the limited or default number of services
            $data = $query->where('service_id', $service_id)->limit($limit)->get();

            return response()->json([
                'responseCode' => 200,
                'responseMessage' => 'success',
                'data' => $data
            ], 200);
        } catch (ValidationException $e) {
            return response()->json([
                'responseMessage' => $e->errors() ? array_values($e->errors())[0][0] : 'Validation failed',
                'responseCode' => 422,
            ], 422);
        }
    }
}
