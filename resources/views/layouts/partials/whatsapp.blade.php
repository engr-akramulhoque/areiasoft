<style>
    /* =========================================
       Premium WhatsApp Floating Button
       ========================================= */

    .whatsapp-float {
        position: fixed;
        width: 60px;
        height: 60px;
        bottom: 40px;
        right: 40px;
        background: #25d366;
        color: #fff;
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        text-decoration: none;
        z-index: 1000;

        box-shadow:
            0 8px 25px rgba(37, 211, 102, 0.30),
            0 3px 10px rgba(0, 0, 0, 0.15);

        transition:
            transform 0.3s ease,
            box-shadow 0.3s ease;

        animation: whatsappFloat 3s ease-in-out infinite;
    }

    /* =========================================
       Animated Glow
       ========================================= */

    .whatsapp-float::before {
        content: "";
        position: absolute;
        inset: -5px;
        border-radius: 50%;
        border: 2px solid rgba(37, 211, 102, 0.35);
        animation: whatsappPulse 2.2s ease-out infinite;
        pointer-events: none;
    }

    /* =========================================
       WhatsApp Icon
       ========================================= */

    .whatsapp-icon {
        position: relative;
        z-index: 2;
        width: 100%;
        height: 100%;
        display: flex;
        align-items: center;
        justify-content: center;
    }

    .whatsapp-my-float {
        font-size: 30px;
        line-height: 1;
        transition: transform 0.3s ease;
    }

    /* =========================================
       Chat With Us Label
       ========================================= */

    .whatsapp-label {
        position: absolute;
        right: 72px;
        top: 50%;

        display: flex;
        align-items: center;
        gap: 8px;

        padding: 10px 15px;

        background: #111827;
        color: #fff;

        border-radius: 12px;

        font-size: 13px;
        font-weight: 600;
        line-height: 1;

        white-space: nowrap;

        opacity: 0;
        visibility: hidden;

        transform: translateY(-50%) translateX(12px);

        transition:
            opacity 0.3s ease,
            transform 0.3s ease,
            visibility 0.3s ease;

        box-shadow:
            0 8px 25px rgba(0, 0, 0, 0.15);

        pointer-events: none;
    }

    /* Small arrow */
    .whatsapp-label::after {
        content: "";

        position: absolute;
        right: -5px;
        top: 50%;

        width: 10px;
        height: 10px;

        background: #111827;

        transform: translateY(-50%) rotate(45deg);
    }

    /* Small green status dot */
    .whatsapp-label::before {
        content: "";

        width: 7px;
        height: 7px;

        background: #25d366;
        border-radius: 50%;

        box-shadow: 0 0 0 3px rgba(37, 211, 102, 0.12);
    }

    /* =========================================
       Hover
       ========================================= */

    .whatsapp-float:hover {
        transform: translateY(-4px);
        color: #fff;
        text-decoration: none;

        background: linear-gradient(
            135deg,
            #25d366,
            #20bd5a
        );

        box-shadow:
            0 12px 35px rgba(37, 211, 102, 0.40),
            0 5px 15px rgba(0, 0, 0, 0.15);

        animation-play-state: paused;
    }

    .whatsapp-float:hover .whatsapp-my-float {
        transform: scale(1.08) rotate(-8deg);
    }

    .whatsapp-float:hover .whatsapp-label {
        opacity: 1;
        visibility: visible;
        transform: translateY(-50%) translateX(0);
    }

    /* =========================================
       Floating Animation
       ========================================= */

    @keyframes whatsappFloat {
        0%,
        100% {
            transform: translateY(0);
        }

        50% {
            transform: translateY(-5px);
        }
    }

    /* =========================================
       Pulse Animation
       ========================================= */

    @keyframes whatsappPulse {
        0% {
            transform: scale(0.9);
            opacity: 0.8;
        }

        70% {
            transform: scale(1.35);
            opacity: 0;
        }

        100% {
            transform: scale(1.35);
            opacity: 0;
        }
    }

    /* =========================================
       Mobile
       ========================================= */

    @media (max-width: 768px) {

        .whatsapp-float {
            width: 56px;
            height: 56px;
            bottom: 25px;
            right: 20px;
        }

        .whatsapp-my-float {
            font-size: 27px;
        }

        /* Hide label on mobile */
        .whatsapp-label {
            display: none;
        }
    }

    /* =========================================
       Accessibility
       ========================================= */

    @media (prefers-reduced-motion: reduce) {

        .whatsapp-float,
        .whatsapp-float::before {
            animation: none;
        }

        .whatsapp-float,
        .whatsapp-label,
        .whatsapp-my-float {
            transition: none;
        }
    }
</style>


<a href="https://wa.me/8801612564242?text=Hello%20Areia%20Soft%2C%20I%20have%20a%20query%20about%20your%20services."
   class="whatsapp-float"
   target="_blank"
   rel="noopener noreferrer"
   aria-label="Chat with Areia Soft on WhatsApp">

    <span class="whatsapp-label">
        Chat with us
    </span>

    <span class="whatsapp-icon">
        <i class="fa-brands fa-whatsapp whatsapp-my-float"
           aria-hidden="true"></i>
    </span>

</a>