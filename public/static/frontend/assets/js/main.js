(function () {
    // ── LOGO CANVAS (unchanged) ──
    const logoCanvas = document.getElementById("logo-canvas");
    const logoCtx = logoCanvas.getContext("2d");
    const logoW = logoCanvas.width,
        logoH = logoCanvas.height;
    const margin = 16,
        topY = margin + 4,
        bottomY = logoH - margin,
        leftX = margin,
        rightX = logoW - margin,
        midX = logoW / 2,
        crossY = logoH * 0.52;
    const segments = [{
        x1: leftX + 4,
        y1: bottomY,
        x2: midX,
        y2: topY
    },
    {
        x1: rightX - 4,
        y1: bottomY,
        x2: midX,
        y2: topY
    },
    {
        x1: leftX + 12,
        y1: crossY,
        x2: rightX - 12,
        y2: crossY
    },
    ];
    const logoParticles = [];

    function pointOnSegment(seg, t) {
        return {
            x: seg.x1 + (seg.x2 - seg.x1) * t,
            y: seg.y1 + (seg.y2 - seg.y1) * t,
        };
    }
    for (let i = 0; i < 90; i++) {
        const seg = segments[Math.floor(Math.random() * 3)],
            t = Math.random(),
            base = pointOnSegment(seg, t);
        logoParticles.push({
            baseX: base.x,
            baseY: base.y,
            x: base.x + (Math.random() -
                0.5) * 20,
            y: base.y + (Math.random() - 0.5) * 20,
            vx: (Math.random() - 0.5) * 0.3,
            vy: (Math.random() - 0.5) *
                0.3,
            radius: 0.8 + Math.random() * 1.6,
            alpha: 0.5 + Math.random() * 0.5,
            phase: Math.random() * Math.PI * 2,
        });
    }

    function animateLogo() {
        logoCtx.clearRect(0, 0, logoW, logoH);
        const time = Date.now() * 0.001;
        for (const
            p of logoParticles) {
            const wx = Math.cos(time * 1.3 + p.phase) * 4,
                wy = Math.sin(time * 1.7 + p.phase) * 4;
            const
                tx = p.baseX + wx,
                ty = p.baseY + wy;
            p.x += (tx - p.x) * 0.04 + p.vx;
            p.y += (ty - p.y) * 0.04 + p.vy;
            const dx = p.x -
                p.baseX,
                dy = p.y - p.baseY,
                dist = Math.sqrt(dx * dx + dy * dy);
            if (dist > 10) {
                p.vx -= (dx / dist) * 0.05;
                p.vy -= (dy / dist) * 0.05;
            }
            const alpha = p.alpha * (0.7 + 0.3 * Math.sin(time * 2 + p.phase));
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

    // ── THREE.JS BACKGROUND (unchanged) ──
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
            half = size / 2,
            grad = ctx.createRadialGradient(half, half, 0, half, half, half);
        grad.addColorStop(0, color);
        grad.addColorStop(0.15, color);
        grad.addColorStop(0.5, "rgba(0,180,220,0.25)");
        grad.addColorStop(1, "rgba(0,0,0,0)");
        ctx.fillStyle = grad;
        ctx.fillRect(0, 0, size, size);
        return new THREE.CanvasTexture(c);
    }
    const glowTex = createGlowTex("rgba(0,229,255,0.9)", 64);
    const bgParticlesGeo = new THREE.BufferGeometry(),
        bgParticleCount = 200,
        bgPositions = new Float32Array(bgParticleCount * 3),
        bgSizes = new Float32Array(bgParticleCount),
        bgParticleData = [];
    for (let i = 0; i < bgParticleCount; i++) {
        bgPositions[i * 3] = (Math.random() - 0.5) * 50;
        bgPositions[i * 3 +
            1] = (Math.random() - 0.5) * 35;
        bgPositions[i * 3 + 2] = (Math.random() - 0.5) * 30;
        bgSizes[i] = 0.08 +
            Math.random() * 0.35;
        bgParticleData.push({
            vx: (Math.random() - 0.5) * 0.015,
            vy: (Math.random() - 0.5) *
                0.015,
            vz: (Math.random() - 0.5) * 0.01,
            origX: bgPositions[i * 3],
            origY: bgPositions[i * 3 + 1],
            origZ: bgPositions[i * 3 + 2],
        });
    }
    bgParticlesGeo.setAttribute("position", new THREE.BufferAttribute(bgPositions, 3),);
    bgParticlesGeo.setAttribute("size", new THREE.BufferAttribute(bgSizes, 1),);
    const bgParticlesMat = new THREE.PointsMaterial({
        map: glowTex,
        color: 0x00e5ff,
        size: 0.55,
        blending: THREE.AdditiveBlending,
        depthWrite: false,
        transparent: true,
        opacity: 0.7,
    });
    const bgParticles = new THREE.Points(bgParticlesGeo, bgParticlesMat);
    bgScene.add(bgParticles);
    const
        linesMaterial = new THREE.LineBasicMaterial({
            color: 0x00c8e8,
            transparent: true,
            opacity: 0.12,
            blending: THREE.AdditiveBlending,
            depthWrite: false,
        }),
        linesGroup = new THREE.Group();
    bgScene.add(linesGroup);
    const
        maxConnections = 80;

    function updateConnections() {
        while (linesGroup.children.length > 0) {
            linesGroup.remove(linesGroup.children[0]);
        }
        const pos = bgPositions,
            count = bgParticleCount;
        let connections = 0;
        for (let i = 0; i < count && connections < maxConnections; i++) {
            for (let j = i + 1; j < count &&
                connections < maxConnections; j++) {
                const dx = pos[i * 3] - pos[j * 3],
                    dy = pos[i * 3 + 1] - pos[j * 3 +
                        1],
                    dz = pos[i * 3 + 2] - pos[j * 3 + 2],
                    dist = Math.sqrt(dx * dx + dy * dy + dz * dz);
                if (dist < 6.5 &&
                    Math.random() < 0.25) {
                    const lineGeo = new THREE.BufferGeometry();
                    lineGeo.setAttribute("position", new THREE.Float32BufferAttribute([pos[i * 3], pos[i * 3 +
                        1], pos[i * 3 + 2], pos[j * 3], pos[j * 3 + 1],
                    pos[j * 3 + 2],
                    ], 3,),);
                    const line = new THREE.Line(lineGeo, linesMaterial.clone());
                    line.material.opacity = 0.08 + Math.random() * 0.14;
                    linesGroup.add(line);
                    connections++;
                }
            }
        }
    }
    updateConnections();
    let connectionUpdateTimer = 0;
    let mouseX = 0,
        mouseY = 0,
        targetMouseX = 0,
        targetMouseY = 0;
    document.addEventListener("mousemove", (e) => {
        targetMouseX = (e.clientX / window.innerWidth) * 2 - 1;
        targetMouseY = -(e.clientY / window.innerHeight) * 2 + 1;
    });

    function animateBg() {
        requestAnimationFrame(animateBg);
        const time = Date.now() * 0.001;
        mouseX += (targetMouseX - mouseX) * 0.03;
        mouseY += (targetMouseY - mouseY) * 0.03;
        const pos = bgParticlesGeo.attributes.position.array;
        for (let i = 0; i < bgParticleCount; i++) {
            const pd = bgParticleData[i];
            pos[i * 3] += pd.vx;
            pos[i * 3 +
                1] += pd.vy;
            pos[i * 3 + 2] += pd.vz;
            if (Math.abs(pos[i * 3] - pd.origX) > 12) pd.vx *= -1;
            if (Math.abs(pos[i * 3 + 1] - pd.origY) > 10) pd.vy *= -1;
            if (Math.abs(pos[i * 3 + 2] - pd.origZ) > 10) pd.vz *= -1;
        }
        bgParticlesGeo.attributes.position.needsUpdate = true;
        bgCamera.position.x += (mouseX * 1.8 - bgCamera.position.x) * 0.02;
        bgCamera.position.y += (mouseY * 1.2 - bgCamera.position.y) * 0.02;
        bgCamera.lookAt(0, 0, 0);
        bgScene.rotation.y += 0.0008;
        bgScene.rotation.x += 0.0003;
        connectionUpdateTimer++;
        if (connectionUpdateTimer > 90) {
            connectionUpdateTimer = 0;
            updateConnections();
        }
        bgRenderer.render(bgScene, bgCamera);
    }
    animateBg();

    // ── GLOBE (unchanged) ──
    const globeContainer = document.getElementById("globeContainer"),
        globeCanvas = document.getElementById("globe-canvas");
    const globeRenderer = new THREE.WebGLRenderer({
        canvas: globeCanvas,
        antialias: true,
        alpha: true,
    });
    globeRenderer.setPixelRatio(Math.min(window.devicePixelRatio, 2));
    const globeScene = new THREE.Scene(),
        globeCamera = new THREE.PerspectiveCamera(45, 1, 0.3, 30);
    globeCamera.position.z = 8;

    function resizeGlobe() {
        const rect = globeContainer.getBoundingClientRect(),
            w = rect.width,
            h = Math.min(rect.height, w * 0.9);
        globeRenderer.setSize(w, h, false);
        globeCamera.aspect = w / Math.max(h, 1);
        globeCamera.updateProjectionMatrix();
    }
    resizeGlobe();
    const sphereGeo = new THREE.SphereGeometry(2.6, 48, 36),
        sphereWire = new THREE.LineSegments(
            new THREE.WireframeGeometry(sphereGeo, 1),
            new THREE.LineBasicMaterial({
                color: 0x1a3a4a,
                transparent: true,
                opacity: 0.35,
                depthWrite: false,
            }),
        );
    globeScene.add(sphereWire);
    const innerSphere = new THREE.Mesh(
        new THREE.SphereGeometry(2.55, 64, 48),
        new THREE.MeshBasicMaterial({
            color: 0x0a1a24,
            transparent: true,
            opacity: 0.3,
            depthWrite: false,
        }),
    );
    globeScene.add(innerSphere);
    const hubLocations = [{
        lat: 37.77,
        lng: -122.42
    },
    {
        lat: 40.71,
        lng: -74.01
    },
    {
        lat: 51.51,
        lng: -0.13
    },
    {
        lat: 52.52,
        lng: 13.4
    },
    {
        lat: 25.2,
        lng: 55.27
    },
    {
        lat: 12.97,
        lng: 77.59
    },
    {
        lat: 1.35,
        lng: 103.82
    },
    {
        lat: 35.68,
        lng: 139.76
    },
    {
        lat: -33.87,
        lng: 151.21
    },
    {
        lat: -23.55,
        lng: -46.63
    },
    {
        lat: 55.75,
        lng: 37.62
    },
    {
        lat: 30.04,
        lng: 31.24
    },
    ];
    const dotGroup = new THREE.Group(),
        hubDots = [],
        R = 2.62;
    hubLocations.forEach((loc) => {
        const phi = (90 - loc.lat) * (Math.PI / 180),
            theta = (loc.lng + 90) * (Math.PI / 180),
            x = -R * Math.sin(phi) * Math.cos(theta),
            y = R * Math.cos(phi),
            z = R * Math.sin(phi) * Math.sin(theta);
        const spriteMat = new THREE.SpriteMaterial({
            map: glowTex,
            color: 0x00e5ff,
            blending: THREE.AdditiveBlending,
            depthWrite: false,
            transparent: true,
            opacity: 0.9,
        }),
            sprite = new THREE.Sprite(spriteMat);
        sprite.position.set(x, y, z);
        sprite.scale.set(0.25, 0.25, 1);
        dotGroup.add(sprite);
        const dotGeo = new THREE.SphereGeometry(0.04, 8, 8),
            dotMat = new THREE.MeshBasicMaterial({
                color: 0xffffff,
                depthWrite: false,
            }),
            dot = new THREE.Mesh(dotGeo, dotMat);
        dot.position.copy(sprite.position);
        dotGroup.add(dot);
        hubDots.push({
            sprite,
            dot,
            x,
            y,
            z
        });
    });
    globeScene.add(dotGroup);
    const ringGeo = new THREE.TorusGeometry(2.75, 0.015, 16, 120),
        ringMat = new THREE.MeshBasicMaterial({
            color: 0x00c8e8,
            transparent: true,
            opacity: 0.3,
            depthWrite: false,
            blending: THREE.AdditiveBlending,
        }),
        ring = new THREE.Mesh(ringGeo, ringMat);
    ring.rotation.x = Math.PI * 0.55;
    ring.rotation.y = Math.PI * 0.2;
    globeScene.add(ring);
    const ring2 = new THREE.Mesh(
        new THREE.TorusGeometry(2.8, 0.012, 12, 100),
        new THREE.MeshBasicMaterial({
            color: 0x4de8ff,
            transparent: true,
            opacity: 0.2,
            depthWrite: false,
            blending: THREE.AdditiveBlending,
        }),
    );
    ring2.rotation.x = Math.PI * 0.3;
    ring2.rotation.y = -Math.PI * 0.35;
    globeScene.add(ring2);
    const arcGroup = new THREE.Group(),
        hubPairs = [
            [0, 1],
            [0, 3],
            [1, 2],
            [2, 3],
            [4, 7],
            [5, 6],
            [6, 7],
            [8, 9],
            [0, 6],
            [2, 7],
        ];
    hubPairs.forEach(([a, b]) => {
        const pA = new THREE.Vector3(
            hubDots[a].x,
            hubDots[a].y,
            hubDots[a].z,
        ),
            pB = new THREE.Vector3(hubDots[b].x, hubDots[b].y, hubDots[b].z),
            mid = pA.clone().add(pB).multiplyScalar(0.5),
            dist = pA.distanceTo(pB),
            ctrl = mid
                .clone()
                .normalize()
                .multiplyScalar(R + dist * 0.35),
            curve = new THREE.QuadraticBezierCurve3(
                pA.clone(),
                ctrl,
                pB.clone(),
            ),
            curvePoints = curve.getPoints(40),
            curveGeo = new THREE.BufferGeometry().setFromPoints(curvePoints),
            curveLine = new THREE.Line(
                curveGeo,
                new THREE.LineBasicMaterial({
                    color: 0x00d4ee,
                    transparent: true,
                    opacity: 0.18,
                    depthWrite: false,
                    blending: THREE.AdditiveBlending,
                }),
            );
        arcGroup.add(curveLine);
    });
    globeScene.add(arcGroup);
    let globeRotX = 0.3,
        globeRotY = 0,
        targetGlobeRotX = 0.3,
        targetGlobeRotY = 0,
        isDragging = false,
        autoRotate = true,
        dragVelocity = {
            x: 0,
            y: 0
        };
    globeContainer.addEventListener("mousedown", (e) => {
        isDragging = true;
        autoRotate = false;
        prevMouse = {
            x: e.clientX,
            y: e.clientY
        };
        dragVelocity = {
            x: 0,
            y: 0
        };
    });
    window.addEventListener("mouseup", () => {
        if (isDragging) {
            autoRotate = true;
            targetGlobeRotY += dragVelocity.x * 0.5;
            targetGlobeRotX += dragVelocity.y * 0.5;
        }
        isDragging = false;
    });
    window.addEventListener("mousemove", (e) => {
        if (isDragging) {
            const dx = e.clientX - prevMouse.x,
                dy = e.clientY - prevMouse.y;
            dragVelocity = {
                x: dx * 0.005,
                y: dy * 0.005
            };
            targetGlobeRotY += dx * 0.005;
            targetGlobeRotX += dy * 0.005;
            targetGlobeRotX = Math.max(-1.2, Math.min(1.2, targetGlobeRotX));
            prevMouse.x = e.clientX;
            prevMouse.y = e.clientY;
        } else if (!isDragging && globeContainer.matches(":hover")) {
            const rect = globeContainer.getBoundingClientRect(),
                cx = rect.left + rect.width / 2,
                cy = rect.top + rect.height / 2,
                mx = (e.clientX - cx) / (rect.width / 2),
                my = (e.clientY - cy) / (rect.height / 2);
            if (autoRotate) {
                targetGlobeRotY = mx * 0.5;
                targetGlobeRotX = my * 0.35;
            }
        }
    });
    globeContainer.addEventListener("touchstart", (e) => {
        if (e.touches.length === 1) {
            isDragging = true;
            autoRotate = false;
            prevMouse.x = e.touches[0].clientX;
            prevMouse.y = e.touches[0].clientY;
            dragVelocity = {
                x: 0,
                y: 0
            };
        }
    });
    window.addEventListener("touchend", () => {
        if (isDragging) {
            autoRotate = true;
            targetGlobeRotY += dragVelocity.x * 0.5;
            targetGlobeRotX += dragVelocity.y * 0.5;
        }
        isDragging = false;
    });
    window.addEventListener("touchmove", (e) => {
        if (isDragging && e.touches.length === 1) {
            const dx = e.touches[0].clientX - prevMouse.x,
                dy = e.touches[0].clientY - prevMouse.y;
            dragVelocity = {
                x: dx * 0.005,
                y: dy * 0.005
            };
            targetGlobeRotY += dx * 0.005;
            targetGlobeRotX += dy * 0.005;
            targetGlobeRotX = Math.max(-1.2, Math.min(1.2, targetGlobeRotX));
            prevMouse.x = e.touches[0].clientX;
            prevMouse.y = e.touches[0].clientY;
        }
    });

    function animateGlobe() {
        requestAnimationFrame(animateGlobe);
        const time = Date.now() * 0.001;
        if (autoRotate && !isDragging) targetGlobeRotY += 0.003;
        globeRotY += (targetGlobeRotY - globeRotY) * 0.06;
        globeRotX += (targetGlobeRotX - globeRotX) * 0.06;
        dotGroup.rotation.y = globeRotY;
        dotGroup.rotation.x = globeRotX;
        arcGroup.rotation.y = globeRotY;
        arcGroup.rotation.x = globeRotX;
        sphereWire.rotation.y = globeRotY;
        sphereWire.rotation.x = globeRotX;
        innerSphere.rotation.y = globeRotY;
        innerSphere.rotation.x = globeRotX;
        ring.rotation.z += 0.004;
        ring2.rotation.z -= 0.003;
        hubDots.forEach((hd, i) => {
            const pulse = 0.8 + 0.2 * Math.sin(time * 2.5 + i * 0.9);
            hd.sprite.scale.set(0.25 * pulse, 0.25 * pulse, 1);
            hd.sprite.material.opacity = 0.6 + 0.4 * pulse;
        });
        globeRenderer.render(globeScene, globeCamera);
    }
    animateGlobe();

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