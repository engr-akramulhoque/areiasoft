<x-guest-layout>
    @push('styles')
        <style>
            /* ── Contact Hero ── */
            .contact-hero {
                padding: 10rem 2rem 4rem;
                text-align: center;
            }

            .contact-hero .section-label {
                font-size: 0.8rem;
                font-weight: 600;
                letter-spacing: 0.1em;
                text-transform: uppercase;
                color: var(--cyan);
                margin-bottom: 1rem;
            }

            .contact-hero h1 {
                font-size: clamp(2.5rem, 5vw, 4rem);
                font-weight: 800;
                letter-spacing: -0.03em;
                color: var(--white);
            }

            .contact-hero p {
                font-size: 1.1rem;
                color: var(--white-muted);
                max-width: 500px;
                margin: 1rem auto 0;
            }

            /* ── Contact Section ── */
            .contact-section {
                max-width: 1200px;
                margin: 0 auto;
                padding: 2rem 2rem 5rem;
                display: grid;
                grid-template-columns: 1fr 1fr;
                gap: 2.5rem;
            }

            @media (max-width: 768px) {
                .contact-section {
                    grid-template-columns: 1fr;
                }
            }

            /* Glass form */
            .contact-form {
                background: var(--card-bg);
                border: 1px solid var(--glass-border);
                border-radius: var(--radius-lg);
                padding: 2.5rem;
                backdrop-filter: blur(20px);
                -webkit-backdrop-filter: blur(20px);
                box-shadow: 0 8px 40px rgba(0, 0, 0, 0.5);
            }

            .form-group {
                margin-bottom: 1.5rem;
            }

            .form-group label {
                display: block;
                font-size: 0.8rem;
                font-weight: 600;
                letter-spacing: 0.05em;
                text-transform: uppercase;
                color: var(--cyan);
                margin-bottom: 0.5rem;
            }

            .form-group input,
            .form-group textarea {
                width: 100%;
                padding: 0.9rem 1.2rem;
                background: rgba(255, 255, 255, 0.03);
                border: 1px solid var(--glass-border);
                border-radius: var(--radius-sm);
                color: var(--white);
                font-family: inherit;
                font-size: 0.95rem;
                transition: var(--transition);
                outline: none;
                resize: vertical;
            }

            .form-group input:focus,
            .form-group textarea:focus {
                border-color: var(--cyan);
                box-shadow: 0 0 20px var(--cyan-glow);
                background: rgba(0, 229, 255, 0.03);
            }

            .form-group textarea {
                min-height: 130px;
            }

            .btn-submit {
                width: 100%;
                padding: 0.9rem 2rem;
                background: var(--cyan);
                color: var(--bg-deep);
                border: none;
                border-radius: 50px;
                font-weight: 700;
                font-size: 1rem;
                cursor: pointer;
                letter-spacing: 0.02em;
                transition: var(--transition);
                box-shadow: 0 0 30px rgba(0, 229, 255, 0.3);
            }

            .btn-submit:hover {
                box-shadow: 0 0 60px rgba(0, 229, 255, 0.5);
                transform: translateY(-2px);
            }

            /* Contact info cards */
            .contact-info {
                display: flex;
                flex-direction: column;
                gap: 1.5rem;
            }

            .info-card {
                background: var(--card-bg);
                border: 1px solid var(--glass-border);
                border-radius: var(--radius-lg);
                padding: 1.8rem;
                backdrop-filter: blur(20px);
                -webkit-backdrop-filter: blur(20px);
                box-shadow: 0 8px 40px rgba(0, 0, 0, 0.5);
                transition: var(--transition);
                display: flex;
                align-items: flex-start;
                gap: 1rem;
            }

            .info-card:hover {
                border-color: var(--cyan);
                box-shadow: 0 0 35px rgba(0, 229, 255, 0.1);
            }

            .info-icon {
                font-size: 1.6rem;
                color: var(--cyan);
                background: rgba(0, 229, 255, 0.08);
                width: 48px;
                height: 48px;
                border-radius: var(--radius-sm);
                display: flex;
                align-items: center;
                justify-content: center;
                flex-shrink: 0;
            }

            .info-text h4 {
                font-weight: 700;
                margin-bottom: 0.3rem;
                color: var(--white);
            }

            .info-text p {
                color: var(--white-muted);
                font-size: 0.9rem;
                line-height: 1.5;
            }

            .info-text a {
                color: var(--cyan);
                text-decoration: none;
                font-weight: 500;
            }

            /* Map placeholder (glass) */
            .map-placeholder {
                background: var(--card-bg);
                border: 1px solid var(--glass-border);
                border-radius: var(--radius-lg);
                height: 200px;
                backdrop-filter: blur(20px);
                display: flex;
                align-items: center;
                justify-content: center;
                color: var(--white-muted);
                font-size: 0.9rem;
                letter-spacing: 0.05em;
                margin-top: 0.5rem;
            }

            /* Responsive */
            @media (max-width: 768px) {
                .contact-hero {
                    padding: 7rem 1.5rem 2rem;
                }

                .contact-section {
                    grid-template-columns: 1fr;
                    padding: 0 1.5rem 4rem;
                }
            }
        </style>
    @endpush
    <!-- Contact Hero -->
    <section class="contact-hero">
        <p class="section-label">Get in Touch</p>
        <h1>Let's Build the Future Together</h1>
        <p>Have a project in mind? We’d love to hear about it. Fill out the form and our team will get back to you
            within 24 hours.</p>
    </section>

    <!-- Contact Section -->
    <section class="contact-section">
        <!-- Form -->
        <div class="contact-form">
            <form id="contactForm" action="{{ route('contact.store') }}" method="POST">
                @csrf

                <div class="form-group">
                    <label for="name">Full Name</label>
                    <input type="text" id="name" name="name" placeholder="Alex Johnson" required>
                    @error('name')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="email">Work Email</label>
                    <input type="email" id="email" name="email" placeholder="alex@company.com" required>
                    @error('email')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="subject">Subject</label>
                    <input type="text" id="subject" name="subject" placeholder="Project Discussion">
                    @error('subject')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="message">Message</label>
                    <textarea id="message" name="message" placeholder="Tell us about your project, timeline, and goals..." required></textarea>
                    @error('message')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>
                <button type="submit" class="btn-submit">Send Message</button>
            </form>
        </div>

        <!-- Contact Info -->
        <div class="contact-info">
            <div class="info-card">
                <div class="info-icon">✉️</div>
                <div class="info-text">
                    <h4>Email</h4>
                    <p><a href="mailto:info@areiasoft.com">info@areiasoft.com</a></p>
                    <p>For general inquiries & partnerships</p>
                </div>
            </div>
            <div class="info-card">
                <div class="info-icon">📞</div>
                <div class="info-text">
                    <h4>Phone</h4>
                    <p>+880-1631-444165</p>
                    <p>Mon–Fri, 9am–6pm PST</p>
                </div>
            </div>
            <div class="info-card">
                <div class="info-icon">📍</div>
                <div class="info-text">
                    <h4>Global HQ</h4>
                    <p>House 17, Uttara Sector 12<br>Dhaka, 1230</p>
                </div>
            </div>
            <div class="map-placeholder">
                <iframe
                    src="https://www.google.com/maps/embed?pb=!1m14!1m12!1m3!1d1403.4183263326183!2d90.37444864540204!3d23.876691806600483!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!5e1!3m2!1sen!2sbd!4v1785347320878!5m2!1sen!2sbd"
                    width="100%" height="100%" style="border:0;border-radius: 5%;" allowfullscreen="" loading="lazy"
                    referrerpolicy="strict-origin-when-cross-origin"></iframe>
            </div>
        </div>
    </section>

</x-guest-layout>
