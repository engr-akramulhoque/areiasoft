// globee.js – 3D globe visualization for Areia Soft
// Depends on Three.js (global THREE object)

(function () {
    // Wait for the DOM & Three.js to be ready
    const init = () => {
        const globeContainer = document.getElementById("globeContainer");
        const globeCanvas = document.getElementById("globe-canvas");
        if (!globeContainer || !globeCanvas) return;

        // ── Helper: create radial glow texture ──
        function createGlowTex(color, size) {
            const c = document.createElement("canvas");
            c.width = size;
            c.height = size;
            const ctx = c.getContext("2d");
            const half = size / 2;
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

        // ── Globe renderer, scene, camera ──
        const globeRenderer = new THREE.WebGLRenderer({
            canvas: globeCanvas,
            antialias: true,
            alpha: true,
        });
        globeRenderer.setPixelRatio(Math.min(window.devicePixelRatio, 2));

        const globeScene = new THREE.Scene();
        const globeCamera = new THREE.PerspectiveCamera(45, 1, 0.3, 30);
        globeCamera.position.z = 8;

        function resizeGlobe() {
            const rect = globeContainer.getBoundingClientRect();
            const w = rect.width;
            const h = Math.min(rect.height, w * 0.9);
            globeRenderer.setSize(w, h, false);
            globeCamera.aspect = w / Math.max(h, 1);
            globeCamera.updateProjectionMatrix();
        }
        resizeGlobe();

        // ── Wireframe sphere ──
        const sphereGeo = new THREE.SphereGeometry(2.6, 48, 36);
        const sphereWire = new THREE.LineSegments(
            new THREE.WireframeGeometry(sphereGeo, 1),
            new THREE.LineBasicMaterial({
                color: 0x1a3a4a,
                transparent: true,
                opacity: 0.35,
                depthWrite: false,
            }),
        );
        globeScene.add(sphereWire);

        // ── Inner translucent sphere ──
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

        // ── Hub locations (lat/lng) ──
        const hubLocations = [
            { lat: 37.77, lng: -122.42 }, // San Francisco
            { lat: 40.71, lng: -74.01 }, // New York
            { lat: 51.51, lng: -0.13 }, // London
            { lat: 52.52, lng: 13.4 }, // Berlin
            { lat: 25.2, lng: 55.27 }, // Dubai
            { lat: 12.97, lng: 77.59 }, // Bangalore
            { lat: 1.35, lng: 103.82 }, // Singapore
            { lat: 35.68, lng: 139.76 }, // Tokyo
            { lat: -33.87, lng: 151.21 }, // Sydney
            { lat: -23.55, lng: -46.63 }, // São Paulo
            { lat: 55.75, lng: 37.62 }, // Moscow
            { lat: 30.04, lng: 31.24 }, // Cairo
        ];

        const dotGroup = new THREE.Group();
        const hubDots = [];
        const R = 2.62; // radius slightly outside the sphere

        hubLocations.forEach((loc) => {
            const phi = (90 - loc.lat) * (Math.PI / 180);
            const theta = (loc.lng + 90) * (Math.PI / 180);
            const x = -R * Math.sin(phi) * Math.cos(theta);
            const y = R * Math.cos(phi);
            const z = R * Math.sin(phi) * Math.sin(theta);

            // Glow sprite
            const spriteMat = new THREE.SpriteMaterial({
                map: glowTex,
                color: 0x00e5ff,
                blending: THREE.AdditiveBlending,
                depthWrite: false,
                transparent: true,
                opacity: 0.9,
            });
            const sprite = new THREE.Sprite(spriteMat);
            sprite.position.set(x, y, z);
            sprite.scale.set(0.25, 0.25, 1);
            dotGroup.add(sprite);

            // Tiny core dot
            const dotGeo = new THREE.SphereGeometry(0.04, 8, 8);
            const dotMat = new THREE.MeshBasicMaterial({
                color: 0xffffff,
                depthWrite: false,
            });
            const dot = new THREE.Mesh(dotGeo, dotMat);
            dot.position.copy(sprite.position);
            dotGroup.add(dot);

            hubDots.push({ sprite, dot, x, y, z });
        });
        globeScene.add(dotGroup);

        // ── Orbital rings ──
        const ringGeo = new THREE.TorusGeometry(2.75, 0.015, 16, 120);
        const ringMat = new THREE.MeshBasicMaterial({
            color: 0x00c8e8,
            transparent: true,
            opacity: 0.3,
            depthWrite: false,
            blending: THREE.AdditiveBlending,
        });
        const ring = new THREE.Mesh(ringGeo, ringMat);
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

        // ── Connection arcs between hubs ──
        const arcGroup = new THREE.Group();
        const hubPairs = [
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
            );
            const pB = new THREE.Vector3(
                hubDots[b].x,
                hubDots[b].y,
                hubDots[b].z,
            );
            const mid = pA.clone().add(pB).multiplyScalar(0.5);
            const dist = pA.distanceTo(pB);
            const ctrl = mid
                .clone()
                .normalize()
                .multiplyScalar(R + dist * 0.35);
            const curve = new THREE.QuadraticBezierCurve3(
                pA.clone(),
                ctrl,
                pB.clone(),
            );
            const curvePoints = curve.getPoints(40);
            const curveGeo = new THREE.BufferGeometry().setFromPoints(
                curvePoints,
            );
            const curveLine = new THREE.Line(
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

        // ── Rotation & interaction state ──
        let globeRotX = 0.3,
            globeRotY = 0;
        let targetGlobeRotX = 0.3,
            targetGlobeRotY = 0;
        let isDragging = false,
            autoRotate = true;
        let dragVelocity = { x: 0, y: 0 };
        let prevMouse = { x: 0, y: 0 };

        globeContainer.addEventListener("mousedown", (e) => {
            isDragging = true;
            autoRotate = false;
            prevMouse = { x: e.clientX, y: e.clientY };
            dragVelocity = { x: 0, y: 0 };
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
                const dx = e.clientX - prevMouse.x;
                const dy = e.clientY - prevMouse.y;
                dragVelocity = { x: dx * 0.005, y: dy * 0.005 };
                targetGlobeRotY += dx * 0.005;
                targetGlobeRotX += dy * 0.005;
                targetGlobeRotX = Math.max(
                    -1.2,
                    Math.min(1.2, targetGlobeRotX),
                );
                prevMouse.x = e.clientX;
                prevMouse.y = e.clientY;
            } else if (!isDragging && globeContainer.matches(":hover")) {
                const rect = globeContainer.getBoundingClientRect();
                const cx = rect.left + rect.width / 2;
                const cy = rect.top + rect.height / 2;
                const mx = (e.clientX - cx) / (rect.width / 2);
                const my = (e.clientY - cy) / (rect.height / 2);
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
                dragVelocity = { x: 0, y: 0 };
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
                const dx = e.touches[0].clientX - prevMouse.x;
                const dy = e.touches[0].clientY - prevMouse.y;
                dragVelocity = { x: dx * 0.005, y: dy * 0.005 };
                targetGlobeRotY += dx * 0.005;
                targetGlobeRotX += dy * 0.005;
                targetGlobeRotX = Math.max(
                    -1.2,
                    Math.min(1.2, targetGlobeRotX),
                );
                prevMouse.x = e.touches[0].clientX;
                prevMouse.y = e.touches[0].clientY;
            }
        });

        // ── Animation loop ──
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

            // Pulsing glow on hubs
            hubDots.forEach((hd, i) => {
                const pulse = 0.8 + 0.2 * Math.sin(time * 2.5 + i * 0.9);
                hd.sprite.scale.set(0.25 * pulse, 0.25 * pulse, 1);
                hd.sprite.material.opacity = 0.6 + 0.4 * pulse;
            });

            globeRenderer.render(globeScene, globeCamera);
        }
        animateGlobe();

        // ── Resize handler ──
        window.addEventListener("resize", resizeGlobe);

        // ── Counter animation for the stat number ──
        const statsObserver = new IntersectionObserver(
            (entries) => {
                entries.forEach((entry) => {
                    if (entry.isIntersecting) {
                        const statEl = document.getElementById("statClients");
                        if (statEl && !statEl.dataset.animated) {
                            statEl.dataset.animated = "true";
                            animateNumber(statEl, 200);
                        }
                    }
                });
            },
            { threshold: 0.3 },
        );

        const globeStatsEl = document.querySelector(".globe-stats");
        if (globeStatsEl) statsObserver.observe(globeStatsEl);

        function animateNumber(el, target) {
            const duration = 2000;
            const start = performance.now();
            const initialText = el.textContent;
            const hasPlus = initialText.includes("+");

            function update(now) {
                const elapsed = now - start;
                const progress = Math.min(elapsed / duration, 1);
                const eased = 1 - Math.pow(1 - progress, 3);
                const current = Math.round(eased * target);
                el.textContent = hasPlus ? current + "+" : current;
                if (progress < 1) requestAnimationFrame(update);
            }
            requestAnimationFrame(update);
        }
    };

    // Start when DOM is ready
    if (document.readyState === "loading") {
        document.addEventListener("DOMContentLoaded", init);
    } else {
        init();
    }
})();
