<x-guest-layout>

    <div class="auth-page">

        {{-- Decorative Background --}}
        <div class="auth-glow auth-glow-one"></div>
        <div class="auth-glow auth-glow-two"></div>


        <div class="auth-container">

            {{-- Two Factor Card --}}
            <div class="auth-card">

                {{-- Brand --}}
                <div class="auth-brand">

                    <a href="{{ route('home') }}" class="auth-logo" aria-label="Areia Soft Home">
                        <img src="{{ asset('static/logos/logo.webp') }}" alt="Areia Soft" width="180" height="72">
                    </a>


                    <div class="auth-heading">

                        <span class="auth-eyebrow">
                            <i class="fa-solid fa-shield-halved"></i>
                            Two-Factor Authentication
                        </span>

                        <h1>Verify your identity</h1>

                        <p>
                            Add an extra layer of security by
                            confirming your authentication code.
                        </p>

                    </div>

                </div>


                {{-- Alpine Two Factor Container --}}
                <div x-data="{ recovery: false }" class="two-factor-wrapper">

                    {{-- Authentication Code Message --}}
                    <div class="two-factor-message" x-show="! recovery">

                        <div class="two-factor-message-icon">
                            <i class="fa-solid fa-mobile-screen-button"></i>
                        </div>

                        <div>
                            <strong>
                                Authentication code
                            </strong>

                            <p>
                                {{ __('Please confirm access to your account by entering the authentication code provided by your authenticator application.') }}
                            </p>
                        </div>

                    </div>


                    {{-- Recovery Code Message --}}
                    <div class="two-factor-message" x-cloak x-show="recovery">

                        <div class="two-factor-message-icon">
                            <i class="fa-solid fa-key"></i>
                        </div>

                        <div>
                            <strong>
                                Recovery code
                            </strong>

                            <p>
                                {{ __('Please confirm access to your account by entering one of your emergency recovery codes.') }}
                            </p>
                        </div>

                    </div>


                    {{-- Validation Errors --}}
                    <x-validation-errors class="auth-errors" />


                    {{-- Two Factor Form --}}
                    <form method="POST" action="{{ route('two-factor.login') }}" class="auth-form">

                        @csrf


                        {{-- Authentication Code --}}
                        <div class="auth-field" x-show="! recovery">

                            <label for="code">

                                <span>
                                    <i class="fa-solid fa-shield-halved"></i>
                                    {{ __('Authentication Code') }}
                                </span>

                            </label>


                            <div class="auth-input-wrapper">

                                <i class="fa-solid fa-hashtag auth-input-icon"></i>

                                <input id="code" class="auth-input two-factor-input" type="text"
                                    inputmode="numeric" name="code" autofocus x-ref="code"
                                    autocomplete="one-time-code" placeholder="Enter your 6-digit code" maxlength="6">

                            </div>


                            <div class="two-factor-hint">

                                <i class="fa-solid fa-circle-info"></i>

                                <span>
                                    Enter the verification code
                                    from your authenticator app.
                                </span>

                            </div>

                        </div>


                        {{-- Recovery Code --}}
                        <div class="auth-field" x-cloak x-show="recovery">

                            <label for="recovery_code">

                                <span>
                                    <i class="fa-solid fa-key"></i>
                                    {{ __('Recovery Code') }}
                                </span>

                            </label>


                            <div class="auth-input-wrapper">

                                <i class="fa-solid fa-key auth-input-icon"></i>

                                <input id="recovery_code" class="auth-input two-factor-input" type="text"
                                    name="recovery_code" x-ref="recovery_code" autocomplete="one-time-code"
                                    placeholder="Enter your recovery code">

                            </div>


                            <div class="two-factor-hint">

                                <i class="fa-solid fa-triangle-exclamation"></i>

                                <span>
                                    Use one of the emergency recovery
                                    codes generated for your account.
                                </span>

                            </div>

                        </div>


                        {{-- Actions --}}
                        <div class="two-factor-actions">


                            {{-- Switch Authentication Code --}}
                            <button type="button" class="two-factor-switch" x-show="! recovery"
                                x-on:click="
                                    recovery = true;
                                    $nextTick(() => {
                                        $refs.recovery_code.focus()
                                    })
                                ">

                                <i class="fa-solid fa-key"></i>

                                <span>
                                    {{ __('Use a recovery code') }}
                                </span>

                            </button>


                            {{-- Switch Recovery Code --}}
                            <button type="button" class="two-factor-switch" x-cloak x-show="recovery"
                                x-on:click="
                                    recovery = false;
                                    $nextTick(() => {
                                        $refs.code.focus()
                                    })
                                ">

                                <i class="fa-solid fa-mobile-screen-button"></i>

                                <span>
                                    {{ __('Use an authentication code') }}
                                </span>

                            </button>


                            {{-- Login --}}
                            <button type="submit" class="auth-submit two-factor-submit">

                                <span>
                                    {{ __('Log in') }}
                                </span>

                                <i class="fa-solid fa-arrow-right"></i>

                            </button>

                        </div>

                    </form>


                    {{-- Security --}}
                    <div class="auth-security">

                        <i class="fa-solid fa-lock"></i>

                        <span>
                            Your authentication is protected with
                            two-factor security
                        </span>

                    </div>

                </div>

            </div>

        </div>

    </div>


    @push('styles')
        <style>
            /* =========================================================
                       AREIA SOFT - TWO FACTOR AUTHENTICATION
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
                max-width: 480px;

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
                       TWO FACTOR MESSAGE
                       ========================================================= */

            .two-factor-message {
                display: flex;

                align-items: flex-start;

                gap: 14px;

                margin-bottom: 22px;

                padding: 16px;

                border: 1px solid rgba(255, 255, 255, 0.07);

                border-radius: 15px;

                background:
                    rgba(255, 255, 255, 0.025);
            }


            .two-factor-message-icon {
                width: 42px;
                height: 42px;

                flex: 0 0 42px;

                display: flex;

                align-items: center;
                justify-content: center;

                border: 1px solid rgba(0, 229, 255, 0.16);

                border-radius: 11px;

                background:
                    rgba(0, 229, 255, 0.07);

                color: var(--cyan);

                font-size: 0.9rem;
            }


            .two-factor-message strong {
                display: block;

                margin: 1px 0 5px;

                color: var(--white-soft);

                font-size: 0.8rem;

                font-weight: 700;
            }


            .two-factor-message p {
                margin: 0;

                color: var(--white-muted);

                font-size: 0.73rem;

                line-height: 1.6;
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

                padding: 0 17px 0 46px;

                border: 1px solid rgba(255, 255, 255, 0.09);

                border-radius: 13px;

                outline: none;

                background: rgba(255, 255, 255, 0.035);

                color: var(--white);

                font-family: "Inter", sans-serif;

                font-size: 0.88rem;

                font-weight: 600;

                letter-spacing: 0.04em;

                transition: var(--transition);

                box-shadow:
                    inset 0 1px 0 rgba(255, 255, 255, 0.015);
            }


            .auth-input::placeholder {
                color: rgba(155, 161, 176, 0.55);

                font-weight: 500;

                letter-spacing: 0;
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
                       TWO FACTOR INPUT
                       ========================================================= */

            .two-factor-input {
                letter-spacing: 0.18em;

                font-size: 1rem;

                font-weight: 700;
            }


            /* =========================================================
                       HINT
                       ========================================================= */

            .two-factor-hint {
                display: flex;

                align-items: flex-start;

                gap: 7px;

                margin-top: 9px;

                color: rgba(155, 161, 176, 0.68);

                font-size: 0.68rem;

                line-height: 1.5;
            }


            .two-factor-hint i {
                flex-shrink: 0;

                margin-top: 2px;

                color: rgba(0, 229, 255, 0.65);

                font-size: 0.65rem;
            }


            /* =========================================================
                       ACTIONS
                       ========================================================= */

            .two-factor-actions {
                display: flex;

                align-items: center;

                gap: 14px;

                margin-top: 1px;
            }


            .two-factor-switch {
                flex: 1;

                min-height: 52px;

                display: inline-flex;

                align-items: center;
                justify-content: center;

                gap: 7px;

                padding: 0 14px;

                border: 1px solid rgba(255, 255, 255, 0.08);

                border-radius: 13px;

                background: rgba(255, 255, 255, 0.025);

                color: var(--white-muted);

                font-family: "Inter", sans-serif;

                font-size: 0.71rem;

                font-weight: 600;

                cursor: pointer;

                transition: var(--transition);
            }


            .two-factor-switch i {
                color: var(--cyan);

                font-size: 0.68rem;
            }


            .two-factor-switch:hover {
                border-color: rgba(0, 229, 255, 0.25);

                background: rgba(0, 229, 255, 0.045);

                color: var(--white);
            }


            .two-factor-submit {
                flex: 0 0 145px;

                margin: 0;

                height: 52px;
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


                .two-factor-actions {
                    flex-direction: column-reverse;

                    align-items: stretch;
                }


                .two-factor-switch,
                .two-factor-submit {
                    width: 100%;

                    flex: none;
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


                .two-factor-message {
                    padding: 14px;
                }


                .two-factor-message-icon {
                    width: 38px;
                    height: 38px;

                    flex-basis: 38px;
                }


                .two-factor-message p {
                    font-size: 0.69rem;
                }


                .two-factor-hint {
                    font-size: 0.64rem;
                }

            }


            /* =========================================================
                       REDUCED MOTION
                       ========================================================= */

            @media (prefers-reduced-motion: reduce) {

                .auth-card *,
                .two-factor-switch {
                    transition: none !important;
                }

            }
        </style>
    @endpush


    @push('scripts')
        <script>
            document.addEventListener('DOMContentLoaded', function() {

                /*
                 * Automatically format authentication code.
                 *
                 * This only affects the visible input and does not
                 * change the backend two-factor authentication flow.
                 */
                const codeInput =
                    document.getElementById('code');


                if (codeInput) {

                    codeInput.addEventListener(
                        'input',
                        function() {

                            this.value =
                                this.value
                                .replace(/\D/g, '')
                                .slice(0, 6);

                        }
                    );

                }

            });
        </script>
    @endpush

</x-guest-layout>
