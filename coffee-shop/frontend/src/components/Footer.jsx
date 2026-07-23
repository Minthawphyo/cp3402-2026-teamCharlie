import { Link } from "react-router-dom";
import { Instagram, Facebook, MapPin, Clock, Phone } from "lucide-react";

export default function Footer() {
  return (
    <footer
      data-testid="site-footer"
      className="bg-forest text-cream mt-24"
    >
      <div className="mx-auto max-w-7xl px-6 md:px-10 py-16 grid grid-cols-1 md:grid-cols-4 gap-10">
        <div className="md:col-span-2">
          <p className="text-xs tracking-[0.28em] uppercase text-burnt font-semibold">
            Charlie&rsquo;s Coffee
          </p>
          <h3 className="font-serif text-4xl sm:text-5xl mt-3 leading-[1.05] text-cream">
            Small-batch coffee. <br />
            Big neighbourhood energy.
          </h3>
          <p className="mt-6 max-w-md text-cream/80 leading-relaxed">
            A student-friendly cafe on the corner — good beans, honest pastries,
            and a table that&rsquo;s always yours.
          </p>

          {/* Newsletter (frontend-only UI) */}
          <form
            className="mt-8 flex flex-col sm:flex-row gap-3 max-w-md"
            onSubmit={(e) => {
              e.preventDefault();
            }}
            data-testid="footer-newsletter-form"
          >
            <label htmlFor="footer-email" className="sr-only">
              Email address
            </label>
            <input
              id="footer-email"
              type="email"
              required
              placeholder="Your email"
              data-testid="footer-newsletter-email"
              className="flex-1 rounded-full bg-cream/10 border border-cream/20 px-5 py-3 text-cream placeholder:text-cream/50 focus:border-burnt transition-colors duration-300"
            />
            <button
              type="submit"
              data-testid="footer-newsletter-submit"
              className="rounded-full bg-burnt text-cream px-6 py-3 text-sm font-medium hover:bg-burnt-700 transition-colors duration-300"
            >
              Get the drop
            </button>
          </form>
        </div>

        <div>
          <h4 className="font-serif text-xl text-cream">Visit</h4>
          <ul className="mt-4 space-y-3 text-cream/80 text-sm">
            <li className="flex items-start gap-3">
              <MapPin size={16} className="mt-0.5 text-burnt" />
              <span>
                42 Lantern Lane
                <br />
                Townsville QLD 4810
              </span>
            </li>
            <li className="flex items-start gap-3">
              <Phone size={16} className="mt-0.5 text-burnt" />
              <span>(07) 4772 0000</span>
            </li>
            <li className="flex items-start gap-3">
              <Clock size={16} className="mt-0.5 text-burnt" />
              <span>
                Mon–Fri · 6:30a – 5:00p
                <br />
                Sat–Sun · 7:30a – 3:00p
              </span>
            </li>
          </ul>
        </div>

        <div>
          <h4 className="font-serif text-xl text-cream">Explore</h4>
          <ul className="mt-4 space-y-2 text-cream/80 text-sm">
            <li>
              <Link data-testid="footer-link-home" to="/" className="hover:text-burnt transition-colors duration-300">
                Home
              </Link>
            </li>
            <li>
              <Link data-testid="footer-link-menu" to="/menu" className="hover:text-burnt transition-colors duration-300">
                Menu
              </Link>
            </li>
            <li>
              <Link data-testid="footer-link-about" to="/about" className="hover:text-burnt transition-colors duration-300">
                About
              </Link>
            </li>
            <li>
              <Link data-testid="footer-link-contact" to="/contact" className="hover:text-burnt transition-colors duration-300">
                Find Us
              </Link>
            </li>
          </ul>
          <div className="mt-6 flex gap-3">
            <a
              href="#"
              aria-label="Instagram"
              data-testid="footer-social-instagram"
              className="inline-flex h-10 w-10 items-center justify-center rounded-full border border-cream/20 hover:bg-burnt hover:border-burnt transition-colors duration-300"
            >
              <Instagram size={16} />
            </a>
            <a
              href="#"
              aria-label="Facebook"
              data-testid="footer-social-facebook"
              className="inline-flex h-10 w-10 items-center justify-center rounded-full border border-cream/20 hover:bg-burnt hover:border-burnt transition-colors duration-300"
            >
              <Facebook size={16} />
            </a>
          </div>
        </div>
      </div>

      <div className="border-t border-cream/10">
        <div className="mx-auto max-w-7xl px-6 md:px-10 py-6 flex items-center justify-center gap-3 text-xs text-cream/60">
          <p>© {new Date().getFullYear()} Charlie&rsquo;s Coffee. Brewed with care.</p>
        </div>
      </div>
    </footer>
  );
}
