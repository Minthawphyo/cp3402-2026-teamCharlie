import { Outlet, useLocation } from "react-router-dom";
import { useEffect } from "react";
import Header from "@/components/Header";
import Footer from "@/components/Footer";

export default function Layout() {
  const { pathname } = useLocation();

  // Scroll to top on route change for a brochure-style browsing feel.
  useEffect(() => {
    window.scrollTo({ top: 0, behavior: "instant" in window ? "instant" : "auto" });
  }, [pathname]);

  return (
    <div className="min-h-screen flex flex-col bg-cream" data-testid="site-root">
      <Header />
      <main className="flex-1" data-testid="page-main">
        <Outlet />
      </main>
      <Footer />
    </div>
  );
}
