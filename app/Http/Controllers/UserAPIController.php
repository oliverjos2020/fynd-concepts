<?php

namespace App\Http\Controllers;

use Exception;
use App\Models\User;
use App\Models\Review;
use App\Mail\SendOtpMail;
use App\Models\DeviceToken;
use Illuminate\Http\Request;
use Illuminate\Validation\Rules;
use Tymon\JWTAuth\Facades\JWTAuth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Password;
use Tymon\JWTAuth\Exceptions\JWTException;
use Illuminate\Validation\ValidationException;
use Tymon\JWTAuth\Exceptions\TokenInvalidException;

class UserAPIController extends Controller
{
    public function register(Request $request)
    {
        try {
            $request->validate([
                'name' => ['required', 'string', 'max:255'],
                'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
                'state' => ['required'],
                // 'phone_no' => ['required', 'max:15', 'unique:users'],
                // 'category_id' => ['required'],
                // 'workplace' => ['required'],

                // 'gender' => ['required'],
                // 'expertise' => ['required'],
                // 'yrs_of_exp' => ['required'],
                // 'photo' => ['required'],
                'password' => ['required', 'confirmed', Rules\Password::defaults()]
            ]);

            $roleId = 2;

            $user = User::create([
                'name' => $request->name,
                'email' => $request->email,
                'state' => $request->state,
                'password' => Hash::make($request->password),
                'role_id' => $roleId

                // 'phone_no' => $request->phone_no,
                // 'gender' => $request->gender,
                // 'category_id' => $request->category_id,
                // 'workplace' => $request->workplace,

                // 'expertise' => $request->expertise,
                // 'yrs_of_exp' => $request->yrs_of_exp,
                // 'photo' => $request->photo
            ]);

            $otp = $this->generateOTP();

            // Save OTP to the user's record (assuming you have a column in the users table for this)
            $user->otp = $otp;
            $user->save();

            Mail::to($user->email)->send(new SendOtpMail($otp, $request->name));

            return response()->json([
                'responseCode' => 201,
                'responseMessage' => 'Account Created and OTP sent successfully'
            ], 201);
        } catch (ValidationException $e) {
            return response()->json([
                'responseMessage' => $e->errors() ? array_values($e->errors())[0][0] : 'Validation failed',
                'responseCode' => 422, // Adding the response code
            ], 422);
        }
    }

    public function registerUser(Request $request)
    {
        try {
            $request->validate([
                'name' => ['required', 'string', 'max:255'],
                'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
                'phone_no' => ['required', 'max:15', 'unique:users'],
                'role_id' => ['required'],
                'state_id' => ['required'],
                'password' => ['required', 'confirmed', Rules\Password::defaults()],
            ]);

            // $roleId = 3;

            $user = User::create([
                'name' => $request->name,
                'email' => $request->email,
                'phone_no' => $request->phone_no,
                'password' => Hash::make($request->password),
                'role_id' => $request->role_id,
                'state_id' => $request->state_id
            ]);

            $otp = $this->generateOTP();

            // Save OTP to the user's record (assuming you have a column in the users table for this)
            $user->otp = $otp;
            $user->save();

            Mail::to($user->email)->send(new SendOtpMail($otp, $request->name));

            return response()->json([
                'responseCode' => 201,
                'responseMessage' => 'Account Created and OTP sent successfully'
            ], 201);
        } catch (ValidationException $e) {
            return response()->json([
                'responseMessage' => $e->errors() ? array_values($e->errors())[0][0] : 'Validation failed',
                'responseCode' => 422, // Adding the response code
            ], 422);
        }
    }

    public function login(Request $request)
    {
        // print_r($request);exit;
        try {
            $request->validate([
                'email' => ['required', 'email'],
                'password' => ['required'],
                'device_token' => ['required']
            ]);

            if ($request->method() !== 'POST') {
                return response()->json(['responseMessage' => 'The request method is invalid. Please use POST.', 'responseCode' => 405], 405);
            }
            $credentials = $request->only('email', 'password');

            $user = User::with([
                'photos',
                'service' => function ($myquery) {
                    $myquery->select('id', 'service'); // Include 'id' or the relevant foreign key
                },
                'state',
                'lga'])->where('email', $credentials['email'])->first();

            if (!$user) {
                return response()->json(['responseMessage' => 'Invalid credentials', 'responseCode' => 401], 401);
            }

            if (is_null($user->email_verified_at)) {
                return response()->json(['responseMessage' => 'Account not verified. Please verify your account with the OTP sent to your email.', 'responseCode' => 403], 403);
            }

            if (!$token = JWTAuth::attempt($credentials)) {
                return response()->json(['responseMessage' => 'Invalid credentials', 'responseCode' => 401], 401);
            }

            DeviceToken::updateOrCreate(
                ['device_token' => $request->device_token], // Match on device token
                ['user_id' => $user->id]           // Update the user ID
            );
            return response()->json(['responseCode' => 200, 'responseMessage' => 'success', 'token' => $token, 'user' => $user]);
        } catch (ValidationException $e) {
            return response()->json([
                'responseMessage' => $e->errors() ? array_values($e->errors())[0][0] : 'Validation failed',
                'responseCode' => 422, // Adding the response code
            ], 422);
        }
    }

    public function confirmOtp(Request $request)
    {
        try {
            $request->validate([
                'email' => 'required|email',
                'otp' => 'required|string'
            ]);

            $user = User::where('email', $request->email)->where('otp', $request->otp)->first();

            if ($user) {
                // OTP is correct, you can now mark the user as verified or proceed further
                $user->otp = null; // Clear the OTP
                $user->email_verified_at = now();
                $user->save();
                $token = JWTAuth::fromUser($user);
                return response()->json(['responseMessage' => 'OTP confirmed successfully.', 'token' => $token, 'responseCode' => 200], 200);
            }

            return response()->json(['responseMessage' => 'Invalid Email or OTP.', 'responseCode' => 400], 400);
        } catch (ValidationException $e) {
            return response()->json([
                'responseMessage' => $e->errors() ? array_values($e->errors())[0][0] : 'Validation failed',
                'responseCode' => 422, // Adding the response code
            ], 422);
        }
    }

    public function generateOTP($length = 6)
    {
        return mt_rand(100000, 999999); // Generates a 6-digit OTP
    }

    public function updateUser(Request $request)
    {
        try {
            $request->validate([
                'email' => 'required|email',
                'phone_no' => 'required',
                'gender' => 'required',
            ]);
        } catch (ValidationException $e) {
            return response()->json([
                'responseMessage' => $e->errors(),
                'responseCode' => 422, // Adding the response code
            ], 422);
        }
    }

    public function refresh()
    {
        try {
            // Check if a token is present in the request
            if (!$token = JWTAuth::getToken()) {
                return response()->json([
                    'responseMessage' => 'Token not provided',
                    'responseCode' => 400
                ], 400);
            }

            // Refresh the token and return it
            $newToken = JWTAuth::refresh($token);

            return response()->json([
                'token' => $newToken,
            ]);
        } catch (TokenInvalidException $e) {
            return response()->json([
                'responseMessage' => 'Token is invalid',
                'responseCode' => 401
            ], 401);
        } catch (JWTException $e) {
            return response()->json([
                'responseMessage' => 'Could not refresh token',
                'responseCode' => 500
            ], 500);
        } catch (Exception $e) {
            return response()->json([
                'responseMessage' => $e->getMessage() ? array_values($e->errors())[0][0] : 'Validation failed',
                'responseCode' => 500
            ], 500);
        }
    }
    public function logout()
    {
        JWTAuth::invalidate(JWTAuth::getToken());

        return response()->json(['responseMessage' => 'User logged out successfully']);
    }

    public function getUser(Request $request)
    {
        try {
            $request->validate([
                'email' => 'required|email'
            ]);

            $getUser = User::where('email', $request->email)->first();
            $loggedInUserId = $getUser->id;

            // Get the limited or default number of services
            $data = User::where('email', $request->email)->where('role_id', 2)
            ->where('is_profile_complete', 1)
            ->with(['favorites' => function ($query) use ($loggedInUserId) {
                if ($loggedInUserId) {
                    $query->where('user_id', $loggedInUserId);
                }
            }])->first();
            $data->each(function ($artisan) use ($loggedInUserId) {
                $artisan->is_favorite = $loggedInUserId && $artisan->favorites->isNotEmpty();
            });


            if (!$data) {
                return response()->json(['responseMessage' => 'User with email not found', 'responseCode' => 404], 404);
            }

            $data->rating = Review::where('artisan_id', $data->id)->avg('rating');
            // $data->review = Review::where('artisan_id', $data->id)->with('user')->get();
            $data->review = Review::where('artisan_id', $data->id)
            ->with('user')
            ->get()
            ->map(function ($review) {
                return [
                    'id' => $review->id,
                    'user' => $review->user->name, // Replace user_id with username
                    'artisan_id' => $review->artisan_id,
                    'rating' => $review->rating,
                    'review' => $review->review,
                    'created_at' => $review->created_at,
                    'updated_at' => $review->updated_at,
                ];
            });

            return response()->json([
                'responseCode' => 200,
                'responseMessage' => 'success',
                'data' => $data
            ], 200);
        } catch (Exception $e) {
            return response()->json([
                'responseMessage' => $e->getMessage() ? array_values($e->errors())[0][0] : 'Validation failed',
                'responseCode' => 422,
            ], 422);
        }
    }

    public function forgotPassword(Request $request)
    {
        try{
            $request->validate(['email' => 'required|email']);

            $status = Password::sendResetLink(
                $request->only('email')
            );

            return $status === Password::RESET_LINK_SENT
                        ? response()->json(['responseMessage' => __($status), 'responseCode' => 200], 200)
                        : response()->json(['responseMessage' => __($status), 'responseCode' => 400], 400);

        } catch (ValidationException $e) {
            return response()->json([
                'responseMessage' => $e->errors() ? array_values($e->errors())[0][0] : 'Validation failed',
                'responseCode' => 422,
            ], 422);
        }
    }
}
