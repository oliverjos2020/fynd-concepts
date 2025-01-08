<div>
    {{-- <a href="/">
        <img src="logo/logo-blue.png" class="logo-img" alt="" style="max-height:120px;">
    </a> --}}
    <div class="main-register-wrap-x modal-x">
        <div class="reg-overlay-x"></div>
        <div class="main-register-holder tabs-act">
            @if ($step !== 3)
                <div class="main-register-wrapper modal_main-x fl-wrap" style="border: 1px solid #80808029;">

                    <div class="main-register">

                        <ul class="tabs-menu fl-wrap no-list-style">
                            <li @if ($step == 1) class="current" @endif><a
                                    wire:click="currentStep('1')"><i class="fal fa-sign-in-alt"></i> Login</a></li>
                            <li @if ($step == 2) class="current" @endif><a
                                    wire:click="currentStep('2')"><i class="fal fa-user-plus"></i> Register</a></li>
                            {{-- <li @if ($step == 3) class="current" @endif><a wire:click="currentStep('3')" ><i class="fal fa-user-plus"></i> OTP</a></li> --}}
                        </ul>

                        <!--tabs -->
                        <div class="tabs-container">
                            <div class="tab">
                                @if ($step == 1)
                                    <!--tab -->
                                    <div id="tab-1" class="tab-content first-tab">
                                        <div class="custom-form">
                                            <form wire:submit.prevent="login">
                                                <label>Email Address * <span class="dec-icon"><i class="fal fa-user"></i></span></label>
                                                <input name="email" type="text" wire:model="loginEmail">
                                                @error('loginEmail')
                                                        <label class="text-danger"> {{ $message }} </label>
                                                    @enderror
                                                <div class="pass-input-wrap fl-wrap">
                                                    <label>Password * <span class="dec-icon"><i class="fal fa-key"></i></span></label>
                                                    <input name="password" type="password" autocomplete="off" wire:model="loginPassword">
                                                    <span class="eye"><i class="fal fa-eye"></i> </span>
                                                </div>
                                                @error('loginPassword')
                                                    <label class="text-danger"> {{ $message }} </label>
                                                 @enderror

                                                <div class="lost_password">
                                                    <a href="/forgot-password">Lost Your Password?</a>
                                                </div>
                                                <div class="filter-tags">
                                                    <input id="check-a3" type="checkbox" wire:model="remember">
                                                    <label for="check-a3">Remember me</label>
                                                </div>
                                                <div class="clearfix"></div>
                                                <button type="submit" class="log_btn color-bg"> LogIn </button>
                                            </form>
                                        </div>
                                    </div>
                                    <!--tab end -->
                                    <!--tab -->
                                @elseif ($step == 2)
                                    <div class="tab">
                                        <div id="tab-2" class="tab-content">
                                            <div class="custom-form">
                                                <form method="post" class="main-register-form"
                                                    id="main-register-form2">
                                                    <label>Full Name * <span class="dec-icon"><i
                                                                class="fal fa-user"></i></span></label>
                                                    <input type="text" wire:model="name">
                                                    @error('role')
                                                        <label class="text-danger"> {{ $message }} </label>
                                                    @enderror
                                                    <label>Email Address * <span class="dec-icon"><i
                                                                class="fal fa-envelope"></i></span></label>
                                                    <input type="text" wire:model="email">
                                                    @error('email')
                                                        <label class="text-danger"> {{ $message }} </label>
                                                    @enderror
                                                    <label>Phone Number * <span class="dec-icon"><i
                                                                class="fal fa-phone"></i></span></label>
                                                    <input type="text" wire:model="phone_no">
                                                    @error('phone_no')
                                                        <label class="text-danger"> {{ $message }} </label>
                                                    @enderror
                                                    <label>Register As * <span class="dec-icon"><i
                                                                class="fal fa-user"></i></span></label>
                                                    {{-- <input name="number" type="text"> --}}
                                                    <select wire:model="role">
                                                        <option value="">Select an option</option>
                                                        <option value="2">Artisan (Business)</option>
                                                        <option value="3">User</option>
                                                    </select>
                                                    @error('role')
                                                        <label class="text-danger"> {{ $message }} </label>
                                                    @enderror
                                                    <div class="pass-input-wrap fl-wrap" style="margin-top:15px;">
                                                        <label>Password * <span class="dec-icon"><i
                                                                    class="fal fa-key"></i></span></label>
                                                        <input type="password" autocomplete="off" wire:model="password">
                                                        <span class="eye"><i class="fal fa-eye"></i> </span>
                                                    </div>
                                                    @error('password')
                                                        <label class="text-danger"> {{ $message }} </label>
                                                    @enderror
                                                    <div class="pass-input-wrap fl-wrap">
                                                        <label>Confirm Password* <span class="dec-icon"><i
                                                                    class="fal fa-key"></i></span></label>
                                                        <input wire:model="password_confirmation" type="password"
                                                            autocomplete="off">
                                                        <span class="eye"><i class="fal fa-eye"></i> </span>
                                                    </div>
                                                    @error('password_confirmation')
                                                        <label class="text-danger"> {{ $message }} </label>
                                                    @enderror
                                                    <div class="clearfix"></div>
                                                    <button type="submit" wire:click.prevent="register"
                                                        class="log_btn color-bg"> Register </button>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            @endif
            @if ($step == 3)
            <div class="otp-container">
                <h2>Enter OTP</h2>
                <div id="timer" class="timer">Time left: 1:00</div>
                <div class="otp-inputs">
                    <input type="text" maxlength="1" wire:model.lazy="otp.0" class="otp-input" autofocus>
                    <input type="text" maxlength="1" wire:model.lazy="otp.1" class="otp-input">
                    <input type="text" maxlength="1" wire:model.lazy="otp.2" class="otp-input">
                    <input type="text" maxlength="1" wire:model.lazy="otp.3" class="otp-input">
                    <input type="text" maxlength="1" wire:model.lazy="otp.4" class="otp-input">
                    <input type="text" maxlength="1" wire:model.lazy="otp.5" class="otp-input">
                </div>
                <button class="proceed-button" wire:click="submitOtp">Confirm OTP</button>
                <a id="resend-btn" class="resend-button" style="display: none; color: blue;" wire:click="resendOtp">Resend OTP</a>
            </div>

            <script>
                let countdown; // Store the interval ID globally to manage it

                function callTimer() {
                    const timerElement = document.getElementById("timer");
                    const resendButton = document.getElementById("resend-btn");
                    let timeLeft = 60; // Set timer duration in seconds

                    // Clear any existing timer before starting a new one
                    if (countdown) clearInterval(countdown);

                    // Display the timer and hide the resend button
                    timerElement.style.display = "block";
                    resendButton.style.display = "none";

                    // Start the countdown
                    countdown = setInterval(() => {
                        if (timeLeft <= 0) {
                            clearInterval(countdown);
                            timerElement.style.display = "none"; // Hide the timer
                            resendButton.style.display = "block"; // Show the resend button
                        } else {
                            const minutes = Math.floor(timeLeft / 60);
                            const seconds = timeLeft % 60;
                            timerElement.textContent = `Time left: ${minutes}:${seconds < 10 ? "0" : ""}${seconds}`;
                            timeLeft--;
                        }
                    }, 1000);
                }

                // Start the timer when the page loads
                // document.addEventListener("DOMContentLoaded", () => {
                    callTimer();

                    // Restart the timer when the "Resend OTP" button is clicked
                    document.getElementById("resend-btn").addEventListener("click", () => {
                        callTimer();
                    });
                // });

                // OTP input navigation logic
                document.querySelectorAll(".otp-input").forEach((input, index) => {
                    input.addEventListener("input", (e) => {
                        if (input.value.length === 1 && index < 5) {
                            // Move to the next input if a character is entered
                            document.querySelectorAll(".otp-input")[index + 1].focus();
                        } else if (input.value.length === 0 && index > 0) {
                            // Move to the previous input if the current one is cleared
                            document.querySelectorAll(".otp-input")[index - 1].focus();
                        }
                    });

                    // Move focus on arrow key navigation
                    input.addEventListener("keydown", (e) => {
                        if (e.key === "ArrowRight" && index < 5) {
                            document.querySelectorAll(".otp-input")[index + 1].focus();
                        }
                        if (e.key === "ArrowLeft" && index > 0) {
                            document.querySelectorAll(".otp-input")[index - 1].focus();
                        }
                    });
                });
            </script>

            @endif
        </div>
    </div>
</div>
