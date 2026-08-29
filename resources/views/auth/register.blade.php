<x-guest-layout>

    <div class="auth-page">

        {{-- Decorative Background --}}
        <div class="auth-glow auth-glow-one"></div>
        <div class="auth-glow auth-glow-two"></div>


        <div class="auth-container auth-register-container">

            {{-- Register Card --}}
            <div class="auth-card">

                {{-- Brand --}}
                <div class="auth-brand">

                    <a href="{{ route('home') }}" class="auth-logo" aria-label="Areia Soft Home">
                        <img src="{{ asset('static/logos/logo.webp') }}" alt="Areia Soft" width="180" height="72">
                    </a>


                    <div class="auth-heading">

                        <span class="auth-eyebrow">
                            <i class="fa-solid fa-user-plus"></i>
                            Create Account
                        </span>

                        <h1>Join Areia Soft</h1>

                        <p>
                            Create your account and get started
                            with a better digital experience.
                        </p>

                    </div>

                </div>


                {{-- Validation Errors --}}
                <x-validation-errors class="auth-errors" />


                {{-- Registration Form --}}
                <form method="POST" action="{{ route('register') }}" class="auth-form">

                    @csrf


                    {{-- Name --}}
                    <div class="auth-field">

                        <label for="name">
                            <span>
                                <i class="fa-regular fa-user"></i>
                                {{ __('Full Name') }}
                            </span>
                        </label>


                        <div class="auth-input-wrapper">

                            <i class="fa-regular fa-user auth-input-icon"></i>

                            <input id="name" class="auth-input" type="text" name="name"
                                value="{{ old('name') }}" required autofocus autocomplete="name"
                                placeholder="Enter your full name">

                        </div>

                    </div>


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
                                value="{{ old('email') }}" required autocomplete="username"
                                placeholder="Enter your email address">

                        </div>

                    </div>


                    {{-- Password --}}
                    <div class="auth-field">

                        <label for="password">
                            <span>
                                <i class="fa-solid fa-lock"></i>
                                {{ __('Password') }}
                            </span>
                        </label>


                        <div class="auth-input-wrapper">

                            <i class="fa-solid fa-lock auth-input-icon"></i>

                            <input id="password" class="auth-input" type="password" name="password" required
                                autocomplete="new-password" placeholder="Create a secure password">


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

                            <input id="password_confirmation" class="auth-input" type="password"
                                name="password_confirmation" required autocomplete="new-password"
                                placeholder="Confirm your password">


                            <button type="button" class="password-toggle" data-target="password_confirmation"
                                aria-label="Show password" title="Show password">
                                <i class="fa-regular fa-eye"></i>
                            </button>

                        </div>

                    </div>


                    {{-- Password Hint --}}
                    <div class="password-hint">

                        <i class="fa-solid fa-shield-halved"></i>

                        <span>
                            Use a strong password with a combination
                            of letters, numbers, and symbols.
                        </span>

                    </div>


                    {{-- Terms & Privacy --}}
                    @if (Laravel\Jetstream\Jetstream::hasTermsAndPrivacyPolicyFeature())
                        <div class="terms-wrapper">

                            <label for="terms" class="terms-label">

                                <input type="checkbox" name="terms" id="terms" required class="terms-checkbox">


                                <span class="terms-text">

                                    {!! __('I agree to the :terms_of_service and :privacy_policy', [
                                        'terms_of_service' =>
                                            '<a target="_blank"
                                                                                                                        href="' .
                                            route('terms.conditions') .
                                            '"
                                                                                                                        class="terms-link">
                                                                                                                        ' .
                                            __('Terms of Service') .
                                            '
                                                                                                                    </a>',
                                    
                                        'privacy_policy' =>
                                            '<a target="_blank"
                                                                                                                        href="' .
                                            route('privacy.policy') .
                                            '"
                                                                                                                        class="terms-link">
                                                                                                                        ' .
                                            __('Privacy Policy') .
                                            '
                                                                                                                    </a>',
                                    ]) !!}

                                </span>

                            </label>

                        </div>
                    @endif


                    {{-- Register --}}
                    <button type="submit" class="auth-submit">

                        <span>
                            {{ __('Create Account') }}
                        </span>

                        <i class="fa-solid fa-arrow-right"></i>

                    </button>

                </form>


                {{-- Login --}}
                <div class="auth-login-link">

                    <span>
                        {{ __('Already have an account?') }}
                    </span>

                    <a href="{{ route('login') }}">

                        {{ __('Sign in') }}

                        <i class="fa-solid fa-arrow-right"></i>

                    </a>

                </div>


                {{-- Security --}}
                <div class="auth-security">

                    <i class="fa-solid fa-lock"></i>

                    <span>
                        Your information is securely encrypted
                    </span>

                </div>

            </div>

        </div>

    </div>


    @push('styles')
        <style>
            /* =========================================================
                       AREIA SOFT - REGISTER
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


            .auth-register-container {
                max-width: 480px;
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

                margin-bottom: 30px;
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
                max-width: 370px;

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

                gap: 18px;
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

                padding: 0 48px;

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

                margin-top: -4px;

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
                       TERMS & PRIVACY
                       ========================================================= */

            .terms-wrapper {
                margin-top: -1px;

                padding: 13px 14px;

                border: 1px solid rgba(255, 255, 255, 0.06);

                border-radius: 12px;

                background: rgba(255, 255, 255, 0.02);
            }


            .terms-label {
                display: flex;

                align-items: flex-start;

                gap: 10px;

                cursor: pointer;
            }


            .terms-checkbox {
                appearance: none;
                -webkit-appearance: none;

                width: 17px;
                height: 17px;

                flex: 0 0 17px;

                margin: 1px 0 0;

                border: 1px solid rgba(255, 255, 255, 0.18);

                border-radius: 5px;

                background: rgba(255, 255, 255, 0.035);

                cursor: pointer;

                position: relative;

                transition: var(--transition);
            }


            .terms-checkbox:hover {
                border-color: rgba(0, 229, 255, 0.5);
            }


            .terms-checkbox:checked {
                border-color: var(--cyan);

                background: var(--cyan);
            }


            .terms-checkbox:checked::after {
                content: "";

                position: absolute;

                left: 5px;
                top: 2px;

                width: 4px;
                height: 8px;

                border: solid #061017;

                border-width: 0 2px 2px 0;

                transform: rotate(45deg);
            }


            .terms-checkbox:focus-visible {
                outline: 2px solid rgba(0, 229, 255, 0.45);

                outline-offset: 2px;
            }


            .terms-text {
                color: var(--white-muted);

                font-size: 0.68rem;

                line-height: 1.6;
            }


            .terms-link {
                color: var(--cyan);

                text-decoration: none;

                font-weight: 600;

                transition: var(--transition);
            }


            .terms-link:hover {
                color: #6ff3ff;

                text-decoration: underline;
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
                       LOGIN LINK
                       ========================================================= */

            .auth-login-link {
                display: flex;

                align-items: center;
                justify-content: center;

                flex-wrap: wrap;

                gap: 6px;

                margin-top: 23px;

                color: var(--white-muted);

                font-size: 0.76rem;
            }


            .auth-login-link a {
                display: inline-flex;

                align-items: center;

                gap: 6px;

                color: var(--cyan);

                font-weight: 700;

                text-decoration: none;

                transition: var(--transition);
            }


            .auth-login-link a i {
                font-size: 0.65rem;

                transition:
                    transform 0.25s ease;
            }


            .auth-login-link a:hover {
                color: #6ff3ff;
            }


            .auth-login-link a:hover i {
                transform: translateX(3px);
            }


            /* =========================================================
                       SECURITY
                       ========================================================= */

            .auth-security {
                display: flex;

                align-items: center;
                justify-content: center;

                gap: 7px;

                margin-top: 22px;

                color: rgba(155, 161, 176, 0.65);

                font-size: 0.68rem;

                text-align: center;
            }


            .auth-security i {
                color: rgba(0, 229, 255, 0.65);

                font-size: 0.65rem;
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


                .password-hint,
                .terms-text {
                    font-size: 0.64rem;
                }


                .auth-submit {
                    height: 50px;
                }


                .auth-login-link {
                    font-size: 0.7rem;
                }

            }


            /* =========================================================
                       REDUCED MOTION
                       ========================================================= */

            @media (prefers-reduced-motion: reduce) {

                .auth-card *,
                .auth-submit,
                .password-toggle,
                .auth-login-link a,
                .auth-login-link a i {
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
