# Charlie's Coffee — WordPress Theme

Custom brochure theme for CP3402 (PHP + HTML + CSS).  
Cream · forest green · burnt orange.

## Pages

| Template | Use for |
|----------|---------|
| Front Page (`front-page.php`) | Home |
| **Menu** page template | Menu |
| **About** page template | About |
| **Contact** page template | Find Us / Contact |

## Install (Local WP)

1. Copy `charlies-coffee` into `wp-content/themes/`
2. Activate **Charlie's Coffee**
3. Create pages Home / Menu / About / Contact and assign templates
4. Settings → Reading → front page = Home  
5. Settings → Permalinks → Post name

On activate, sample menu items are seeded automatically (once).

## Edit menu in WP Admin (not in code)

| Admin screen | What |
|--------------|------|
| **Menu Items** | Name (title), description (editor), **Price (SGD)**, Featured on Home |
| **Menu Items → Menu Categories** | Category name, tagline, image URL, sort order |

Menu page + Home featured drinks pull from these posts — no hardcoded prices.

### Add a drink
1. Menu Items → Add New  
2. Title = name, editor = short description  
3. Sidebar: Price + optional Featured  
4. Assign a **Menu Category**  
5. Publish  

### Change a price
Menu Items → edit item → change Price → Update.

## Files

```text
charlies-coffee/
  style.css
  functions.php
  header.php / footer.php / front-page.php / index.php
  assets/js/main.js
  inc/menu-cpt.php      ← CPT + taxonomy + queries
  inc/menu-seed.php     ← one-time sample data
  page-templates/
    template-menu.php
    template-about.php
    template-contact.php
```
