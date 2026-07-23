import { useState } from "react";
import { MapPin, Clock, Phone, Mail, Send, MapPinned } from "lucide-react";
import { toast } from "sonner";
import HoursWidget from "@/components/HoursWidget";

export default function Contact() {
  const [form, setForm] = useState({ name: "", email: "", topic: "General", message: "" });
  const [submitting, setSubmitting] = useState(false);

  const update = (k) => (e) => setForm((f) => ({ ...f, [k]: e.target.value }));

  const handleSubmit = (e) => {
    e.preventDefault();
    setSubmitting(true);
    setTimeout(() => {
      setSubmitting(false);
      toast.success("Thanks! We'll get back to you soon.");
      setForm({ name: "", email: "", topic: "General", message: "" });
    }, 700);
  };

  return (
    <div data-testid="page-contact">
      {/* Header */}
      <section className="mx-auto max-w-7xl px-6 md:px-10 pt-16 pb-10 md:pt-24 md:pb-14">
        <p className="text-xs tracking-[0.28em] uppercase text-burnt font-semibold">Find us</p>
        <div className="mt-4 grid grid-cols-1 lg:grid-cols-12 gap-8 items-end">
          <h1 className="lg:col-span-8 font-serif text-5xl sm:text-6xl lg:text-7xl font-medium tracking-tighter text-forest leading-[1.02]">
            Corner of <span className="italic text-burnt">Lantern Lane</span>. <br />
            Say hi.
          </h1>
          <p className="lg:col-span-4 text-ink-muted leading-relaxed">
            Message us about bookings, private hire, wholesale beans, or just to
            tell us how the flat white was. We read everything.
          </p>
        </div>
      </section>

      <section className="mx-auto max-w-7xl px-6 md:px-10 pb-24">
        <div className="grid grid-cols-1 lg:grid-cols-12 gap-10">
          {/* Form */}
          <div className="lg:col-span-7">
            <form
              onSubmit={handleSubmit}
              data-testid="contact-form"
              className="rounded-3xl border border-cream-400 bg-white p-8 md:p-10"
            >
              <h2 className="font-serif text-3xl text-forest">Send us a message</h2>
              <p className="mt-2 text-sm text-ink-muted">
                Bookings, wholesale, or just say hello — we read everything.
              </p>

              <div className="mt-8 grid grid-cols-1 md:grid-cols-2 gap-5">
                <div>
                  <label htmlFor="c-name" className="block text-xs tracking-[0.2em] uppercase text-ink-muted font-semibold">
                    Name
                  </label>
                  <input
                    id="c-name"
                    type="text"
                    required
                    value={form.name}
                    onChange={update("name")}
                    data-testid="contact-input-name"
                    className="mt-2 w-full rounded-xl bg-cream border border-cream-400 px-4 py-3 text-forest placeholder:text-ink-muted/60 focus:border-forest transition-colors duration-300"
                    placeholder="Your name"
                  />
                </div>
                <div>
                  <label htmlFor="c-email" className="block text-xs tracking-[0.2em] uppercase text-ink-muted font-semibold">
                    Email
                  </label>
                  <input
                    id="c-email"
                    type="email"
                    required
                    value={form.email}
                    onChange={update("email")}
                    data-testid="contact-input-email"
                    className="mt-2 w-full rounded-xl bg-cream border border-cream-400 px-4 py-3 text-forest placeholder:text-ink-muted/60 focus:border-forest transition-colors duration-300"
                    placeholder="you@example.com"
                  />
                </div>
                <div className="md:col-span-2">
                  <label htmlFor="c-topic" className="block text-xs tracking-[0.2em] uppercase text-ink-muted font-semibold">
                    Topic
                  </label>
                  <select
                    id="c-topic"
                    value={form.topic}
                    onChange={update("topic")}
                    data-testid="contact-input-topic"
                    className="mt-2 w-full rounded-xl bg-cream border border-cream-400 px-4 py-3 text-forest focus:border-forest transition-colors duration-300"
                  >
                    <option>General</option>
                    <option>Bookings</option>
                    <option>Private hire</option>
                    <option>Wholesale beans</option>
                    <option>Feedback</option>
                  </select>
                </div>
                <div className="md:col-span-2">
                  <label htmlFor="c-message" className="block text-xs tracking-[0.2em] uppercase text-ink-muted font-semibold">
                    Message
                  </label>
                  <textarea
                    id="c-message"
                    required
                    rows={5}
                    value={form.message}
                    onChange={update("message")}
                    data-testid="contact-input-message"
                    className="mt-2 w-full rounded-xl bg-cream border border-cream-400 px-4 py-3 text-forest placeholder:text-ink-muted/60 focus:border-forest transition-colors duration-300"
                    placeholder="What's on your mind?"
                  />
                </div>
              </div>

              <div className="mt-6 flex items-center justify-between gap-4 flex-wrap">
                <p className="text-xs text-ink-muted">
                  We usually reply within one business day.
                </p>
                <button
                  type="submit"
                  disabled={submitting}
                  data-testid="contact-submit"
                  className="inline-flex items-center gap-2 rounded-full bg-forest text-cream px-6 py-3 text-sm font-medium hover:bg-forest-800 hover:-translate-y-0.5 transition-[transform,background-color,opacity] duration-300 disabled:opacity-60"
                >
                  <Send size={16} />
                  {submitting ? "Sending…" : "Send message"}
                </button>
              </div>
            </form>
          </div>

          {/* Side info */}
          <aside className="lg:col-span-5 space-y-6" data-testid="contact-info">
            {/* Hours & address */}
            <div className="rounded-3xl border border-cream-400 bg-cream-200 p-8">
              <div className="flex items-center justify-between">
                <p className="text-xs tracking-[0.28em] uppercase text-burnt font-semibold">Visit</p>
                <HoursWidget />
              </div>

              <div className="mt-6 space-y-5 text-ink">
                <div className="flex items-start gap-3">
                  <MapPin size={18} className="mt-0.5 text-forest" />
                  <div>
                    <p className="font-serif text-lg text-forest">42 Lantern Lane</p>
                    <p className="text-sm text-ink-muted">Townsville QLD 4810</p>
                  </div>
                </div>
                <div className="flex items-start gap-3">
                  <Clock size={18} className="mt-0.5 text-forest" />
                  <div className="text-sm text-ink-muted leading-relaxed">
                    <p><span className="text-forest font-medium">Mon–Fri</span> · 6:30a – 5:00p</p>
                    <p><span className="text-forest font-medium">Sat–Sun</span> · 7:30a – 3:00p</p>
                  </div>
                </div>
                <div className="flex items-start gap-3">
                  <Phone size={18} className="mt-0.5 text-forest" />
                  <p className="text-sm text-ink-muted">(07) 4772 0000</p>
                </div>
                <div className="flex items-start gap-3">
                  <Mail size={18} className="mt-0.5 text-forest" />
                  <p className="text-sm text-ink-muted">hello@charliescoffee.com.au</p>
                </div>
              </div>
            </div>

            {/* Map placeholder */}
            <div
              data-testid="contact-map-placeholder"
              className="rounded-3xl border border-dashed border-forest/30 bg-cream p-8 aspect-[4/3] flex flex-col items-center justify-center text-center relative overflow-hidden"
            >
              <div
                aria-hidden="true"
                className="absolute inset-0 opacity-30"
                style={{
                  backgroundImage:
                    "linear-gradient(#1A362620 1px, transparent 1px), linear-gradient(90deg, #1A362620 1px, transparent 1px)",
                  backgroundSize: "28px 28px",
                }}
              />
              <div className="relative z-10">
                <span className="inline-flex h-12 w-12 items-center justify-center rounded-full bg-burnt text-cream">
                  <MapPinned size={20} />
                </span>
                <p className="mt-4 font-serif text-2xl text-forest">Find us here</p>
                <p className="mt-2 text-sm text-ink-muted max-w-xs mx-auto">
                  42 Lantern Lane, Townsville QLD 4810
                </p>
              </div>
            </div>
          </aside>
        </div>
      </section>
    </div>
  );
}
