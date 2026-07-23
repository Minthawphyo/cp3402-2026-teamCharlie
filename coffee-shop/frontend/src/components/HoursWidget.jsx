import { useEffect, useMemo, useState } from "react";

// Hours schedule (0 = Sunday .. 6 = Saturday). Times in 24h local time.
const SCHEDULE = {
  0: { open: "07:30", close: "15:00" }, // Sun
  1: { open: "06:30", close: "17:00" }, // Mon
  2: { open: "06:30", close: "17:00" }, // Tue
  3: { open: "06:30", close: "17:00" }, // Wed
  4: { open: "06:30", close: "17:00" }, // Thu
  5: { open: "06:30", close: "17:00" }, // Fri
  6: { open: "07:30", close: "15:00" }, // Sat
};

function toMinutes(hhmm) {
  const [h, m] = hhmm.split(":").map(Number);
  return h * 60 + m;
}

function formatTime(hhmm) {
  const [h, m] = hhmm.split(":").map(Number);
  const period = h >= 12 ? "pm" : "am";
  const hr = ((h + 11) % 12) + 1;
  return m === 0 ? `${hr}${period}` : `${hr}:${String(m).padStart(2, "0")}${period}`;
}

export default function HoursWidget({ className = "" }) {
  const [now, setNow] = useState(() => new Date());

  useEffect(() => {
    const id = setInterval(() => setNow(new Date()), 60_000);
    return () => clearInterval(id);
  }, []);

  const { isOpen, label } = useMemo(() => {
    const day = now.getDay();
    const today = SCHEDULE[day];
    const current = now.getHours() * 60 + now.getMinutes();
    if (!today) return { isOpen: false, label: "Closed today" };
    const openMin = toMinutes(today.open);
    const closeMin = toMinutes(today.close);
    const open = current >= openMin && current < closeMin;
    if (open) return { isOpen: true, label: `Open · until ${formatTime(today.close)}` };
    if (current < openMin) return { isOpen: false, label: `Opens ${formatTime(today.open)}` };
    return { isOpen: false, label: "Closed" };
  }, [now]);

  return (
    <span
      data-testid="hours-widget"
      data-open={isOpen ? "true" : "false"}
      className={`inline-flex items-center gap-2 rounded-full border px-3 py-1.5 text-xs font-medium ${
        isOpen
          ? "border-forest/20 bg-forest/5 text-forest"
          : "border-cream-400 bg-cream-200 text-ink-muted"
      } ${className}`}
    >
      <span
        aria-hidden="true"
        className={`inline-block h-2 w-2 rounded-full ${
          isOpen ? "bg-emerald-600 animate-pulse-dot" : "bg-ink-muted/60"
        }`}
      />
      <span data-testid="hours-widget-label">{label}</span>
    </span>
  );
}
