(function () {
    "use strict";

    // =========================================================
    // THREE.JS BACKGROUND NETWORK
    // =========================================================

    const bgCanvas = document.getElementById("bg-canvas");

    // Stop safely if the background canvas doesn't exist
    if (bgCanvas && typeof THREE !== "undefined") {
        const bgRenderer = new THREE.WebGLRenderer({
            canvas: bgCanvas,
            antialias: true,
            alpha: true,
        });

        bgRenderer.setPixelRatio(
            Math.min(window.devicePixelRatio || 1, 2)
        );

        bgRenderer.setSize(
            window.innerWidth,
            window.innerHeight
        );

        const bgScene = new THREE.Scene();

        const bgCamera = new THREE.PerspectiveCamera(
            60,
            window.innerWidth / window.innerHeight,
            0.5,
            120
        );

        bgCamera.position.z = 28;

        // ---------------------------------------------------------
        // Glow Texture
        // ---------------------------------------------------------

        function createGlowTex(color, size) {
            const canvas = document.createElement("canvas");

            canvas.width = size;
            canvas.height = size;

            const ctx = canvas.getContext("2d");
            const half = size / 2;

            const grad = ctx.createRadialGradient(
                half,
                half,
                0,
                half,
                half,
                half
            );

            grad.addColorStop(0, color);
            grad.addColorStop(0.15, color);
            grad.addColorStop(
                0.5,
                "rgba(0,180,220,0.25)"
            );
            grad.addColorStop(
                1,
                "rgba(0,0,0,0)"
            );

            ctx.fillStyle = grad;
            ctx.fillRect(0, 0, size, size);

            return new THREE.CanvasTexture(canvas);
        }

        const glowTex = createGlowTex(
            "rgba(0,229,255,0.9)",
            64
        );

        // ---------------------------------------------------------
        // Background Particles
        // ---------------------------------------------------------

        const bgParticlesGeo = new THREE.BufferGeometry();

        const bgParticleCount = 200;

        const bgPositions = new Float32Array(
            bgParticleCount * 3
        );

        const bgSizes = new Float32Array(
            bgParticleCount
        );

        const bgParticleData = [];

        for (let i = 0; i < bgParticleCount; i++) {
            bgPositions[i * 3] =
                (Math.random() - 0.5) * 50;

            bgPositions[i * 3 + 1] =
                (Math.random() - 0.5) * 35;

            bgPositions[i * 3 + 2] =
                (Math.random() - 0.5) * 30;

            bgSizes[i] =
                0.08 + Math.random() * 0.35;

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
            new THREE.BufferAttribute(
                bgPositions,
                3
            )
        );

        bgParticlesGeo.setAttribute(
            "size",
            new THREE.BufferAttribute(
                bgSizes,
                1
            )
        );

        // ---------------------------------------------------------
        // Particle Material
        // ---------------------------------------------------------

        const bgParticlesMat =
            new THREE.PointsMaterial({
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
            bgParticlesMat
        );

        bgScene.add(bgParticles);

        // ---------------------------------------------------------
        // Connection Lines
        // ---------------------------------------------------------

        const linesMaterial =
            new THREE.LineBasicMaterial({
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
            // Remove existing lines
            while (linesGroup.children.length) {
                const child = linesGroup.children[0];

                if (child.geometry) {
                    child.geometry.dispose();
                }

                if (child.material) {
                    child.material.dispose();
                }

                linesGroup.remove(child);
            }

            const pos = bgPositions;

            let connectionCount = 0;

            for (
                let i = 0;
                i < bgParticleCount &&
                connectionCount < 80;
                i++
            ) {
                for (
                    let j = i + 1;
                    j < bgParticleCount &&
                    connectionCount < 80;
                    j++
                ) {
                    const dx =
                        pos[i * 3] -
                        pos[j * 3];

                    const dy =
                        pos[i * 3 + 1] -
                        pos[j * 3 + 1];

                    const dz =
                        pos[i * 3 + 2] -
                        pos[j * 3 + 2];

                    const dist = Math.sqrt(
                        dx * dx +
                        dy * dy +
                        dz * dz
                    );

                    if (
                        dist < 6.5 &&
                        Math.random() < 0.25
                    ) {
                        const geo =
                            new THREE.BufferGeometry();

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
                                3
                            )
                        );

                        const line =
                            new THREE.Line(
                                geo,
                                linesMaterial.clone()
                            );

                        line.material.opacity =
                            0.08 +
                            Math.random() * 0.14;

                        linesGroup.add(line);

                        connectionCount++;
                    }
                }
            }
        }

        updateConnections();

        // ---------------------------------------------------------
        // Mouse Movement
        // ---------------------------------------------------------

        let mx = 0;
        let my = 0;

        let tmx = 0;
        let tmy = 0;

        document.addEventListener(
            "mousemove",
            function (e) {
                tmx =
                    (e.clientX /
                        window.innerWidth) *
                        2 -
                    1;

                tmy =
                    -(e.clientY /
                        window.innerHeight) *
                        2 +
                    1;
            }
        );

        // ---------------------------------------------------------
        // Background Animation
        // ---------------------------------------------------------

        function animateBg() {
            requestAnimationFrame(
                animateBg
            );

            mx +=
                (tmx - mx) * 0.03;

            my +=
                (tmy - my) * 0.03;

            const pos =
                bgParticlesGeo.attributes
                    .position.array;

            for (
                let i = 0;
                i < bgParticleCount;
                i++
            ) {
                const pd =
                    bgParticleData[i];

                pos[i * 3] += pd.vx;

                pos[i * 3 + 1] += pd.vy;

                pos[i * 3 + 2] += pd.vz;

                if (
                    Math.abs(
                        pos[i * 3] -
                            pd.origX
                    ) > 12
                ) {
                    pd.vx *= -1;
                }

                if (
                    Math.abs(
                        pos[i * 3 + 1] -
                            pd.origY
                    ) > 10
                ) {
                    pd.vy *= -1;
                }

                if (
                    Math.abs(
                        pos[i * 3 + 2] -
                            pd.origZ
                    ) > 10
                ) {
                    pd.vz *= -1;
                }
            }

            bgParticlesGeo.attributes
                .position.needsUpdate = true;

            bgCamera.position.x +=
                (
                    mx * 1.8 -
                    bgCamera.position.x
                ) * 0.02;

            bgCamera.position.y +=
                (
                    my * 1.2 -
                    bgCamera.position.y
                ) * 0.02;

            bgCamera.lookAt(
                0,
                0,
                0
            );

            bgScene.rotation.y +=
                0.0008;

            bgScene.rotation.x +=
                0.0003;

            connTimer++;

            if (connTimer > 90) {
                connTimer = 0;

                updateConnections();
            }

            bgRenderer.render(
                bgScene,
                bgCamera
            );
        }

        animateBg();

        // ---------------------------------------------------------
        // Resize
        // ---------------------------------------------------------

        window.addEventListener(
            "resize",
            function () {
                bgRenderer.setSize(
                    window.innerWidth,
                    window.innerHeight
                );

                bgCamera.aspect =
                    window.innerWidth /
                    window.innerHeight;

                bgCamera.updateProjectionMatrix();
            }
        );
    }

    // =========================================================
    // UI INTERACTIONS
    // =========================================================

    const header =
        document.getElementById("header");

    const menuToggle =
        document.getElementById(
            "menuToggle"
        );

    const navLinks =
        document.getElementById(
            "navLinks"
        );

    const workDropdown =
        document.getElementById(
            "workDropdown"
        );

    const companyDropdown =
        document.getElementById(
            "companyDropdown"
        );

    // ---------------------------------------------------------
    // Make sure required elements exist
    // ---------------------------------------------------------

    if (
        !header ||
        !menuToggle ||
        !navLinks ||
        !workDropdown ||
        !companyDropdown
    ) {
        return;
    }

    // ---------------------------------------------------------
    // Header Scroll Effect
    // ---------------------------------------------------------

    window.addEventListener(
        "scroll",
        function () {
            header.classList.toggle(
                "scrolled",
                window.scrollY > 50
            );
        }
    );

    // ---------------------------------------------------------
    // Dropdown Triggers
    // ---------------------------------------------------------

    const dropdownTrigger =
        workDropdown.querySelector(
            ".dropdown-trigger"
        );

    const cDropdownTrigger =
        companyDropdown.querySelector(
            ".dropdown-trigger"
        );

    if (dropdownTrigger) {
        dropdownTrigger.addEventListener(
            "click",
            function (e) {
                if (
                    window.innerWidth <=
                    768
                ) {
                    e.preventDefault();

                    workDropdown.classList.toggle(
                        "open"
                    );
                }
            }
        );
    }

    if (cDropdownTrigger) {
        cDropdownTrigger.addEventListener(
            "click",
            function (e) {
                if (
                    window.innerWidth <=
                    768
                ) {
                    e.preventDefault();

                    companyDropdown.classList.toggle(
                        "open"
                    );
                }
            }
        );
    }

    // ---------------------------------------------------------
    // Close Dropdown When Clicking Outside
    // ---------------------------------------------------------

    document.addEventListener(
        "click",
        function (e) {
            if (
                window.innerWidth <=
                768
            ) {
                if (
                    !workDropdown.contains(
                        e.target
                    )
                ) {
                    workDropdown.classList.remove(
                        "open"
                    );
                }

                if (
                    !companyDropdown.contains(
                        e.target
                    )
                ) {
                    companyDropdown.classList.remove(
                        "open"
                    );
                }
            }
        }
    );

    // ---------------------------------------------------------
    // Mobile Menu Toggle
    // ---------------------------------------------------------

    menuToggle.addEventListener(
        "click",
        function () {
            navLinks.classList.toggle(
                "open"
            );

            menuToggle.classList.toggle(
                "open"
            );

            if (
                !navLinks.classList.contains(
                    "open"
                )
            ) {
                workDropdown.classList.remove(
                    "open"
                );

                companyDropdown.classList.remove(
                    "open"
                );
            }
        }
    );

    // ---------------------------------------------------------
    // Close Mobile Menu After Navigation
    // ---------------------------------------------------------

    navLinks
        .querySelectorAll(
            "a:not(.dropdown-trigger)"
        )
        .forEach(function (link) {
            link.addEventListener(
                "click",
                function () {
                    navLinks.classList.remove(
                        "open"
                    );

                    menuToggle.classList.remove(
                        "open"
                    );

                    workDropdown.classList.remove(
                        "open"
                    );

                    companyDropdown.classList.remove(
                        "open"
                    );
                }
            );
        });

    // ---------------------------------------------------------
    // Close Mobile Menu When Clicking Outside
    // ---------------------------------------------------------

    document.addEventListener(
        "click",
        function (e) {
            if (
                !header.contains(e.target) &&
                navLinks.classList.contains(
                    "open"
                )
            ) {
                navLinks.classList.remove(
                    "open"
                );

                menuToggle.classList.remove(
                    "open"
                );

                workDropdown.classList.remove(
                    "open"
                );

                companyDropdown.classList.remove(
                    "open"
                );
            }
        }
    );

    // ---------------------------------------------------------
    // Reset Mobile Navigation On Resize
    // ---------------------------------------------------------

    window.addEventListener(
        "resize",
        function () {
            if (
                window.innerWidth > 768
            ) {
                navLinks.classList.remove(
                    "open"
                );

                menuToggle.classList.remove(
                    "open"
                );

                workDropdown.classList.remove(
                    "open"
                );

                companyDropdown.classList.remove(
                    "open"
                );
            }
        }
    );
})();