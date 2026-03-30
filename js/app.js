// Light/Dark Mode
if (
  window.matchMedia &&
  window.matchMedia("(prefers-color-scheme: dark)").matches
) {
  document.body.classList.add("dark-mode");
}

// Intersection Observer for Lazy Animations
const observerOptions = { threshold: 0.1 };
const observer = new IntersectionObserver((entries) => {
  entries.forEach((entry) => {
    if (entry.isIntersecting) {
      entry.target.style.opacity = "1";
      entry.target.style.transform = "translateY(0)";
    }
  });
}, observerOptions);

document.querySelectorAll(".card").forEach((card) => {
  card.style.opacity = "0";
  card.style.transform = "translateY(20px)";
  card.style.transition = "all 0.6s ease-out";
  observer.observe(card);
});

const themeToggle = document.getElementById("theme-toggle"),
  body = document.body,
  announcements = document.getElementById("announcements"),
  savedTheme = localStorage.getItem("theme"),
  systemPrefersDark = window.matchMedia("(prefers-color-scheme: dark)").matches;
let currentTheme = savedTheme || (systemPrefersDark ? "dark" : "light");
function applyTheme(e) {
  "dark" === e
    ? (body.classList.add("dark-mode"),
      (themeToggle.textContent = "☀️"),
      themeToggle.setAttribute("aria-pressed", "true"))
    : (body.classList.remove("dark-mode"),
      (themeToggle.textContent = "🌙"),
      themeToggle.setAttribute("aria-pressed", "false"));
}
(applyTheme(currentTheme),
  themeToggle.addEventListener("click", () => {
    ((currentTheme = "light" === currentTheme ? "dark" : "light"),
      applyTheme(currentTheme),
      localStorage.setItem("theme", currentTheme),
      (announcements.textContent = `Switched to ${currentTheme} mode`));
  }),
  window
    .matchMedia("(prefers-color-scheme: dark)")
    .addEventListener("change", (e) => {
      localStorage.getItem("theme") ||
        ((currentTheme = e.matches ? "dark" : "light"),
        applyTheme(currentTheme),
        (announcements.textContent = `System theme changed to ${currentTheme} mode`));
    }));
const burger = document.getElementById("burger"),
  nav = document.getElementById("site-nav");
function toggleNav(e) {
  (e ?? !nav.hasAttribute("data-open"))
    ? (nav.setAttribute("data-open", ""),
      nav.removeAttribute("hidden"),
      burger.setAttribute("aria-expanded", "true"))
    : (nav.removeAttribute("data-open"),
      burger.setAttribute("aria-expanded", "false"));
}
(burger.addEventListener("click", () => toggleNav()),
  window.addEventListener("keydown", (e) => {
    "Escape" === e.key && toggleNav(!1);
  }),
  nav.addEventListener("click", (e) => {
    e.target.closest("a") && toggleNav(!1);
  }),
  document.querySelectorAll('a[href^="#"]').forEach((e) => {
    e.addEventListener("click", function (e) {
      e.preventDefault();
      const t = document.querySelector(this.getAttribute("href"));
      if (t) {
        const e = window.matchMedia("(prefers-reduced-motion: reduce)").matches;
        (t.scrollIntoView({
          behavior: e ? "auto" : "smooth",
          block: "start",
        }),
          t.focus(),
          document.querySelectorAll("nav a").forEach((e) => {
            e.removeAttribute("aria-current");
          }),
          this.setAttribute("aria-current", "page"));
      }
    });
  }),
  document.querySelector("form").addEventListener("submit", function (e) {
    e.preventDefault();
    const t = this.querySelector('button[type="submit"]'),
      n = t.innerHTML;
    ((t.innerHTML = 'Sending... <span aria-hidden="true">⏳</span>'),
      (t.disabled = !0),
      setTimeout(() => {
        ((t.innerHTML = 'Message Sent! <span aria-hidden="true">✅</span>'),
          (announcements.textContent =
            "Your message has been sent successfully"),
          setTimeout(() => {
            ((t.innerHTML = n), (t.disabled = !1), this.reset());
          }, 2e3));
      }, 1500));
  }));
