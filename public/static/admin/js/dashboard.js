// Toggle dark mode
const themeToggle = document.getElementById("themeToggle");
themeToggle.addEventListener("click", () => {
    document.documentElement.classList.toggle("dark");
    localStorage.setItem(
        "theme",
        document.documentElement.classList.contains("dark") ? "dark" : "light"
    );
});

// Initialize theme from localStorage
if (
    localStorage.getItem("theme") === "dark" ||
    (!localStorage.getItem("theme") &&
        window.matchMedia("(prefers-color-scheme: dark)").matches)
) {
    document.documentElement.classList.add("dark");
}

// Toggle mobile sidebar
const mobileSidebarToggle = document.getElementById(
    "mobileSidebarToggle"
);
const sidebarToggle = document.getElementById("sidebarToggle");
const sidebar = document.querySelector("aside");
const sidebarOverlay = document.getElementById("sidebarOverlay");

mobileSidebarToggle.addEventListener("click", () => {
    sidebar.classList.remove("-translate-x-full");
    sidebarOverlay.classList.remove("hidden");
});

sidebarToggle.addEventListener("click", () => {
    sidebar.classList.add("-translate-x-full");
    sidebarOverlay.classList.add("hidden");
});

sidebarOverlay.addEventListener("click", () => {
    sidebar.classList.add("-translate-x-full");
    sidebarOverlay.classList.add("hidden");
});

// Dropdown functionality
document.querySelectorAll(".dropdown-toggle").forEach((toggle) => {
    toggle.addEventListener("click", (e) => {
        e.preventDefault();
        const dropdown = toggle.closest(".dropdown");
        const menu = dropdown.querySelector(".dropdown-content");
        const icon = toggle.querySelector(".fa-chevron-down");

        // Close all other dropdowns first
        document.querySelectorAll(".dropdown-content").forEach((m) => {
            if (m !== menu) m.classList.add("hidden");
        });
        document
            .querySelectorAll(".dropdown-toggle .fa-chevron-down")
            .forEach((i) => {
                if (i !== icon) i.classList.remove("rotate-180");
            });

        // Toggle current dropdown
        menu.classList.toggle("hidden");
        icon.classList.toggle("rotate-180");
    });
});

// Topbar dropdowns
const messagesDropdown = document.getElementById("messagesDropdown");
const messagesMenu = document.getElementById("messagesMenu");
const notificationsDropdown = document.getElementById(
    "notificationsDropdown"
);
const notificationsMenu = document.getElementById("notificationsMenu");
const profileDropdown = document.getElementById("profileDropdown");
const profileMenu = document.getElementById("profileMenu");

messagesDropdown.addEventListener("click", (e) => {
    e.stopPropagation();
    // Close other dropdowns
    notificationsMenu.classList.add("hidden");
    profileMenu.classList.add("hidden");
    // Toggle messages menu
    messagesMenu.classList.toggle("hidden");
});

notificationsDropdown.addEventListener("click", (e) => {
    e.stopPropagation();
    // Close other dropdowns
    messagesMenu.classList.add("hidden");
    profileMenu.classList.add("hidden");
    // Toggle notifications menu
    notificationsMenu.classList.toggle("hidden");
});

profileDropdown.addEventListener("click", (e) => {
    e.stopPropagation();
    // Close other dropdowns
    messagesMenu.classList.add("hidden");
    notificationsMenu.classList.add("hidden");
    // Toggle profile menu
    profileMenu.classList.toggle("hidden");
});

// Close dropdowns when clicking outside
document.addEventListener("click", (e) => {
    if (
        !e.target.closest(".dropdown") &&
        !e.target.closest(".dropdown-content")
    ) {
        document.querySelectorAll(".dropdown-content").forEach((menu) => {
            menu.classList.add("hidden");
        });
        document
            .querySelectorAll(".dropdown-toggle .fa-chevron-down")
            .forEach((icon) => {
                icon.classList.remove("rotate-180");
            });
    }

    if (
        !e.target.closest("#profileDropdown") &&
        !e.target.closest("#profileMenu")
    ) {
        profileMenu.classList.add("hidden");
    }

    if (
        !e.target.closest("#messagesDropdown") &&
        !e.target.closest("#messagesMenu")
    ) {
        messagesMenu.classList.add("hidden");
    }

    if (
        !e.target.closest("#notificationsDropdown") &&
        !e.target.closest("#notificationsMenu")
    ) {
        notificationsMenu.classList.add("hidden");
    }
});