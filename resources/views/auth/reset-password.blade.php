<x-guest-layout>

    <div class="auth-page">

        {{-- Decorative Background --}}
        <div class="auth-glow auth-glow-one"></div>
        <div class="auth-glow auth-glow-two"></div>


        <div class="auth-container">

            {{-- Reset Password Card --}}
            <div class="auth-card">

                {{-- Brand --}}
                <div class="auth-brand">

                    <a href="{{ route('home') }}" class="auth-logo" aria-label="Areia Soft Home">
                        <img src="{{ asset('static/logos/logo.webp') }}" alt="Areia Soft" width="180" height="72">
                    </a>

                    <div class="auth-heading">

                        <span class="auth-eyebrow">
                            <i class="fa-solid fa-shield-halved"></i>
                            Secure Password Reset
                        </span>

                        <h1>Reset your password</h1>

                        <p>
                            Create a new secure password for your
                            Areia Soft account.
                        </p>

                    </div>

                </div>

                {{-- Validation Errors --}}
                <x-validation-errors class="auth-errors" />

                {{-- Reset Password Form --}}
                <form method="POST" action="{{ route('password.update') }}" class="auth-form">

                    @csrf


                    {{-- Password Reset Token --}}
                    <input type="hidden" name="token" value="{{ $request->route('token') }}">


                    {{-- Email --}}
                    <div class="auth-field">

                        <label for="email">
                            <span>
                                <i class="fa-regular fa-envelope"></i>
                                {{ __('Email Address') }}
                            </span>
                        </label>


                        <div class="auth-input-wrapper">

                            <i class="fa-regular fa-envelope auth-input-icon"></i>

                            <input id="email" class="auth-input" type="email" name="email"
                                value="{{ old('email', $request->email) }}" required autofocus autocomplete="username"
                                placeholder="Enter your email address">

                        </div>

                    </div>


                    {{-- New Password --}}
                    <div class="auth-field">

                        <label for="password">
                            <span>
                                <i class="fa-solid fa-lock"></i>
                                {{ __('New Password') }}
                            </span>
                        </label>


                        <div class="auth-input-wrapper">

                            <i class="fa-solid fa-lock auth-input-icon"></i>

                            <input id="password" class="auth-input auth-password-input" type="password" name="password"
                                required autocomplete="new-password" placeholder="Enter your new password">


                            <button type="button" class="password-toggle" data-target="password"
                                aria-label="Show password" title="Show password">
                                <i class="fa-regular fa-eye"></i>
                            </button>

                        </div>

                    </div>


                    {{-- Confirm Password --}}
                    <div class="auth-field">

                        <label for="password_confirmation">
                            <span>
                                <i class="fa-solid fa-circle-check"></i>
                                {{ __('Confirm Password') }}
                            </span>
                        </label>


                        <div class="auth-input-wrapper">

                            <i class="fa-solid fa-lock auth-input-icon"></i>

                            <input id="password_confirmation" class="auth-input auth-password-input" type="password"
                                name="password_confirmation" required autocomplete="new-password"
                                placeholder="Confirm your new password">


                            <button type="button" class="password-toggle" data-target="password_confirmation"
                                aria-label="Show password" title="Show password">
                                <i class="fa-regular fa-eye"></i>
                            </button>

                        </div>

                    </div>


                    {{-- Password Hint --}}
                    <div class="password-hint">

                        <i class="fa-solid fa-circle-info"></i>

                        <span>
                            Use a strong password that you don't use
                            anywhere else.
                        </span>

                    </div>


                    {{-- Submit --}}
                    <button type="submit" class="auth-submit">

                        <span>
                            {{ __('Reset Password') }}
                        </span>

                        <i class="fa-solid fa-arrow-right"></i>

                    </button>

                </form>


                {{-- Back to Login --}}
                <div class="auth-back-login">

                    <a href="{{ route('login') }}">

                        <i class="fa-solid fa-arrow-left"></i>

                        <span>
                            {{ __('Back to login') }}
                        </span>

                    </a>

                </div>


                {{-- Security --}}
                <div class="auth-security">

                    <i class="fa-solid fa-lock"></i>

                    <span>
                        Your connection is secure and encrypted
                    </span>

                </div>

            </div>

        </div>

    </div>


    @push('styles')
        <style>
            /* =========================================================
                           AREIA SOFT - RESET PASSWORD
                           ========================================================= */

            .auth-page {
                min-height: 100vh;
                min-height: 100dvh;

                position: relative;

                display: flex;
                align-items: center;
                justify-content: center;

                padding: 110px 20px 50px;

                overflow: hidden;
            }


            /* =========================================================
                           DECORATIVE GLOW
                           ========================================================= */

            .auth-glow {
                position: fixed;

                width: 420px;
                height: 420px;

                border-radius: 50%;

                pointer-events: none;

                filter: blur(100px);

                z-index: -1;
            }


            .auth-glow-one {
                top: 10%;
                left: -180px;

                background: rgba(0, 229, 255, 0.08);
            }


            .auth-glow-two {
                bottom: -180px;
                right: -150px;

                background: rgba(0, 184, 212, 0.07);
            }


            /* =========================================================
                           CONTAINER
                           ========================================================= */

            .auth-container {
                width: 100%;
                max-width: 460px;

                position: relative;

                z-index: 2;
            }


            /* =========================================================
                           CARD
                           ========================================================= */

            .auth-card {
                position: relative;

                width: 100%;

                padding: 42px;

                background:
                    linear-gradient(145deg,
                        rgba(255, 255, 255, 0.055),
                        rgba(255, 255, 255, 0.018));

                border: 1px solid rgba(255, 255, 255, 0.09);

                border-radius: 26px;

                backdrop-filter: blur(24px);
                -webkit-backdrop-filter: blur(24px);

                box-shadow:
                    0 30px 80px rgba(0, 0, 0, 0.45),
                    inset 0 1px 0 rgba(255, 255, 255, 0.04);

                overflow: hidden;
            }


            .auth-card::before {
                content: "";

                position: absolute;

                top: 0;
                left: 8%;
                right: 8%;

                height: 1px;

                background:
                    linear-gradient(90deg,
                        transparent,
                        rgba(0, 229, 255, 0.7),
                        transparent);
            }


            .auth-card::after {
                content: "";

                position: absolute;

                width: 180px;
                height: 180px;

                top: -120px;
                right: -100px;

                border-radius: 50%;

                background: rgba(0, 229, 255, 0.06);

                filter: blur(30px);

                pointer-events: none;
            }


            /* =========================================================
                           BRAND
                           ========================================================= */

            .auth-brand {
                text-align: center;

                margin-bottom: 32px;
            }


            .auth-logo {
                display: inline-flex;

                align-items: center;
                justify-content: center;

                text-decoration: none;

                margin-bottom: 22px;
            }


            .auth-logo img {
                width: 170px;

                height: auto;

                max-height: 68px;

                object-fit: contain;

                display: block;
            }


            /* =========================================================
                           HEADING
                           ========================================================= */

            .auth-heading {
                text-align: center;
            }


            .auth-eyebrow {
                display: inline-flex;

                align-items: center;

                gap: 7px;

                padding: 6px 11px;

                margin-bottom: 13px;

                border: 1px solid rgba(0, 229, 255, 0.16);

                border-radius: 50px;

                background: rgba(0, 229, 255, 0.055);

                color: var(--cyan);

                font-size: 0.68rem;

                font-weight: 700;

                text-transform: uppercase;

                letter-spacing: 0.11em;
            }


            .auth-eyebrow i {
                font-size: 0.65rem;
            }


            .auth-heading h1 {
                margin: 0 0 9px;

                color: var(--white);

                font-size: 1.95rem;

                line-height: 1.15;

                font-weight: 800;

                letter-spacing: -0.045em;
            }


            .auth-heading p {
                max-width: 360px;

                margin: 0 auto;

                color: var(--white-muted);

                font-size: 0.87rem;

                line-height: 1.65;
            }


            /* =========================================================
                           VALIDATION
                           ========================================================= */

            .auth-errors {
                margin: 0 0 22px !important;

                padding: 13px 15px;

                border: 1px solid rgba(248, 113, 113, 0.2);

                border-radius: 12px;

                background: rgba(239, 68, 68, 0.08);

                color: #fca5a5;

                font-size: 0.82rem;
            }


            /* =========================================================
                           FORM
                           ========================================================= */

            .auth-form {
                display: flex;

                flex-direction: column;

                gap: 20px;
            }


            .auth-field {
                width: 100%;
            }


            .auth-field label {
                display: block;

                margin-bottom: 8px;

                color: var(--white-soft);

                font-size: 0.78rem;

                font-weight: 600;
            }


            .auth-field label span {
                display: inline-flex;

                align-items: center;

                gap: 7px;
            }


            .auth-field label i {
                color: var(--cyan);

                font-size: 0.72rem;
            }


            /* =========================================================
                           INPUT
                           ========================================================= */

            .auth-input-wrapper {
                position: relative;

                width: 100%;
            }


            .auth-input-icon {
                position: absolute;

                top: 50%;
                left: 16px;

                transform: translateY(-50%);

                color: var(--white-muted);

                font-size: 0.85rem;

                pointer-events: none;

                transition: var(--transition);

                z-index: 2;
            }


            .auth-input {
                width: 100%;

                height: 52px;

                padding: 0 46px;

                border: 1px solid rgba(255, 255, 255, 0.09);

                border-radius: 13px;

                outline: none;

                background: rgba(255, 255, 255, 0.035);

                color: var(--white);

                font-family: "Inter", sans-serif;

                font-size: 0.86rem;

                font-weight: 500;

                transition: var(--transition);

                box-shadow:
                    inset 0 1px 0 rgba(255, 255, 255, 0.015);
            }


            .auth-input::placeholder {
                color: rgba(155, 161, 176, 0.55);
            }


            .auth-input:hover {
                border-color: rgba(255, 255, 255, 0.15);

                background: rgba(255, 255, 255, 0.045);
            }


            .auth-input:focus {
                border-color: rgba(0, 229, 255, 0.55);

                background: rgba(0, 229, 255, 0.035);

                box-shadow:
                    0 0 0 3px rgba(0, 229, 255, 0.08),
                    0 0 25px rgba(0, 229, 255, 0.05);
            }


            .auth-input-wrapper:focus-within .auth-input-icon {
                color: var(--cyan);
            }


            /* =========================================================
                           AUTOFILL
                           ========================================================= */

            .auth-input:-webkit-autofill,
            .auth-input:-webkit-autofill:hover,
            .auth-input:-webkit-autofill:focus {

                -webkit-text-fill-color: var(--white);

                -webkit-box-shadow:
                    0 0 0 1000px rgba(13, 21, 32, 0.95) inset,
                    0 0 0 3px rgba(0, 229, 255, 0.05);

                transition:
                    background-color 5000s ease-in-out 0s;
            }


            /* =========================================================
                           PASSWORD TOGGLE
                           ========================================================= */

            .password-toggle {
                position: absolute;

                top: 50%;
                right: 14px;

                width: 30px;
                height: 30px;

                transform: translateY(-50%);

                display: flex;

                align-items: center;
                justify-content: center;

                padding: 0;

                border: 0;

                background: transparent;

                color: var(--white-muted);

                cursor: pointer;

                border-radius: 7px;

                transition: var(--transition);
            }


            .password-toggle:hover {
                color: var(--cyan);

                background: rgba(0, 229, 255, 0.08);
            }


            .password-toggle:focus-visible {
                outline: 1px solid var(--cyan);

                outline-offset: 2px;
            }


            /* =========================================================
                           PASSWORD HINT
                           ========================================================= */

            .password-hint {
                display: flex;

                align-items: flex-start;

                gap: 8px;

                margin-top: -5px;

                padding: 10px 12px;

                border: 1px solid rgba(255, 255, 255, 0.06);

                border-radius: 10px;

                background: rgba(255, 255, 255, 0.025);

                color: rgba(155, 161, 176, 0.7);

                font-size: 0.68rem;

                line-height: 1.5;
            }


            .password-hint i {
                flex-shrink: 0;

                margin-top: 2px;

                color: rgba(0, 229, 255, 0.65);

                font-size: 0.7rem;
            }


            /* =========================================================
                           SUBMIT
                           ========================================================= */

            .auth-submit {
                width: 100%;

                height: 52px;

                margin-top: 1px;

                padding: 0 20px;

                display: flex;

                align-items: center;

                justify-content: center;

                gap: 11px;

                border: 1px solid var(--cyan);

                border-radius: 13px;

                background: var(--cyan);

                color: #061017;

                font-family: "Inter", sans-serif;

                font-size: 0.85rem;

                font-weight: 800;

                letter-spacing: 0.01em;

                cursor: pointer;

                transition: var(--transition);

                box-shadow:
                    0 8px 25px rgba(0, 229, 255, 0.12);
            }


            .auth-submit i {
                font-size: 0.78rem;

                transition:
                    transform 0.25s ease;
            }


            .auth-submit:hover {
                background: #35eaff;

                border-color: #35eaff;

                transform: translateY(-2px);

                box-shadow:
                    0 14px 35px rgba(0, 229, 255, 0.22),
                    0 0 25px rgba(0, 229, 255, 0.1);
            }


            .auth-submit:hover i {
                transform: translateX(4px);
            }


            .auth-submit:active {
                transform: translateY(0);
            }


            .auth-submit:focus-visible {
                outline: 2px solid var(--cyan);

                outline-offset: 3px;
            }


            /* =========================================================
                           BACK TO LOGIN
                           ========================================================= */

            .auth-back-login {
                display: flex;

                justify-content: center;

                margin-top: 22px;
            }


            .auth-back-login a {
                display: inline-flex;

                align-items: center;

                gap: 8px;

                color: var(--white-muted);

                font-size: 0.78rem;

                font-weight: 600;

                text-decoration: none;

                transition: var(--transition);
            }


            .auth-back-login a i {
                font-size: 0.7rem;

                transition:
                    transform 0.25s ease;
            }


            .auth-back-login a:hover {
                color: var(--cyan);
            }


            .auth-back-login a:hover i {
                transform: translateX(-3px);
            }


            /* =========================================================
                           SECURITY
                           ========================================================= */

            .auth-security {
                display: flex;

                align-items: center;

                justify-content: center;

                gap: 7px;

                margin-top: 23px;

                color: rgba(155, 161, 176, 0.65);

                font-size: 0.68rem;
            }


            .auth-security i {
                color: rgba(0, 229, 255, 0.65);

                font-size: 0.65rem;
            }


            /* =========================================================
                           RESPONSIVE
                           ========================================================= */

            @media (max-width: 600px) {

                .auth-page {
                    padding: 95px 16px 35px;

                    align-items: flex-start;
                }


                .auth-container {
                    margin-top: 20px;
                }


                .auth-card {
                    padding: 32px 24px;

                    border-radius: 22px;
                }


                .auth-heading h1 {
                    font-size: 1.7rem;
                }


                .auth-logo img {
                    width: 155px;
                }

            }


            @media (max-width: 400px) {

                .auth-page {
                    padding-left: 12px;

                    padding-right: 12px;
                }


                .auth-card {
                    padding: 28px 19px;
                }


                .auth-heading h1 {
                    font-size: 1.55rem;
                }


                .auth-heading p {
                    font-size: 0.82rem;
                }


                .password-hint {
                    font-size: 0.64rem;
                }


                .auth-submit {
                    height: 50px;
                }

            }


            /* =========================================================
                           REDUCED MOTION
                           ========================================================= */

            @media (prefers-reduced-motion: reduce) {

                .auth-card *,
                .auth-submit,
                .auth-input,
                .password-toggle,
                .auth-back-login a,
                .auth-back-login a i {
                    transition: none !important;
                }

            }
        </style>
    @endpush


    @push('scripts')
        <script>
            document.addEventListener('DOMContentLoaded', function() {

                /*
                 * Password visibility toggles
                 */
                const passwordToggles =
                    document.querySelectorAll('.password-toggle');


                passwordToggles.forEach(function(toggle) {

                    toggle.addEventListener('click', function() {

                        const targetId =
                            this.getAttribute('data-target');

                        const input =
                            document.getElementById(targetId);

                        if (!input) {
                            return;
                        }


                        const icon =
                            this.querySelector('i');


                        const isPassword =
                            input.type === 'password';


                        input.type =
                            isPassword ? 'text' : 'password';


                        if (isPassword) {

                            icon.classList.remove('fa-eye');

                            icon.classList.add('fa-eye-slash');

                            this.setAttribute(
                                'aria-label',
                                'Hide password'
                            );

                            this.setAttribute(
                                'title',
                                'Hide password'
                            );

                        } else {

                            icon.classList.remove('fa-eye-slash');

                            icon.classList.add('fa-eye');

                            this.setAttribute(
                                'aria-label',
                                'Show password'
                            );

                            this.setAttribute(
                                'title',
                                'Show password'
                            );

                        }

                    });

                });

            });
        </script>
    @endpush

</x-guest-layout>
