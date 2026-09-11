<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="UTF-8">

    <meta
        name="viewport"
        content="width=device-width, initial-scale=1.0"
    >

    <title>
        Custom Software Development | Areia Soft
    </title>

    <link
        rel="preconnect"
        href="https://fonts.googleapis.com"
    >

    <link
        rel="preconnect"
        href="https://fonts.gstatic.com"
        crossorigin
    >

    <link
        href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800&display=swap"
        rel="stylesheet"
    >

    <link
        href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css"
        rel="stylesheet"
    >

    <link
        rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css"
    >


    <style>

        :root {
            --cyan: #00e5ff;
            --cyan-subtle: rgba(0, 229, 255, .08);

            --bg-deep: #04080f;
            --card-bg: rgba(10, 17, 26, .72);

            --white: #ffffff;
            --white-soft: rgba(255, 255, 255, .88);
            --white-muted: rgba(255, 255, 255, .58);

            --glass-border: rgba(255, 255, 255, .09);
            --glass-border-hover: rgba(0, 229, 255, .3);

            --radius: 16px;
            --transition: all .3s ease;
        }


        * {
            box-sizing: border-box;
        }


        html {
            scroll-behavior: smooth;
        }


        body {
            margin: 0;
            background: var(--bg-deep);
            color: var(--white);
            font-family: "Inter", sans-serif;
        }


        a {
            text-decoration: none;
        }


        /* =====================================================
           COMMON
        ====================================================== */

        .service-page {
            overflow: hidden;
        }


        .section {
            padding: 85px 0;
        }


        .section-light {
            border-top: 1px solid var(--glass-border);
            border-bottom: 1px solid var(--glass-border);
            background: rgba(255, 255, 255, .008);
        }


        .section-title {
            max-width: 680px;
            margin: 0 auto 45px;
            text-align: center;
        }


        .section-label {
            display: block;
            margin-bottom: 12px;
            color: var(--cyan);
            font-size: .62rem;
            font-weight: 800;
            letter-spacing: .15em;
        }


        .section-title h2 {
            margin: 0 0 15px;
            font-size: clamp(2rem, 4vw, 3rem);
            line-height: 1.1;
            font-weight: 800;
            letter-spacing: -.05em;
        }


        .section-title p {
            margin: 0;
            color: var(--white-muted);
            font-size: .82rem;
            line-height: 1.8;
        }


        /* =====================================================
           NAVBAR
        ====================================================== */

        .navbar-custom {
            position: fixed;
            z-index: 1000;
            top: 0;
            right: 0;
            left: 0;
            padding: 17px 0;
            border-bottom: 1px solid rgba(255, 255, 255, .05);
            background: rgba(4, 8, 15, .85);
            backdrop-filter: blur(18px);
        }


        .brand {
            color: var(--white);
            font-size: 1.1rem;
            font-weight: 800;
        }


        .brand:hover {
            color: var(--white);
        }


        .nav-link-custom {
            margin-left: 25px;
            color: var(--white-muted);
            font-size: .68rem;
            font-weight: 600;
        }


        .nav-link-custom:hover {
            color: var(--cyan);
        }


        .nav-cta {
            padding: 8px 15px;
            border: 1px solid var(--cyan);
            border-radius: 50px;
            color: var(--cyan);
        }


        .nav-cta:hover {
            color: var(--bg-deep);
            background: var(--cyan);
        }


        /* =====================================================
           HERO
        ====================================================== */

        .hero {
            position: relative;
            padding: 145px 0 75px;
        }


        .hero-content {
            max-width: 650px;
        }


        .hero-label {
            display: inline-flex;
            align-items: center;
            gap: 8px;
            margin-bottom: 20px;
            padding: 7px 12px;
            border: 1px solid rgba(0, 229, 255, .18);
            border-radius: 50px;
            background: var(--cyan-subtle);
            color: var(--cyan);
            font-size: .61rem;
            font-weight: 700;
        }


        .hero-dot {
            width: 6px;
            height: 6px;
            border-radius: 50%;
            background: var(--cyan);
        }


        .hero h1 {
            margin: 0 0 20px;
            font-size: clamp(2.7rem, 6vw, 4.7rem);
            line-height: 1;
            font-weight: 800;
            letter-spacing: -.065em;
        }


        .hero-description {
            max-width: 600px;
            margin-bottom: 27px;
            color: var(--white-muted);
            font-size: .9rem;
            line-height: 1.85;
        }


        .buttons {
            display: flex;
            flex-wrap: wrap;
            gap: 10px;
        }


        .button {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            gap: 8px;
            padding: 12px 21px;
            border-radius: 50px;
            font-size: .72rem;
            font-weight: 700;
            transition: var(--transition);
        }


        .button-primary {
            color: var(--bg-deep);
            background: var(--cyan);
        }


        .button-primary:hover {
            color: var(--bg-deep);
            transform: translateY(-2px);
            box-shadow: 0 12px 35px rgba(0, 229, 255, .25);
        }


        .button-secondary {
            border: 1px solid var(--glass-border);
            color: var(--white-soft);
        }


        .button-secondary:hover {
            color: var(--cyan);
            border-color: var(--cyan);
        }


        .hero-image {
            overflow: hidden;
            border: 1px solid var(--glass-border);
            border-radius: var(--radius);
            background: var(--card-bg);
        }


        .hero-image img {
            display: block;
            width: 100%;
            aspect-ratio: 1.15 / 1;
            object-fit: cover;
        }


        /* =====================================================
           TECHNOLOGIES
        ====================================================== */

        .technologies {
            display: flex;
            justify-content: center;
            flex-wrap: wrap;
            gap: 8px;
            margin-top: 30px;
        }


        .technology {
            padding: 7px 13px;
            border: 1px solid rgba(0, 229, 255, .14);
            border-radius: 50px;
            background: var(--cyan-subtle);
            color: var(--cyan);
            font-size: .6rem;
            font-weight: 600;
        }


        /* =====================================================
           CONTENT CARD
        ====================================================== */

        .content-card {
            height: 100%;
            padding: 28px;
            border: 1px solid var(--glass-border);
            border-radius: var(--radius);
            background: var(--card-bg);
            transition: var(--transition);
        }


        .content-card:hover {
            border-color: var(--glass-border-hover);
        }


        .content-card h3 {
            margin-bottom: 18px;
            font-size: 1rem;
            font-weight: 700;
        }


        .content-card p {
            margin: 0;
            color: var(--white-muted);
            font-size: .76rem;
            line-height: 1.9;
        }


        /* =====================================================
           LIST
        ====================================================== */

        .service-list {
            display: grid;
            gap: 13px;
            margin: 0;
            padding: 0;
            list-style: none;
        }


        .service-list li {
            display: flex;
            align-items: flex-start;
            gap: 10px;
            color: var(--white-muted);
            font-size: .72rem;
            line-height: 1.7;
        }


        .service-list i {
            margin-top: 4px;
            color: var(--cyan);
            font-size: .58rem;
        }


        /* =====================================================
           PROCESS
        ====================================================== */

        .process {
            display: grid;
            grid-template-columns: repeat(5, 1fr);
            gap: 15px;
        }


        .process-item {
            text-align: center;
        }


        .process-number {
            width: 48px;
            height: 48px;
            display: flex;
            align-items: center;
            justify-content: center;
            margin: 0 auto 16px;
            border: 1px solid var(--cyan);
            border-radius: 50%;
            color: var(--cyan);
            font-size: .6rem;
            font-weight: 800;
        }


        .process-item h3 {
            margin-bottom: 7px;
            font-size: .85rem;
        }


        .process-item p {
            margin: 0;
            color: var(--white-muted);
            font-size: .62rem;
            line-height: 1.7;
        }


        /* =====================================================
           FAQ
        ====================================================== */

        .faq {
            max-width: 850px;
            margin: auto;
        }


        .accordion-item {
            margin-bottom: 8px;
            overflow: hidden;
            border: 1px solid var(--glass-border) !important;
            border-radius: 12px !important;
            background: transparent !important;
        }


        .accordion-button {
            padding: 18px;
            background: rgba(255, 255, 255, .015) !important;
            color: var(--white-soft) !important;
            box-shadow: none !important;
            font-size: .73rem;
            font-weight: 600;
        }


        .accordion-button:not(.collapsed) {
            color: var(--cyan) !important;
            background: var(--cyan-subtle) !important;
        }


        .accordion-button::after {
            filter: invert(1);
        }


        .accordion-body {
            color: var(--white-muted);
            background: rgba(255, 255, 255, .008);
            font-size: .68rem;
            line-height: 1.8;
        }


        /* =====================================================
           RELATED SERVICES
        ====================================================== */

        .related-services {
            display: flex;
            flex-wrap: wrap;
            gap: 8px;
        }


        .related-service {
            display: inline-flex;
            align-items: center;
            gap: 8px;
            padding: 10px 14px;
            border: 1px solid var(--glass-border);
            border-radius: 9px;
            color: var(--white-muted);
            font-size: .63rem;
            font-weight: 600;
            transition: var(--transition);
        }


        .related-service:hover {
            color: var(--cyan);
            border-color: var(--cyan);
        }


        .related-service i {
            color: var(--cyan);
            font-size: .55rem;
        }


        /* =====================================================
           CTA
        ====================================================== */

        .final-cta {
            padding: 20px 0 100px;
        }


        .cta-box {
            padding: 70px 25px;
            border: 1px solid rgba(0, 229, 255, .18);
            border-radius: 22px;
            background: rgba(0, 229, 255, .035);
            text-align: center;
        }


        .cta-box h2 {
            max-width: 700px;
            margin: 0 auto 15px;
            font-size: clamp(2rem, 4vw, 3rem);
            line-height: 1.1;
            font-weight: 800;
            letter-spacing: -.05em;
        }


        .cta-box p {
            max-width: 580px;
            margin: 0 auto 25px;
            color: var(--white-muted);
            font-size: .8rem;
            line-height: 1.8;
        }


        /* =====================================================
           FOOTER
        ====================================================== */

        footer {
            padding: 25px 0;
            border-top: 1px solid var(--glass-border);
        }


        footer p {
            margin: 0;
            color: var(--white-muted);
            font-size: .6rem;
            text-align: center;
        }


        /* =====================================================
           RESPONSIVE
        ====================================================== */

        @media (max-width: 991px) {

            .nav-links {
                display: none;
            }


            .hero {
                padding-top: 120px;
            }


            .hero-image {
                max-width: 650px;
                margin: 20px auto 0;
            }


            .process {
                grid-template-columns: repeat(3, 1fr);
                row-gap: 40px;
            }

        }


        @media (max-width: 767px) {

            .section {
                padding: 65px 0;
            }


            .hero {
                padding: 100px 0 55px;
            }


            .hero h1 {
                font-size: 2.55rem;
            }


            .hero-description {
                font-size: .83rem;
            }


            .buttons {
                flex-direction: column;
            }


            .button {
                width: 100%;
            }


            .process {
                grid-template-columns: 1fr;
                gap: 25px;
            }


            .process-item {
                display: grid;
                grid-template-columns: 48px 1fr;
                gap: 14px;
                text-align: left;
            }


            .process-number {
                margin: 0;
            }


            .process-item p {
                max-width: 500px;
            }


            .content-card {
                padding: 23px;
            }


            .related-service {
                width: 100%;
                justify-content: space-between;
            }


            .cta-box {
                padding: 55px 20px;
            }

        }


        @media (max-width: 480px) {

            .hero h1 {
                font-size: 2.35rem;
            }


            .section-title h2 {
                font-size: 2rem;
            }


            .technology {
                font-size: .57rem;
            }

        }

    </style>

</head>


<body>


    <!-- =====================================================
         NAVIGATION
    ====================================================== -->

    <header class="navbar-custom">

        <div class="container">

            <div class="d-flex align-items-center justify-content-between">

                <a
                    href="#"
                    class="brand"
                >
                    Areia Soft
                </a>


                <nav class="nav-links">

                    <a
                        href="#overview"
                        class="nav-link-custom"
                    >
                        Overview
                    </a>

                    <a
                        href="#features"
                        class="nav-link-custom"
                    >
                        Features
                    </a>

                    <a
                        href="#process"
                        class="nav-link-custom"
                    >
                        Process
                    </a>

                    <a
                        href="#faq"
                        class="nav-link-custom"
                    >
                        FAQ
                    </a>

                    <a
                        href="#contact"
                        class="nav-link-custom nav-cta"
                    >
                        Start Project
                    </a>

                </nav>

            </div>

        </div>

    </header>


    <main class="service-page">


        <!-- =====================================================
             HERO
        ====================================================== -->

        <section class="hero">

            <div class="container">

                <div class="row align-items-center g-5">


                    <div class="col-lg-6">

                        <div class="hero-content">


                            <div class="hero-label">

                                <span class="hero-dot"></span>

                                Custom Software Development

                            </div>


                            <h1>
                                Custom Software Development
                            </h1>


                            <p class="hero-description">
                                Build secure, scalable and business-focused
                                software designed around your unique
                                workflows, users and growth goals.
                            </p>


                            <div class="buttons">

                                <a
                                    href="#contact"
                                    class="button button-primary"
                                >

                                    Start Your Project

                                    <i class="fa-solid fa-arrow-right"></i>

                                </a>


                                <a
                                    href="#overview"
                                    class="button button-secondary"
                                >

                                    Learn More

                                </a>

                            </div>


                        </div>

                    </div>


                    <div class="col-lg-6">

                        <div class="hero-image">

                            <img
                                src="https://images.unsplash.com/photo-1551434678-e076c223a692?auto=format&fit=crop&w=1200&q=85"
                                alt="Custom Software Development"
                            >

                        </div>

                    </div>


                </div>


                <!-- Technologies -->

                <div class="technologies">

                    <span class="technology">
                        Laravel
                    </span>

                    <span class="technology">
                        PHP
                    </span>

                    <span class="technology">
                        MySQL
                    </span>

                    <span class="technology">
                        React
                    </span>

                    <span class="technology">
                        Vue.js
                    </span>

                    <span class="technology">
                        REST API
                    </span>

                    <span class="technology">
                        AWS
                    </span>

                </div>

            </div>

        </section>


        <!-- =====================================================
             OVERVIEW
        ====================================================== -->

        <section
            class="section"
            id="overview"
        >

            <div class="container">

                <div class="section-title">

                    <span class="section-label">
                        OVERVIEW
                    </span>

                    <h2>
                        Built Around
                        <span style="color:var(--cyan);">
                            Your Business
                        </span>
                    </h2>

                    <p>
                        Instead of adapting your business to generic
                        software, we create technology around the way
                        your business actually works.
                    </p>

                </div>


                <div class="row g-4">


                    <div class="col-lg-6">

                        <div class="content-card">

                            <h3>
                                Custom Development
                            </h3>

                            <p>
                                We design and develop software based on
                                your specific requirements, processes,
                                users and operational goals. Every part
                                of the system is planned to support the
                                way your organization works.
                            </p>

                        </div>

                    </div>


                    <div class="col-lg-6">

                        <div class="content-card">

                            <h3>
                                Business Value
                            </h3>

                            <ul class="service-list">

                                <li>
                                    <i class="fa-solid fa-check"></i>
                                    Automate repetitive processes
                                </li>

                                <li>
                                    <i class="fa-solid fa-check"></i>
                                    Improve operational efficiency
                                </li>

                                <li>
                                    <i class="fa-solid fa-check"></i>
                                    Centralize business information
                                </li>

                                <li>
                                    <i class="fa-solid fa-check"></i>
                                    Improve team productivity
                                </li>

                                <li>
                                    <i class="fa-solid fa-check"></i>
                                    Scale as your business grows
                                </li>

                            </ul>

                        </div>

                    </div>


                </div>

            </div>

        </section>


        <!-- =====================================================
             FEATURES & BENEFITS
        ====================================================== -->

        <section
            class="section section-light"
            id="features"
        >

            <div class="container">

                <div class="section-title">

                    <span class="section-label">
                        CAPABILITIES
                    </span>

                    <h2>
                        What You
                        <span style="color:var(--cyan);">
                            Get
                        </span>
                    </h2>

                    <p>
                        Practical functionality designed around your
                        business requirements.
                    </p>

                </div>


                <div class="row g-4">


                    <!-- Features -->

                    <div class="col-lg-6">

                        <div class="content-card">

                            <h3>
                                Key Features
                            </h3>


                            <ul class="service-list">

                                <li>
                                    <i class="fa-solid fa-check"></i>
                                    Custom business workflows
                                </li>

                                <li>
                                    <i class="fa-solid fa-check"></i>
                                    User authentication
                                </li>

                                <li>
                                    <i class="fa-solid fa-check"></i>
                                    Role-based access
                                </li>

                                <li>
                                    <i class="fa-solid fa-check"></i>
                                    Admin dashboards
                                </li>

                                <li>
                                    <i class="fa-solid fa-check"></i>
                                    Reporting and analytics
                                </li>

                                <li>
                                    <i class="fa-solid fa-check"></i>
                                    API integrations
                                </li>

                                <li>
                                    <i class="fa-solid fa-check"></i>
                                    Payment integrations
                                </li>

                                <li>
                                    <i class="fa-solid fa-check"></i>
                                    Responsive interfaces
                                </li>

                            </ul>

                        </div>

                    </div>


                    <!-- Benefits -->

                    <div class="col-lg-6">

                        <div class="content-card">

                            <h3>
                                Business Benefits
                            </h3>


                            <ul class="service-list">

                                <li>
                                    <i class="fa-solid fa-check"></i>
                                    Reduce manual work
                                </li>

                                <li>
                                    <i class="fa-solid fa-check"></i>
                                    Improve productivity
                                </li>

                                <li>
                                    <i class="fa-solid fa-check"></i>
                                    Reduce operational costs
                                </li>

                                <li>
                                    <i class="fa-solid fa-check"></i>
                                    Improve data visibility
                                </li>

                                <li>
                                    <i class="fa-solid fa-check"></i>
                                    Make better business decisions
                                </li>

                                <li>
                                    <i class="fa-solid fa-check"></i>
                                    Improve customer experience
                                </li>

                                <li>
                                    <i class="fa-solid fa-check"></i>
                                    Scale operations more easily
                                </li>

                            </ul>

                        </div>

                    </div>


                </div>

            </div>

        </section>


        <!-- =====================================================
             PROCESS
        ====================================================== -->

        <section
            class="section"
            id="process"
        >

            <div class="container">

                <div class="section-title">

                    <span class="section-label">
                        PROCESS
                    </span>

                    <h2>
                        Simple Process.
                        <span style="color:var(--cyan);">
                            Clear Results.
                        </span>
                    </h2>

                    <p>
                        A straightforward process keeps your project
                        focused and predictable.
                    </p>

                </div>


                <div class="process">


                    <div class="process-item">

                        <div class="process-number">
                            01
                        </div>

                        <div>

                            <h3>
                                Discover
                            </h3>

                            <p>
                                Understand your business and requirements.
                            </p>

                        </div>

                    </div>


                    <div class="process-item">

                        <div class="process-number">
                            02
                        </div>

                        <div>

                            <h3>
                                Plan
                            </h3>

                            <p>
                                Define scope, architecture and roadmap.
                            </p>

                        </div>

                    </div>


                    <div class="process-item">

                        <div class="process-number">
                            03
                        </div>

                        <div>

                            <h3>
                                Build
                            </h3>

                            <p>
                                Develop and validate the solution.
                            </p>

                        </div>

                    </div>


                    <div class="process-item">

                        <div class="process-number">
                            04
                        </div>

                        <div>

                            <h3>
                                Launch
                            </h3>

                            <p>
                                Test, deploy and prepare for production.
                            </p>

                        </div>

                    </div>


                    <div class="process-item">

                        <div class="process-number">
                            05
                        </div>

                        <div>

                            <h3>
                                Support
                            </h3>

                            <p>
                                Maintain and improve the system.
                            </p>

                        </div>

                    </div>


                </div>

            </div>

        </section>


        <!-- =====================================================
             TECHNOLOGY
        ====================================================== -->

        <section class="section section-light">

            <div class="container">

                <div class="section-title">

                    <span class="section-label">
                        TECHNOLOGY
                    </span>

                    <h2>
                        Technology That
                        <span style="color:var(--cyan);">
                            Fits
                    </span>
                    </h2>

                    <p>
                        We choose technology according to the project's
                        requirements and long-term goals.
                    </p>

                </div>


                <div class="technologies">

                    <span class="technology">
                        Laravel
                    </span>

                    <span class="technology">
                        PHP
                    </span>

                    <span class="technology">
                        MySQL
                    </span>

                    <span class="technology">
                        React
                    </span>

                    <span class="technology">
                        Vue.js
                    </span>

                    <span class="technology">
                        REST API
                    </span>

                    <span class="technology">
                        Bootstrap
                    </span>

                    <span class="technology">
                        AWS
                    </span>

                </div>

            </div>

        </section>


        <!-- =====================================================
             FAQ
        ====================================================== -->

        <section
            class="section"
            id="faq"
        >

            <div class="container">

                <div class="section-title">

                    <span class="section-label">
                        FAQ
                    </span>

                    <h2>
                        Frequently Asked
                        <span style="color:var(--cyan);">
                            Questions
                        </span>
                    </h2>

                </div>


                <div class="faq">


                    <div class="accordion">


                        <div class="accordion-item">

                            <h3 class="accordion-header">

                                <button
                                    class="accordion-button"
                                    data-bs-toggle="collapse"
                                    data-bs-target="#faq1"
                                >
                                    What is custom software development?
                                </button>

                            </h3>


                            <div
                                id="faq1"
                                class="accordion-collapse collapse show"
                            >

                                <div class="accordion-body">

                                    Custom software is developed
                                    specifically around your business
                                    processes, requirements, users and
                                    operational goals.

                                </div>

                            </div>

                        </div>


                        <div class="accordion-item">

                            <h3 class="accordion-header">

                                <button
                                    class="accordion-button collapsed"
                                    data-bs-toggle="collapse"
                                    data-bs-target="#faq2"
                                >
                                    How much does custom software cost?
                                </button>

                            </h3>


                            <div
                                id="faq2"
                                class="accordion-collapse collapse"
                            >

                                <div class="accordion-body">

                                    The cost depends on features,
                                    integrations, complexity and project
                                    requirements. A project-specific
                                    estimate can be provided after
                                    understanding the requirements.

                                </div>

                            </div>

                        </div>


                        <div class="accordion-item">

                            <h3 class="accordion-header">

                                <button
                                    class="accordion-button collapsed"
                                    data-bs-toggle="collapse"
                                    data-bs-target="#faq3"
                                >
                                    How long does development take?
                                </button>

                            </h3>


                            <div
                                id="faq3"
                                class="accordion-collapse collapse"
                            >

                                <div class="accordion-body">

                                    The timeline depends on the scope
                                    and complexity of the project.
                                    We define the development roadmap
                                    after reviewing the requirements.

                                </div>

                            </div>

                        </div>


                        <div class="accordion-item">

                            <h3 class="accordion-header">

                                <button
                                    class="accordion-button collapsed"
                                    data-bs-toggle="collapse"
                                    data-bs-target="#faq4"
                                >
                                    Can you integrate existing systems?
                                </button>

                            </h3>


                            <div
                                id="faq4"
                                class="accordion-collapse collapse"
                            >

                                <div class="accordion-body">

                                    Yes. APIs, payment gateways,
                                    CRMs, ERPs and other third-party
                                    platforms can be integrated when
                                    required.

                                </div>

                            </div>

                        </div>


                        <div class="accordion-item">

                            <h3 class="accordion-header">

                                <button
                                    class="accordion-button collapsed"
                                    data-bs-toggle="collapse"
                                    data-bs-target="#faq5"
                                >
                                    Do you provide support after launch?
                                </button>

                            </h3>


                            <div
                                id="faq5"
                                class="accordion-collapse collapse"
                            >

                                <div class="accordion-body">

                                    Yes. We can provide maintenance,
                                    updates, improvements, monitoring
                                    and ongoing technical support.

                                </div>

                            </div>

                        </div>


                    </div>

                </div>

            </div>

        </section>


        <!-- =====================================================
             RELATED SERVICES
        ====================================================== -->

        <section class="section section-light">

            <div class="container">

                <div class="section-title">

                    <span class="section-label">
                        RELATED SERVICES
                    </span>

                    <h2>
                        Explore More
                        <span style="color:var(--cyan);">
                            Services
                        </span>
                    </h2>

                </div>


                <div class="related-services">

                    <a
                        href="#"
                        class="related-service"
                    >
                        Website Development
                        <i class="fa-solid fa-arrow-right"></i>
                    </a>


                    <a
                        href="#"
                        class="related-service"
                    >
                        Web Application Development
                        <i class="fa-solid fa-arrow-right"></i>
                    </a>


                    <a
                        href="#"
                        class="related-service"
                    >
                        Mobile App Development
                        <i class="fa-solid fa-arrow-right"></i>
                    </a>


                    <a
                        href="#"
                        class="related-service"
                    >
                        ERP & CRM Solutions
                        <i class="fa-solid fa-arrow-right"></i>
                    </a>


                    <a
                        href="#"
                        class="related-service"
                    >
                        eCommerce Development
                        <i class="fa-solid fa-arrow-right"></i>
                    </a>


                    <a
                        href="#"
                        class="related-service"
                    >
                        AI & Automation Solutions
                        <i class="fa-solid fa-arrow-right"></i>
                    </a>


                    <a
                        href="#"
                        class="related-service"
                    >
                        Cloud & DevOps Solutions
                        <i class="fa-solid fa-arrow-right"></i>
                    </a>


                </div>

            </div>

        </section>


        <!-- =====================================================
             FINAL CTA
        ====================================================== -->

        <section
            class="final-cta"
            id="contact"
        >

            <div class="container">

                <div class="cta-box">

                    <span class="section-label">
                        START YOUR PROJECT
                    </span>


                    <h2>
                        Ready to Build Your
                        <span style="color:var(--cyan);">
                            Software?
                        </span>
                    </h2>


                    <p>
                        Tell us what you want to build. Our team will
                        help you turn your requirements into a reliable
                        digital solution.
                    </p>


                    <div class="buttons justify-content-center">

                        <a
                            href="#"
                            class="button button-primary"
                        >

                            Start Your Project

                            <i class="fa-solid fa-arrow-right"></i>

                        </a>


                        <a
                            href="#"
                            class="button button-secondary"
                        >

                            View Services

                        </a>

                    </div>

                </div>

            </div>

        </section>


    </main>


    <footer>

        <div class="container">

            <p>
                © 2026 Areia Soft. All rights reserved.
            </p>

        </div>

    </footer>


    <script
        src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js"
    ></script>


</body>

</html>