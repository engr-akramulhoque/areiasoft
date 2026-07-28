(function () {
    // ── Logo Canvas ──
    const logoCanvas = document.getElementById("logo-canvas");
    const logoCtx = logoCanvas.getContext("2d");
    const logoW = logoCanvas.width,
        logoH = logoCanvas.height;
    const margin = 16,
        topY = margin + 4,
        bottomY = logoH - margin;
    const leftX = margin,
        rightX = logoW - margin,
        midX = logoW / 2,
        crossY = logoH * 0.52;
    const segments = [
        { x1: leftX + 4, y1: bottomY, x2: midX, y2: topY },
        { x1: rightX - 4, y1: bottomY, x2: midX, y2: topY },
        { x1: leftX + 12, y1: crossY, x2: rightX - 12, y2: crossY },
    ];
    const logoParticles = [];

    function pointOnSegment(seg, t) {
        return {
            x: seg.x1 + (seg.x2 - seg.x1) * t,
            y: seg.y1 + (seg.y2 - seg.y1) * t,
        };
    }
    for (let i = 0; i < 90; i++) {
        const seg = segments[Math.floor(Math.random() * 3)];
        const t = Math.random();
        const base = pointOnSegment(seg, t);
        logoParticles.push({
            baseX: base.x,
            baseY: base.y,
            x: base.x + (Math.random() - 0.5) * 20,
            y: base.y + (Math.random() - 0.5) * 20,
            vx: (Math.random() - 0.5) * 0.3,
            vy: (Math.random() - 0.5) * 0.3,
            radius: 0.8 + Math.random() * 1.6,
            alpha: 0.5 + Math.random() * 0.5,
            phase: Math.random() * Math.PI * 2,
        });
    }

    function animateLogo() {
        logoCtx.clearRect(0, 0, logoW, logoH);
        const time = Date.now() * 0.001;
        for (const p of logoParticles) {
            const wx = Math.cos(time * 1.3 + p.phase) * 4;
            const wy = Math.sin(time * 1.7 + p.phase) * 4;
            const tx = p.baseX + wx,
                ty = p.baseY + wy;
            p.x += (tx - p.x) * 0.04 + p.vx;
            p.y += (ty - p.y) * 0.04 + p.vy;
            const dx = p.x - p.baseX,
                dy = p.y - p.baseY,
                dist = Math.sqrt(dx * dx + dy * dy);
            if (dist > 10) {
                p.vx -= (dx / dist) * 0.05;
                p.vy -= (dy / dist) * 0.05;
            }
            const alpha =
                p.alpha *
                (0.7 + 0.3 * Math.sin(time * 2 + p.phase));
            const g = logoCtx.createRadialGradient(
                p.x,
                p.y,
                0,
                p.x,
                p.y,
                p.radius * 3,
            );
            g.addColorStop(0, `rgba(0,229,255,${alpha})`);
            g.addColorStop(0.4, `rgba(0,200,240,${alpha * 0.6})`);
            g.addColorStop(1, "rgba(0,229,255,0)");
            logoCtx.fillStyle = g;
            logoCtx.beginPath();
            logoCtx.arc(p.x, p.y, p.radius * 3, 0, Math.PI * 2);
            logoCtx.fill();
            logoCtx.fillStyle = `rgba(180,245,255,${alpha})`;
            logoCtx.beginPath();
            logoCtx.arc(p.x, p.y, p.radius, 0, Math.PI * 2);
            logoCtx.fill();
        }
        requestAnimationFrame(animateLogo);
    }
    animateLogo();

    // ── Three.js Background Network ──
    const bgCanvas = document.getElementById("bg-canvas");
    const bgRenderer = new THREE.WebGLRenderer({
        canvas: bgCanvas,
        antialias: true,
        alpha: true,
    });
    bgRenderer.setPixelRatio(Math.min(window.devicePixelRatio, 2));
    bgRenderer.setSize(window.innerWidth, window.innerHeight);
    const bgScene = new THREE.Scene();
    const bgCamera = new THREE.PerspectiveCamera(
        60,
        window.innerWidth / window.innerHeight,
        0.5,
        120,
    );
    bgCamera.position.z = 28;

    function createGlowTex(color, size) {
        const c = document.createElement("canvas");
        c.width = size;
        c.height = size;
        const ctx = c.getContext("2d"),
            half = size / 2;
        const grad = ctx.createRadialGradient(
            half,
            half,
            0,
            half,
            half,
            half,
        );
        grad.addColorStop(0, color);
        grad.addColorStop(0.15, color);
        grad.addColorStop(0.5, "rgba(0,180,220,0.25)");
        grad.addColorStop(1, "rgba(0,0,0,0)");
        ctx.fillStyle = grad;
        ctx.fillRect(0, 0, size, size);
        return new THREE.CanvasTexture(c);
    }
    const glowTex = createGlowTex("rgba(0,229,255,0.9)", 64);
    const bgParticlesGeo = new THREE.BufferGeometry();
    const bgParticleCount = 200;
    const bgPositions = new Float32Array(bgParticleCount * 3);
    const bgSizes = new Float32Array(bgParticleCount);
    const bgParticleData = [];
    for (let i = 0; i < bgParticleCount; i++) {
        bgPositions[i * 3] = (Math.random() - 0.5) * 50;
        bgPositions[i * 3 + 1] = (Math.random() - 0.5) * 35;
        bgPositions[i * 3 + 2] = (Math.random() - 0.5) * 30;
        bgSizes[i] = 0.08 + Math.random() * 0.35;
        bgParticleData.push({
            vx: (Math.random() - 0.5) * 0.015,
            vy: (Math.random() - 0.5) * 0.015,
            vz: (Math.random() - 0.5) * 0.01,
            origX: bgPositions[i * 3],
            origY: bgPositions[i * 3 + 1],
            origZ: bgPositions[i * 3 + 2],
        });
    }
    bgParticlesGeo.setAttribute(
        "position",
        new THREE.BufferAttribute(bgPositions, 3),
    );
    bgParticlesGeo.setAttribute(
        "size",
        new THREE.BufferAttribute(bgSizes, 1),
    );
    const bgParticlesMat = new THREE.PointsMaterial({
        map: glowTex,
        color: 0x00e5ff,
        size: 0.55,
        blending: THREE.AdditiveBlending,
        depthWrite: false,
        transparent: true,
        opacity: 0.7,
    });
    const bgParticles = new THREE.Points(
        bgParticlesGeo,
        bgParticlesMat,
    );
    bgScene.add(bgParticles);
    const linesMaterial = new THREE.LineBasicMaterial({
        color: 0x00c8e8,
        transparent: true,
        opacity: 0.12,
        blending: THREE.AdditiveBlending,
        depthWrite: false,
    });
    const linesGroup = new THREE.Group();
    bgScene.add(linesGroup);
    let connTimer = 0;

    function updateConnections() {
        while (linesGroup.children.length)
            linesGroup.remove(linesGroup.children[0]);
        const pos = bgPositions;
        let c = 0;
        for (let i = 0; i < bgParticleCount && c < 80; i++) {
            for (
                let j = i + 1;
                j < bgParticleCount && c < 80;
                j++
            ) {
                const dx = pos[i * 3] - pos[j * 3],
                    dy = pos[i * 3 + 1] - pos[j * 3 + 1],
                    dz = pos[i * 3 + 2] - pos[j * 3 + 2];
                const dist = Math.sqrt(dx * dx + dy * dy + dz * dz);
                if (dist < 6.5 && Math.random() < 0.25) {
                    const geo = new THREE.BufferGeometry();
                    geo.setAttribute(
                        "position",
                        new THREE.Float32BufferAttribute(
                            [
                                pos[i * 3],
                                pos[i * 3 + 1],
                                pos[i * 3 + 2],
                                pos[j * 3],
                                pos[j * 3 + 1],
                                pos[j * 3 + 2],
                            ],
                            3,
                        ),
                    );
                    const line = new THREE.Line(
                        geo,
                        linesMaterial.clone(),
                    );
                    line.material.opacity =
                        0.08 + Math.random() * 0.14;
                    linesGroup.add(line);
                    c++;
                }
            }
        }
    }
    updateConnections();
    let mx = 0,
        my = 0,
        tmx = 0,
        tmy = 0;
    document.addEventListener("mousemove", (e) => {
        tmx = (e.clientX / window.innerWidth) * 2 - 1;
        tmy = -(e.clientY / window.innerHeight) * 2 + 1;
    });

    function animateBg() {
        requestAnimationFrame(animateBg);
        mx += (tmx - mx) * 0.03;
        my += (tmy - my) * 0.03;
        const pos = bgParticlesGeo.attributes.position.array;
        for (let i = 0; i < bgParticleCount; i++) {
            const pd = bgParticleData[i];
            pos[i * 3] += pd.vx;
            pos[i * 3 + 1] += pd.vy;
            pos[i * 3 + 2] += pd.vz;
            if (Math.abs(pos[i * 3] - pd.origX) > 12) pd.vx *= -1;
            if (Math.abs(pos[i * 3 + 1] - pd.origY) > 10)
                pd.vy *= -1;
            if (Math.abs(pos[i * 3 + 2] - pd.origZ) > 10)
                pd.vz *= -1;
        }
        bgParticlesGeo.attributes.position.needsUpdate = true;
        bgCamera.position.x +=
            (mx * 1.8 - bgCamera.position.x) * 0.02;
        bgCamera.position.y +=
            (my * 1.2 - bgCamera.position.y) * 0.02;
        bgCamera.lookAt(0, 0, 0);
        bgScene.rotation.y += 0.0008;
        bgScene.rotation.x += 0.0003;
        connTimer++;
        if (connTimer > 90) {
            connTimer = 0;
            updateConnections();
        }
        bgRenderer.render(bgScene, bgCamera);
    }
    animateBg();

    // ── UI Interactions ──
    const header = document.getElementById("header");
    const menuToggle = document.getElementById("menuToggle");
    const navLinks = document.getElementById("navLinks");
    const workDropdown = document.getElementById("workDropdown");

    window.addEventListener("scroll", () => {
        header.classList.toggle("scrolled", window.scrollY > 50);
    });

    // ── Mobile dropdown toggle (click on .dropdown-trigger) ──
    const dropdownTrigger = workDropdown.querySelector(".dropdown-trigger");

    dropdownTrigger.addEventListener("click", function (e) {
        // On mobile (≤768px) we toggle the dropdown
        if (window.innerWidth <= 768) {
            e.preventDefault();
            workDropdown.classList.toggle("open");
        }
        // On desktop, default behavior (navigation) + hover handles dropdown
    });

    // ── Close dropdown when clicking outside ──
    document.addEventListener("click", function (e) {
        if (window.innerWidth <= 768) {
            if (!workDropdown.contains(e.target)) {
                workDropdown.classList.remove("open");
            }
        }
    });

    // ── Mobile menu toggle ──
    menuToggle.addEventListener("click", () => {
        navLinks.classList.toggle("open");
        menuToggle.classList.toggle("open");
        // close any open dropdown when menu closes
        if (!navLinks.classList.contains("open")) {
            workDropdown.classList.remove("open");
        }
    });

    // ── Close mobile menu on link click (except dropdown trigger) ──
    navLinks.querySelectorAll("a:not(.dropdown-trigger)").forEach((link) => {
        link.addEventListener("click", () => {
            navLinks.classList.remove("open");
            menuToggle.classList.remove("open");
            workDropdown.classList.remove("open");
        });
    });

    // ── Close mobile menu when clicking outside ──
    document.addEventListener("click", (e) => {
        if (
            !header.contains(e.target) &&
            navLinks.classList.contains("open")
        ) {
            navLinks.classList.remove("open");
            menuToggle.classList.remove("open");
            workDropdown.classList.remove("open");
        }
    });

    // ── Resize: reset mobile dropdown state ──
    window.addEventListener("resize", () => {
        bgRenderer.setSize(window.innerWidth, window.innerHeight);
        bgCamera.aspect = window.innerWidth / window.innerHeight;
        bgCamera.updateProjectionMatrix();
        if (window.innerWidth > 768) {
            navLinks.classList.remove("open");
            menuToggle.classList.remove("open");
            workDropdown.classList.remove("open");
        }
    });
})();
