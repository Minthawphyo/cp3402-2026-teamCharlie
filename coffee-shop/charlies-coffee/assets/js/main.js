/**
 * Charlie's Coffee — front-end behaviours
 * Mobile menu, sticky header, open/closed hours widget
 */
(function () {
  var header = document.getElementById("site-header");
  var toggle = document.getElementById("menu-toggle");
  var panel = document.getElementById("mobile-panel");

  function onScroll() {
    if (!header) return;
    header.classList.toggle("is-scrolled", window.scrollY > 8);
  }
  window.addEventListener("scroll", onScroll, { passive: true });
  onScroll();

  if (toggle && panel) {
    toggle.addEventListener("click", function () {
      var open = panel.classList.toggle("is-open");
      panel.hidden = !open;
      toggle.setAttribute("aria-expanded", open ? "true" : "false");
      toggle.setAttribute("aria-label", open ? "Close menu" : "Open menu");
    });
  }

  var SCHEDULE = {
    0: { open: "09:00", close: "20:00" },
    1: { open: "09:00", close: "20:00" },
    2: { open: "09:00", close: "20:00" },
    3: { open: "09:00", close: "20:00" },
    4: { open: "09:00", close: "20:00" },
    5: { open: "09:00", close: "20:00" },
    6: { open: "09:00", close: "20:00" },
  };

  function toMinutes(hhmm) {
    var p = hhmm.split(":").map(Number);
    return p[0] * 60 + p[1];
  }

  function formatTime(hhmm) {
    var p = hhmm.split(":").map(Number);
    var h = p[0];
    var m = p[1];
    var period = h >= 12 ? "pm" : "am";
    var hr = ((h + 11) % 12) + 1;
    return m === 0 ? hr + period : hr + ":" + String(m).padStart(2, "0") + period;
  }

  function hoursState() {
    var now = new Date();
    var today = SCHEDULE[now.getDay()];
    var current = now.getHours() * 60 + now.getMinutes();
    if (!today) return { open: false, label: "Closed today" };
    var openMin = toMinutes(today.open);
    var closeMin = toMinutes(today.close);
    if (current >= openMin && current < closeMin) {
      return { open: true, label: "Open · until " + formatTime(today.close) };
    }
    if (current < openMin) {
      return { open: false, label: "Opens " + formatTime(today.open) };
    }
    return { open: false, label: "Closed" };
  }

  function paintHours() {
    var state = hoursState();
    document.querySelectorAll("[data-hours-widget]").forEach(function (el) {
      el.classList.toggle("is-open", state.open);
      el.innerHTML =
        '<span class="dot" aria-hidden="true"></span><span>' +
        state.label +
        "</span>";
    });
  }
  paintHours();
  setInterval(paintHours, 60000);

  // Menu tab active state from hash / scroll
  var tabs = document.querySelectorAll(".menu-tabs a");
  if (tabs.length) {
    function setActive(id) {
      tabs.forEach(function (a) {
        a.classList.toggle("is-active", a.getAttribute("href") === "#" + id);
      });
    }
    if (location.hash) setActive(location.hash.slice(1));
    tabs.forEach(function (a) {
      a.addEventListener("click", function () {
        setActive(a.getAttribute("href").slice(1));
      });
    });
  }
})();
