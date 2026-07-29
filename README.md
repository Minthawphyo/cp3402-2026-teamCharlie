# CP3402 Team Charlie — Coffee Shop Website

[![Deploy to Staging](https://github.com/Minthawphyo/cp3402-2026-teamCharlie/actions/workflows/deploy-staging.yml/badge.svg?branch=staging)](https://github.com/Minthawphyo/cp3402-2026-teamCharlie/actions/workflows/deploy-staging.yml)
[![Deploy to Production](https://github.com/Minthawphyo/cp3402-2026-teamCharlie/actions/workflows/deploy-production.yml/badge.svg?branch=main)](https://github.com/Minthawphyo/cp3402-2026-teamCharlie/actions/workflows/deploy-production.yml)

WordPress group project for **Assessment 3** (CP3402 Content Management Systems).

We are building a **coffee shop brochure website** with a custom theme. Visitors can view the menu, learn about the shop, and find contact/location details. Content is managed in the normal WordPress admin — no online shop or custom backend.

---

## Team members

- Min Thaw Phyo
- Oakkar Phyoe
- Sai Ko Ko Kyaw
- Amie Phyo
- Wint Wah Lwin

---

## Project goal

Create a simple, goal-driven coffee shop site that helps visitors:

1. Discover the shop
2. Browse the menu
3. Find the location / get in touch

**Main CTAs (calls to action):** View Menu · Find Us · Contact Us

---

## Features

- Custom WordPress theme
- Responsive coffee shop brochure website
- Home page with hero section
- Menu page showcasing coffee and food items
- About page introducing Charlie's Coffee
- Find Us page with contact and location information
- Easy content management through WordPress Admin
- Staging and production deployment with CI/CD

---

## What we are building

| Area | Details |
|------|---------|
| **Website (frontend)** | Custom WordPress theme — Home, Menu, About, Contact / Find Us |
| **Content management** | WordPress admin — edit pages, menu items, photos |
| **Hosting** | Local + staging + production |

---

## Tech stack

- **WordPress** — website + content management
- **Custom theme** — coffee shop look and layout (PHP, HTML, CSS; JS optional)

---

## Environments (Assessment requirement)

| Environment | Purpose | URL | Who |
|-------------|---------|-----|-----|
| **Local** | Build and test on each member's computer | each teammate's own WP install | Everyone |
| **Staging** | Test before going live | [charliescoffeestaging.atwebpages.com](https://charliescoffeestaging.atwebpages.com) | Staging teammates |
| **Production** | Public live site | [charliescoffee.app](https://charliescoffee.app) | Staging / deploy teammates |

Hosted on AwardSpace (free tier); production is fronted by Cloudflare for
HTTPS since AwardSpace's free plan doesn't include SSL for custom domains.
See [deployment.md](deployment.md) for the full setup and the reasoning
behind these choices, including alternatives that were tried and rejected
(InfinityFree, other domain registrars, running production without
Cloudflare).

---

## Repo docs

| File | What it covers |
|------|----------------|
| [workflow.md](workflow.md) | Brochure-site visitor flow, team build steps, frontend TODOs |
| [deployment.md](deployment.md) | CI/CD pipeline, branching model, environments, how to deploy |
| [project.html](project.html) | Local environment demonstrated (screenshots of a real local install) |

### Run locally

1. Copy `coffee-shop/charlies-coffee` → your Local WP site’s `wp-content/themes/`
2. Activate **Charlie's Coffee**
3. Create Home / Menu / About / Contact and assign templates (see [coffee-shop/README.md](coffee-shop/README.md))

See [project.html](project.html) for a worked example, including a note on
running fully locally with SQLite (no MySQL install needed).

More docs to add later: `theme.md`, `site.md`, `project.html`
