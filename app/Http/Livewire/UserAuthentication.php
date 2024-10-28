<?php

namespace App\Http\Livewire;

// use Rules\Password;
use App\Models\User;
use Livewire\Component;
use App\Mail\SendOtpMail;
use Illuminate\Validation\Rules;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Auth\Events\Registered;
use App\Providers\RouteServiceProvider;
use Illuminate\Validation\ValidationException;

class UserAuthentication extends Component
{
    public $step = 1;
    public $name;
    public $email;
    public $phone_no;
    public $role;
    public $password;
    public $password_confirmation;
    public $otp = [];
    public $loginEmail;
    public $loginPassword;
    public $remember = false;

    public function register()
    {
        try{
            $this->validate([
                'name' => ['required', 'string', 'max:255'],
                'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
                'phone_no' => ['required', 'max:15', 'unique:users'],
                'role' => ['required'],
                'password' => ['required', 'confirmed', Rules\Password::defaults()],
            ]);

            $user = User::create([
                'name' => $this->name,
                'email' => $this->email,
                'phone_no' => $this->phone_no,
                'password' => Hash::make($this->password),
                'role_id' => $this->role
            ]);

            $otp = $this->generateOTP();
            $user->otp = $otp;
            $user->save();

            Mail::to($user->email)->send(new SendOtpMail($otp, $this->name));
            $this->step = 3;
            $this->dispatchBrowserEvent('notify', [
                'type' => 'success',
                'message' => 'An OTP has been sent to your email',
            ]);

        }catch (Exception $e){
            $this->dispatchBrowserEvent('notify', [
                'type' => 'error',
                'message' => $e->getMessage(),
            ]);
            return;
        }
    }

    public function login()
    {
        try {
            $this->validate([
                'loginEmail' => ['required','email'],
                'loginPassword' => ['required'],
            ]);

            if (Auth::attempt(['email' => $this->loginEmail, 'password' => $this->loginPassword], $this->remember)) {
                $user = User::where('email', $this->loginEmail)->first();
                if ($user->role_id == 1) {
                    return redirect(RouteServiceProvider::HOME); // Redirect to dashboard for admin
                } elseif ($user->role_id == 2) {
                    return redirect(RouteServiceProvider::ARTISANDASHBOARD); // Redirect to homepage for others
                }else{
                    return redirect(RouteServiceProvider::HOMEUSER);
                }
                return redirect()->route('home');
            } else {
                throw ValidationException::withMessages([
                    'loginEmail' => ['The provided credentials are incorrect.'],
                ]);
            }
        } catch (Exception $e) {
            $this->dispatchBrowserEvent('notify', [
                'type' => 'error',
                'message' => $e->getMessage(),
            ]);
            return;
        }
    }
    // public function updatedOtp($value)
    // {
    //     // Prevent the property from exceeding 6 characters
    //     if (strlen($value) > 6) {
    //         $this->otp = substr($value, 0, 6);
    //     }
    // }
    public function submitOtp()
    {
        try {
            // Combine the individual OTP inputs into a single string
            $this->otp = implode('', array_filter([
                (string)($this->otp[0] ?? null),
                (string)($this->otp[1] ?? null),
                (string)($this->otp[2] ?? null),
                (string)($this->otp[3] ?? null),
                (string)($this->otp[4] ?? null),
                (string)($this->otp[5] ?? null),
            ], function ($value) {
                // Only filter out null or empty values, keep 0
                return $value !== null && $value !== '';
            }));
            // dd($this->otp);

            // Validate the combined OTP
            $this->validate([
                'otp' => ['required','min:6'], // Must be exactly 6 digits
            ]);

            $user = User::where('otp', $this->otp)->first();
            if ($user) {
                // OTP is correct, you can now mark the user as verified or proceed further
                $user->otp = null; // Clear the OTP
                $user->email_verified_at = now();
                $user->save();

            $this->dispatchBrowserEvent('notify', [
                'type' => 'success',
                'message' => 'Account Confirmed Successfully',
            ]);
            event(new Registered($user));

            Auth::login($user);

            if ($user->role_id == 3) {
                return redirect(RouteServiceProvider::HOMEUSER); // Redirect to dashboard for admin
            } elseif($user->role_id == 2) {
                return redirect(RouteServiceProvider::ARTISANDASHBOARD); // Redirect to homepage for others
            }
        }else{
            $this->dispatchBrowserEvent('notify', [
                'type' => 'error',
                'message' => 'Invalid OTP Provided',
            ]);
            return;
        }

        } catch (ValidationException $e) {
            // Dispatch error notification to the browser
            $this->dispatchBrowserEvent('notify', [
                'type' => 'error',
                'message' => 'OTP must be exactly 6 digits.',
            ]);
            return; // Exit the method after dispatching the error
        }
    }


    public function generateOTP($length = 6)
    {
        return mt_rand(100000, 999999); // Generates a 6-digit OTP
    }
    public function currentStep($level)
    {
        $this->step = $level;
    }

    public function render()
    {
        return view('livewire.user-authentication')->layout('components.home.home-master');
        // return view('livewire.home.sign-in')->layout('components.home.home-master');
    }
}
