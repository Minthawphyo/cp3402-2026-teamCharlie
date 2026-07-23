import { useState, useEffect } from "react";
import { NavLink, Link, useLocation } from "react-router-dom";
import { Menu as MenuIcon, X, Coffee } from "lucide-react";
import HoursWidget from "@/components/HoursWidget";

const NAV = [
  { to: "/", label: "Home", testid: "nav-home" },
  { to: "/menu", label: "Menu", testid: "nav-menu" },
  { to: "/about", label: "About", testid: "nav-about" },
  { to: "/contact", label: "Find Us", testid: "nav-contact" },
];

export default function Header() {
  const [open, setOpen] = useState(false);
  const [scrolled, setScrolled] = useState(false);
  const { pathname } = useLocation();

  useEffect(() => {
    const onScroll = () => setScrolled(window.scrollY > 8);
    onScroll();
    window.addEventListener("scroll", onScroll, { passive: true });
    return () => window.removeEventListener("scroll", onScroll);
  }, []);

  useEffect(() => {
    setOpen(false);
  }, [pathname]);

  return (
    <header
      data-testid="site-header"
      className={`sticky top-0 z-50 transition-[background-color,border-color,backdrop-filter] duration-300 ${
        scrolled
          ? "backdrop-blur-xl bg-cream/80 border-b border-cream-400"
          : "bg-cream border-b border-transparent"
      }`}
    >
      <div className="mx-auto max-w-7xl px-6 md:px-10 h-20 flex items-center justify-between">
        <Link
          to="/"
          data-testid="brand-logo"
          className="flex items-center gap-2 group"
          aria-label="Charlie's Coffee — home"
        >
          <span className="inline-flex h-9 w-9 items-center justify-center rounded-full bg-forest text-cream group-hover:bg-forest-800 transition-colors duration-300">
            <Coffee size={18} strokeWidth={2.2} />
          </span>
          <span className="font-serif text-2xl font-medium tracking-tight text-forest">
            Charlie&rsquo;s
          </span>
        </Link>

        {/* Desktop nav */}
        <nav className="hidden md:flex items-center gap-1" aria-label="Primary">
          {NAV.map((item) => (
            <NavLink
              key={item.to}
              to={item.to}
              end={item.to === "/"}
              data-testid={item.testid}
              className={({ isActive }) =>
                `px-4 py-2 rounded-full text-sm font-medium transition-colors duration-300 ${
                  isActive
                    ? "text-forest bg-cream-300"
                    : "text-ink-muted hover:text-forest hover:bg-cream-200"
                }`
              }
            >
              {item.label}
            </NavLink>
          ))}
        </nav>

        <div className="flex items-center gap-3">
          <HoursWidget className="hidden sm:inline-flex" />
          <Link
            to="/menu"
            data-testid="header-cta-menu"
            className="hidden md:inline-flex items-center rounded-full bg-forest text-cream px-5 py-2.5 text-sm font-medium hover:bg-forest-800 hover:-translate-y-0.5 transition-[transform,background-color] duration-300"
          >
            View Menu
          </Link>
          <button
            type="button"
            aria-label={open ? "Close menu" : "Open menu"}
            aria-expanded={open}
            data-testid="mobile-menu-toggle"
            onClick={() => setOpen((v) => !v)}
            className="md:hidden inline-flex h-10 w-10 items-center justify-center rounded-full border border-cream-400 text-forest hover:bg-cream-200 transition-colors duration-300"
          >
            {open ? <X size={20} /> : <MenuIcon size={20} />}
          </button>
        </div>
      </div>

      {/* Mobile drawer */}
      <div
        data-testid="mobile-menu-panel"
        className={`md:hidden overflow-hidden border-t border-cream-400 bg-cream transition-[max-height,opacity] duration-300 ${
          open ? "max-h-96 opacity-100" : "max-h-0 opacity-0"
        }`}
      >
        <nav className="px-6 py-4 flex flex-col gap-1" aria-label="Mobile">
          {NAV.map((item) => (
            <NavLink
              key={item.to}
              to={item.to}
              end={item.to === "/"}
              data-testid={`${item.testid}-mobile`}
              className={({ isActive }) =>
                `px-4 py-3 rounded-xl text-base font-medium transition-colors duration-300 ${
                  isActive ? "bg-cream-300 text-forest" : "text-ink-muted hover:bg-cream-200"
                }`
              }
            >
              {item.label}
            </NavLink>
          ))}
          <div className="mt-3 flex items-center justify-between">
            <HoursWidget />
            <Link
              to="/menu"
              data-testid="mobile-cta-menu"
              className="inline-flex items-center rounded-full bg-forest text-cream px-5 py-2.5 text-sm font-medium hover:bg-forest-800 transition-colors duration-300"
            >
              View Menu
            </Link>
          </div>
        </nav>
      </div>
    </header>
  );
}
