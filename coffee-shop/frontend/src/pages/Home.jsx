import { Link } from "react-router-dom";
import { ArrowUpRight, MapPin, Coffee, Sparkles } from "lucide-react";
import HoursWidget from "@/components/HoursWidget";
import { MENU_CATEGORIES } from "@/data/menuData";

const FEATURED = [
  {
    tag: "Signature",
    name: "The Lantern",
    desc: "Espresso, oat milk, burnt honey and a whisper of sea salt.",
    price: "6.80",
    img: "https://images.pexels.com/photos/16541078/pexels-photo-16541078.jpeg",
  },
  {
    tag: "Brewed",
    name: "V60 Pour Over",
    desc: "Rotating single origin, brewed slow, made just for you.",
    price: "6.50",
    img: "https://images.pexels.com/photos/18604200/pexels-photo-18604200.jpeg",
  },
  {
    tag: "Cold",
    name: "Nitro Cold Brew",
    desc: "24-hour steep, poured on tap. Silky cascade, no sugar.",
    price: "7.20",
    img: "https://images.pexels.com/photos/4869290/pexels-photo-4869290.jpeg",
  },
];

export default function Home() {
  return (
    <div data-testid="page-home">
      {/* HERO */}
      <section className="grain-bg relative overflow-hidden" data-testid="home-hero">
        <div className="mx-auto max-w-7xl px-6 md:px-10 pt-16 pb-24 md:pt-24 md:pb-32 grid grid-cols-1 lg:grid-cols-12 gap-10 items-center">
          <div className="lg:col-span-7 animate-fade-up">
            <p className="text-xs tracking-[0.28em] uppercase text-burnt font-semibold">
              Est. on the corner · Townsville
            </p>
            <h1 className="mt-6 font-serif text-5xl sm:text-6xl lg:text-7xl font-medium tracking-tighter text-forest leading-[1.02]">
              Coffee worth <br />
              <span className="italic text-burnt">walking</span> for.
            </h1>
            <p className="mt-8 max-w-xl text-lg text-ink-muted leading-relaxed">
              Charlie&rsquo;s is a small-batch cafe for students, locals and everyone
              in between. Slow-brewed drinks, honest pastries, and a corner
              booth with your name on it.
            </p>

            <div className="mt-10 flex flex-wrap items-center gap-4">
              <Link
                to="/menu"
                data-testid="hero-cta-menu"
                className="group inline-flex items-center gap-2 rounded-full bg-forest text-cream px-7 py-4 text-sm font-medium hover:bg-forest-800 hover:-translate-y-0.5 transition-[transform,background-color] duration-300"
              >
                View the menu
                <ArrowUpRight size={16} className="group-hover:translate-x-0.5 group-hover:-translate-y-0.5 transition-transform duration-300" />
              </Link>
              <Link
                to="/contact"
                data-testid="hero-cta-findus"
                className="inline-flex items-center gap-2 rounded-full border border-forest/20 text-forest px-7 py-4 text-sm font-medium hover:bg-forest hover:text-cream transition-colors duration-300"
              >
                <MapPin size={16} />
                Find us
              </Link>
            </div>

            <div className="mt-10 flex flex-wrap items-center gap-6 text-sm text-ink-muted">
              <HoursWidget />
              <span className="hidden sm:inline-block h-4 w-px bg-cream-400" />
              <span className="inline-flex items-center gap-2">
                <Sparkles size={14} className="text-burnt" />
                Rotating single origin every fortnight
              </span>
            </div>
          </div>

          <div className="lg:col-span-5 relative">
            <div className="relative aspect-[4/5] rounded-3xl overflow-hidden border border-cream-400 shadow-[0_30px_60px_-30px_rgba(26,54,38,0.35)]">
              <img
                src="https://images.pexels.com/photos/5373256/pexels-photo-5373256.jpeg"
                alt="Cozy interior of Charlie's Coffee with warm light and vintage details"
                className="h-full w-full object-cover"
                loading="eager"
              />
              <div className="absolute inset-x-0 bottom-0 h-1/3 bg-gradient-to-t from-forest/70 to-transparent" />
              <div className="absolute left-5 bottom-5 right-5 flex items-end justify-between text-cream">
                <div>
                  <p className="text-[10px] tracking-[0.28em] uppercase opacity-80">Today&rsquo;s bean</p>
                  <p className="font-serif text-2xl leading-tight">Ethiopia · Guji</p>
                </div>
                <span className="rounded-full bg-burnt/95 px-3 py-1 text-xs font-medium">
                  Filter · Espresso
                </span>
              </div>
            </div>

            {/* Overlapping small card */}
            <div className="hidden md:flex absolute -left-8 bottom-10 bg-cream border border-cream-400 rounded-2xl px-5 py-4 items-center gap-4 shadow-[0_20px_40px_-25px_rgba(26,54,38,0.3)]">
              <span className="inline-flex h-10 w-10 items-center justify-center rounded-full bg-forest text-cream">
                <Coffee size={18} />
              </span>
              <div>
                <p className="text-xs tracking-[0.2em] uppercase text-ink-muted">Served in</p>
                <p className="font-serif text-lg text-forest">Ceramic · never paper</p>
              </div>
            </div>
          </div>
        </div>
      </section>

      {/* INTRO STRIP */}
      <section className="border-y border-cream-400 bg-cream-200" data-testid="home-intro">
        <div className="mx-auto max-w-7xl px-6 md:px-10 py-14 grid grid-cols-1 md:grid-cols-3 gap-10">
          {[
            {
              k: "01",
              t: "Small batch, roasted local",
              d: "We pull from a rotating roster of Australian roasters — never more than two weeks off roast.",
            },
            {
              k: "02",
              t: "A table for students",
              d: "Free wifi, quiet corners, and a student discount on filter every weekday afternoon.",
            },
            {
              k: "03",
              t: "Made in-house, daily",
              d: "Pastries baked at 5am. Sandwiches built to order. Nothing sits around long.",
            },
          ].map((it) => (
            <div key={it.k} data-testid={`intro-card-${it.k}`}>
              <p className="font-serif text-3xl text-burnt">{it.k}</p>
              <h3 className="mt-3 font-serif text-2xl text-forest">{it.t}</h3>
              <p className="mt-3 text-ink-muted leading-relaxed">{it.d}</p>
            </div>
          ))}
        </div>
      </section>

      {/* FEATURED */}
      <section className="mx-auto max-w-7xl px-6 md:px-10 py-24" data-testid="home-featured">
        <div className="flex items-end justify-between flex-wrap gap-6 mb-12">
          <div>
            <p className="text-xs tracking-[0.28em] uppercase text-burnt font-semibold">This week&rsquo;s picks</p>
            <h2 className="mt-3 font-serif text-4xl sm:text-5xl text-forest tracking-tight">Featured drinks</h2>
          </div>
          <Link
            to="/menu"
            data-testid="featured-view-all"
            className="group inline-flex items-center gap-2 text-forest font-medium hover:text-burnt transition-colors duration-300"
          >
            See the full menu
            <ArrowUpRight size={16} className="group-hover:translate-x-0.5 group-hover:-translate-y-0.5 transition-transform duration-300" />
          </Link>
        </div>

        <div className="grid grid-cols-1 md:grid-cols-3 gap-6">
          {FEATURED.map((f, i) => (
            <article
              key={f.name}
              data-testid={`featured-card-${i}`}
              className="group relative overflow-hidden rounded-3xl border border-cream-400 bg-white hover:-translate-y-1 transition-transform duration-500"
            >
              <div className="aspect-[4/3] overflow-hidden">
                <img
                  src={f.img}
                  alt={f.name}
                  className="h-full w-full object-cover group-hover:scale-105 transition-transform duration-700"
                  loading="lazy"
                />
              </div>
              <div className="p-6">
                <div className="flex items-center justify-between">
                  <span className="text-[10px] tracking-[0.24em] uppercase text-burnt font-semibold">{f.tag}</span>
                  <span className="font-serif text-lg text-forest">S${f.price}</span>
                </div>
                <h3 className="mt-3 font-serif text-2xl text-forest">{f.name}</h3>
                <p className="mt-2 text-ink-muted leading-relaxed">{f.desc}</p>
              </div>
            </article>
          ))}
        </div>
      </section>

      {/* CATEGORY QUICKLINKS */}
      <section className="mx-auto max-w-7xl px-6 md:px-10 pb-24" data-testid="home-categories">
        <div className="grid grid-cols-2 md:grid-cols-5 gap-3">
          {MENU_CATEGORIES.map((c) => (
            <Link
              key={c.id}
              to={`/menu#${c.id}`}
              data-testid={`home-cat-${c.id}`}
              className="group rounded-2xl border border-cream-400 bg-cream-200 px-5 py-6 hover:bg-forest hover:text-cream transition-colors duration-300"
            >
              <p className="text-[10px] tracking-[0.24em] uppercase text-burnt font-semibold group-hover:text-burnt">
                Explore
              </p>
              <p className="mt-2 font-serif text-2xl text-forest group-hover:text-cream">{c.title}</p>
            </Link>
          ))}
        </div>
      </section>

      {/* CTA BAND */}
      <section className="mx-auto max-w-7xl px-6 md:px-10 pb-24" data-testid="home-cta">
        <div className="rounded-3xl bg-forest text-cream p-10 md:p-16 grid md:grid-cols-2 gap-10 items-center overflow-hidden relative">
          <div>
            <p className="text-xs tracking-[0.28em] uppercase text-burnt font-semibold">Come say hi</p>
            <h2 className="mt-3 font-serif text-4xl sm:text-5xl leading-[1.05]">
              Your next favourite <br />
              cup is on the corner.
            </h2>
          </div>
          <div className="md:justify-self-end flex flex-col sm:flex-row gap-3">
            <Link
              to="/menu"
              data-testid="cta-band-menu"
              className="rounded-full bg-burnt text-cream px-7 py-4 text-sm font-medium hover:bg-burnt-700 transition-colors duration-300 inline-flex items-center gap-2"
            >
              View the menu <ArrowUpRight size={16} />
            </Link>
            <Link
              to="/contact"
              data-testid="cta-band-contact"
              className="rounded-full border border-cream/30 text-cream px-7 py-4 text-sm font-medium hover:bg-cream hover:text-forest transition-colors duration-300 inline-flex items-center gap-2"
            >
              <MapPin size={16} /> Find us
            </Link>
          </div>
        </div>
      </section>
    </div>
  );
}
