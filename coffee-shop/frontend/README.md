# Charlie's Coffee — Frontend

React brochure site for **CP3402 Team Charlie**.

Visitors can browse the cafe, view the menu, read About, and find contact details.  
No cart, checkout, payments, or backend.

## Pages

| Route | Page |
|-------|------|
| `/` | Home |
| `/menu` | Menu |
| `/about` | About |
| `/contact` | Find Us / Contact |

**Main CTAs:** View Menu · Find Us · Contact Us

## Stack

- React 19 + React Router
- Tailwind CSS
- Craco (Create React App)

## Setup

```bash
cd coffee-shop/frontend
yarn install
yarn start
```

App runs at [http://localhost:3000](http://localhost:3000).

### Other commands

```bash
yarn build   # production build → build/
yarn test    # tests
```

## Folder map

```text
src/
  components/   Header, Footer, Layout, HoursWidget
  pages/        Home, Menu, About, Contact
  data/         menuData.js (static menu items)
  index.css     colours + fonts
```

## Notes

- Menu, hours, and copy are static in the frontend (fine for v1).
- Contact form is UI-only for now (shows a success toast).
- Optional later WordPress notes: see `../FRONTEND_TODOS.md`
