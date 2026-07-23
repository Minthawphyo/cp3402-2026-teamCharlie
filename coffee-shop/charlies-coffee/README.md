# Charlie's Coffee — WordPress Theme

Custom brochure theme for CP3402 (PHP + HTML + CSS).  
Same look as the React mock: cream, forest green, burnt orange.

## Pages

| Template | Use for |
|----------|---------|
| Front Page (`front-page.php`) | Home |
| **Menu** page template | Menu |
| **About** page template | About |
| **Contact** page template | Find Us / Contact |

## Install (Local WP / any WordPress)

1. Copy the `charlies-coffee` folder into `wp-content/themes/`
2. Appearance → Themes → activate **Charlie's Coffee**
3. Settings → Reading → set a static front page (create a page called Home, or leave blog and still use front-page if “Your homepage displays” is set to a static page)
4. Create pages: **Menu**, **About**, **Contact**
5. Edit each page → Template → choose **Menu** / **About** / **Contact**
6. Set permalinks to Post name (Settings → Permalinks)

## Design

- Colours: `#F9F6F0` cream · `#1A3626` forest · `#CC5803` burnt  
- Fonts: Fraunces (headings) + DM Sans (body)  
- Prices: SGD (`S$`)  
- No cart / WooCommerce

## Edit menu items

Edit `inc/menu-data.php` — or later move this into WordPress content / custom fields.

## Files

```text
charlies-coffee/
  style.css
  functions.php
  header.php
  footer.php
  front-page.php
  index.php
  assets/js/main.js
  inc/menu-data.php
  page-templates/
    template-menu.php
    template-about.php
    template-contact.php
```
