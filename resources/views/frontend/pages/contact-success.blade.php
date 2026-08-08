<x-guest-layout title="Message Sent Successfully | Areia Soft">

    <style>
        /* ===============================
           Contact Success Page
        ================================ */

        .success-section {
            min-height: calc(100vh - 180px);
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 10rem 1.5rem 6rem;
        }

        .success-card {
            width: 100%;
            max-width: 760px;
            padding: 3.5rem 3rem;
            text-align: center;
            border-radius: 28px;
            position: relative;
            overflow: hidden;

            background: rgba(255, 255, 255, 0.04);
            border: 1px solid rgba(255, 255, 255, 0.08);
            backdrop-filter: blur(24px);
            -webkit-backdrop-filter: blur(24px);

            transition: .35s ease;
        }

        .success-card::before {
            content: "";
            position: absolute;
            inset: 0;
            background: linear-gradient(135deg,
                    rgba(255, 255, 255, .06),
                    transparent 60%);
            pointer-events: none;
        }

        .success-card:hover {
            transform: translateY(-6px);
            border-color: rgba(255, 255, 255, .15);
        }

        .success-icon {
            width: 96px;
            height: 96px;
            margin: 0 auto 2rem;

            display: flex;
            align-items: center;
            justify-content: center;

            border-radius: 50%;

            background: linear-gradient(135deg, #22c55e, #16a34a);
            color: #fff;

            box-shadow:
                0 0 25px rgba(34, 197, 94, .35),
                0 0 70px rgba(34, 197, 94, .18);
        }

        .success-icon svg {
            width: 46px;
            height: 46px;
        }

        .success-title {
            margin: 1rem 0;
            font-size: clamp(2rem, 4vw, 3rem);
            font-weight: 800;
            line-height: 1.15;
        }

        .success-text {
            max-width: 620px;
            margin: 0 auto;
            color: var(--text-secondary);
            line-height: 1.8;
            font-size: 1.05rem;
        }

        .success-actions {
            margin-top: 2.5rem;
            display: flex;
            justify-content: center;
            gap: 1rem;
            flex-wrap: wrap;
        }

        .success-actions a {
            min-width: 200px;
        }

        .success-note {
            margin-top: 2rem;
            font-size: .95rem;
            color: var(--text-muted);
        }

        @media (max-width:768px) {

            .success-section {
                padding: 8rem 1rem 4rem;
            }

            .success-card {
                padding: 2.5rem 1.5rem;
                border-radius: 22px;
            }

            .success-icon {
                width: 82px;
                height: 82px;
            }

            .success-icon svg {
                width: 38px;
                height: 38px;
            }

            .success-actions {
                flex-direction: column;
            }

            .success-actions a {
                width: 100%;
            }
        }
    </style>

    <section class="success-section">

        <div class="success-card">

            <div class="success-icon">
                <svg viewBox="0 0 24 24"
                    fill="none"
                    stroke="currentColor"
                    stroke-width="2.5"
                    stroke-linecap="round"
                    stroke-linejoin="round">
                    <circle cx="12" cy="12" r="10"></circle>
                    <path d="M8 12.5l2.5 2.5L16.5 9"></path>
                </svg>
            </div>

            <p class="section-label">
                Message Sent Successfully
            </p>

            <h1 class="success-title">
                Thank You for Contacting Areia Soft!
            </h1>

            <p class="success-text">
                We've successfully received your message. Our team will review your inquiry
                and respond as soon as possible. We appreciate your interest in Areia Soft
                and look forward to helping you build your next digital solution.
            </p>

            <div class="success-actions">

                <a href="{{ route('home') }}" class="btn-primary">
                    Back to Home
                </a>

                <a href="{{ route('service.index') }}" class="btn-secondary">
                    Explore Our Services
                </a>

            </div>

            <p class="success-note">
                Typical response time: <strong>within one business day.</strong>
            </p>

        </div>

    </section>

</x-guest-layout>