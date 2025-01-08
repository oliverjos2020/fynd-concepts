<?php

namespace App\Http\Controllers;

use App\Models\Photo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class FileUploadAPIController extends Controller
{
    public function uploadFiles(Request $request)
    {
        try {
            // Check if 'files' is present and is an array
            if (!$request->hasFile('files') || !is_array($request->file('files'))) {
                return response()->json([
                    'responseCode' => 400,
                    'responseMessage' => 'No files uploaded or invalid format. Ensure files[] is used.'
                ], 400);
            }

            $paths = []; // Array to store file paths

            // Iterate through files
            foreach ($request->file('files') as $file) {
                if ($file->isValid()) {
                    // Generate unique filename
                    $filename = time() . '_' . $file->getClientOriginalName();

                    // Store the file in the 'uploads/mobile-uploads' directory
                    $path = $file->storeAs('uploads/mobile-uploads', $filename, 'public');

                    // Add file URL to paths array
                    $paths[] = Storage::url($path);
                }
            }

            if (empty($paths)) {
                return response()->json([
                    'responseCode' => 400,
                    'responseMessage' => 'No valid files uploaded.'
                ], 400);
            }

            // Return success response with file paths
            return response()->json([
                'responseCode' => 200,
                'responseMessage' => 'Files uploaded successfully',
                'data' => $paths
            ], 200);

        } catch (\Exception $e) {
            // Handle any errors
            return response()->json([
                'responseCode' => 500,
                'responseMessage' => 'File upload failed',
                'error' => $e->getMessage()
            ], 500);
        }
    }

    public function uploadFiles1(Request $request)
    {
        $request->validate([
            'files' => 'required',
            'files.*' => 'required|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $uploadedFiles = [];

        foreach ($request->file('files') as $file) {
            $fileName = time() . '.' . $file->getClientOriginalExtension();
            $filePath = $file->storeAs('public/uploads', $fileName);
            $uploadedFiles[] = asset('storage/' . $filePath);
        }

        return response()->json([
            'message' => 'Files uploaded successfully',
            'file_paths' => $uploadedFiles,
        ], 200);
    }
    public function workImages(Request $request)
    {
        try{
        $request->validate([
            'user_id' => 'required|exists:users,id',
            'url' =>  ['required', 'array'],
        ]);

        Photo::where('user_id', $request->user_id)->delete();
        foreach($request->url as $urls)
        {
            Photo::create([
                'user_id' => $request->user_id,
                'url' => $urls,
            ]);
        }

        return response()->json([
            'message' => 'Files uploaded successfully'
        ], 200);
    }catch(Exception $e){
        return response()->json([
            'error' => $e->getMessage()
        ], 500);
    }
    }

}
