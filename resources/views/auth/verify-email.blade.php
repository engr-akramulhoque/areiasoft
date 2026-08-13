<x-guest-layout>

    <div class="auth-page">

        {{-- Decorative Background --}}
        <div class="auth-glow auth-glow-one"></div>
        <div class="auth-glow auth-glow-two"></div>


        <div class="auth-container">

            {{-- Verification Card --}}
            <div class="auth-card">

                {{-- Brand --}}
                <div class="auth-brand">

                    <a href="{{ route('home') }}" class="auth-logo" aria-label="Areia Soft Home">
                        <img src="{{ asset('static/logos/logo.png') }}" alt="Areia Soft" width="180" height="72">
                    </a>


                    <div class="auth-heading">

                        <span class="auth-eyebrow">
                            <i class="fa-solid fa-envelope-circle-check"></i>
                            Email Verification
                        </span>

                        <h1>Verify your email</h1>

                        <p>
                            One quick step before you continue.
                            Please verify your email address to secure
                            your Areia Soft account.
                        </p>

                    </div>

                </div>


                {{-- Verification Success Message --}}
                @if (session('status') == 'verification-link-sent')
                    <div class="auth-status">

                        <i class="fa-solid fa-circle-check"></i>

                        <span>
                            {{ __('A new verification link has been sent to the email address you provided in your profile settings.') }}
                        </span>

                    </div>
                @endif


                {{-- Verification Information --}}
                <div class="verification-info">

                    <div class="verification-icon">

                        <i class="fa-solid fa-envelope-open-text"></i>

                    </div>

                    <div class="verification-content">

                        <h3>
                            Check your inbox
                        </h3>

                        <p>
                            We've sent a verification link to your
                            registered email address. Click the link
                            in that email to verify your account.
                        </p>

                    </div>

                </div>


                {{-- Resend Verification --}}
                <form method="POST" action="{{ route('verification.send') }}" class="verification-form">
                    @csrf

                    <button type="submit" class="auth-submit">

                        <span>
                            {{ __('Resend Verification Email') }}
                        </span>

                        <i class="fa-solid fa-paper-plane"></i>

                    </button>

                </form>


                {{-- Account Actions --}}
                <div class="verification-actions">

                    <a href="{{ route('profile.show') }}" class="verification-action">

                        <i class="fa-regular fa-user"></i>

                        <span>
                            {{ __('Edit Profile') }}
                        </span>

                    </a>


                    <span class="verification-divider"></span>


                    <form method="POST" action="{{ route('logout') }}">
                        @csrf

                        <button type="submit" class="verification-action verification-logout">

                            <i class="fa-solid fa-right-from-bracket"></i>

                            <span>
                                {{ __('Log Out') }}
                            </span>

                        </button>

                    </form>

                </div>


                {{-- Security --}}
                <div class="auth-security">

                    <i class="fa-solid fa-shield-halved"></i>

                    <span>
                        Verify your email to keep your account secure
                    </span>

                </div>

            </div>

        </div>

    </div>


    @push('styles')
        <style>
            /* =========================================================
                   AREIA SOFT - EMAIL VERIFICATION
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
                   SUCCESS MESSAGE
                   ========================================================= */

            .auth-status {
                display: flex;

                align-items: flex-start;

                gap: 9px;

                margin-bottom: 20px;

                padding: 12px 14px;

                border: 1px solid rgba(74, 222, 128, 0.18);

                border-radius: 12px;

                background: rgba(34, 197, 94, 0.08);

                color: #86efac;

                font-size: 0.78rem;

                line-height: 1.55;
            }


            .auth-status i {
                flex-shrink: 0;

                margin-top: 2px;

                font-size: 0.85rem;
            }


            /* =========================================================
                   VERIFICATION INFORMATION
                   ========================================================= */

            .verification-info {
                display: flex;

                align-items: flex-start;

                gap: 15px;

                margin-bottom: 22px;

                padding: 18px;

                border: 1px solid rgba(255, 255, 255, 0.07);

                border-radius: 16px;

                background:
                    rgba(255, 255, 255, 0.025);
            }


            .verification-icon {
                width: 43px;
                height: 43px;

                flex: 0 0 43px;

                display: flex;

                align-items: center;
                justify-content: center;

                border: 1px solid rgba(0, 229, 255, 0.16);

                border-radius: 12px;

                background:
                    rgba(0, 229, 255, 0.07);

                color: var(--cyan);

                font-size: 0.95rem;
            }


            .verification-content {
                min-width: 0;
            }


            .verification-content h3 {
                margin: 1px 0 5px;

                color: var(--white-soft);

                font-size: 0.82rem;

                font-weight: 700;
            }


            .verification-content p {
                margin: 0;

                color: var(--white-muted);

                font-size: 0.73rem;

                line-height: 1.6;
            }


            /* =========================================================
                   RESEND FORM
                   ========================================================= */

            .verification-form {
                width: 100%;
            }


            .auth-submit {
                width: 100%;

                height: 52px;

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
                   ACCOUNT ACTIONS
                   ========================================================= */

            .verification-actions {
                display: flex;

                align-items: center;
                justify-content: center;

                gap: 13px;

                margin-top: 23px;

                padding-top: 21px;

                border-top: 1px solid rgba(255, 255, 255, 0.06);
            }


            .verification-actions form {
                margin: 0;
            }


            .verification-action {
                display: inline-flex;

                align-items: center;

                gap: 7px;

                padding: 5px 0;

                border: 0;

                background: transparent;

                color: var(--white-muted);

                font-family: "Inter", sans-serif;

                font-size: 0.75rem;

                font-weight: 600;

                text-decoration: none;

                cursor: pointer;

                transition: var(--transition);
            }


            .verification-action i {
                font-size: 0.7rem;
            }


            .verification-action:hover {
                color: var(--cyan);
            }


            .verification-logout:hover {
                color: #fca5a5;
            }


            .verification-divider {
                width: 3px;
                height: 3px;

                flex: 0 0 3px;

                border-radius: 50%;

                background:
                    rgba(155, 161, 176, 0.35);
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


                .verification-info {
                    padding: 15px;
                }


                .verification-icon {
                    width: 39px;
                    height: 39px;

                    flex-basis: 39px;
                }


                .verification-content p {
                    font-size: 0.7rem;
                }


                .verification-actions {
                    gap: 9px;
                }


                .verification-action {
                    font-size: 0.7rem;
                }

            }


            /* =========================================================
                   REDUCED MOTION
                   ========================================================= */

            @media (prefers-reduced-motion: reduce) {

                .auth-card *,
                .auth-submit,
                .verification-action {
                    transition: none !important;
                }

            }
        </style>
    @endpush

</x-guest-layout>
