<x-guest-layout>

    <style>
        /* =========================================================
           LANDING PAGE
        ========================================================= */

        .landing-page {
            --lp-border: rgba(255, 255, 255, 0.10);
            --lp-border-hover: rgba(255, 255, 255, 0.20);
            --lp-muted: rgba(255, 255, 255, 0.66);
            --lp-muted-light: rgba(255, 255, 255, 0.48);
            --lp-surface: rgba(255, 255, 255, 0.045);
            --lp-surface-hover: rgba(255, 255, 255, 0.075);
            --lp-radius: 22px;
            --lp-radius-sm: 14px;
            --lp-max: 1180px;
        }

        .landing-page *,
        .landing-page *::before,
        .landing-page *::after {
            box-sizing: border-box;
        }

        .landing-page .container {
            width: min(var(--lp-max), calc(100% - 45px));
            margin: 0 auto;
        }


        /* =========================================================
           HERO
        ========================================================= */

        .landing-hero {
            position: relative;
            overflow: hidden;
            padding: 105px 0 95px;
        }

        .landing-hero::before {
            content: "";
            position: absolute;
            width: 650px;
            height: 650px;
            top: -360px;
            right: -180px;
            border-radius: 50%;
            background: rgba(255, 255, 255, 0.035);
            filter: blur(40px);
            pointer-events: none;
        }

        .landing-hero::after {
            content: "";
            position: absolute;
            width: 420px;
            height: 420px;
            bottom: -300px;
            left: -180px;
            border-radius: 50%;
            background: rgba(255, 255, 255, 0.025);
            filter: blur(45px);
            pointer-events: none;
        }

        .landing-hero-grid {
            position: relative;
            z-index: 2;
            display: grid;
            grid-template-columns: minmax(0, 1.02fr) minmax(420px, 0.98fr);
            align-items: center;
            gap: 70px;
        }

        .landing-hero-content {
            position: relative;
            z-index: 3;
        }

        .landing-eyebrow {
            display: inline-flex;
            align-items: center;
            gap: 11px;
            margin-bottom: 24px;
            color: rgba(255, 255, 255, 0.62);
            font-size: 12px;
            font-weight: 800;
            letter-spacing: 0.16em;
            line-height: 1;
            text-transform: uppercase;
        }

        .landing-eyebrow::before {
            content: "";
            width: 34px;
            height: 1px;
            background: currentColor;
            opacity: 0.8;
        }

        .landing-hero h1 {
            max-width: 760px;
            margin: 0;
            font-size: clamp(43px, 5.2vw, 72px);
            line-height: 1.025;
            letter-spacing: -0.045em;
            font-weight: 700;
        }

        .landing-hero-description {
            max-width: 650px;
            margin: 27px 0 0;
            color: var(--lp-muted);
            font-size: 18px;
            line-height: 1.78;
        }


        /* =========================================================
           HERO ACTIONS
        ========================================================= */

        .landing-actions {
            display: flex;
            flex-wrap: wrap;
            align-items: center;
            gap: 13px;
            margin-top: 34px;
        }

        .landing-actions a {
            min-height: 52px;
            padding: 0 23px;
            border-radius: 12px;
            text-decoration: none;
            font-size: 14px;
            font-weight: 700;
            letter-spacing: -0.01em;
            transition:
                transform 0.25s ease,
                background 0.25s ease,
                border-color 0.25s ease,
                box-shadow 0.25s ease;
        }

        .landing-actions a:hover {
            transform: translateY(-3px);
        }

        .landing-actions .btn-primary {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            gap: 10px;
            border: 1px solid rgba(255, 255, 255, 0.16);
            background: #fff;
            color: #111;
            box-shadow: 0 12px 35px rgba(0, 0, 0, 0.16);
        }

        .landing-actions .btn-primary::after {
            content: "→";
            font-size: 17px;
            line-height: 1;
            transition: transform 0.25s ease;
        }

        .landing-actions .btn-primary:hover {
            box-shadow: 0 18px 42px rgba(0, 0, 0, 0.23);
        }

        .landing-actions .btn-primary:hover::after {
            transform: translateX(4px);
        }

        .landing-actions .btn-secondary {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            border: 1px solid var(--lp-border);
            background: rgba(255, 255, 255, 0.035);
            color: inherit;
            backdrop-filter: blur(10px);
        }

        .landing-actions .btn-secondary:hover {
            border-color: var(--lp-border-hover);
            background: rgba(255, 255, 255, 0.07);
        }


        /* =========================================================
           HERO VISUAL
        ========================================================= */

        .landing-hero-visual {
            position: relative;
            z-index: 2;
            min-width: 0;
            padding-top: 60px;
        }

        .landing-hero-image {
            position: relative;
            overflow: hidden;
            border: 1px solid var(--lp-border);
            border-radius: 28px;
            background:
                linear-gradient(
                    145deg,
                    rgba(255, 255, 255, 0.075),
                    rgba(255, 255, 255, 0.025)
                );
            box-shadow:
                0 35px 90px rgba(0, 0, 0, 0.24),
                inset 0 1px 0 rgba(255, 255, 255, 0.06);
        }

        .landing-hero-image::before {
            content: "";
            position: absolute;
            z-index: 2;
            top: 14px;
            left: 50%;
            width: 42px;
            height: 4px;
            border-radius: 999px;
            transform: translateX(-50%);
            background: rgba(255, 255, 255, 0.16);
            pointer-events: none;
        }

        .landing-hero-image::after {
            content: "";
            position: absolute;
            z-index: 3;
            inset: 0;
            border-radius: inherit;
            pointer-events: none;
            box-shadow: inset 0 0 0 1px rgba(255, 255, 255, 0.025);
        }

        .landing-hero-image img {
            display: block;
            width: 100%;
            height: 480px;
            object-fit: cover;
            object-position: center top;
        }

        .landing-visual-label {
            position: absolute;
            z-index: 5;
            right: 18px;
            bottom: 18px;
            left: 18px;
            display: flex;
            align-items: center;
            justify-content: space-between;
            gap: 15px;
            padding: 13px 16px;
            border: 1px solid rgba(255, 255, 255, 0.12);
            border-radius: 13px;
            background: rgba(0, 0, 0, 0.48);
            color: rgba(255, 255, 255, 0.90);
            backdrop-filter: blur(16px);
            font-size: 12px;
            font-weight: 700;
        }

        .landing-visual-label::after {
            content: "↗";
            font-size: 15px;
            opacity: 0.55;
        }


        /* =========================================================
           TRUST STRIP
        ========================================================= */

        .landing-trust {
            position: relative;
            border-top: 1px solid var(--lp-border);
            border-bottom: 1px solid var(--lp-border);
        }

        .landing-trust-grid {
            display: grid;
            grid-template-columns: repeat(4, 1fr);
        }

        .landing-trust-item {
            position: relative;
            padding: 24px 20px;
            border-right: 1px solid var(--lp-border);
            color: rgba(255, 255, 255, 0.72);
            font-size: 13px;
            font-weight: 650;
            line-height: 1.5;
            text-align: center;
        }

        .landing-trust-item:first-child {
            border-left: 1px solid var(--lp-border);
        }


        /* =========================================================
           GENERAL SECTIONS
        ========================================================= */

        .landing-section {
            padding: 105px 0;
        }

        .landing-section-header {
            max-width: 780px;
            margin-bottom: 50px;
        }

        .landing-section-label {
            margin-bottom: 13px;
            color: rgba(255, 255, 255, 0.42);
            font-size: 11px;
            font-weight: 800;
            letter-spacing: 0.15em;
            line-height: 1.3;
            text-transform: uppercase;
        }

        .landing-section-header h2 {
            margin: 0;
            font-size: clamp(34px, 4vw, 52px);
            line-height: 1.08;
            letter-spacing: -0.04em;
            font-weight: 700;
        }

        .landing-section-header p {
            max-width: 690px;
            margin: 19px 0 0;
            color: var(--lp-muted);
            font-size: 16px;
            line-height: 1.78;
        }


        /* =========================================================
           PROBLEM / SOLUTION
        ========================================================= */

        .landing-split {
            display: grid;
            grid-template-columns: repeat(2, minmax(0, 1fr));
            gap: 20px;
        }

        .landing-card {
            position: relative;
            overflow: hidden;
            padding: 36px;
            border: 1px solid var(--lp-border);
            border-radius: var(--lp-radius);
            background: var(--lp-surface);
            transition:
                transform 0.25s ease,
                border-color 0.25s ease,
                background 0.25s ease;
        }

        .landing-card::before {
            content: "";
            position: absolute;
            width: 180px;
            height: 180px;
            top: -120px;
            right: -100px;
            border-radius: 50%;
            background: rgba(255, 255, 255, 0.035);
            filter: blur(25px);
            pointer-events: none;
        }

        .landing-card:hover {
            transform: translateY(-4px);
            border-color: var(--lp-border-hover);
            background: var(--lp-surface-hover);
        }

        .landing-card h3 {
            position: relative;
            z-index: 1;
            margin: 0;
            font-size: 25px;
            line-height: 1.25;
            letter-spacing: -0.025em;
        }

        .landing-card > p {
            position: relative;
            z-index: 1;
            margin: 18px 0 0;
            color: var(--lp-muted);
            font-size: 15px;
            line-height: 1.75;
        }


        /* =========================================================
           CHECK LIST
        ========================================================= */

        .landing-check-list {
            position: relative;
            z-index: 1;
            display: grid;
            gap: 12px;
            margin: 26px 0 0;
            padding: 0;
            list-style: none;
        }

        .landing-check-list li {
            display: flex;
            align-items: flex-start;
            gap: 12px;
            color: rgba(255, 255, 255, 0.75);
            font-size: 14px;
            line-height: 1.6;
        }

        .landing-check-list li::before {
            content: "✓";
            display: flex;
            flex: 0 0 21px;
            align-items: center;
            justify-content: center;
            width: 21px;
            height: 21px;
            margin-top: 1px;
            border: 1px solid var(--lp-border);
            border-radius: 50%;
            background: rgba(255, 255, 255, 0.045);
            font-size: 10px;
            font-weight: 800;
        }


        /* =========================================================
           CAPABILITIES
        ========================================================= */

        .landing-capabilities {
            display: grid;
            grid-template-columns: repeat(3, minmax(0, 1fr));
            gap: 17px;
        }

        .landing-capability {
            position: relative;
            min-height: 235px;
            overflow: hidden;
            padding: 30px;
            border: 1px solid var(--lp-border);
            border-radius: 19px;
            background: var(--lp-surface);
            transition:
                transform 0.25s ease,
                border-color 0.25s ease,
                background 0.25s ease;
        }

        .landing-capability::after {
            content: "";
            position: absolute;
            right: -55px;
            bottom: -70px;
            width: 150px;
            height: 150px;
            border-radius: 50%;
            background: rgba(255, 255, 255, 0.025);
            filter: blur(15px);
            pointer-events: none;
        }

        .landing-capability:hover {
            transform: translateY(-5px);
            border-color: var(--lp-border-hover);
            background: var(--lp-surface-hover);
        }

        .landing-capability-icon {
            display: flex;
            align-items: center;
            justify-content: center;
            width: 45px;
            height: 45px;
            margin-bottom: 25px;
            border: 1px solid var(--lp-border);
            border-radius: 13px;
            background: rgba(255, 255, 255, 0.045);
            color: rgba(255, 255, 255, 0.76);
            font-size: 13px;
            font-weight: 800;
            text-transform: uppercase;
        }

        .landing-capability h3 {
            margin: 0;
            font-size: 20px;
            line-height: 1.3;
            letter-spacing: -0.02em;
        }

        .landing-capability p {
            margin: 12px 0 0;
            color: var(--lp-muted);
            font-size: 14px;
            line-height: 1.7;
        }


        /* =========================================================
           PROCESS
        ========================================================= */

        .landing-process {
            display: grid;
            grid-template-columns: repeat(5, minmax(0, 1fr));
            overflow: hidden;
            border-top: 1px solid var(--lp-border);
            border-left: 1px solid var(--lp-border);
            border-radius: 18px 18px 0 0;
        }

        .landing-process-item {
            position: relative;
            min-height: 245px;
            padding: 29px 25px;
            border-right: 1px solid var(--lp-border);
            border-bottom: 1px solid var(--lp-border);
            background: var(--lp-surface);
            transition: background 0.25s ease;
        }

        .landing-process-item:hover {
            background: var(--lp-surface-hover);
        }

        .landing-process-number {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            min-width: 37px;
            height: 25px;
            margin-bottom: 32px;
            padding: 0 8px;
            border: 1px solid var(--lp-border);
            border-radius: 999px;
            color: rgba(255, 255, 255, 0.45);
            font-size: 10px;
            font-weight: 800;
            letter-spacing: 0.1em;
        }

        .landing-process-item h3 {
            margin: 0;
            font-size: 20px;
            line-height: 1.3;
        }

        .landing-process-item p {
            margin: 12px 0 0;
            color: var(--lp-muted);
            font-size: 14px;
            line-height: 1.7;
        }


        /* =========================================================
           TECHNOLOGY
        ========================================================= */

        .landing-tech-card {
            position: relative;
            overflow: hidden;
            padding: 38px;
            border: 1px solid var(--lp-border);
            border-radius: var(--lp-radius);
            background: var(--lp-surface);
        }

        .landing-tech-list {
            display: flex;
            flex-wrap: wrap;
            gap: 10px;
            margin: 0;
            padding: 0;
            list-style: none;
        }

        .landing-tech-list li {
            padding: 10px 15px;
            border: 1px solid var(--lp-border);
            border-radius: 999px;
            background: rgba(255, 255, 255, 0.035);
            color: rgba(255, 255, 255, 0.72);
            font-size: 13px;
            font-weight: 650;
            transition:
                background 0.2s ease,
                border-color 0.2s ease,
                transform 0.2s ease;
        }

        .landing-tech-list li:hover {
            transform: translateY(-2px);
            border-color: var(--lp-border-hover);
            background: rgba(255, 255, 255, 0.07);
        }


        /* =========================================================
           BENEFITS
        ========================================================= */

        .landing-benefits-grid {
            display: grid;
            grid-template-columns: repeat(3, minmax(0, 1fr));
            gap: 13px;
        }

        .landing-benefit {
            position: relative;
            min-height: 75px;
            display: flex;
            align-items: center;
            padding: 20px 22px 20px 48px;
            border: 1px solid var(--lp-border);
            border-radius: 15px;
            background: var(--lp-surface);
            color: rgba(255, 255, 255, 0.75);
            font-size: 14px;
            font-weight: 650;
            line-height: 1.5;
            transition:
                transform 0.2s ease,
                border-color 0.2s ease;
        }

        .landing-benefit::before {
            content: "✓";
            position: absolute;
            left: 20px;
            top: 50%;
            transform: translateY(-50%);
            font-size: 12px;
            font-weight: 800;
            opacity: 0.6;
        }

        .landing-benefit:hover {
            transform: translateY(-3px);
            border-color: var(--lp-border-hover);
        }


        /* =========================================================
           RELATED PAGES
        ========================================================= */

        .landing-related-grid {
            display: grid;
            grid-template-columns: repeat(3, minmax(0, 1fr));
            gap: 17px;
        }

        .landing-related-card {
            position: relative;
            display: block;
            overflow: hidden;
            padding: 29px;
            border: 1px solid var(--lp-border);
            border-radius: 19px;
            background: var(--lp-surface);
            color: inherit;
            text-decoration: none;
            transition:
                transform 0.25s ease,
                border-color 0.25s ease,
                background 0.25s ease;
        }

        .landing-related-card::after {
            content: "→";
            position: absolute;
            top: 28px;
            right: 28px;
            color: rgba(255, 255, 255, 0.40);
            font-size: 17px;
            transition: transform 0.25s ease;
        }

        .landing-related-card:hover {
            transform: translateY(-5px);
            border-color: var(--lp-border-hover);
            background: var(--lp-surface-hover);
        }

        .landing-related-card:hover::after {
            transform: translateX(4px);
        }

        .landing-related-card span {
            display: block;
            margin-bottom: 14px;
            color: rgba(255, 255, 255, 0.40);
            font-size: 10px;
            font-weight: 800;
            letter-spacing: 0.13em;
            text-transform: uppercase;
        }

        .landing-related-card h3 {
            max-width: 85%;
            margin: 0;
            font-size: 20px;
            line-height: 1.3;
            letter-spacing: -0.02em;
        }

        .landing-related-card p {
            margin: 11px 0 0;
            color: var(--lp-muted);
            font-size: 14px;
            line-height: 1.65;
        }


        /* =========================================================
           FAQ
        ========================================================= */

        .landing-faq {
            max-width: 880px;
            margin: 0 auto;
        }

        .landing-faq details {
            border-top: 1px solid var(--lp-border);
        }

        .landing-faq details:last-child {
            border-bottom: 1px solid var(--lp-border);
        }

        .landing-faq summary {
            display: flex;
            align-items: center;
            justify-content: space-between;
            gap: 30px;
            padding: 25px 0;
            cursor: pointer;
            list-style: none;
            color: rgba(255, 255, 255, 0.88);
            font-size: 17px;
            font-weight: 700;
            line-height: 1.5;
        }

        .landing-faq summary::-webkit-details-marker {
            display: none;
        }

        .landing-faq summary::after {
            content: "+";
            flex: 0 0 auto;
            width: 28px;
            height: 28px;
            display: flex;
            align-items: center;
            justify-content: center;
            border: 1px solid var(--lp-border);
            border-radius: 50%;
            color: rgba(255, 255, 255, 0.48);
            font-size: 18px;
            font-weight: 400;
        }

        .landing-faq details[open] summary::after {
            content: "−";
        }

        .landing-faq-answer {
            max-width: 760px;
            padding: 0 0 27px;
            color: var(--lp-muted);
            font-size: 15px;
            line-height: 1.8;
        }


        /* =========================================================
           FINAL CTA
        ========================================================= */

        .landing-cta {
            padding: 20px 0 120px;
        }

        .landing-cta-card {
            position: relative;
            overflow: hidden;
            padding: 75px 50px;
            border: 1px solid var(--lp-border);
            border-radius: 27px;
            background:
                radial-gradient(
                    circle at 50% -20%,
                    rgba(255, 255, 255, 0.08),
                    transparent 42%
                ),
                var(--lp-surface);
            text-align: center;
        }

        .landing-cta-card::before {
            content: "";
            position: absolute;
            width: 430px;
            height: 430px;
            left: 50%;
            top: -330px;
            transform: translateX(-50%);
            border-radius: 50%;
            background: rgba(255, 255, 255, 0.035);
            filter: blur(25px);
            pointer-events: none;
        }

        .landing-cta-card h2 {
            position: relative;
            z-index: 1;
            max-width: 780px;
            margin: 0 auto;
            font-size: clamp(34px, 4vw, 53px);
            line-height: 1.08;
            letter-spacing: -0.04em;
        }

        .landing-cta-card p {
            position: relative;
            z-index: 1;
            max-width: 650px;
            margin: 20px auto 0;
            color: var(--lp-muted);
            font-size: 15px;
            line-height: 1.75;
        }

        .landing-cta-card .landing-actions {
            position: relative;
            z-index: 1;
            justify-content: center;
        }


        /* =========================================================
           LARGE TABLET
        ========================================================= */

        @media (max-width: 1100px) {

            .landing-hero-grid {
                grid-template-columns: minmax(0, 1fr) minmax(360px, 0.85fr);
                gap: 45px;
            }

            .landing-hero-image img {
                height: 420px;
            }

            .landing-capabilities {
                grid-template-columns: repeat(2, minmax(0, 1fr));
            }

            .landing-process {
                grid-template-columns: repeat(3, minmax(0, 1fr));
            }

            .landing-process-item {
                min-height: 220px;
            }

            .landing-process-item:nth-child(3) {
                border-right: 0;
            }

            .landing-process-item:nth-child(n + 4) {
                border-top: 1px solid var(--lp-border);
            }
        }


        /* =========================================================
           TABLET
        ========================================================= */

        @media (max-width: 900px) {

            .landing-hero {
                padding: 80px 0 75px;
            }

            .landing-hero-grid {
                grid-template-columns: 1fr;
                gap: 48px;
            }

            .landing-hero-content {
                max-width: 800px;
            }

            .landing-hero-visual {
                max-width: 720px;
                padding-top: 60px;
            }

            .landing-hero-image img {
                height: 430px;
            }

            .landing-trust-grid {
                grid-template-columns: repeat(2, 1fr);
            }

            .landing-related-grid {
                grid-template-columns: 1fr;
            }

            .landing-related-card {
                min-height: 170px;
            }

            .landing-benefits-grid {
                grid-template-columns: repeat(2, minmax(0, 1fr));
            }
        }


        /* =========================================================
           MOBILE
        ========================================================= */

        @media (max-width: 700px) {

            .landing-page .container {
                width: min(100% - 28px, var(--lp-max));
            }

            .landing-hero {
                padding: 55px 0 60px;
            }

            /*
             * IMPORTANT:
             * Hero visual is moved ABOVE the text on mobile.
             * This gives the mobile page an image-first presentation.
             */
            .landing-hero-grid {
                display: flex;
                flex-direction: column;
                gap: 35px;
            }

            .landing-hero-visual {
                order: -1;
                width: 100%;
                max-width: none;
            }

            /*
             * Mobile device-style hero frame.
             */
            .landing-hero-image {
                width: 100%;
                border-radius: 23px;
                padding-top: 7px;
            }

            .landing-hero-image::before {
                top: 13px;
                width: 38px;
                height: 4px;
            }

            /*
             * Image is intentionally positioned from the TOP.
             * This prevents important UI/website content from being
             * cut away on mobile.
             */
            .landing-hero-image img {
                width: 100%;
                height: 330px;
                aspect-ratio: auto;
                object-fit: cover;
                object-position: center top;
            }

            .landing-visual-label {
                right: 12px;
                bottom: 12px;
                left: 12px;
                padding: 11px 13px;
                border-radius: 11px;
                font-size: 11px;
            }

            .landing-eyebrow {
                margin-bottom: 19px;
                font-size: 10px;
                letter-spacing: 0.13em;
            }

            .landing-eyebrow::before {
                width: 25px;
            }

            .landing-hero h1 {
                font-size: clamp(37px, 10vw, 48px);
                line-height: 1.04;
                letter-spacing: -0.045em;
            }

            .landing-hero-description {
                margin-top: 20px;
                font-size: 15px;
                line-height: 1.72;
            }

            .landing-actions {
                display: grid;
                grid-template-columns: 1fr;
                width: 100%;
                margin-top: 27px;
            }

            .landing-actions a {
                width: 100%;
                min-height: 53px;
                padding: 0 18px;
            }

            .landing-trust-grid {
                grid-template-columns: 1fr;
            }

            .landing-trust-item {
                padding: 18px 20px;
                border-left: 1px solid var(--lp-border);
                border-bottom: 1px solid var(--lp-border);
                text-align: left;
            }

            .landing-trust-item:last-child {
                border-bottom: 0;
            }

            .landing-section {
                padding: 72px 0;
            }

            .landing-section-header {
                margin-bottom: 36px;
            }

            .landing-section-header h2 {
                font-size: 34px;
                line-height: 1.1;
            }

            .landing-section-header p {
                margin-top: 15px;
                font-size: 14px;
                line-height: 1.7;
            }

            .landing-split {
                grid-template-columns: 1fr;
                gap: 15px;
            }

            .landing-card {
                padding: 27px 24px;
                border-radius: 18px;
            }

            .landing-card h3 {
                font-size: 23px;
            }

            .landing-card > p {
                font-size: 14px;
            }

            .landing-capabilities {
                grid-template-columns: 1fr;
                gap: 13px;
            }

            .landing-capability {
                min-height: auto;
                padding: 25px;
            }

            .landing-capability-icon {
                margin-bottom: 21px;
            }

            .landing-process {
                grid-template-columns: 1fr;
                border-radius: 16px;
            }

            .landing-process-item,
            .landing-process-item:nth-child(n),
            .landing-process-item:not(:last-child) {
                min-height: auto;
                padding: 26px 23px;
                border-right: 1px solid var(--lp-border);
                border-bottom: 1px solid var(--lp-border);
                border-top: 0;
            }

            .landing-process-item:last-child {
                border-bottom: 0;
            }

            .landing-process-number {
                margin-bottom: 22px;
            }

            .landing-benefits-grid {
                grid-template-columns: 1fr;
                gap: 10px;
            }

            .landing-benefit {
                min-height: 68px;
            }

            .landing-tech-card {
                padding: 25px 22px;
                border-radius: 18px;
            }

            .landing-tech-list {
                gap: 8px;
            }

            .landing-tech-list li {
                padding: 9px 12px;
                font-size: 12px;
            }

            .landing-related-card {
                min-height: auto;
                padding: 25px;
            }

            .landing-faq summary {
                gap: 18px;
                padding: 21px 0;
                font-size: 15px;
            }

            .landing-faq-answer {
                font-size: 14px;
                line-height: 1.72;
            }

            .landing-cta {
                padding: 10px 0 75px;
            }

            .landing-cta-card {
                padding: 48px 22px;
                border-radius: 21px;
            }

            .landing-cta-card h2 {
                font-size: 34px;
            }

            .landing-cta-card p {
                font-size: 14px;
            }
        }


        /* =========================================================
           SMALL MOBILE
        ========================================================= */

        @media (max-width: 430px) {

            .landing-page .container {
                width: min(100% - 24px, var(--lp-max));
            }

            .landing-hero {
                padding-top: 45px;
            }

            .landing-hero-image img {
                height: 290px;
            }

            .landing-hero h1 {
                font-size: 36px;
            }

            .landing-hero-description {
                font-size: 14px;
            }

            .landing-section-header h2 {
                font-size: 31px;
            }

            .landing-card {
                padding: 24px 21px;
            }

            .landing-capability {
                padding: 23px 21px;
            }

            .landing-cta-card {
                padding: 42px 20px;
            }

            .landing-cta-card h2 {
                font-size: 31px;
            }
        }
    </style>


    {{-- =========================================================
         LANDING PAGE
    ========================================================= --}}

    <main class="landing-page">


        {{-- =====================================================
             HERO
        ====================================================== --}}

        <section class="landing-hero">

            <div class="container">

                <div class="landing-hero-grid">


                    {{-- HERO CONTENT --}}

                    <div class="landing-hero-content">

                        <div class="landing-eyebrow">
                            {{ $page['eyebrow'] }}
                        </div>

                        <h1>
                            {{ $page['hero_title'] }}
                        </h1>

                        <p class="landing-hero-description">
                            {{ $page['hero_description'] }}
                        </p>

                        <div class="landing-actions">

                            <a href="{{ $page['primary_cta_url'] === 'contact'
                                ? route('contact.index')
                                : url($page['primary_cta_url']) }}"
                                class="btn-primary">

                                {{ $page['primary_cta'] }}

                            </a>

                            <a href="{{ $page['secondary_cta_url'] === 'services'
                                ? route('service.index')
                                : url($page['secondary_cta_url']) }}"
                                class="btn-secondary">

                                {{ $page['secondary_cta'] }}

                            </a>

                        </div>

                    </div>


                    {{-- HERO IMAGE --}}

                    @if (!empty($page['hero_image']))

                        <div class="landing-hero-visual">

                            <div class="landing-hero-image">

                                <img
                                    src="{{ asset($page['hero_image']) }}"
                                    alt="{{ $page['title'] }} - Areia Soft"
                                    loading="eager"
                                    fetchpriority="high"
                                >

                                <div class="landing-visual-label">
                                    {{ $page['title'] }}
                                </div>

                            </div>

                        </div>

                    @endif

                </div>

            </div>

        </section>


        {{-- =====================================================
             TRUST STRIP
        ====================================================== --}}

        @if (!empty($page['trust_points']))

            <section class="landing-trust">

                <div class="container">

                    <div class="landing-trust-grid">

                        @foreach ($page['trust_points'] as $point)

                            <div class="landing-trust-item">
                                {{ $point }}
                            </div>

                        @endforeach

                    </div>

                </div>

            </section>

        @endif


        {{-- =====================================================
             PROBLEM / SOLUTION
        ====================================================== --}}

        <section class="landing-section">

            <div class="container">

                <div class="landing-split">


                    {{-- PROBLEM --}}

                    <article class="landing-card">

                        <div class="landing-section-label">
                            The challenge
                        </div>

                        <h3>
                            {{ $page['problem']['title'] }}
                        </h3>

                        <p>
                            {{ $page['problem']['text'] }}
                        </p>

                        @if (!empty($page['problem']['points']))

                            <ul class="landing-check-list">

                                @foreach ($page['problem']['points'] as $point)

                                    <li>
                                        {{ $point }}
                                    </li>

                                @endforeach

                            </ul>

                        @endif

                    </article>


                    {{-- SOLUTION --}}

                    <article class="landing-card">

                        <div class="landing-section-label">
                            Our approach
                        </div>

                        <h3>
                            {{ $page['solution']['title'] }}
                        </h3>

                        <p>
                            {{ $page['solution']['text'] }}
                        </p>

                        @if (!empty($page['solution']['points']))

                            <ul class="landing-check-list">

                                @foreach ($page['solution']['points'] as $point)

                                    <li>
                                        {{ $point }}
                                    </li>

                                @endforeach

                            </ul>

                        @endif

                    </article>

                </div>

            </div>

        </section>


        {{-- =====================================================
             CAPABILITIES
        ====================================================== --}}

        @if (!empty($page['capabilities']))

            <section class="landing-section">

                <div class="container">

                    <div class="landing-section-header">

                        <div class="landing-section-label">
                            What we can build
                        </div>

                        <h2>
                            {{ $page['title'] }} capabilities for real business needs.
                        </h2>

                        <p>
                            Explore the areas where our team can design, develop
                            and integrate solutions around your requirements.
                        </p>

                    </div>


                    <div class="landing-capabilities">

                        @foreach ($page['capabilities'] as $capability)

                            <article class="landing-capability">

                                <div class="landing-capability-icon">
                                    {{ strtoupper(substr($capability['icon'] ?? '•', 0, 1)) }}
                                </div>

                                <h3>
                                    {{ $capability['title'] }}
                                </h3>

                                <p>
                                    {{ $capability['text'] }}
                                </p>

                            </article>

                        @endforeach

                    </div>

                </div>

            </section>

        @endif


        {{-- =====================================================
             PROCESS
        ====================================================== --}}

        @if (!empty($page['process']))

            <section class="landing-section">

                <div class="container">

                    <div class="landing-section-header">

                        <div class="landing-section-label">
                            How we work
                        </div>

                        <h2>
                            A structured process from idea to launch.
                        </h2>

                        <p>
                            Every project starts with understanding the problem
                            before we decide how the technology should solve it.
                        </p>

                    </div>


                    <div class="landing-process">

                        @foreach ($page['process'] as $step)

                            <article class="landing-process-item">

                                <div class="landing-process-number">
                                    {{ $step['number'] }}
                                </div>

                                <h3>
                                    {{ $step['title'] }}
                                </h3>

                                <p>
                                    {{ $step['text'] }}
                                </p>

                            </article>

                        @endforeach

                    </div>

                </div>

            </section>

        @endif


        {{-- =====================================================
             TECHNOLOGIES
        ====================================================== --}}

        @if (!empty($page['technologies']))

            <section class="landing-section">

                <div class="container">

                    <div class="landing-section-header">

                        <div class="landing-section-label">
                            Technology
                        </div>

                        <h2>
                            Technology selected around the project.
                        </h2>

                        <p>
                            We choose technologies according to the application's
                            requirements, scalability needs and long-term maintainability.
                        </p>

                    </div>


                    <div class="landing-tech-card">

                        <ul class="landing-tech-list">

                            @foreach ($page['technologies'] as $technology)

                                <li>
                                    {{ $technology }}
                                </li>

                            @endforeach

                        </ul>

                    </div>

                </div>

            </section>

        @endif


        {{-- =====================================================
             BENEFITS
        ====================================================== --}}

        @if (!empty($page['benefits']))

            <section class="landing-section">

                <div class="container">

                    <div class="landing-section-header">

                        <div class="landing-section-label">
                            Why it matters
                        </div>

                        <h2>
                            Built for practical business outcomes.
                        </h2>

                    </div>


                    <div class="landing-benefits-grid">

                        @foreach ($page['benefits'] as $benefit)

                            <div class="landing-benefit">
                                {{ $benefit }}
                            </div>

                        @endforeach

                    </div>

                </div>

            </section>

        @endif


        {{-- =====================================================
             RELATED LANDING PAGES
        ====================================================== --}}

        @if (!empty($page['related_pages']))

            <section class="landing-section">

                <div class="container">

                    <div class="landing-section-header">

                        <div class="landing-section-label">
                            Explore further
                        </div>

                        <h2>
                            Related solutions from Areia Soft.
                        </h2>

                        <p>
                            Explore other areas that may complement your project.
                        </p>

                    </div>


                    <div class="landing-related-grid">

                        @foreach ($page['related_pages'] as $relatedSlug)

                            @php
                                $relatedPage = config('landing-pages.pages.' . $relatedSlug);
                            @endphp

                            @if ($relatedPage)

                                <a
                                    href="{{ url('/' . $relatedPage['slug']) }}"
                                    class="landing-related-card"
                                >

                                    <span>
                                        Related solution
                                    </span>

                                    <h3>
                                        {{ $relatedPage['title'] }}
                                    </h3>

                                    <p>
                                        {{ $relatedPage['hero_description'] }}
                                    </p>

                                </a>

                            @endif

                        @endforeach

                    </div>

                </div>

            </section>

        @endif


        {{-- =====================================================
             FAQ
        ====================================================== --}}

        @if (!empty($page['faqs']))

            <section class="landing-section">

                <div class="container">

                    <div class="landing-section-header">

                        <div class="landing-section-label">
                            Frequently asked questions
                        </div>

                        <h2>
                            Questions about {{ $page['title'] }}.
                        </h2>

                    </div>


                    <div class="landing-faq">

                        @foreach ($page['faqs'] as $faq)

                            <details>

                                <summary>
                                    {{ $faq['question'] }}
                                </summary>

                                <div class="landing-faq-answer">
                                    {{ $faq['answer'] }}
                                </div>

                            </details>

                        @endforeach

                    </div>

                </div>

            </section>

        @endif


        {{-- =====================================================
             FINAL CTA
        ====================================================== --}}

        <section class="landing-cta">

            <div class="container">

                <div class="landing-cta-card">

                    <h2>
                        Ready to turn your
                        {{ strtolower($page['title']) }}
                        idea into something useful?
                    </h2>

                    <p>
                        Tell us what you are trying to build, improve or automate.
                        We can help you define the right technical approach.
                    </p>

                    <div class="landing-actions">

                        <a
                            href="{{ route('contact.index') }}"
                            class="btn-primary"
                        >
                            {{ $page['primary_cta'] }}
                        </a>

                        <a
                            href="{{ route('service.index') }}"
                            class="btn-secondary"
                        >
                            View All Services
                        </a>

                    </div>

                </div>

            </div>

        </section>

    </main>

</x-guest-layout>