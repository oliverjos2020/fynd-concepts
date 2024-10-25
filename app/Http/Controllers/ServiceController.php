<?php

namespace App\Http\Controllers;

use App\Models\Service;
use Illuminate\Http\Request;

class ServiceController extends Controller
{
    public function services(Request $request)
    {
        try {
            // Get the search query and limit from the request
            $search = $request->input('search'); // Search for services
            $limit = $request->input('limit', 2); // Default limit is 20, but can be overridden

            // Start building the query
            $query = Service::query();

            // If there's a search, add a where clause for the 'service' column
            if ($search) {
                $query->where('service', 'like', '%' . $search . '%');
            }

            // Get the limited or default number of services
            $data = $query->limit($limit)->get();

            return response()->json([
                'responseCode' => 200,
                'responseMessage' => 'success',
                'data' => $data
            ], 200);
        } catch (Exception $e) {
            return response()->json([
                'responseMessage' => $e->getMessage(),
                'responseCode' => 422,
            ], 422);
        }
    }

}
