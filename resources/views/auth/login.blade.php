<x-guest-layout>

    <div class="auth-page">
        <div class="auth-glow auth-glow-one"></div>
        <div class="auth-glow auth-glow-two"></div>

        <div class="auth-container">

            {{-- Login Card --}}
            <div class="auth-card">

                {{-- Brand --}}
                <div class="auth-brand">
                    <a href="{{ route('home') }}" class="auth-logo" aria-label="Areia Soft Home">
                        <img src="{{ asset('static/logos/logo.webp') }}" alt="Areia Soft" width="180" height="72">
                    </a>

                    <div class="auth-heading">
                        <span class="auth-eyebrow">
                            <i class="fa-solid fa-shield-halved"></i>
                            Secure Access
                        </span>

                        <h1>Welcome back</h1>

                        <p>
                            Sign in to continue to your Areia Soft account.
                        </p>
                    </div>
                </div>

                {{-- Validation Errors --}}
                <x-validation-errors class="auth-errors" />

                {{-- Session Status --}}
                @session('status')
                    <div class="auth-status">
                        <i class="fa-solid fa-circle-check"></i>
                        <span>{{ $value }}</span>
                    </div>
                @endsession

                {{-- Login Form --}}
                <form method="POST" action="{{ route('login') }}" class="auth-form">
                    @csrf

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
                                value="{{ old('email') }}" required autofocus autocomplete="username"
                                placeholder="Enter your email address" />
                        </div>
                    </div>

                    {{-- Password --}}
                    <div class="auth-field">
                        <div class="auth-label-row">
                            <label for="password">
                                <span>
                                    <i class="fa-solid fa-lock"></i>
                                    {{ __('Password') }}
                                </span>
                            </label>

                            @if (Route::has('password.request'))
                                <a href="{{ route('password.request') }}" class="auth-forgot">
                                    {{ __('Forgot password?') }}
                                </a>
                            @endif
                        </div>

                        <div class="auth-input-wrapper">
                            <i class="fa-solid fa-lock auth-input-icon"></i>

                            <input id="password" class="auth-input auth-password-input" type="password" name="password"
                                required autocomplete="current-password" placeholder="Enter your password" />

                            <button type="button" class="password-toggle" id="passwordToggle"
                                aria-label="Show password" title="Show password">
                                <i class="fa-regular fa-eye"></i>
                            </button>
                        </div>
                    </div>

                    {{-- Remember Me --}}
                    <div class="auth-options">
                        <label for="remember_me" class="remember-label">
                            <input id="remember_me" type="checkbox" name="remember">

                            <span class="custom-checkbox">
                                <i class="fa-solid fa-check"></i>
                            </span>

                            <span class="remember-text">
                                {{ __('Remember me') }}
                            </span>
                        </label>
                    </div>

                    {{-- Submit --}}
                    <button type="submit" class="auth-submit">
                        <span>{{ __('Log in') }}</span>
                        <i class="fa-solid fa-arrow-right"></i>
                    </button>

                </form>

                {{-- Bottom Security --}}
                <div class="auth-security">
                    <i class="fa-solid fa-lock"></i>
                    <span>Your connection is secure and encrypted</span>
                </div>

            </div>

        </div>
    </div>

    @push('styles')
        <style>
            /* =========================================================
                       AREIA SOFT AUTHENTICATION
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

            /* Decorative glow */
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
                background: linear-gradient(90deg,
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
                margin-bottom: 34px;
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
                margin: 0 0 8px;
                color: var(--white);
                font-size: 2rem;
                line-height: 1.15;
                font-weight: 800;
                letter-spacing: -0.045em;
            }

            .auth-heading p {
                margin: 0;
                color: var(--white-muted);
                font-size: 0.9rem;
                line-height: 1.6;
            }

            /* =========================================================
                       VALIDATION / STATUS
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

            .auth-status {
                display: flex;
                align-items: center;
                gap: 9px;
                margin-bottom: 22px;
                padding: 12px 14px;
                border: 1px solid rgba(74, 222, 128, 0.18);
                border-radius: 12px;
                background: rgba(34, 197, 94, 0.08);
                color: #86efac;
                font-size: 0.82rem;
            }

            .auth-status i {
                font-size: 0.85rem;
            }

            /* =========================================================
                       FORM
                       ========================================================= */

            .auth-form {
                display: flex;
                flex-direction: column;
                gap: 21px;
            }

            .auth-field {
                width: 100%;
            }

            .auth-field label,
            .auth-label-row label {
                display: block;
                margin-bottom: 8px;
                color: var(--white-soft);
                font-size: 0.78rem;
                font-weight: 600;
            }

            .auth-field label span,
            .auth-label-row label span {
                display: inline-flex;
                align-items: center;
                gap: 7px;
            }

            .auth-field label i,
            .auth-label-row label i {
                color: var(--cyan);
                font-size: 0.72rem;
            }

            .auth-label-row {
                display: flex;
                align-items: center;
                justify-content: space-between;
                gap: 15px;
            }

            .auth-label-row label {
                margin-bottom: 8px;
            }

            .auth-forgot {
                color: var(--cyan-dim);
                font-size: 0.74rem;
                font-weight: 600;
                text-decoration: none;
                transition: var(--transition);
            }

            .auth-forgot:hover {
                color: var(--cyan);
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
                box-shadow: inset 0 1px 0 rgba(255, 255, 255, 0.015);
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

            .auth-input:focus+.password-toggle {
                color: var(--cyan);
            }

            .auth-input-wrapper:focus-within .auth-input-icon {
                color: var(--cyan);
            }

            /* Remove browser autofill ugly background */
            .auth-input:-webkit-autofill,
            .auth-input:-webkit-autofill:hover,
            .auth-input:-webkit-autofill:focus {
                -webkit-text-fill-color: var(--white);
                -webkit-box-shadow:
                    0 0 0 1000px rgba(13, 21, 32, 0.95) inset,
                    0 0 0 3px rgba(0, 229, 255, 0.05);
                transition: background-color 5000s ease-in-out 0s;
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
                       REMEMBER
                       ========================================================= */

            .auth-options {
                margin-top: -2px;
            }

            .remember-label {
                display: inline-flex !important;
                align-items: center;
                gap: 9px;
                margin: 0 !important;
                cursor: pointer;
                user-select: none;
            }

            .remember-label input {
                position: absolute;
                opacity: 0;
                pointer-events: none;
            }

            .custom-checkbox {
                width: 17px;
                height: 17px;
                flex: 0 0 17px;
                display: flex;
                align-items: center;
                justify-content: center;
                border: 1px solid rgba(255, 255, 255, 0.16);
                border-radius: 5px;
                background: rgba(255, 255, 255, 0.035);
                transition: var(--transition);
            }

            .custom-checkbox i {
                opacity: 0;
                color: #061017;
                font-size: 0.58rem;
                transform: scale(0.5);
                transition: var(--transition);
            }

            .remember-label input:checked+.custom-checkbox {
                border-color: var(--cyan);
                background: var(--cyan);
                box-shadow: 0 0 14px rgba(0, 229, 255, 0.22);
            }

            .remember-label input:checked+.custom-checkbox i {
                opacity: 1;
                transform: scale(1);
            }

            .remember-text {
                color: var(--white-muted);
                font-size: 0.77rem;
                font-weight: 500;
            }

            .remember-label:hover .remember-text {
                color: var(--white-soft);
            }

            /* =========================================================
                       SUBMIT
                       ========================================================= */

            .auth-submit {
                width: 100%;
                height: 52px;
                margin-top: 2px;
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
                transition: transform 0.25s ease;
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
                       SECURITY
                       ========================================================= */

            .auth-security {
                display: flex;
                align-items: center;
                justify-content: center;
                gap: 7px;
                margin-top: 25px;
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
                    font-size: 1.75rem;
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
                    font-size: 1.6rem;
                }

                .auth-label-row {
                    align-items: flex-start;
                }

                .auth-forgot {
                    font-size: 0.7rem;
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
                .custom-checkbox {
                    transition: none !important;
                }
            }
        </style>
    @endpush

    @push('scripts')
        <script>
            document.addEventListener('DOMContentLoaded', function() {
                const passwordInput = document.getElementById('password');
                const passwordToggle = document.getElementById('passwordToggle');

                if (passwordInput && passwordToggle) {
                    passwordToggle.addEventListener('click', function() {
                        const isPassword = passwordInput.type === 'password';

                        passwordInput.type = isPassword ? 'text' : 'password';

                        const icon = this.querySelector('i');

                        if (isPassword) {
                            icon.classList.remove('fa-eye');
                            icon.classList.add('fa-eye-slash');

                            this.setAttribute('aria-label', 'Hide password');
                            this.setAttribute('title', 'Hide password');
                        } else {
                            icon.classList.remove('fa-eye-slash');
                            icon.classList.add('fa-eye');

                            this.setAttribute('aria-label', 'Show password');
                            this.setAttribute('title', 'Show password');
                        }
                    });
                }
            });
        </script>
    @endpush

</x-guest-layout>
