import { Link } from "react-router-dom";
import { ArrowUpRight, Leaf, HandCoins, GraduationCap } from "lucide-react";

export default function About() {
  return (
    <div data-testid="page-about">
      {/* Editorial hero */}
      <section className="mx-auto max-w-7xl px-6 md:px-10 pt-16 pb-16 md:pt-24 md:pb-20 grid grid-cols-1 lg:grid-cols-12 gap-10 items-end">
        <div className="lg:col-span-7">
          <p className="text-xs tracking-[0.28em] uppercase text-burnt font-semibold">Our story</p>
          <h1 className="mt-6 font-serif text-5xl sm:text-6xl lg:text-7xl font-medium tracking-tighter text-forest leading-[1.02]">
            Started with one <br />
            <span className="italic text-burnt">borrowed</span> grinder.
          </h1>
        </div>
        <div className="lg:col-span-5">
          <p className="text-lg text-ink-muted leading-relaxed">
            Charlie&rsquo;s began as a Sunday-only pop-up outside a share house in 2019.
            Six years, three roasters and a lot of late-night espresso later, we
            settled on the corner of Lantern Lane — and we&rsquo;ve been pouring
            neighbourhood cups ever since.
          </p>
        </div>
      </section>

      {/* Editorial spread */}
      <section className="mx-auto max-w-7xl px-6 md:px-10 pb-24" data-testid="about-spread">
        <div className="relative grid grid-cols-1 lg:grid-cols-12 gap-6">
          <div className="lg:col-span-8 lg:col-start-1 relative">
            <div className="aspect-[16/10] rounded-3xl overflow-hidden border border-cream-400">
              <img
                src="https://images.pexels.com/photos/5373256/pexels-photo-5373256.jpeg"
                alt="Interior of Charlie's Coffee — timber counter and warm lighting"
                className="h-full w-full object-cover"
                loading="lazy"
              />
            </div>
          </div>
          <div className="lg:col-span-5 lg:col-start-8 lg:-mt-24 relative z-10">
            <div className="rounded-3xl bg-cream border border-cream-400 p-8 md:p-10 shadow-[0_30px_60px_-30px_rgba(26,54,38,0.25)]">
              <p className="text-xs tracking-[0.28em] uppercase text-burnt font-semibold">
                What we&rsquo;re about
              </p>
              <h2 className="mt-3 font-serif text-3xl sm:text-4xl text-forest">
                Coffee that treats you like a regular from day one.
              </h2>
              <p className="mt-4 text-ink-muted leading-relaxed">
                We&rsquo;re a small team who happen to love coffee, but we&rsquo;re here
                for the people first. Whether it&rsquo;s your first ever flat white or
                your fourth of the morning — you&rsquo;re welcome.
              </p>
            </div>
          </div>
        </div>
      </section>

      {/* Values */}
      <section className="mx-auto max-w-7xl px-6 md:px-10 pb-24" data-testid="about-values">
        <div className="grid grid-cols-1 md:grid-cols-3 gap-6">
          {[
            {
              icon: Leaf,
              t: "Sourced with care",
              d: "Direct-trade relationships and seasonal single origins. We tell you the farm, altitude and process — always.",
            },
            {
              icon: GraduationCap,
              t: "Made for students",
              d: "$1 filter refills between 2–5pm on weekdays. Bring your textbooks, we&rsquo;ll bring the caffeine.",
            },
            {
              icon: HandCoins,
              t: "Community first",
              d: "We round up tips into a monthly donation to a local youth music program. Every cup, a small vote.",
            },
          ].map((v) => (
            <div
              key={v.t}
              data-testid={`about-value-${v.t.toLowerCase().replaceAll(" ", "-")}`}
              className="rounded-3xl border border-cream-400 bg-cream-200 p-8"
            >
              <span className="inline-flex h-11 w-11 items-center justify-center rounded-full bg-forest text-cream">
                <v.icon size={18} />
              </span>
              <h3 className="mt-5 font-serif text-2xl text-forest">{v.t}</h3>
              <p className="mt-3 text-ink-muted leading-relaxed" dangerouslySetInnerHTML={{ __html: v.d }} />
            </div>
          ))}
        </div>
      </section>

      {/* Timeline */}
      <section className="mx-auto max-w-7xl px-6 md:px-10 pb-24" data-testid="about-timeline">
        <p className="text-xs tracking-[0.28em] uppercase text-burnt font-semibold">The long pull</p>
        <h2 className="mt-3 font-serif text-4xl sm:text-5xl text-forest tracking-tight">
          A short history.
        </h2>

        <ol className="mt-12 grid grid-cols-1 md:grid-cols-2 gap-6">
          {[
            { y: "2019", t: "The pop-up", d: "One AeroPress, one folding table, one very patient neighbour." },
            { y: "2021", t: "The corner", d: "Signed a lease on Lantern Lane. Painted it forest green ourselves." },
            { y: "2023", t: "The bake case", d: "Added an in-house pastry program. Croissants sold out by 9am." },
            { y: "2026", t: "The next chapter", d: "New signature menu, student residency program, better lighting." },
          ].map((m) => (
            <li
              key={m.y}
              className="rounded-3xl border border-cream-400 bg-white p-8 flex items-start gap-6"
            >
              <span className="font-serif text-3xl text-burnt shrink-0 w-16">{m.y}</span>
              <div>
                <h3 className="font-serif text-2xl text-forest">{m.t}</h3>
                <p className="mt-2 text-ink-muted leading-relaxed">{m.d}</p>
              </div>
            </li>
          ))}
        </ol>
      </section>

      {/* CTA */}
      <section className="mx-auto max-w-7xl px-6 md:px-10 pb-24" data-testid="about-cta">
        <div className="rounded-3xl bg-forest text-cream p-10 md:p-14 flex flex-col md:flex-row md:items-center md:justify-between gap-6">
          <h3 className="font-serif text-3xl sm:text-4xl leading-[1.1]">
            Come read our menu <br className="hidden md:inline" />
            with a coffee in hand.
          </h3>
          <div className="flex gap-3">
            <Link
              to="/menu"
              data-testid="about-cta-menu"
              className="inline-flex items-center gap-2 rounded-full bg-burnt text-cream px-7 py-4 text-sm font-medium hover:bg-burnt-700 transition-colors duration-300"
            >
              View menu <ArrowUpRight size={16} />
            </Link>
            <Link
              to="/contact"
              data-testid="about-cta-contact"
              className="inline-flex items-center gap-2 rounded-full border border-cream/30 text-cream px-7 py-4 text-sm font-medium hover:bg-cream hover:text-forest transition-colors duration-300"
            >
              Find us
            </Link>
          </div>
        </div>
      </section>
    </div>
  );
}
