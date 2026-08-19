<style>
    .logo-container {
        display: inline-flex;
        align-items: center;
        text-decoration: none;
        line-height: 0;
    }

    .web-logo {
        display: block;
        width: 180px;
        height: auto;
        max-width: 100%;
        object-fit: contain;
    }

    /* Tablet */
    @media (max-width: 991.98px) {
        .web-logo {
            width: 160px;
        }
    }

    /* Mobile */
    @media (max-width: 575.98px) {
        .web-logo {
            width: 140px;
        }
    }
</style>
@php
    $companyActive = request()->routeIs(['about.index', 'global-impact', 'ceo-speech']);

    $workActive = request()->routeIs(['work.index', 'case-studies']);
@endphp

<header class="header" id="header">
    <a href="{{ route('home') }}" class="logo-container" title="Areia Soft" aria-label="Areia Soft Home">
        <img src="{{ asset('static/logos/logo.webp') }}" alt="Areia Soft" class="web-logo" width="180" height="72">
    </a>

    <button type="button" class="menu-toggle" id="menuToggle" aria-label="Toggle navigation" aria-controls="navLinks"
        aria-expanded="false">
        <span></span>
        <span></span>
        <span></span>
    </button>

    <nav aria-label="Primary Navigation">
        <ul class="nav-links" id="navLinks">

            <li>
                <a href="{{ route('home') }}" class="{{ request()->routeIs('home') ? 'active' : '' }}"
                    @if (request()->routeIs('home')) aria-current="page" @endif>
                    Home
                </a>
            </li>

            <li>
                <a href="{{ route('service.index') }}" class="{{ request()->routeIs('service.index') ? 'active' : '' }}"
                    @if (request()->routeIs('service.index')) aria-current="page" @endif>
                    Services
                </a>
            </li>

            <!-- Company -->
            <li class="dropdown" id="companyDropdown">
                <a href="#" class="dropdown-trigger {{ $companyActive ? 'active' : '' }}" aria-haspopup="true"
                    aria-expanded="false">
                    Company
                    <span class="dropdown-arrow">▾</span>
                </a>

                <ul class="dropdown-menu">
                    <li>
                        <a href="{{ route('about.index') }}"
                            class="{{ request()->routeIs('about.index') ? 'active' : '' }}">
                            About Us
                        </a>
                    </li>

                    <li>
                        <a href="{{ route('global-impact') }}"
                            class="{{ request()->routeIs('global-impact') ? 'active' : '' }}">
                            Global Impact
                        </a>
                    </li>

                    <li>
                        <a href="{{ route('ceo-speech') }}"
                            class="{{ request()->routeIs('ceo-speech') ? 'active' : '' }}">
                            Message from the CEO
                        </a>
                    </li>
                </ul>
            </li>

            <!-- Work -->
            <li class="dropdown" id="workDropdown">
                <a href="#" class="dropdown-trigger {{ $workActive ? 'active' : '' }}" aria-haspopup="true"
                    aria-expanded="false">
                    Work
                    <span class="dropdown-arrow">▾</span>
                </a>

                <ul class="dropdown-menu">
                    <li>
                        <a href="{{ route('work.index') }}"
                            class="{{ request()->routeIs('work.index') ? 'active' : '' }}">
                            Portfolio
                        </a>
                    </li>

                    <li>
                        <a href="{{ route('case-studies') }}"
                            class="{{ request()->routeIs('case-studies') ? 'active' : '' }}">
                            Case Studies
                        </a>
                    </li>
                </ul>
            </li>

            <li>
                <a href="{{ route('contact.index') }}"
                    class="nav-cta {{ request()->routeIs('contact.index') ? 'active' : '' }}"
                    @if (request()->routeIs('contact.index')) aria-current="page" @endif>
                    Contact
                </a>
            </li>

        </ul>
    </nav>
</header>
