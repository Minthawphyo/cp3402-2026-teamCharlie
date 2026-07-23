import { useEffect, useState } from "react";
import { Link } from "react-router-dom";
import { ArrowUpRight, MapPin } from "lucide-react";
import { MENU_CATEGORIES } from "@/data/menuData";

export default function Menu() {
  const [active, setActive] = useState(MENU_CATEGORIES[0].id);

  useEffect(() => {
    // Support deep-linking (e.g. /menu#pastries)
    const hash = window.location.hash.replace("#", "");
    if (hash && MENU_CATEGORIES.find((c) => c.id === hash)) {
      setActive(hash);
      const el = document.getElementById(hash);
      if (el) setTimeout(() => el.scrollIntoView({ behavior: "smooth", block: "start" }), 50);
    }
  }, []);

  return (
    <div data-testid="page-menu" className="grain-bg">
      {/* Header band */}
      <section className="mx-auto max-w-7xl px-6 md:px-10 pt-16 pb-10 md:pt-24 md:pb-14">
        <p className="text-xs tracking-[0.28em] uppercase text-burnt font-semibold">The menu</p>
        <div className="mt-4 flex flex-col md:flex-row md:items-end justify-between gap-6">
          <h1 className="font-serif text-5xl sm:text-6xl lg:text-7xl font-medium tracking-tighter text-forest leading-[1.02]">
            Everything we <br /> pour, brew &amp; bake.
          </h1>
          <p className="max-w-md text-ink-muted leading-relaxed">
            Prices are in SGD and include GST. Milk alternatives — oat, soy, almond —
            are always on the house. Ask a barista about today&rsquo;s single origin.
          </p>
        </div>
      </section>

      {/* Sticky category rail */}
      <nav
        aria-label="Menu categories"
        data-testid="menu-tabs"
        className="sticky top-20 z-40 border-y border-cream-400 bg-cream/95 backdrop-blur-lg"
      >
        <div className="mx-auto max-w-7xl px-6 md:px-10 py-3 flex gap-2 overflow-x-auto no-scrollbar">
          {MENU_CATEGORIES.map((c) => (
            <a
              key={c.id}
              href={`#${c.id}`}
              data-testid={`menu-tab-${c.id}`}
              onClick={() => setActive(c.id)}
              className={`shrink-0 rounded-full px-4 py-2 text-sm font-medium transition-colors duration-300 ${
                active === c.id
                  ? "bg-forest text-cream"
                  : "text-ink-muted hover:text-forest hover:bg-cream-200"
              }`}
            >
              {c.title}
            </a>
          ))}
        </div>
      </nav>

      {/* Categories */}
      <div className="mx-auto max-w-7xl px-6 md:px-10 pt-10 pb-16 space-y-24">
        {MENU_CATEGORIES.map((cat, idx) => (
          <section
            key={cat.id}
            id={cat.id}
            data-testid={`menu-section-${cat.id}`}
            className="scroll-mt-44"
          >
            <div className="grid grid-cols-1 lg:grid-cols-12 gap-10">
              {/* Image side (alternates left/right) */}
              <div
                className={`lg:col-span-5 ${
                  idx % 2 === 1 ? "lg:order-2" : ""
                }`}
              >
                <div className="relative aspect-[4/5] rounded-3xl overflow-hidden border border-cream-400">
                  <img
                    src={cat.image}
                    alt={`${cat.title} at Charlie's Coffee`}
                    className="h-full w-full object-cover"
                    loading="lazy"
                  />
                  <div className="absolute inset-x-0 bottom-0 h-1/3 bg-gradient-to-t from-forest/60 to-transparent" />
                  <div className="absolute left-5 bottom-5 right-5 text-cream">
                    <p className="text-[10px] tracking-[0.28em] uppercase opacity-80">
                      Category
                    </p>
                    <p className="font-serif text-3xl leading-tight">{cat.title}</p>
                  </div>
                </div>
              </div>

              {/* Items list */}
              <div className={`lg:col-span-7 ${idx % 2 === 1 ? "lg:order-1" : ""}`}>
                <p className="text-xs tracking-[0.28em] uppercase text-burnt font-semibold">
                  {String(idx + 1).padStart(2, "0")} · {cat.tagline}
                </p>
                <h2 className="mt-3 font-serif text-4xl sm:text-5xl text-forest tracking-tight">
                  {cat.title}
                </h2>

                <ul className="mt-8 divide-y divide-cream-400">
                  {cat.items.map((item) => (
                    <li key={item.name} className="py-4">
                      <div className="menu-row">
                        <span className="menu-name font-serif text-xl text-forest">
                          {item.name}
                        </span>
                        <span className="menu-price font-serif text-xl text-forest">
                          S${item.price}
                        </span>
                      </div>
                      <p className="mt-1 text-sm text-ink-muted max-w-xl">{item.desc}</p>
                    </li>
                  ))}
                </ul>
              </div>
            </div>
          </section>
        ))}
      </div>

      {/* CTA to Find Us */}
      <section className="mx-auto max-w-7xl px-6 md:px-10 pb-24" data-testid="menu-cta">
        <div className="rounded-3xl border border-cream-400 bg-cream-200 p-10 md:p-14 grid md:grid-cols-2 gap-8 items-center">
          <div>
            <p className="text-xs tracking-[0.28em] uppercase text-burnt font-semibold">Ready when you are</p>
            <h3 className="mt-3 font-serif text-3xl sm:text-4xl text-forest">
              Pop in — we&rsquo;ll save you the corner booth.
            </h3>
            <p className="mt-3 text-ink-muted max-w-lg">
              Charlie&rsquo;s is a walk-in cafe. No online ordering (yet). Bring your
              laptop, bring a friend, or bring both.
            </p>
          </div>
          <div className="md:justify-self-end flex flex-col sm:flex-row gap-3">
            <Link
              to="/contact"
              data-testid="menu-cta-findus"
              className="inline-flex items-center gap-2 rounded-full bg-forest text-cream px-7 py-4 text-sm font-medium hover:bg-forest-800 transition-colors duration-300"
            >
              <MapPin size={16} /> Find us
            </Link>
            <Link
              to="/about"
              data-testid="menu-cta-about"
              className="inline-flex items-center gap-2 rounded-full border border-forest/20 text-forest px-7 py-4 text-sm font-medium hover:bg-forest hover:text-cream transition-colors duration-300"
            >
              Our story <ArrowUpRight size={16} />
            </Link>
          </div>
        </div>
      </section>

    </div>
  );
}
