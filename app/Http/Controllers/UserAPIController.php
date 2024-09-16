<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Mail\SendOtpMail;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use Illuminate\Validation\Rules;
use Illuminate\Validation\ValidationException;
use Tymon\JWTAuth\Facades\JWTAuth;

class UserAPIController extends Controller
{
    public function register(Request $request)
    {
        try {
            $request->validate([
                'name' => ['required', 'string', 'max:255'],
                'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
                'phone_no' => ['required', 'max:15', 'unique:users'],
                'category_id' => ['required'],
                'workplace' => ['required'],
                'state' => ['required'],
                'gender' => ['required'],
                'expertise' => ['required'],
                'yrs_of_exp' => ['required'],
                'photo' => ['required'],
                'password' => ['required', 'confirmed', Rules\Password::defaults()],
            ]);

            $roleId = 2;

            $user = User::create([
                'name' => $request->name,
                'email' => $request->email,
                'phone_no' => $request->phone_no,
                'password' => Hash::make($request->password),
                'role_id' => $roleId,
                'category_id' => $request->category_id,
                'workplace' => $request->workplace,
                'state' => $request->state,
                'gender' => $request->gender,
                'expertise' => $request->expertise,
                'yrs_of_exp' => $request->yrs_of_exp,
                'photo' => $request->photo
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
                'errors' => $e->errors(),
                'code' => 422, // Adding the response code
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
                'password' => ['required', 'confirmed', Rules\Password::defaults()],
            ]);

            $roleId = 3;

            $user = User::create([
                'name' => $request->name,
                'email' => $request->email,
                'phone_no' => $request->phone_no,
                'password' => Hash::make($request->password),
                'role_id' => $roleId
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
                'errors' => $e->errors(),
                'code' => 422, // Adding the response code
            ], 422);
        }
    }

    public function login(Request $request)
    {
        // print_r($request);exit;
        try{
            $request->validate([
                'email' => ['required', 'email'],
                'password' => ['required']
            ]);

            if ($request->method() !== 'POST') {
                return response()->json(['error' => 'The request method is invalid. Please use POST.'], 405);
            }
            $credentials = $request->only('email', 'password');

            $user = User::where('email', $credentials['email'])->first();

            if (!$user) {
                return response()->json(['error' => 'Invalid credentials', 'code' => 401], 401);
            }

            if (is_null($user->email_verified_at)) {
                return response()->json(['error' => 'Account not verified. Please verify your account with the OTP sent to your email.', 'code' => 403], 403);
            }

            if (!$token = JWTAuth::attempt($credentials)) {
                return response()->json(['error' => 'Invalid credentials', 'code' => 401], 401);
            }

            return response()->json(['code' => 200, 'responseMessage' => 'success', 'token' => $token, 'user' => $user->only(['id', 'name', 'email', 'phone_no', 'passport'])]);
        } catch (ValidationException $e) {
            return response()->json([
                'errors' => $e->errors(),
                'code' => 422, // Adding the response code
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
                return response()->json(['message' => 'OTP confirmed successfully.', 'token' => $token, 'code' => 200], 200);
            }

            return response()->json(['error' => 'Invalid Email or OTP.', 'code' => 400], 400);
        } catch (ValidationException $e) {
            return response()->json([
                'errors' => $e->errors(),
                'code' => 422, // Adding the response code
            ], 422);
        }
    }

    public function generateOTP($length = 6)
    {
        return mt_rand(100000, 999999); // Generates a 6-digit OTP
    }
}
