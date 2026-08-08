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

            /* ── Privacy Content ── */
            .privacy-container {
                max-width: 900px;
                margin: 0 auto 4rem;
                padding: 0 2rem;
            }

            .privacy-card {
                background: var(--card-bg);
                border: 1px solid var(--glass-border);
                border-radius: var(--radius-lg);
                padding: 2.5rem 2.2rem;
                backdrop-filter: blur(20px);
                -webkit-backdrop-filter: blur(20px);
                box-shadow: 0 8px 40px rgba(0, 0, 0, 0.5);
            }

            .privacy-card h2 {
                font-size: 1.6rem;
                font-weight: 700;
                color: var(--cyan);
                margin: 2rem 0 1rem;
                letter-spacing: -0.01em;
            }

            .privacy-card h2:first-of-type {
                margin-top: 0;
            }

            .privacy-card p {
                color: var(--white-muted);
                margin-bottom: 1rem;
                font-size: 0.95rem;
                line-height: 1.75;
            }

            .privacy-card ul {
                list-style: none;
                padding-left: 0;
                margin-bottom: 1.5rem;
            }

            .privacy-card ul li {
                position: relative;
                padding-left: 1.5rem;
                margin-bottom: 0.6rem;
                color: var(--white-muted);
                font-size: 0.95rem;
            }

            .privacy-card ul li::before {
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

                .privacy-container {
                    padding: 0 1.5rem;
                }

                .privacy-card {
                    padding: 2rem 1.5rem;
                }
            }
        </style>
    @endpush

    <!-- Hero -->
    <section class="page-hero">
        <p class="section-label">Legal</p>
        <h1>Privacy Policy</h1>
        <p>Your privacy is fundamental to how we build and operate our services. This policy explains what we collect,
            why, and how we protect it.</p>
    </section>

    <!-- Privacy Content -->
    <div class="privacy-container">
        <div class="privacy-card">
            <p class="last-updated">Last updated: January 15, 2026</p>

            <h2>1. Information We Collect</h2>
            <p>We collect information you provide directly, such as when you fill out a contact form, subscribe to our
                newsletter, or request a demo. This may include your name, email address, company name, and phone
                number.</p>
            <p>We also collect certain technical information automatically when you visit our website, including IP
                address, browser type, operating system, referring URLs, and interaction data. This helps us understand
                how our site is used and improve performance.</p>

            <h2>2. How We Use Information</h2>
            <p>We use the collected information to:</p>
            <ul>
                <li>Respond to your inquiries and provide customer support.</li>
                <li>Send you relevant updates, newsletters, or marketing communications (with your consent).</li>
                <li>Analyze and improve our website, services, and user experience.</li>
                <li>Maintain the security and integrity of our systems.</li>
                <li>Comply with legal obligations and enforce our terms.</li>
            </ul>

            <h2>3. Cookies & Tracking Technologies</h2>
            <p>We use essential cookies to make our website function properly. We may also use analytics cookies (such
                as Google Analytics) to understand traffic and usage patterns. You can control cookie preferences
                through your browser settings. Disabling certain cookies may affect site functionality.</p>

            <h2>4. Data Sharing & Third Parties</h2>
            <p>We do not sell, rent, or trade your personal information. We may share data with trusted service
                providers who help us operate our business (e.g., cloud hosting, email delivery) under strict
                confidentiality agreements. We may also disclose information if required by law or to protect our
                rights.</p>

            <h2>5. International Data Transfers</h2>
            <p>As a global company, your information may be transferred to and processed in countries where our servers
                or partners are located. We ensure appropriate safeguards are in place, such as Standard Contractual
                Clauses, to protect your data regardless of jurisdiction.</p>

            <h2>6. Data Retention</h2>
            <p>We retain personal information only as long as necessary to fulfill the purposes outlined in this policy,
                unless a longer retention period is required by law. When no longer needed, we securely delete or
                anonymize the data.</p>

            <h2>7. Your Rights</h2>
            <p>Depending on your location, you may have the right to access, correct, delete, or port your personal
                data, as well as object to or restrict certain processing. To exercise these rights, please contact us
                at <a href="mailto:privacy@areiasoft.com" style="color:var(--cyan);">privacy@areiasoft.com</a>. We will
                respond within 30 days.</p>

            <h2>8. Security</h2>
            <p>We implement industry-standard technical and organizational measures to protect your data against
                unauthorized access, loss, or alteration. However, no method of transmission over the internet is 100%
                secure.</p>

            <h2>9. Changes to This Policy</h2>
            <p>We may update this Privacy Policy from time to time. The latest version will always be available on this
                page, and we will notify you of material changes via email or a prominent notice on our website.</p>

            <h2>10. Contact Us</h2>
            <p>If you have any questions or concerns about this Privacy Policy, please reach out to our Data Protection
                Officer at:</p>
            <p>Email: <a href="mailto:privacy@areiasoft.com" style="color:var(--cyan);">privacy@areiasoft.com</a><br>
                Address: 1600 Amphitheatre Parkway, Mountain View, CA 94043, USA</p>
        </div>
    </div>
</x-guest-layout>
