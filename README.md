# CP3402 Team Charlie — Coffee Shop Website

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

## What we are building

| Area | Details |
|------|---------|
| **Website (frontend)** | Custom WordPress theme — Home, Menu, About, Contact / Find Us |
| **Content management** | WordPress admin — edit pages, menu items, photos |
| **Hosting** | Local + staging + production |

### Not in scope

- WooCommerce / online cart
- Stripe or other payments
- Custom customer or admin dashboards
- Order tracking, inventory, loyalty

---

## Tech stack

- **WordPress** — website + content management
- **Custom theme** — coffee shop look and layout (PHP, HTML, CSS; JS optional)

---

## Environments (Assessment requirement)

| Environment | Purpose | Who |
|-------------|---------|-----|
| **Local** | Build and test on each member’s computer | Everyone |
| **Staging** | Test before going live | Staging teammates |
| **Production** | Public live site | Staging / deploy teammates |

---

## Repo docs

| File | What it covers |
|------|----------------|
| [coffee-shop/charlies-coffee/](coffee-shop/charlies-coffee/) | **Custom WordPress theme** (PHP + HTML + CSS) |
| [coffee-shop/README.md](coffee-shop/README.md) | How to install the theme in Local WP |
| [workflow.md](workflow.md) | Brochure-site visitor flow, team build steps |
| [assessment-3-rubric.md](assessment-3-rubric.md) | Assessment 3 brief and marking rubric |

### Run locally

1. Copy `coffee-shop/charlies-coffee` → your Local WP site’s `wp-content/themes/`
2. Activate **Charlie's Coffee**
3. Create Home / Menu / About / Contact and assign templates (see [coffee-shop/README.md](coffee-shop/README.md))

More docs to add later: `theme.md`, `site.md`, `deployment.md`, `project.html`
