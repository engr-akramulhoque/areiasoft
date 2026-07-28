<x-guest-layout>
    @push('styles')
        <style>
    /* Hero */
    .project-hero { padding: 10rem 2rem 3rem; text-align: center; }
    .section-label { font-size: 0.8rem; font-weight: 600; letter-spacing: 0.1em; text-transform: uppercase; color: var(--cyan); margin-bottom: 0.8rem; }
    .project-hero h1 { font-size: clamp(2.2rem, 5vw, 3.8rem); font-weight: 800; letter-spacing: -0.03em; margin-bottom: 1rem; }
    .project-hero p { color: var(--white-muted); max-width: 650px; margin: 0 auto; font-size: 1.1rem; }
    .project-tags { display: flex; justify-content: center; flex-wrap: wrap; gap: 0.6rem; margin: 1.5rem 0 0; }
    .project-tag { font-size: 0.7rem; font-weight: 600; text-transform: uppercase; letter-spacing: 0.05em; padding: 0.35rem 0.9rem; border-radius: 20px; background: rgba(0,229,255,0.08); color: var(--cyan); border: 1px solid rgba(0,229,255,0.2); }

    /* Back link */
    .back-link { display: inline-flex; align-items: center; gap: 0.4rem; color: var(--white-muted); text-decoration: none; font-size: 0.85rem; margin-bottom: 2rem; transition: color 0.2s; }
    .back-link:hover { color: var(--cyan); }
    .back-link svg { width: 16px; height: 16px; stroke: currentColor; }

    /* Main Content */
    .content-container { max-width: 1000px; margin: 0 auto 5rem; padding: 0 2rem; }

    .glass-card {
      background: var(--card-bg); backdrop-filter: blur(20px);
      border: 1px solid var(--glass-border); border-radius: var(--radius-lg);
      padding: 2.5rem 2rem; margin-bottom: 2rem;
      box-shadow: 0 8px 40px rgba(0,0,0,0.5); transition: var(--transition);
    }
    .glass-card:hover { border-color: var(--glass-border-hover); }

    .project-image {
      width: 100%; height: 400px; object-fit: cover;
      border-radius: var(--radius-md); background: linear-gradient(135deg, #0F1722, #1A2332);
      display: flex; align-items: center; justify-content: center;
      font-size: 2rem; color: rgba(255,255,255,0.2); margin-bottom: 2rem;
      border: 1px solid var(--glass-border);
    }

    .grid-2col { display: grid; grid-template-columns: 1fr 1fr; gap: 2rem; }
    @media (max-width: 768px) { .grid-2col { grid-template-columns: 1fr; } }

    .metric-box { text-align: center; padding: 1.5rem; background: rgba(0,229,255,0.03); border-radius: var(--radius-sm); border: 1px solid var(--glass-border); }
    .metric-number { font-size: 2rem; font-weight: 800; color: var(--cyan); }
    .metric-label { font-size: 0.85rem; color: var(--white-muted); margin-top: 0.3rem; }

    .tech-stack { display: flex; flex-wrap: wrap; gap: 0.5rem; margin-top: 1rem; }
    .tech-badge { background: rgba(0,229,255,0.08); border: 1px solid rgba(0,229,255,0.15); padding: 0.35rem 0.9rem; border-radius: 20px; font-size: 0.75rem; font-weight: 500; color: var(--cyan); }

    .feature-list { list-style: none; padding: 0; }
    .feature-list li { position: relative; padding-left: 1.8rem; margin-bottom: 0.7rem; color: var(--white-muted); font-size: 0.95rem; }
    .feature-list li::before { content: "✓"; position: absolute; left: 0; color: var(--cyan); font-weight: 700; }

    .testimonial { font-style: italic; border-left: 3px solid var(--cyan); padding-left: 1.5rem; color: var(--white-soft); margin: 1.5rem 0; }
    .testimonial-author { font-size: 0.9rem; color: var(--cyan); margin-top: 0.5rem; font-style: normal; }

    .btn-primary {
      display: inline-block; padding: 0.85rem 2.2rem; background: var(--cyan);
      color: var(--bg-deep); border-radius: 50px; font-weight: 700;
      font-size: 0.95rem; text-decoration: none; transition: var(--transition);
      box-shadow: 0 0 40px rgba(0,229,255,0.3);
    }
    .btn-primary:hover { box-shadow: 0 0 70px rgba(0,229,255,0.55); transform: translateY(-2px); }
    .btn-secondary {
      padding: 0.85rem 2.2rem; background: transparent; color: var(--white);
      border: 1px solid rgba(255,255,255,0.25); border-radius: 50px;
      font-weight: 600; font-size: 0.95rem; text-decoration: none; transition: var(--transition);
      display: inline-block;
    }
    .btn-secondary:hover { border-color: var(--white); background: rgba(255,255,255,0.04); }

    @media (max-width: 768px) {
      .project-hero { padding: 7rem 1.5rem 2rem; }
      .content-container { padding: 0 1.5rem; }
      .project-image { height: 250px; }
    }
        </style>
    @endpush

        <!-- Project Hero -->
    <section class="project-hero">
      <a href="our-work.html" class="back-link">
        <svg viewBox="0 0 24 24" fill="none"><path d="M19 12H5M12 19l-7-7 7-7"/></svg>
        Back to Portfolio
      </a>
      <p class="section-label">AI Platform · Enterprise</p>
      <h1>Nexus Analytics Suite</h1>
      <p>Real‑time predictive analytics dashboard that processes over 2 million events daily, empowering supply chain leaders with instant, actionable insights.</p>
      <div class="project-tags">
        <span class="project-tag">React</span>
        <span class="project-tag">Python</span>
        <span class="project-tag">TensorFlow</span>
        <span class="project-tag">AWS</span>
        <span class="project-tag">Kubernetes</span>
        <span class="project-tag">WebSockets</span>
      </div>
    </section>

    <!-- Content -->
    <div class="content-container">
      <!-- Project Image -->
      <div class="project-image">[ Nexus Dashboard Interface ]</div>

      <!-- Overview & Metrics -->
      <div class="grid-2col">
        <div class="glass-card">
          <h2 style="font-size:1.6rem; color:var(--cyan); margin-bottom:1rem;">Overview</h2>
          <p style="color:var(--white-muted); line-height:1.7;">Nexus replaced a legacy reporting system that took hours to generate insights. Our team built a streaming data pipeline with sub‑second latency, a customizable React dashboard, and ML models that predict inventory shortages 48 hours in advance. The result: a 30% reduction in stockouts and a 25% increase in operational efficiency.</p>
        </div>
        <div class="glass-card" style="display:flex; flex-direction:column; justify-content:center;">
          <div class="grid-2col" style="gap:1rem;">
            <div class="metric-box"><div class="metric-number">2M+</div><div class="metric-label">events / day</div></div>
            <div class="metric-box"><div class="metric-number">48h</div><div class="metric-label">predictive window</div></div>
            <div class="metric-box"><div class="metric-number">-30%</div><div class="metric-label">stockouts</div></div>
            <div class="metric-box"><div class="metric-number">+25%</div><div class="metric-label">efficiency</div></div>
          </div>
        </div>
      </div>

      <!-- Key Features -->
      <div class="glass-card">
        <h2 style="font-size:1.6rem; color:var(--cyan); margin-bottom:1.5rem;">Key Features</h2>
        <ul class="feature-list">
          <li>Real‑time event streaming with Apache Kafka and WebSockets</li>
          <li>Customizable drag‑and‑drop dashboard widgets</li>
          <li>ML‑powered anomaly detection and demand forecasting</li>
          <li>Role‑based access control with SSO integration</li>
          <li>Automated PDF/Excel report generation and scheduling</li>
          <li>Seamless integration with SAP, Oracle, and Microsoft Dynamics</li>
        </ul>
      </div>

      <!-- Tech Stack & Testimonial -->
      <div class="grid-2col">
        <div class="glass-card">
          <h2 style="font-size:1.6rem; color:var(--cyan); margin-bottom:1rem;">Technology Stack</h2>
          <div class="tech-stack">
            <span class="tech-badge">React 18</span>
            <span class="tech-badge">TypeScript</span>
            <span class="tech-badge">Python 3.11</span>
            <span class="tech-badge">TensorFlow</span>
            <span class="tech-badge">Kafka</span>
            <span class="tech-badge">PostgreSQL</span>
            <span class="tech-badge">Redis</span>
            <span class="tech-badge">Kubernetes</span>
            <span class="tech-badge">AWS Lambda</span>
            <span class="tech-badge">Terraform</span>
          </div>
        </div>
        <div class="glass-card">
          <h2 style="font-size:1.6rem; color:var(--cyan); margin-bottom:1rem;">Client Testimonial</h2>
          <div class="testimonial">
            "Areia Soft transformed our data chaos into a strategic asset. The Nexus dashboard is now the heartbeat of our supply chain operations."
          </div>
          <div class="testimonial-author">— Sarah Chen, VP of Operations, LogiCore Inc.</div>
        </div>
      </div>

      <!-- CTA -->
      <div style="text-align:center; margin-top:3rem;">
        <a href="our-work.html" class="btn-secondary" style="margin-right:1rem;">← View More Projects</a>
        <a href="contact.html" class="btn-primary">Start a Similar Project</a>
      </div>
    </div>

</x-guest-layout>