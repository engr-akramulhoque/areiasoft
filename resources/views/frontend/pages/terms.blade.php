<x-guest-layout>
    @push('styles')
        <style>
            /* ── Page Hero ── */
            .page-hero {
                padding: 10rem 2rem 3rem;
                text-align: center;
            }

            .section-label {
                font-size: 0.8rem;
                font-weight: 600;
                letter-spacing: 0.1em;
                text-transform: uppercase;
                color: var(--cyan);
                margin-bottom: 0.8rem;
            }

            .page-hero h1 {
                font-size: clamp(2.5rem, 5vw, 4rem);
                font-weight: 800;
                letter-spacing: -0.03em;
                margin-bottom: 1rem;
            }

            .page-hero p {
                color: var(--white-muted);
                max-width: 600px;
                margin: 0 auto;
                font-size: 1rem;
            }

            /* ── Terms Content ── */
            .terms-container {
                max-width: 900px;
                margin: 0 auto 4rem;
                padding: 0 2rem;
            }

            .terms-card {
                background: var(--card-bg);
                border: 1px solid var(--glass-border);
                border-radius: var(--radius-lg);
                padding: 2.5rem 2.2rem;
                backdrop-filter: blur(20px);
                -webkit-backdrop-filter: blur(20px);
                box-shadow: 0 8px 40px rgba(0, 0, 0, 0.5);
            }

            .terms-card h2 {
                font-size: 1.6rem;
                font-weight: 700;
                color: var(--cyan);
                margin: 2rem 0 1rem;
                letter-spacing: -0.01em;
            }

            .terms-card h2:first-of-type {
                margin-top: 0;
            }

            .terms-card p {
                color: var(--white-muted);
                margin-bottom: 1rem;
                font-size: 0.95rem;
                line-height: 1.75;
            }

            .terms-card ul {
                list-style: none;
                padding-left: 0;
                margin-bottom: 1.5rem;
            }

            .terms-card ul li {
                position: relative;
                padding-left: 1.5rem;
                margin-bottom: 0.6rem;
                color: var(--white-muted);
                font-size: 0.95rem;
            }

            .terms-card ul li::before {
                content: "▹";
                position: absolute;
                left: 0;
                color: var(--cyan);
                font-size: 0.9rem;
            }

            .last-updated {
                font-size: 0.85rem;
                color: var(--white-muted);
                margin-top: 2rem;
                font-style: italic;
            }

            /* ── Responsive ── */
            @media (max-width: 768px) {
                .page-hero {
                    padding: 7rem 1.5rem 2rem;
                }

                .terms-container {
                    padding: 0 1.5rem;
                }

                .terms-card {
                    padding: 2rem 1.5rem;
                }
            }
        </style>
    @endpush

    <!-- Hero -->
    <section class="page-hero">
        <p class="section-label">Legal</p>
        <h1>Terms & Conditions</h1>
        <p>By engaging with Areia Soft, you agree to these terms. Please read them carefully before using our services
            or website.</p>
    </section>

    <!-- Terms Content -->
    <div class="terms-container">
        <div class="terms-card">
            <p class="last-updated">Last updated: January 20, 2026</p>

            <h2>1. Acceptance of Terms</h2>
            <p>By accessing or using the Areia Soft website, platforms, or services ("Services"), you agree to be bound
                by these Terms and Conditions. If you do not agree to these terms, please do not use our Services.</p>

            <h2>2. Services Overview</h2>
            <p>Areia Soft provides software development, AI engineering, cloud infrastructure, UI/UX design, and related
                consulting services. The specific scope, deliverables, and timelines for any project shall be defined in
                a separate Statement of Work (SOW) or written agreement.</p>

            <h2>3. Intellectual Property</h2>
            <p>All content, designs, code, and materials displayed on this website are the property of Areia Soft or its
                licensors and are protected by intellectual property laws. You may not reproduce, distribute, or create
                derivative works without our express written permission.</p>
            <p>Upon full payment for custom development services, clients receive ownership of the final deliverables as
                outlined in the project agreement, except for pre-existing proprietary components and third-party
                libraries.</p>

            <h2>4. Client Responsibilities</h2>
            <p>Clients agree to provide timely feedback, necessary access, and required materials to enable Areia Soft
                to perform the agreed services. Delays caused by the client may impact project timelines and costs.</p>

            <h2>5. Limitation of Liability</h2>
            <p>Areia Soft shall not be liable for any indirect, incidental, special, or consequential damages arising
                from the use of our Services. Our total liability for any claim related to our Services shall not exceed
                the amount paid by the client for the specific service giving rise to the claim.</p>

            <h2>6. Confidentiality</h2>
            <p>Both parties agree to maintain the confidentiality of any proprietary or sensitive information shared
                during the course of a project. Confidential information shall not be disclosed to third parties without
                prior written consent, except as required by law.</p>

            <h2>7. Warranties & Disclaimers</h2>
            <p>Our Services are provided "as is" and "as available." We make no warranties, express or implied,
                regarding the functionality, performance, or availability of our Services, except as explicitly stated
                in a written agreement.</p>

            <h2>8. Termination</h2>
            <p>Either party may terminate a project agreement with written notice if the other party breaches a material
                term and fails to remedy the breach within 30 days. Termination shall not relieve the client of the
                obligation to pay for services rendered.</p>

            <h2>9. Governing Law</h2>
            <p>These Terms shall be governed by and construed in accordance with the laws of the State of California,
                USA, without regard to conflict of law principles. Any disputes arising shall be resolved in the courts
                located in Santa Clara County, California.</p>

            <h2>10. Changes to Terms</h2>
            <p>We may update these Terms from time to time. The latest version will always be posted on this page, and
                we will notify clients of material changes via email or a notice on our website. Continued use of the
                Services after changes constitutes acceptance.</p>

            <h2>11. Contact Information</h2>
            <p>For any questions about these Terms, please contact us at:</p>
            <p>Email: <a href="mailto:legal@areiasoft.com" style="color:var(--cyan);">legal@areiasoft.com</a><br>
                Address: 1600 Amphitheatre Parkway, Mountain View, CA 94043, USA</p>
        </div>
    </div>
</x-guest-layout>
